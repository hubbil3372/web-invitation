<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dasbor extends CI_Controller
{
  /**----------------------------------------------------
   * Tampilan Dasbor
  -------------------------------------------------------**/
  public function index()
  {
    /**----------------------------------------------------
     * Cek apakah pengguna dapat akses menu
    -------------------------------------------------------**/
    $menu = $this->menus->get_menu_id("backoffice/{$this->uri->segment(2)}");
    if (!$this->akses->access_menu($menu)) redirect('404_override', 'refresh');
    
    $data= [
      'title' => 'Dasbor'
    ];

    $this->template->load('template/dasbor', 'backoffice/admin/dasbor/index', $data);
  }
}
