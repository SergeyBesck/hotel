<?php
class Model_users extends CI_Model {
    public function add_user($fio, $phone, $passport_number, $number_date, $date_birthday, $login, $pass){

        $sql = "INSERT INTO users (id_role, fio, phone, pasport_number, pasport_date, date_birthday, login, pass) VALUE (4, ?, ?, ?, ?, ?, ?, ?)";
        $result = $this->db->query($sql, array($fio, $phone, $passport_number, $number_date, $date_birthday, $login, $pass));
        return $result;
    }
    public function choice_user($login, $pass){
        $sql = "SELECT * FROM users WHERE login = ? AND pass = ? ";
        $result = $this->db->query($sql, array($login, $pass));
        return $result->row_array();
    }
    
}
?>