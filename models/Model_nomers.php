<?php
class Model_nomers extends CI_Model
{
    //выбрать номер
    public function select_nomers()
    {
        $sql = 'select * from nomers, type_nomer WHERE nomers.id_nomer = type_nomer.id_type';
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    //выбрать номера с данными на конкретную дату
    public function select_nomers_info($data)
    {
        $sql = 'SELECT 
            nomers.id_nomer, 
            nomers.namen, 
            nomers.price, 
            CASE 
                WHEN bron.id_bron IS NOT NULL AND bron.date_start <= ? AND bron.date_end >= ? THEN "занят" 
                ELSE "свободен" 
            END AS status
        FROM 
            nomers
        JOIN 
            type_nomer ON nomers.id_nomer = type_nomer.id_type
        LEFT JOIN 
            bron ON nomers.id_nomer = bron.id_nomer;';
        $result = $this->db->query($sql, array($data,$data));
        return $result->result_array();
    }
    //добавить номер
    public function ins_nomers( $namen, $discription,$price,$photo)
    {
        $sql = 'insert into nomers (namen, description,price,photo) ';
        $result = $this->db->query($sql, array($namen, $discription,$price,$photo));
        return $result;
    }

    public function select_nomers_booking($person, $id_type, $datas, $datae)
    {
        $sql = "SELECT DISTINCT nomers.id_nomer, nomers.namen, nomers.description, nomers.price, nomers.photo
        FROM nomers
        JOIN type_nomer ON nomers.type_nomer = type_nomer.id_type
        LEFT JOIN bron ON bron.id_nomer = nomers.id_nomer
        WHERE persona >= $person
        AND id_type = $id_type
        AND (bron.id_bron IS NULL 
       OR bron.status = 'Отменена' OR (((bron.date_start < '$datas' AND bron.date_start > '$datae') OR (bron.date_end < '$datas'))))
       ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
?>   

