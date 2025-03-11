<?php
class Model_rukotchets extends CI_Model
{
    //кассовый отчёт по дате
    public function kassovyi($kassovyiDate)
    {
        $sql = "SELECT
                    bron.id_bron,  -- Уникальный идентификатор брони (участвует в GROUP BY)
                    bron.date_start,
                    CASE
                        WHEN bron.date_end = NULL 
                            THEN '--'
                        ELSE
                        	bron.date_end
                        END AS date_end,
                    nomers.price AS nomer_price,
                    DATEDIFF(bron.date_end, bron.date_start) AS bron_days,
                    
                    -- Сумма за номер: цена номера * кол-во дней
                    nomers.price * DATEDIFF(bron.date_end, bron.date_start) AS nomer_sum,
                    -- Список ID услуг через запятую
                    COALESCE(GROUP_CONCAT(bron_uslugi.id_uslugi), 'Нет услуг') AS uslugi_ids,
                    -- Список названий услуг через запятую
                    COALESCE(GROUP_CONCAT(uslugi.name_usluga SEPARATOR ', '), 'Нет услуг') AS uslugi_names,
                    -- Сумма всех услуг (uslugi_sum)
                    COALESCE(SUM(uslugi.price), 0) AS uslugi_sum,
                    -- Полная сумма: сумма за номер + сумма всех услуг
                    nomers.price * DATEDIFF(bron.date_end, bron.date_start) + COALESCE(SUM(uslugi.price), 0) AS full_sum

                FROM bron
                LEFT JOIN nomers 
                    ON nomers.id_nomer = bron.id_nomer
                LEFT JOIN bron_uslugi 
                    ON bron.id_bron = bron_uslugi.id_bron
                LEFT JOIN uslugi 
                    ON bron_uslugi.id_uslugi = uslugi.id_uslugi
                WHERE date_start = ?
                GROUP BY 
                    bron.id_bron,  -- Группировка по уникальному id брони
                    nomers.price,  -- Цена номера должна быть фиксированной для брони
                    bron.date_start,
                    bron.date_end;";

        $result = $this->db->query($sql, [$kassovyiDate]);
        return $result->result_array();
    }

    //доп услуги
    public function dopuslugi($dateS, $datePo){
        $sql = "SELECT 
                    u.id_uslugi,
                    u.name_usluga AS usluga_name,
                    COALESCE(u.ed_izm, '--') AS ed_izm,
                    COUNT(bu.id) AS colvo,
                    u.price * COUNT(bu.id) AS sum
                FROM uslugi u
                LEFT JOIN (
                    SELECT 
                        bu.id_uslugi, 
                        bu.id
                    FROM bron_uslugi bu
                    INNER JOIN bron 
                        ON bu.id_bron = bron.id_bron
                    WHERE bron.date_start BETWEEN ? AND ?
                ) bu ON u.id_uslugi = bu.id_uslugi
                GROUP BY u.id_uslugi, u.ed_izm, u.price;";

        $result = $this->db->query($sql, array($dateS, $datePo));
        return $result->result_array();
    }

    //номера за период
    public function nomerszaperiod($dateS, $datePo)
    {
        $sql = "SELECT 
            n.id_nomer,
            n.namen AS nomer_name,
            tn.id_type,
            tn.name_type AS type_name,
            COUNT(b.id_bron) AS bron_colvo,
            n.price,
            COUNT(b.id_bron) * n.price AS nomer_sum,
            COALESCE(AVG(DATEDIFF(b.date_end, b.date_start)), 0) AS avg_bron_lasting,
            COALESCE(MAX(DATEDIFF(b.date_end, b.date_start)), 0) AS max_bron_lasting,
            COALESCE(MIN(DATEDIFF(b.date_end, b.date_start)), 0) AS min_bron_lasting
        FROM nomers n
        LEFT JOIN type_nomer tn 
            ON n.type_nomer = tn.id_type
        LEFT JOIN bron b 
            ON n.id_nomer = b.id_nomer
            AND b.date_start BETWEEN ? AND ?
        GROUP BY n.id_nomer, n.namen, tn.id_type, tn.name_type, n.price;";

        $result = $this->db->query($sql, array($dateS, $datePo));
        return $result->result_array();
    }

    //типы номеров за период
    public function typeszaperiod($dateS, $datePo)
    {
        $sql = "SELECT 
            tn.id_type,
            tn.name_type,
            COUNT(b.id_bron) AS colvo_bron,
            COALESCE(SUM(n.price * DATEDIFF(b.date_end, b.date_start)), 0) AS total_sum,
            COALESCE(AVG(DATEDIFF(b.date_end, b.date_start)), 0) AS avg_bron_lasting,
            COALESCE(MAX(DATEDIFF(b.date_end, b.date_start)), 0) AS max_bron_lasting,
            COALESCE(MIN(DATEDIFF(b.date_end, b.date_start)), 0) AS min_bron_lasting
        FROM type_nomer tn
        LEFT JOIN nomers n 
            ON tn.id_type = n.type_nomer
        LEFT JOIN bron b 
            ON n.id_nomer = b.id_nomer
            AND b.date_start BETWEEN ? AND ?
        GROUP BY tn.id_type, tn.name_type;";

        $result = $this->db->query($sql, array($dateS, $datePo));
        return $result->result_array();
    }

    //информация о номерах
    public function infoonomers($target_date){
        $sql = "SELECT 
            n.id_nomer,
            n.namen AS nomer_name,
            tn.id_type,
            tn.name_type AS type_name,
            MAX(CASE 
                WHEN b.id_bron IS NOT NULL THEN 'Занят' 
                ELSE 'Свободен' 
            END) AS status,
            COALESCE(CAST(MAX(b.id_bron) AS CHAR), '--') AS id_bron, -- Добавлено поле id_bron
            COALESCE(CAST(MAX(b.id_user) AS CHAR), '--') AS id_user,
            COALESCE(MAX(u.fio), '--') AS user_name,
            COALESCE(DATE_FORMAT(MAX(b.date_start), '%Y-%m-%d'), '--') AS date_start,
            COALESCE(DATE_FORMAT(MAX(b.date_end), '%Y-%m-%d'), '--') AS date_end,
            COALESCE(
                DATE_FORMAT(
                    (SELECT MIN(b2.date_start) 
                    FROM bron b2 
                    WHERE b2.id_nomer = n.id_nomer 
                    AND b2.date_start > '$target_date'
                    ), 
                    '%Y-%m-%d'
                ), 
                '--'
            ) AS next_bron
        FROM nomers n
        LEFT JOIN type_nomer tn 
            ON n.type_nomer = tn.id_type
        LEFT JOIN bron b 
            ON n.id_nomer = b.id_nomer
            AND '$target_date' BETWEEN b.date_start AND b.date_end
        LEFT JOIN users u 
            ON b.id_user = u.id_user
        GROUP BY 
            n.id_nomer,
            n.namen,
            tn.id_type,
            tn.name_type
        ORDER BY n.id_nomer;";
        $result = $this->db->query($sql, [$target_date]);
        return $result->result_array();
    }
}
?>
