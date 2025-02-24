<?php
class User extends CI_Controller {
    public function personal_account()
    {
        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar_user.php');
        $this->load->model('model_bron');
        $id_user = $this->session->userdata('id_user');
        $data['personalbron'] = $this->model_bron->select_bron_acc($id_user);
        $this->load->view('page_persacc.php', $data);
    }
}
?>