<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    private function harusDibaca()
    {
        $baca = 'Harus dibaca dulu';
        $baca .= 'Modelnya di load di autoload.php';
        $baca .= 'liblat adalah libarary yang anam buat sendiri diload di autoload.php';
        $baca .= 'autoload.php ada di folder config/autoload.php';
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->session->sess_destroy();
        redirect(site_url());
    }

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */
