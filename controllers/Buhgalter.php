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
}
?>
