<?php
class Booking extends CI_Controller
{
    public function view_booking()
    {
        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar_user.php');
        $this->load->model('model_type_nomer');
        $data['type'] = $this->model_type_nomer->view_type_nomer();
        $this->load->view('form_booking.php', $data);
    }
    public function view_nomers()
    {
        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar_user.php');
        $this->load->model('model_nomers');
        if (!empty($_POST)) {
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];
            $this->session->set_userdata('date_start', $date_start);
            $this->session->set_userdata('date_end', $date_end);
            $person = $_POST['person'];
            $id_type = $_POST['id_type'];
            $this->load->model('model_nomers');
            $data['nomersbooking'] = $this->model_nomers->select_nomers_booking($person, $id_type);
            $this->load->view('view_nomers.php', $data);
        }
    }
    public function bron()
    {
        if (!empty($_GET)) {
            $id_user = $this->session->userdata('id_user');
            $id_nomer = $_GET['id_nomer'];
            $date_start = $this->session->userdata('date_start');
            $date_end = $this->session->userdata('date_end');
            $status = 'Новая';
            $this->load->model('model_bron');
            $bron = $this->model_bron->insert_bron($id_user, $id_nomer, $date_start, $date_end, $status);
            if (!empty($bron)) {
                redirect('booking/dop_uslugi');
            }
        }

    }
    public function dop_uslugi()
    {
        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar_user.php');
        $this->load->model('model_uslugi');
        $data['uslugi'] = $this->model_uslugi->select_uslugi();
        $this->load->model('model_bron');
        $data['bron'] = $this->model_bron->select_bron();
        $this->load->view('view_uslugi.php', $data);
    }
    public function dop_uslugi_insert()
    {
        $this->load->model('model_bron');
        if (!empty($_POST)) {
            $id_bron = $_POST['id_bron'];
            $id_uslugi = $_POST['id_uslugi'];
            $this->model_bron->insert_uslugi($id_bron, $id_uslugi);
            redirect('user/personal_account');
        }
    }
}
?>