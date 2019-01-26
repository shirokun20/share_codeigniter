<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
        if ($this->session->test) {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data = array(
            'judul' => 'Contoh Login dengan ajax',
        );
        $this->liblat->page('vLogin', $data);
    }

    protected function __validasi()
    {
        $data           = array();
        $data['pesan']  = array();
        $data['status'] = 'berhasil';
        //Email
        $email = $this->liblat->validatorInputNull('email', 'Email harus diisi');
        if ($email['status'] == 'gagal') {
            $data['pesan'][] = $email['pesan'];
            $data['status']  = $email['status'];
        }
        // password
        $password = $this->liblat->validatorInputNull('password', 'Password harus diisi');
        if ($password['status'] == 'gagal') {
            $data['pesan'][] = $password['pesan'];
            $data['status']  = $password['status'];
        }

        if ($data['status'] == 'gagal') {
            $this->liblat->to_json($data);
            exit();
        } else {
            return array(
                'email'    => $email['email'],
                'password' => md5($password['password']),
            );
        }
    }

    public function masuk()
    {
        $q                = $this->__validasi();
        $data['email']    = $q['email'];
        $data['password'] = $q['password'];
        $hasil            = $this->mod_sb->mengambil('vuser', $data);
        if ($hasil->num_rows() == false) {
            $hasil2 = $this->mod_sb->mengambil('vuser', array(
                'email' => $data['email'],
            ));
            $status = 'gagal';
            if ($hasil2->num_rows() == true) {
                $pesan = 'Password salah..';
            }else{
                $pesan = 'Gagal masuk ke aplikasi..';
            }
        } else {
            $status = 'berhasil';
            $pesan  = 'Berhasil masuk ke aplikasi..';
            $this->session->set_userdata('test', $hasil->row());
        }

        $this->liblat->to_json(array(
            'status' => $status,
            'pesan'  => $pesan,
        ));
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
