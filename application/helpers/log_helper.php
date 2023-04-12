<?php

function activity_log($database, $aksi, $keterangan)
{
  $ci = &get_instance();
  $ci->load->model('log_model');
  $ci->load->library('ion_auth');

  $user = $ci->ion_auth->user()->row();

  $data['logPengguna'] = $user->pengNama;
  $data['logTlp'] = $user->pengTlp;
  $data['logDatabase'] = $database;
  $data['logAksi'] = $aksi;
  $data['logKeterangan'] = $keterangan;

  $ci->log_model->create($data);
}
