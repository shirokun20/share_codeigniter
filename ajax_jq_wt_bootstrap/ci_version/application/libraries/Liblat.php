<?php 
/**
 * Dibuat oleh shirokun
 */
class Liblat
{
	
	protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function page($content, $data = null)
    {
        return $this->ci->load->view($content, $data);
    }

    public function to_json($data)
    {
    	echo json_encode($data);
    }

    public function jk($value)
    {
    	switch ($value) {
    		case '1':
    			return "Laki-laki";
    			break;
    		case '2':
    			return "Perempuan";
    			break;
    		
    		default:
    			return "Lainnya";
    			break;
    	}
    }

    public function TanggalIndo($date)
    {
        if ($date == null) {
            $date = date('Y-m-d');
        }
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);

        $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
        return ($result);
    }

    public function validatorInputNull($apawe = null, $pesan = null)
    {
        $value = $this->ci->input->get_post($apawe, true);
        if ($value == null) {
            return array(
                'status'=>'gagal',
                'pesan' => $pesan,
                $apawe => $value,
            );
        }else{
            return array(
                'status'=>'berhasil',
                $apawe => $value,
            );
        }
    }
}