<?php
class Model_uslugi extends CI_Model
{
    //выбрать услугу
    public function select_uslugi()
    {
        $sql = 'select * from uslugi';
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    //добавить услугу
    public function ins_uslugi($name_usluga, $opisanie,$price,$img)
    {
        $sql = 'insert into uslugi (name_usluga, opisanie,price,img) ';
        $result = $this->db->query($sql, array($name_usluga,$opisanie, $price, $img));
        return $result;
    }
}
?>
