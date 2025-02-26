<?php
class Model_bron extends CI_Model
{
 //Отчёт сведения о номерах (передача результата контроллеру Buhgalter)
    public function report_nomer($dates, $datef)
    {
        $sql = "SELECT id_bron,namen, price, status  FROM  bron, nomers WHERE bron.id_nomer = nomers.id_nomer and date_start BETWEEN ? and ? GROUP BY bron.id_bron , namen , price,status";
        $result1 = $this->db->query($sql, array($dates, $datef));
        return $result1->result_array();
    }
  //Отчёт о доходах (передача результата контроллеру Buhgalter)
    public function report_dohod($dates, $datef)
    {
        $sql = "SELECT id_bron,namen, price, count(id_bron),sum(price)  FROM  bron, nomers WHERE bron.id_nomer = nomers.id_nomer and date_start BETWEEN ? and ? GROUP BY bron.id_bron , namen , price";
        $result1 = $this->db->query($sql, array($dates, $datef));
        return $result1->result_array();
    }   
}
?>
