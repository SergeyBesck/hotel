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
    //добавить номер
    public function ins_nomers( $namen, $discription,$price,$photo)
    {
        $sql = 'insert into nomers (namen, description,price,photo) ';
        $result = $this->db->query($sql, array($namen, $discription,$price,$photo));
        return $result;
    }
}
?>
