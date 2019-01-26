<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Awal extends CI_Controller
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
        redirect(site_url('awal/datanya/'), 'refresh');
    }

    public function datanya()
    {
        $data = array(
            'judul' => 'Contoh tabel dengan ajax codeigniter (bukan datatables)',
        );
        $this->liblat->page('vData', $data);
    }

    public function datanya2()
    {
        $data = array(
            'judul' => 'Contoh Tabel JS Dengan Rowspan',
        );
        $this->liblat->page('vData2', $data);
    }

    public function listData()
    {
        $q    = $this->mod_user->datanya(5);
        $json = array();
        if ($q->num_rows() == true) {
            $status = 'ada';
            foreach ($q->result() as $key) {
                $r              = array();
                $r['nama']      = ucwords($key->nama);
                $r['email']     = $key->email;
                $r['type_name'] = $key->type_name;
                $r['gender']    = $this->liblat->jk($key->gender);
                $json[]         = $r;
            }
        } else {
            $status = 'tidak_ada';
        }

        $this->liblat->to_json(array(
            'status'       => $status,
            'data'         => $json,
            'jumlah'       => $q->num_rows(),
            'jumlah_total' => $this->mod_user->datanya()->num_rows(),
        ));
    }

    public function listDat2()
    {
        $q = $this->mod_user->datanya2(array('tahun', 'bulan'));
            $json = array();
            if ($q->num_rows() == true) {
                $status = 'ada';
                foreach ($q->result() as $key) {
                    $r          = array();
                    $r['tahun'] = $key->tahun;
                    $r['bulan'] = $key->bulan;
                    $q2         = $this->mod_user->datanya3(array(
                        'tahun' => $r['tahun'],
                        'bulan' => $r['bulan'],
                    ));
                    $json2 = array();
                    foreach ($q2->result() as $key2) {
                        $r2             = array();
                        $r2['nama']      = ucwords($key2->nama);
                        $r2['email']     = $key2->email;
                        $r2['type_name'] = $key2->type_name;
                        $r2['gender']    = $this->liblat->jk($key2->gender);
                        $json2[] = $r2;
                    }
                    $r['detail'] = $json2;
                    $json[] = $r;
                }
            } else {
                $status = 'tidak_ada';
            }
            $this->liblat->to_json(array(
                'status' => $status,
                'data'   => $json,
            ));
        }
    }

/* End of file Awal.php */
/* Location: ./application/controllers/Awal.php */
