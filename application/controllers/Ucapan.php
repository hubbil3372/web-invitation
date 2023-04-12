<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Ucapan extends CI_Controller
{
  /**----------------------------------------------------
   * 404
  -------------------------------------------------------**/

  public function get()
  {
    $ucapan = $this->db->order_by('ucapanTanggal', 'DESC')->get('ucapan')->result();
    $this->load->view("invite-design/ucapan/data", ['ucapan' => $ucapan]);
  }


  public function create()
  {
    if ($this->input->server("REQUEST_METHOD") != "POST") {
      $response = [
        'status' => 'false',
        'message' => 'Gagal Kirim Ucapan!',
      ];
      echo json_encode($response);
      return;
    }

    $config_form = [
      [
        'field' => 'ucapanNama',
        'label' => 'nama',
        'rules' => 'required'
      ],
      [
        'field' => 'ucapanTeks',
        'label' => 'Ucapan',
        'rules' => 'required'
      ],
    ];
    $this->form_validation->set_rules($config_form);
    $this->form_validation->set_message('required', '{field} Tidak Boleh kosong!');

    /**----------------------------------------------------
     * Cek apakah inputan sudah sesuai
    -------------------------------------------------------**/
    if ($this->form_validation->run() == false) {
      $response = [
        'status' => 'false',
        'message' => 'Gagal Kirim Ucapan!',
      ];
      echo json_encode($response);
      return;
    } else {
      $post = $this->input->post(null, true);
      $post['ucapanId'] = $this->uuid->v4();
      $post['ucapanBase64'] = base64_encode($post['ucapanTeks']);
      $this->db->insert('ucapan', $post);
      if ($this->db->affected_rows() > 0) {
        $response = [
          'status' => 'true',
          'message' => 'Berhasil Kirim Ucapan!',
        ];
        echo json_encode($response);
        return;
      }

      $response = [
        'status' => 'true',
        'message' => 'Berhasil Kirim Ucapan!',
      ];
      echo json_encode($response);
      return;
    }
  }

  public function cobaBase64()
  {
    $data = base64_decode("8J+luvCfpbrwn6W68J+ksvCfpLLwn6Sy8J+ksvCfpLI=");
    return var_dump($data);
  }

  public static function isBase64Encoded($str)
  {
    try {
      $decoded = base64_decode($str, true);
      if (base64_encode($decoded) === $str) {
        return true;
      } else {
        return false;
      }
    } catch (Exception $e) {
      // If exception is caught, then it is not a base64 encoded string
      return false;
    }
  }
}
