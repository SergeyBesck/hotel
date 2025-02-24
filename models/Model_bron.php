<?php
class Model_bron extends CI_Model
{
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
    public function select_bron_acc($id_user)
    {
        $sql = 'SELECT * FROM bron, nomers WHERE bron.id_nomer = nomers.id_nomer AND id_user = ?';
        return $this->db->query($sql, array($id_user))->result_array();
    }
}
?>