<?php
class Model_type_nomer extends CI_Model
{
    public function view_type_nomer()
    {
        $sql = 'select * from type_nomer';
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
?>