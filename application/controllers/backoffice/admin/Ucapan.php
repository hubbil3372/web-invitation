<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Ucapan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    /**----------------------------------------------------
     * Cek apakah sudah login
    -------------------------------------------------------**/
    if (!$this->ion_auth->logged_in()) redirect(site_url('auth/login'), 'refresh');

    $this->load->model('Ucapan_model', 'ucapan');
  }

  /**----------------------------------------------------
   * Daftar ucapan
  -------------------------------------------------------**/
  public function index()
  {
    /**----------------------------------------------------
     * Cek apakah pengguna dapat akses menu
    -------------------------------------------------------**/
    $menu = $this->menus->get_menu_id("backoffice/{$this->uri->segment(2)}");
    if (!$this->akses->access_menu($menu)) redirect('404_override', 'refresh');

    $data = [
      'title' => 'Ucapan',
      /**----------------------------------------------------
       * Ambil id menu untuk cek akses Create
      -------------------------------------------------------**/
      'menu_id' => $menu,
    ];

    $this->template->load('template/dasbor', 'backoffice/admin/ucapan/index', $data);
  }

  /**----------------------------------------------------
   * Datatable
  -------------------------------------------------------**/
  public function get_json()
  {
    $list = $this->ucapan->get_datatables();
    /**----------------------------------------------------
     * Ambil id menu untuk cek akses Update dan Destroy
    -------------------------------------------------------**/
    $menu_id = $this->menus->get_menu_id("backoffice/{$this->input->get('tautan')}");

    $data = array();
    $no = @$_POST['start'];
    foreach ($list as $field) {
      /**----------------------------------------------------
       * Cek apakah role yang sedang login dapat melakukan Update dan Destroy
      -------------------------------------------------------**/
      $button = '';
      if ($this->akses->access_rights($menu_id, 'grupMenuUbah')) $button .= "<a class='btn btn-sm btn-primary me-1 waitme' href='" . site_url("backoffice/ucapan/{$field->ucapanId}/ubah") . "'><i class='fas fa-edit'></i></a>";
      if ($this->akses->access_rights($menu_id, 'grupMenuHapus')) $button .= "<a class='btn btn-sm btn-danger destroy' href='" . site_url("backoffice/ucapan/{$field->ucapanId}/hapus") . "'><i class='fas fa-trash destroy' href='" . site_url("backoffice/ucapan/{$field->ucapanId}/hapus") . "'></i></a>";

      /**----------------------------------------------------
       * Contoh penambahan aksi
      -------------------------------------------------------**/
      if ($this->akses->access_rights_aksi('backoffice/ucapan/example')) $button .= "<a class='btn btn-sm btn-warning ms-1' href='" . site_url("backoffice/ucapan/example/{$field->ucapanId}") . "'>Example</a>";
      /**----------------------------------------------------
       * Contoh penambahan aksi
      -------------------------------------------------------**/

      if ($button == '') $button = '-';

      /**----------------------------------------------------
       * Cek apakah data tersebut merupakan Admin
      -------------------------------------------------------**/

      $no++;
      $row = array();
      $row[] = "<div class='text-center'>{$no}</div>";
      $row[] = $field->ucapanNama;
      $row[] = $field->ucapanBase64 != null ? base64_decode($field->ucapanBase64) : $field->ucapanTeks;
      $row[] = $field->ucapanKehadiran  ==  '1' ? 'Hadir' : 'Tidak Hadir';
      $row[] = Date("d/m/Y H:i", strtotime($field->ucapanTanggal));

      $row[] = "<div class='text-center'>{$button}</div>";

      $data[] = $row;
    }

    $output = array(
      "draw" => @$_POST['draw'],
      "recordsTotal" => $this->ucapan->count_all(),
      "recordsFiltered" => $this->ucapan->count_filtered(),
      "data" => $data,
    );

    echo json_encode($output);
  }


  /**----------------------------------------------------
   * Hapus ucapan
  -------------------------------------------------------**/
  public function destroy($id)
  {
    /**----------------------------------------------------
     * Cek apakah pengguna dapat akses menu
    -------------------------------------------------------**/
    $menu = $this->menus->get_menu_id("backoffice/{$this->uri->segment(2)}");
    if (!$this->akses->access_rights($menu, 'grupMenuHapus')) redirect('404_override', 'refresh');

    /**----------------------------------------------------
     * Cek apakah data yang di hapus ada dalam database
    -------------------------------------------------------**/
    $ucapan = $this->ucapan->get(['ucapanId' => $id]);
    if ($ucapan->num_rows() < 1) {
      $this->session->set_flashdata('warning', 'Data Tidak Ditemukan!');
      return redirect(site_url('backoffice/ucapan'));
    }

    $this->ucapan->destroy(['ucapanId' => $ucapan->row()->ucapanId]);
    if ($this->db->affected_rows() > 0) {
      activity_log('ucapan', 'hapus', json_encode($ucapan->row()));

      $this->session->set_flashdata('success', 'Berhasil hapus ucapan!');
      return redirect(site_url('backoffice/ucapan'));
    }

    activity_log('ucapan', 'gagal hapus', json_encode($ucapan->row()));
    $this->session->set_flashdata('error', 'Gagal hapus ucapan!');
    return redirect(site_url('backoffice/ucapan'));
  }
}
