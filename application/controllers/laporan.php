<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  var $input;
  var $m_odp;
  var $m_pegawai;

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
    $this->load->library('pagination');
    $this->load->helper('cookie');
    $this->load->model('m_odp');
    $this->load->model('m_pegawai');
  }
  public function index()
  {
    $tglawal = $this->input->post('tglawal');
    $tglakhir = $this->input->post('tglakhir');

    if ($tglawal != '' && $tglakhir != '') {
      $data['data'] = $this->m_odp->lapdata($tglawal, $tglakhir)->result();
    } else {
      $data['data'] = $this->m_odp->dataJoin()->result();
    }

    $data['tglawal'] = $tglawal;
    $data['tglakhir'] = $tglakhir;

    $data['title'] = 'Laporan ODP';

    $this->load->view('templates/header', $data);
    $this->load->view('barang/laporan');
    $this->load->view('templates/footer');
  }

  public function cetak()
  {
    $data['title']    = 'Laporan ODP';
    $data['odp']      = $this->m_odp->get_data()->result();
    $data['odp']  = $this->m_odp->data_join()->result();

    $this->load->view('templates/header2', $data);
    $this->load->view('barang/cetak', $data);
  }
}
