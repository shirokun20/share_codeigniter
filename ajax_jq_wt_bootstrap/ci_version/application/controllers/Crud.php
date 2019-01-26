<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Controller
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
            'judul' => 'Contoh Crud dengan ajax',
        );
        $this->liblat->page('crud/vIndex', $data);
    }

    // List datanya
    public function listData()
    {
        // Mengambil datanya tapi dilimit
        $q    = $this->mod_user->datanya(5);
        $json = array();
        if ($q->num_rows() == true) {
            //Ketika datanya ada
            $status = 'ada';
            foreach ($q->result() as $key) {
                $r              = array();
                $r['id']        = md5($key->id);
                $r['nama']      = ucwords($key->nama);
                $r['email']     = $key->email;
                $r['type_name'] = $key->type_name;
                $r['gender']    = $this->liblat->jk($key->gender);
                $json[]         = $r;
            }
        } else {
            // Ketika datanya gak ada
            $status = 'tidak_ada';
        }

        $this->liblat->to_json(array(
            'status'       => $status,
            'data'         => $json,
            'jumlah'       => $q->num_rows(),
            'jumlah_total' => $this->mod_user->datanya()->num_rows(),
        ));
    }

    // Hapus
    public function hapusData()
    {
        $data['md5(id)'] = $this->input->get_post('id', true);
        $q               = $this->mod_sb->menghapus('user', $data);
        $status          = $q['status'];
        $pesan           = ucwords($status) . ' menghapus data..';

        $this->liblat->to_json(array(
            'status' => $status,
            'pesan'  => $pesan,
        ));
    }

    public function ambilData()
    {
        $data['md5(id)'] = $this->input->get_post('id', true);
        $q               = $this->mod_sb->mengambil('vuser', $data);
        if ($q->num_rows() == false) {
            $this->liblat->to_json(array(
                'status' => true,
            ));
        } else {
            $row = $q->row();
            $r   = array(
                'id'            => md5($row->id),
                'nama'          => ucwords($row->nama),
                'email'         => $row->email,
                'type_name'     => $row->type_name,
                'type_id'       => $row->type_id,
                'genderWe'        => $this->liblat->jk($row->gender),
                'gender'        => $row->gender,
                'tanggal_lahir' => $this->liblat->TanggalIndo($row->tanggal_lahir),
                'tanggal_lahir2' => $row->tanggal_lahir,
            );
            $this->liblat->to_json($r);
        }
    }

    private function _validator($formNya)
    {
        $data           = array();
        $data['pesan']  = array();
        $data['status'] = 'berhasil';
        // Nama
        $nama = $this->liblat->validatorInputNull('nama', 'Nama harus diisi');
        if ($nama['status'] == 'gagal') {
            $data['pesan'][] = $nama['pesan'];
            $data['status']  = $nama['status'];
        }
        //Email
        $email = $this->liblat->validatorInputNull('email', 'Email harus diisi');
        if ($email['status'] == 'gagal') {
            $data['pesan'][] = $email['pesan'];
            $data['status']  = $email['status'];
        }
        // Tipe_id
        $type_id = $this->liblat->validatorInputNull('type_id', 'Tipe  harus dipilih');
        if ($type_id['status'] == 'gagal') {
            $data['pesan'][] = $type_id['pesan'];
            $data['status']  = $type_id['status'];
        }

        // Tanggal lahir
        $tanggal_lahir = $this->liblat->validatorInputNull('tanggal_lahir', 'Tanggal lahir harus diisi');
        if ($tanggal_lahir['status'] == 'gagal') {
            $data['pesan'][] = $tanggal_lahir['pesan'];
            $data['status']  = $tanggal_lahir['status'];
        }
        // Kelamin
        $gender = $this->liblat->validatorInputNull('gender', 'Kelamin  harus dipilih');
        if ($gender['status'] == 'gagal') {
            $data['pesan'][] = $gender['pesan'];
            $data['status']  = $gender['status'];
        }

        // Email di cek
        $where = array(
            'email' => $email['email'],
        );
        // dicek ketika emailnya berupa edit atau selain tambah
        if ($formNya != 'tambah') {
            $where['md5(id) !='] = $this->input->get_post('id');
        }
        // Ceknya
        $cek = $this->mod_sb->mengambil('user', $where);
        // Ketika ada dia jadi gagal
        if ($cek->num_rows() == true) {
            $data['pesan'][] = 'Email sudah digunakan..';
            $data['status']  = 'gagal';
        }
        // Ok we
        $ok = array(
            'nama'          => ucwords($nama['nama']),
            'email'         => $email['email'],
            'type_id'       => $type_id['type_id'],
            'tanggal_lahir' => $tanggal_lahir['tanggal_lahir'],
            'gender'        => $gender['gender'],
        );
        // Ketika formNya == tambah
        if ($formNya == 'tambah') {
            // password
            $password = $this->liblat->validatorInputNull('password', 'Password harus diisi');
            if ($password['status'] == 'gagal') {
                $data['pesan'][] = $password['pesan'];
                $data['status']  = $password['status'];
            }
            // Repassword
            $repassword = $this->liblat->validatorInputNull('repassword', 'Re password harus diisi');
            if ($repassword['status'] == 'gagal') {
                $data['pesan'][] = $repassword['pesan'];
                $data['status']  = $repassword['status'];
            }
            // Ketika password tidak sama dengan repassword
            if ($password['password'] != $repassword['repassword']) {
                $data['pesan'][] = 'Re password harus sama dengan password..';
                $data['status']  = 'gagal';
            } 
            
            $ok['password'] = md5($password['password']);
        
        } else {
            if ($this->input->get_post('password') != null) {
                $ok['password'] = md5($this->input->get_post('password'));
            }
        }

        if ($data['status'] == 'gagal') {
            $this->liblat->to_json($data);
            exit();
        } else {
            return $ok;
        }
    }

    public function tambahSimpan()
    {
        $insert = $this->_validator('tambah');
        $q      = $this->mod_sb->menambah('user', $insert);
        $status = $q['status'];
        $pesan  = ucwords($status) . ' menambah user..';
        $this->liblat->to_json(array(
            'status' => $status,
            'pesan'  => $pesan,
        ));
    }

    public function editSimpan()
    {
        $update = $this->_validator('edit');
        $q      = $this->mod_sb->mengubah('user', array(
            'md5(id)'=>$this->input->get_post('id'),
        ),$update);
        $status = $q['status'];
        $pesan  = ucwords($status) . ' mengubah user..';
        $this->liblat->to_json(array(
            'status' => $status,
            'pesan'  => $pesan,
        ));
    }
}

/* End of file Crud.php */
/* Location: ./application/controllers/Crud.php */
