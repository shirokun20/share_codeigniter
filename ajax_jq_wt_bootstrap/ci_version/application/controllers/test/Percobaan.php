<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Percobaan extends CI_Controller
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
        $data = array(
            'judul'   => 'Contoh Foreach Form',
            'content' => 'test/indexPercobaan',
        );
        $this->liblat->page('vPages', $data);
    }

    public function listDataNya()
    {
        $json = array();
        for ($i = 1; $i <= 20; $i++) {
            $r            = array();
            $r['nama']    = "user_ke_" . $i;
            $r['user_id'] = "user_" . $i;
            $json[]       = $r;
        }
        $this->liblat->to_json(array('data'=>$json));
    }
}

/* End of file Percobaan.php */
/* Location: ./application/controllers/test/Percobaan.php */
