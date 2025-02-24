<?php
class Model_rukotchets extends CI_Model
{
    //кассовый отчёт по дате
    public function kassovyi($kassovyiDate)
    {
        $sql = "SELECT
            SELECT
                bron.id_bron,  -- Уникальный идентификатор брони (участвует в GROUP BY)
                bron.date_start,
                bron.date_end,
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
            WHERE ?
            GROUP BY 
                bron.id_bron,  -- Группировка по уникальному id брони
                nomers.price,  -- Цена номера должна быть фиксированной для брони
                bron.date_start,
                bron.date_end;";

        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
?>
