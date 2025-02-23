<?php
class Main extends CI_Controller
{
    public function index()
    {
        $this->load->view('temp/header.php');
        if ($this->session->userdata('id_role')) {
            if ($this->session->userdata('id_role') == 1 OR $this->session->userdata('id_role') == 3) {
                $this->load->view('temp/navbar_dir_bukh.php');
            }
            elseif ($this->session->userdata('id_role') == 2) {
                $this->load->view('temp/navbar_admin.php');
            }
            elseif ($this->session->userdata('id_role') == 4) {
                $this->load->view('temp/navbar_user.php');
            }
        } 
        else {
            $this->load->view('temp/navbar.php');
        } 
        $this->load->view('temp/footer.php');
    }
    public function registration()
    {
        if (!empty($_POST)) {
            $this->load->model('model_users');    
            $fio = $_POST['fio'];
            $phone = $_POST['phone'];
            $passport_number = $_POST['passport_number'];
            $number_date = $_POST['number_date'];
            $date_birthday = $_POST['date_birthday'];
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $users = $this->model_users->add_user($fio, $phone, $passport_number, $number_date, $date_birthday, $login, $pass);
            if (!empty($users)) {
                redirect('main/authorization');
            }
        }
        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar.php');
        $this->load->view('registration.php');
    }
    public function authorization()
    {
        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar.php');
        $data['error'] = ''; 
        if (!empty($_POST)) {
            $this->load->model('model_users');
            $users = $this->model_users->choice_user($_POST['login'], $_POST['pass']);
            if (!empty($users)) {
                $this->session->set_userdata('id_user', $users['id_user']);
                $this->session->set_userdata('login', $users['login']);
                $this->session->set_userdata('fio', $users['fio']);
                $this->session->set_userdata('id_role', $users['id_role']);
                redirect('main');
            } else {
                $data['error'] = 'Неверный логин или пароль.'; 
            }
        }
        $this->load->view('authorization.php', $data); 
    }    
    public function exit()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('fio');
        $this->session->unset_userdata('id_role');
        redirect('main');
    }
}
?>
