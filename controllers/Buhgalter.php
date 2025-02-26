<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Buhgalter extends CI_Controller
{
    //формирование отчёта сведения о номерах за период
    public function report_nomer()
    {
        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar_dir_bukh');
        $this->load->model('model_bron');
        $d1 = '2024-01-01';
        $d2 = date('Y-m-d');
        if (!empty($_POST)) {
            $d1 = $_POST['date_1'];
            $d2 = $_POST['date_2'];
        }
        $data['bron'] = $this->model_bron->report_nomer($d1, $d2);
        $data['d1'] = $d1;
        $data['d2'] = $d2;
        $data['total'] = 0;
        $this->load->view('report_n.php', $data);
    }
    //формирование отчёта о доходах за период
    public function report_dohod()
    {
        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar_dir_bukh');
        $this->load->model('model_bron');
        $d1 = '2024-01-01';
        $d2 = date('Y-m-d');
        if (!empty($_POST)) {
            $d1 = $_POST['date_1'];
            $d2 = $_POST['date_2'];
        }
        $data['bron'] = $this->model_bron->report_dohod($d1,
            $d2
        );
        $data['d1'] = $d1;
        $data['d2'] = $d2;
        $data['total'] = 0;
        $this->load->view('report_d.php', $data);
    }
    //формирование отчёта о доходах от дополнительных услуг за период
    public function report_usluga()
    {
        $this->load->view('temp/header.php');
        $this->load->view('temp/navbar_dir_bukh');
        $this->load->model('model_uslugi');
        $d1 = '2024-01-01';
        $d2 = date('Y-m-d');
        if (!empty($_POST)) {
            $d1 = $_POST['date_1'];
            $d2 = $_POST['date_2'];
        }
        $data['uslugi'] = $this->model_uslugi->report_usluga($d1,$d2);
        $data['d1'] = $d1;
        $data['d2'] = $d2;
        $data['total'] = 0;
        $this->load->view('report_u.php', $data);
    } 
}
?>
