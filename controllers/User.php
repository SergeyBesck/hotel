<?php
class User extends CI_Controller
{
    public function personal_account()
    {
        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar_user.php');
        $this->load->model('model_bron');
        $id_user = $this->session->userdata('id_user');
        $this->load->model('model_uslugi');
        $id_bron = '';
        if (!empty($_POST['id_bron'])) {
            $id_bron = $_POST['id_bron'];

        }
        $data['uslugi'] = $this->model_uslugi->select_dop_uslugi($id_user, $id_bron);
        $data['otziv'] = $this->model_bron->select_otziv($id_bron);
        $data['personalbron'] = $this->model_bron->select_bron_acc($id_user);
        $this->load->view('page_persacc.php', $data);
    }

    public function leaveotziv()
    {
        $this->load->model('model_bron');
        if (!empty($_POST)) {
            $id_bron = $_POST['id_bron'];
            $ball = $_POST['ball'];
            $description = $_POST['description'];
            $otzivs = $this->model_bron->add_otziv($ball, $description, $id_bron);
            if (!empty($otzivs)) {
                redirect('user/personal_account');
            }
        }

        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar_user.php');
        $this->load->view('view_otziv.php');
    }
}
?>
