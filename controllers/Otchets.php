<?php
class Otchets extends CI_Controller
{
    public function kassovyi()
    {
        $this->load->view('temp/header.php');
        if ($this->session->userdata('id_role') == 1) {
            $this->load->view('temp/navbar_ruk.php');
        }
        elseif ($this->session->userdata('id_role') == 2) {
            $this->load->view('temp/navbar_admin.php');
        }
        elseif ($this->session->userdata('id_role') == 3) {
            $this->load->view('temp/navbar_dir_bukh.php');
        }

        if (!empty($_POST)){
            $kassovyiDate = $_POST['kassovyiDate'];
            $this->load->model('model_rukotchets');

            $kassovyi = $this->model_rukotchets->kassovyi($kassovyiDate);
            $data['kassovyi'] = $this->model_rukotchets->kassovyi($kassovyiDate);

            $full_sum_date = 0;
            foreach ($kassovyi as $row) {
                $full_sum_date = $full_sum_date + $row['full_sum'];
            }
            
            $data['full_sum_date'] = $full_sum_date;

            $this->load->view(  'kassovyi.php', $data);
        }
        else {
            $this->load->view(  'kassovyi.php');
        }
    }

    public function dopuslugi()
    {
        $this->load->view('temp/header.php');
        if ($this->session->userdata('id_role') == 1) {
            $this->load->view('temp/navbar_ruk.php');
        }
        elseif ($this->session->userdata('id_role') == 2) {
            $this->load->view('temp/navbar_admin.php');
        }
        elseif ($this->session->userdata('id_role') == 3) {
            $this->load->view('temp/navbar_dir_bukh.php');
        }

        if (!empty($_POST)){
            $dateS = $_POST['dates'];
            $datePo = $_POST['datepo'];
            $this->load->model('model_rukotchets');
            $data['dopuslugi'] = $this->model_rukotchets->dopuslugi($dateS, $datePo);

            $dopuslugi = $this->model_rukotchets->dopuslugi($dateS, $datePo);
            $full_sum = 0;
            foreach ($dopuslugi as $row) {
                $full_sum = $full_sum + $row['sum'];
            }
            
            $data['full_sum'] = $full_sum;
            $this->load->view(  'dopuslugi.php', $data);
        }
        else {
            $this->load->view(  'dopuslugi.php');
        }
    }

    public function zaperiod()
    {
        $this->load->view('temp/header.php');
        if ($this->session->userdata('id_role') == 1) {
            $this->load->view('temp/navbar_ruk.php');
        }
        elseif ($this->session->userdata('id_role') == 2) {
            $this->load->view('temp/navbar_admin.php');
        }
        elseif ($this->session->userdata('id_role') == 3) {
            $this->load->view('temp/navbar_dir_bukh.php');
        }

        if (!empty($_POST)){
            $dateS = $_POST['dates'];
            $datePo = $_POST['datepo'];
            $this->load->model('model_rukotchets');
            
            //номера
            $data['nomerszaperiod'] = $this->model_rukotchets->nomerszaperiod($dateS, $datePo);

            $nomerszaperiod = $this->model_rukotchets->nomerszaperiod($dateS, $datePo);
            $nomers_full_sum = 0;
            foreach ($nomerszaperiod as $row) {
                $nomers_full_sum = $nomers_full_sum + $row['nomer_sum'];
            }
            $data['nomers_full_sum'] = $nomers_full_sum;
            


            //типы номеров
            $data['typeszaperiod'] = $this->model_rukotchets->typeszaperiod($dateS, $datePo);

            $typeszaperiod = $this->model_rukotchets->typeszaperiod($dateS, $datePo);
            $types_full_sum = 0;
            foreach ($typeszaperiod as $row) {
                $types_full_sum = $types_full_sum + $row['total_sum'];
            }
            $data['types_full_sum'] = $types_full_sum;



            //услуги
            $data['dopuslugizaperiod'] = $this->model_rukotchets->dopuslugi($dateS, $datePo);

            $dopuslugizaperiod = $this->model_rukotchets->dopuslugi($dateS, $datePo);
            $u_full_sum = 0;
            foreach ($dopuslugizaperiod as $row) {
                $u_full_sum = $u_full_sum + $row['sum'];
            }
            
            $data['u_full_sum'] = $u_full_sum;

            $this->load->view(  'zaperiod.php', $data);
        }
        else {
            $this->load->view(  'zaperiod.php');
        }
    }

    //информация о номерах
    public function infoonomers() {
        $this->load->view('temp/header.php');
        if ($this->session->userdata('id_role') == 1) {
            $this->load->view('temp/navbar_ruk.php');
        }
        elseif ($this->session->userdata('id_role') == 2) {
            $this->load->view('temp/navbar_admin.php');
        }
        elseif ($this->session->userdata('id_role') == 3) {
            $this->load->view('temp/navbar_dir_bukh.php');
        }

        if (!empty($_POST)){
            $target_date = $_POST['target_date'];
            $data['target_date'] = $_POST['target_date'];

            $this->load->model('model_rukotchets');            
            $data['nomers'] = $this->model_rukotchets->infoonomers($target_date);


            $this->load->view(  'infoonomers.php', $data);
        }
        else {
            $this->load->view(  'infoonomers.php');
        }
    }
}