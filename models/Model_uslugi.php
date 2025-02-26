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
     //Отчёт о доходах от дополнительных услуг (передача результата контроллеру Buhgalter)
    public function report_usluga($dates, $datef)
    {
        $sql = "SELECT name_usluga,ed_izm, price, count(id),sum(price)  FROM bron, bron_uslugi,uslugi WHERE bron_uslugi.id_uslugi = uslugi.id_uslugi and date_start BETWEEN ? and ? GROUP BY bron_uslugi.id_uslugi , name_usluga ,ed_izm, price";
        $result1 = $this->db->query($sql, array($dates, $datef));
        return $result1->result_array();
    }
}
?>
