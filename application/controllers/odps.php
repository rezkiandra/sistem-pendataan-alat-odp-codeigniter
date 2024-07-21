<?php

class Odps extends CI_Controller
{
  var $m_odp;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_odp');
    $this->load->model('m_teknisi');
  }

  public function index()
  {
    $data['title'] = 'ODPS';

    if ($this->session->userdata('login_session')['level'] == 'pegawai') {
      $id_user = $this->session->userdata('login_session')['id_user'];
      $id_teknisi = $this->m_teknisi->get_id_teknisi_by_user($id_user);
      $data['id_teknisi'] = $id_teknisi;

      if ($id_teknisi != null) {
        $odps = $this->m_odp->get_odps_by_id_teknisi($id_teknisi);
        $data['odps'] = $odps;
      } else {
        $data['odps'] = [];
      }
    } elseif ($this->session->userdata('login_session')['level'] == 'admin') {
      $data['odps'] = $this->m_odp->get_odps()->result();
    }

    $this->load->view('templates/header', $data);
    $this->load->view('odps/index');
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $data['title'] = 'Detail ODPS';
    $data['data'] = $this->m_odp->get_odp_by_id($id)->result();

    $this->load->view('templates/header', $data);
    $this->load->view('odps/detail');
    $this->load->view('templates/footer');
  }
}
