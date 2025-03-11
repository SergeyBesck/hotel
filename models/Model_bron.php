<?php
class Model_bron extends CI_Model
{
    //выбрать все данные о заявках на бронирование
    public function select_bron_viezd($dates)
    {
        $sql = 'SELECT bron.id_bron, users.fio,
        (nomers.price * DATEDIFF(bron.date_end, bron.date_start)) AS "sum",
        bron.id_nomer, bron.date_end FROM bron, users, nomers WHERE bron.id_user = users.id_user
        AND bron.id_nomer = nomers.id_nomer AND bron.date_end = ?';
        $result = $this->db->query($sql, array($dates));
        return $result->result_array();
    }

    public function insert_bron($id_user, $id_nomer, $date_start, $date_end, $status)
    {
        $sql = "INSERT INTO bron (id_user, id_nomer, date_start, date_end, status) VALUE (?, ?, ?, ?, ?)";
        $result = $this->db->query($sql, array($id_user, $id_nomer, $date_start, $date_end, $status));
        return $result;
    }
    public function insert_uslugi($id_bron, $id_uslugi){
        $sql = "INSERT INTO bron_uslugi (id_bron, id_uslugi) VALUES ";
        foreach ($id_uslugi as $key => $row) {
            $key = explode("_", $key);
            $sql .= "($id_bron, '$row[0]'),";
        }
        $sql = substr($sql, 0, -1);
        $result = $this->db->query($sql);
    }

    public function select_bron()
    {
        $sql = 'SELECT * FROM bron';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function report_nomer($dates, $datef)
    {
        $sql = "SELECT id_bron,namen, price, status  FROM  bron, nomers WHERE bron.id_nomer = nomers.id_nomer and date_start BETWEEN ? and ? GROUP BY bron.id_bron , namen , price,status";
        $result1 = $this->db->query($sql, array($dates, $datef));
        return $result1->result_array();
    }

    public function report_dohod($dates, $datef)
    {
        $sql = "SELECT id_bron,namen, price, count(id_bron),sum(price)  FROM  bron, nomers WHERE bron.id_nomer = nomers.id_nomer and date_start BETWEEN ? and ? GROUP BY bron.id_bron , namen , price";
        $result1 = $this->db->query($sql, array($dates, $datef));
        return $result1->result_array();
    }   

    public function bron_yes($id)
    {
        $sql = "UPDATE `bron` SET `status`='Подтверждена' WHERE id_bron = ?";
        $this->db->query($sql, array($id));
    }

    public function bron_drop($id)
    {
        $sql = "UPDATE `bron` SET `status`='Отменена' WHERE id_bron = ?";
        $this->db->query($sql, array($id));
    }


    public function select_bron_acc($id_user)
    {
        $sql = 'SELECT 
    bron.id_bron, 
    nomers.namen,  
    bron.date_start, 
    bron.date_end, 
    bron.status,
    (bron.date_end - bron.date_start) AS date_difference,
    COALESCE(nomer_total.itog_nomers, 0) + COALESCE(uslugi_total.itog_uslugi, 0) AS itogsum
FROM 
    bron 
LEFT JOIN 
    (SELECT id_bron, SUM(price) AS itog_nomers 
     FROM nomers 
     JOIN bron ON bron.id_nomer = nomers.id_nomer 
     GROUP BY id_bron) AS nomer_total ON bron.id_bron = nomer_total.id_bron
LEFT JOIN 
    bron_uslugi ON bron.id_bron = bron_uslugi.id_bron
LEFT JOIN 
    (SELECT bron_uslugi.id_bron, SUM(uslugi.price) AS itog_uslugi 
     FROM bron_uslugi 
     JOIN uslugi ON uslugi.id_uslugi = bron_uslugi.id_uslugi 
     GROUP BY bron_uslugi.id_bron) AS uslugi_total ON bron.id_bron = uslugi_total.id_bron
LEFT JOIN 
     nomers ON bron.id_nomer = nomers.id_nomer
WHERE 
    bron.id_user = ?
GROUP BY 
    bron.id_bron, 
    nomers.namen,
    bron.date_start, 
    bron.date_end, 
    bron.status;';
        return $this->db->query($sql, array($id_user))->result_array();
    }
    public function add_otziv($ball, $description, $id_bron)
    {
        $sql = "INSERT INTO  otzivs (ball, description, id_bron) VALUE (?, ?, ?)";
        $result = $this->db->query($sql, array($ball, $description, $id_bron));
        return $result;
    }

    public function select_otziv($id_bron)
    {
        $sql = 'SELECT * FROM otzivs WHERE id_bron=?';
        return $this->db->query($sql, array($id_bron))->result_array();
    }

    public function select_info($dates, $datee)
    {
        $sql = 'SELECT bron.id_bron ,users.fio, GROUP_CONCAT(uslugi.name_usluga SEPARATOR ",") AS "uslugi"
        FROM users, bron, uslugi, bron_uslugi WHERE users.id_user = bron.id_user AND bron_uslugi.id_bron = bron.id_bron AND uslugi.id_uslugi = bron_uslugi.id_uslugi
        AND bron.date_start >= ? AND bron.date_start <= ?
        GROUP BY bron.id_bron, users.fio, bron.date_start';
        $result1 = $this->db->query($sql, array($dates, $datee));
        return $result1->result_array();
    }
}
?>
