<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Undangan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    /**----------------------------------------------------
     * Cek apakah sudah login
    -------------------------------------------------------**/
    if (!$this->ion_auth->logged_in()) redirect(site_url('auth/login'), 'refresh');

    $this->load->model('Undangan_model', 'undangan');
  }

  /**----------------------------------------------------
   * Daftar undangan
  -------------------------------------------------------**/
  public function index()
  {
    /**----------------------------------------------------
     * Cek apakah pengguna dapat akses menu
    -------------------------------------------------------**/
    $menu = $this->menus->get_menu_id("backoffice/{$this->uri->segment(2)}");
    if (!$this->akses->access_menu($menu)) redirect('404_override', 'refresh');

    $data = [
      'title' => 'Undangan',
      /**----------------------------------------------------
       * Ambil id menu untuk cek akses Create
      -------------------------------------------------------**/
      'menu_id' => $menu,
    ];

    $this->template->load('template/dasbor', 'backoffice/admin/undangan/index', $data);
  }

  /**----------------------------------------------------
   * Datatable
  -------------------------------------------------------**/
  public function get_json()
  {
    $list = $this->undangan->get_datatables();
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
      if ($this->akses->access_rights($menu_id, 'grupMenuUbah')) $button .= "<a class='btn btn-sm btn-primary me-1 waitme' href='" . site_url("backoffice/undangan/{$field->undanganId}/ubah") . "'><i class='fas fa-edit'></i></a>";
      if ($this->akses->access_rights($menu_id, 'grupMenuHapus')) $button .= "<a class='btn btn-sm btn-danger destroy' href='" . site_url("backoffice/undangan/{$field->undanganId}/hapus") . "'><i class='fas fa-trash destroy' href='" . site_url("backoffice/undangan/{$field->undanganId}/hapus") . "'></i></a>";

      /**----------------------------------------------------
       * Contoh penambahan aksi
      -------------------------------------------------------**/
      if ($this->akses->access_rights_aksi('backoffice/undangan/example')) $button .= "<a class='btn btn-sm btn-warning ms-1' href='" . site_url("backoffice/undangan/example/{$field->undanganId}") . "'>Example</a>";
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
      $row[] = $field->undanganNama;
      $row[] = $field->undanganAlamat;
      $row[] = $field->undanganJenis  ==  '1' ? 'Privasi' : 'Tidak Privasi';
      $row[] = $field->undanganStatus ==  '1' ? 'Aktif' : 'Tidak Aktif';

      $row[] = "<div class='text-center'>{$button}</div>";

      $data[] = $row;
    }

    $output = array(
      "draw" => @$_POST['draw'],
      "recordsTotal" => $this->undangan->count_all(),
      "recordsFiltered" => $this->undangan->count_filtered(),
      "data" => $data,
    );

    echo json_encode($output);
  }

  /**----------------------------------------------------
   * Tambah undangan
  -------------------------------------------------------**/
  public function create()
  {
    /**----------------------------------------------------
     * Cek apakah pengguna dapat akses menu
    -------------------------------------------------------**/
    $menu = $this->menus->get_menu_id("backoffice/{$this->uri->segment(2)}");
    if (!$this->akses->access_rights($menu, 'grupMenuTambah')) redirect('404_override', 'refresh');

    /**----------------------------------------------------
     * Konfigurasi Form Validation
    -------------------------------------------------------**/
    $config_form = [
      [
        'field' => 'undanganNama',
        'label' => 'undangan',
        'rules' => 'required'
      ],
      [
        'field' => 'undanganAlamat',
        'label' => 'Alamat',
        'rules' => 'required'
      ],
      [
        'field' => 'undanganJenis',
        'label' => 'Jenis Undangan',
        'rules' => 'required'
      ],
      [
        'field' => 'undanganStatus',
        'label' => 'Status',
        'rules' => 'required'
      ],
      [
        'field' => 'undanganNoHp',
        'label' => 'No Telepon',
        'rules' => 'required|numeric'
      ],
    ];
    $this->form_validation->set_rules($config_form);
    $this->form_validation->set_message('required', '{field} Tidak Boleh kosong!');

    /**----------------------------------------------------
     * Cek apakah inputan sudah sesuai
    -------------------------------------------------------**/
    if ($this->form_validation->run() == false) {
      $data = [
        'title' => 'Tambah undangan'
      ];

      $this->template->load('template/dasbor', 'backoffice/admin/undangan/create', $data);
    } else {
      $post = $this->input->post(null, true);
      $post['undanganId'] = $this->uuid->v4();

      $this->undangan->create($post);
      if ($this->db->affected_rows() == 1) {
        activity_log('undangan', 'tambah', json_encode($post));

        $this->session->set_flashdata('success', 'Berhasil tambah undangan!');
        return redirect(site_url('backoffice/undangan'));
      }

      activity_log('undangan', 'gagal tambah', json_encode($post));
      $this->session->set_flashdata('error', 'Gagal tambah undangan!');
      return redirect(site_url('backoffice/undangan'));
    }
  }

  /**----------------------------------------------------
   * Ubah undangan
  -------------------------------------------------------**/
  public function update($id)
  {
    /**----------------------------------------------------
     * Cek apakah pengguna dapat akses menu
    -------------------------------------------------------**/
    $menu = $this->menus->get_menu_id("backoffice/{$this->uri->segment(2)}");
    if (!$this->akses->access_rights($menu, 'grupMenuUbah')) redirect('404_override', 'refresh');

    /**----------------------------------------------------
     * Konfigurasi Form Validation
    -------------------------------------------------------**/
    $config_form = [
      [
        'field' => 'undanganNama',
        'label' => 'undangan',
        'rules' => 'required'
      ],
      [
        'field' => 'undanganAlamat',
        'label' => 'Alamat',
        'rules' => 'required'
      ],
      [
        'field' => 'undanganJenis',
        'label' => 'Jenis Undangan',
        'rules' => 'required'
      ],
      [
        'field' => 'undanganStatus',
        'label' => 'Status',
        'rules' => 'required'
      ],
      [
        'field' => 'undanganNoHp',
        'label' => 'No Telepon',
        'rules' => 'required|numeric'
      ],
    ];
    $this->form_validation->set_rules($config_form);
    $this->form_validation->set_message('required', '{field} Tidak Boleh kosong!');

    /**----------------------------------------------------
     * Cek apakah data yang di edit ada dalam database
    -------------------------------------------------------**/
    $undangan = $this->undangan->get(['undanganId' => $id]);
    if ($undangan->num_rows() < 1) {
      $this->session->set_flashdata('warning', 'Data Tidak Ditemukan!');
      return redirect(site_url('backoffice/undangan'));
    }

    /**----------------------------------------------------
     * Cek apakah inputan sudah sesuai
    -------------------------------------------------------**/
    if ($this->form_validation->run() == FALSE) {
      $data = [
        'title' => 'Ubah undangan',
        'group' => $undangan->row()
      ];

      $this->template->load('template/dasbor', 'backoffice/admin/undangan/update', $data);
    } else {
      $put = $this->input->post(null, TRUE);

      $this->undangan->update($put, ['undanganId' => $undangan->row()->undanganId]);
      if ($this->db->affected_rows() > 0) {
        activity_log('undangan', 'ubah', json_encode($undangan->row()) . ' menjadi ' . json_encode($put));

        $this->session->set_flashdata('success', 'Berhasil ubah undangan');
        return redirect(site_url('backoffice/undangan'));
      }

      activity_log('undangan', 'gagal ubah', json_encode($undangan->row()) . ' menjadi ' . json_encode($put));
      $this->session->set_flashdata('error', 'Gagal ubah undangan');
      return redirect(site_url('backoffice/undangan'));
    }
  }

  /**----------------------------------------------------
   * Hapus undangan
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
    $undangan = $this->undangan->get(['undanganId' => $id]);
    if ($undangan->num_rows() < 1) {
      $this->session->set_flashdata('warning', 'Data Tidak Ditemukan!');
      return redirect(site_url('backoffice/undangan'));
    }

    $this->undangan->destroy(['undanganId' => $undangan->row()->undanganId]);
    if ($this->db->affected_rows() > 0) {
      activity_log('undangan', 'hapus', json_encode($undangan->row()));

      $this->session->set_flashdata('success', 'Berhasil hapus undangan!');
      return redirect(site_url('backoffice/undangan'));
    }

    activity_log('undangan', 'gagal hapus', json_encode($undangan->row()));
    $this->session->set_flashdata('error', 'Gagal hapus undangan!');
    return redirect(site_url('backoffice/undangan'));
  }

  /**----------------------------------------------------
   * Contoh penambahan aksi
  -------------------------------------------------------**/
  public function example($id)
  {
    echo $id;
  }
  /**----------------------------------------------------
   * Contoh penambahan aksi
  -------------------------------------------------------**/
}
