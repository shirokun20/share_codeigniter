<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DgnAjax extends CI_Controller
{

    private function harusDibaca()
    {
        $baca = 'Harus dibaca dulu';
        $baca .= 'Modelnya di load di autoload.php';
        $baca .= 'liblat adalah libarary yang anam buat sendiri diload di autoload.php';
        $baca .= 'autoload.php ada di folder config/autoload.php';
        // wajib
        $baca .= 'Jangan lupa token dan device id nya harus ada...';
    }

    private $url = 'https://smsgateway.me/api/v4/';


   	private $token = 'Isi Token Kamu Heheh';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'judul'   => 'Contoh Api SMS Gateway Me Dengan Ajax ',
            'content' => 'api/vIndex',
        );
        $this->liblat->page('vPages', $data);
    }

    public function mengirimPesan()
    {
        $data = array(
            array(
                'phone_number' => $this->input->get_post('phone_number'),
                'device_id'    => $this->input->get_post('device_id'),
                'message'      => $this->input->get_post('message'),
            ),
        );
        $this->_mengirim(json_encode($data));
    }

    public function _mengirim($data)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => $this->url."message/send",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => $data,
            CURLOPT_HTTPHEADER     => array(
                "Cache-Control: no-cache",
                "Postman-Token: 0dfb5acc-f0ae-415b-a5d3-ca12a2dfdfd3",
                "authorization: ". $this->token,
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}

/* End of file DgnAjax.php */
/* Location: ./application/controllers/api/DgnAjax.php */
