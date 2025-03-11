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
    public function ins_uslugi($name_usluga, $opisanie,$price,$img)
    {
        $sql = 'insert into uslugi (name_usluga, opisanie,price,img) ';
        $result = $this->db->query($sql, array($name_usluga,$opisanie, $price, $img));
        return $result;
    }
        public function select_dop_uslugi($id_user, $id_bron)
    {
        $sql = 'SELECT name_usluga, price, opisanie FROM bron LEFT JOIN bron_uslugi ON bron_uslugi.id_bron = bron.id_bron LEFT JOIN uslugi ON bron_uslugi.id_uslugi = uslugi.id_uslugi WHERE bron.id_user = ? AND bron.id_bron = ?';
        return $this->db->query($sql, array($id_user, $id_bron))->result_array();
    }
}
?>
