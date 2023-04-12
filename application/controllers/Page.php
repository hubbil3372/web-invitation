<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Page extends CI_Controller
{
  /**----------------------------------------------------
   * 404
  -------------------------------------------------------**/
  public function not_found_404()
  {
    $this->load->view('not_found_404');
  }


  public function index($id = null)
  {
    $namaUndangan = "You Invited";
    if ($this->input->get('to')) $namaUndangan = trim($this->input->get('to'));
    $data = [
      'title' => 'Ugi & Hendra - Wedding Invitation',
      'ucapan' => $this->db->order_by('ucapanTanggal', 'DESC')->get('ucapan')->result(),
      'private' => $id == 'true' ? 'gallery/photo4.jpg' : 'bg-wedding.jpg',
      'event' => $id == 'true' ? 'gallery/photo6.jpg' : 'bg-wedding.jpg',
      'undangan' => $namaUndangan,
    ];
    $this->load->view('invite-design/ugi-hendra/index', $data);
  }
}
