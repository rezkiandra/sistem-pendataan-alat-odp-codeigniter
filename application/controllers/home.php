<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  var $m_odp;
  var $user_model;
  var $input;
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
    $this->load->helper('cookie');
    $this->load->model('m_odp');
    $this->load->model('m_teknisi');
    $this->load->model('user_model');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';

    if ($this->session->userdata('login_session')['level'] == 'pegawai') {
      $id_user = $this->session->userdata('login_session')['id_user'];
      $id_teknisi = $this->m_teknisi->get_id_teknisi_by_user($id_user);
      $data['id_teknisi'] = $id_teknisi;

      if ($id_teknisi != null) {
        $data['jmlpt2'] = $this->m_odp->get_odp_count_by_id_teknisi($id_teknisi);
        $data['jmlodps'] = $this->m_odp->get_odps_count_by_id_teknisi($id_teknisi);
      } else {
        $data['jmlpt2'] = 0;
        $data['jmlodps'] = 0;
      }
    } elseif ($this->session->userdata('login_session')['level'] == 'admin') {
      $id_user = $this->session->userdata('login_session')['id_user'];
      $id_teknisi = $this->m_teknisi->get_id_teknisi_by_user($id_user);
      $data['id_teknisi'] = $id_teknisi;

      $data['odp'] = $this->m_odp->get_data()->result();
      $data['odp'] = $this->m_odp->data_join()->result();

      $data['jmlpt2'] = $this->m_odp->get_odp_count();
      $data['jmlodps'] = $this->m_odp->get_odps_count();
      $data['jmluser'] = $this->user_model->data()->num_rows();
    }

    $data['yearnow'] = date('Y', strtotime('+0 year'));
    $data['previousyear'] = date('Y', strtotime('-1 year'));
    $data['twoyearago'] = date('Y', strtotime('-2 year'));

    $this->load->view('templates/header', $data);
    $this->load->view('home/index');
    $this->load->view('templates/footer');
  }

  public function getFilterTahun()
  {
    $tahun = $this->input->post('tahun');

    //Januari
    $januari = 'January';
    $last_januari = date('Y-m-t', strtotime($tahun . '-' . $januari . '-01'));
    $first_januari = date('Y-m-01', strtotime($tahun . '-' . $januari . '-01'));
    $jumlahPT2Januari = $this->m_odp->jmlperbulanPT2($first_januari, $last_januari)->num_rows();
    $jumlahODPSJanuari = $this->m_odp->jmlperbulanODPS($first_januari, $last_januari)->num_rows();

    //Februari
    $februari = 'February';
    $last_februari = date('Y-m-t', strtotime($tahun . '-' . $februari . '-01'));
    $first_februari = date('Y-m-01', strtotime($tahun . '-' . $februari . '-01'));
    $jumlahPT2Februari = $this->m_odp->jmlperbulanPT2($first_februari, $last_februari)->num_rows();
    $jumlahODPSFebruari = $this->m_odp->jmlperbulanODPS($first_februari, $last_februari)->num_rows();

    //Maret
    $maret = 'March';
    $last_maret = date('Y-m-t', strtotime($tahun . '-' . $maret . '-01'));
    $first_maret = date('Y-m-01', strtotime($tahun . '-' . $maret . '-01'));
    $jumlahPT2Maret = $this->m_odp->jmlperbulanPT2($first_maret, $last_maret)->num_rows();
    $jumlahODPSMaret = $this->m_odp->jmlperbulanODPS($first_maret, $last_maret)->num_rows();

    //april
    $april = 'April';
    $last_april = date('Y-m-t', strtotime($tahun . '-' . $april . '-01'));
    $first_april = date('Y-m-01', strtotime($tahun . '-' . $april . '-01'));
    $jumlahPT2April = $this->m_odp->jmlperbulanPT2($first_april, $last_april)->num_rows();
    $jumlahODPSApril = $this->m_odp->jmlperbulanODPS($first_april, $last_april)->num_rows();

    //mei
    $mei = 'May';
    $last_mei = date('Y-m-t', strtotime($tahun . '-' . $mei . '-01'));
    $first_mei = date('Y-m-01', strtotime($tahun . '-' . $mei . '-01'));
    $jumlahPT2Mei = $this->m_odp->jmlperbulanPT2($first_mei, $last_mei)->num_rows();
    $jumlahODPSMei = $this->m_odp->jmlperbulanODPS($first_mei, $last_mei)->num_rows();

    //juni
    $juni = 'June';
    $last_juni = date('Y-m-t', strtotime($tahun . '-' . $juni . '-01'));
    $first_juni = date('Y-m-01', strtotime($tahun . '-' . $juni . '-01'));
    $jumlahPT2Juni = $this->m_odp->jmlperbulanPT2($first_juni, $last_juni)->num_rows();
    $jumlahODPSJuni = $this->m_odp->jmlperbulanODPS($first_juni, $last_juni)->num_rows();

    //juli
    $juli = 'July';
    $last_juli = date('Y-m-t', strtotime($tahun . '-' . $juli . '-01'));
    $first_juli = date('Y-m-01', strtotime($tahun . '-' . $juli . '-01'));
    $jumlahPT2Juli = $this->m_odp->jmlperbulanPT2($first_juli, $last_juli)->num_rows();
    $jumlahODPSJuli = $this->m_odp->jmlperbulanODPS($first_juli, $last_juli)->num_rows();

    //agustus
    $agustus = 'August';
    $last_agustus = date('Y-m-t', strtotime($tahun . '-' . $agustus . '-01'));
    $first_agustus = date('Y-m-01', strtotime($tahun . '-' . $agustus . '-01'));
    $jumlahPT2Agustus = $this->m_odp->jmlperbulanPT2($first_agustus, $last_agustus)->num_rows();
    $jumlahODPSAgustus = $this->m_odp->jmlperbulanODPS($first_agustus, $last_agustus)->num_rows();

    //september
    $september = 'September';
    $last_september = date('Y-m-t', strtotime($tahun . '-' . $september . '-01'));
    $first_september = date('Y-m-01', strtotime($tahun . '-' . $september . '-01'));
    $jumlahPT2September = $this->m_odp->jmlperbulanPT2($first_september, $last_september)->num_rows();
    $jumlahODPSSeptember = $this->m_odp->jmlperbulanODPS($first_september, $last_september)->num_rows();

    //oktober
    $oktober = 'October';
    $last_oktober = date('Y-m-t', strtotime($tahun . '-' . $oktober . '-01'));
    $first_oktober = date('Y-m-01', strtotime($tahun . '-' . $oktober . '-01'));
    $jumlahPT2Oktober = $this->m_odp->jmlperbulanPT2($first_oktober, $last_oktober)->num_rows();
    $jumlahODPSOktober = $this->m_odp->jmlperbulanODPS($first_oktober, $last_oktober)->num_rows();

    //november
    $november = 'November';
    $last_november = date('Y-m-t', strtotime($tahun . '-' . $november . '-01'));
    $first_november = date('Y-m-01', strtotime($tahun . '-' . $november . '-01'));
    $jumlahPT2November = $this->m_odp->jmlperbulanPT2($first_november, $last_november)->num_rows();
    $jumlahODPSNovember = $this->m_odp->jmlperbulanODPS($first_november, $last_november)->num_rows();

    //desember
    $desember = 'December';
    $last_desember = date('Y-m-t', strtotime($tahun . '-' . $desember . '-01'));
    $first_desember = date('Y-m-01', strtotime($tahun . '-' . $desember . '-01'));
    $jumlahPT2Desember = $this->m_odp->jmlperbulanPT2($first_desember, $last_desember)->num_rows();
    $jumlahODPSDesember = $this->m_odp->jmlperbulanODPS($first_desember, $last_desember)->num_rows();


    $data = array(
      'jumlahPT2Januari' => $jumlahPT2Januari,
      'jumlahPT2Februari' => $jumlahPT2Februari,
      'jumlahPT2Maret' => $jumlahPT2Maret,
      'jumlahPT2April' => $jumlahPT2April,
      'jumlahPT2Mei' => $jumlahPT2Mei,
      'jumlahPT2Juni' => $jumlahPT2Juni,
      'jumlahPT2Juli' => $jumlahPT2Juli,
      'jumlahPT2Agustus' => $jumlahPT2Agustus,
      'jumlahPT2September' => $jumlahPT2September,
      'jumlahPT2Oktober' => $jumlahPT2Oktober,
      'jumlahPT2November' => $jumlahPT2November,
      'jumlahPT2Desember' => $jumlahPT2Desember,
      'jumlahODPSJanuari' => $jumlahODPSJanuari,
      'jumlahODPSFebruari' => $jumlahODPSFebruari,
      'jumlahODPSMaret' => $jumlahODPSMaret,
      'jumlahODPSApril' => $jumlahODPSApril,
      'jumlahODPSMei' => $jumlahODPSMei,
      'jumlahODPSJuni' => $jumlahODPSJuni,
      'jumlahODPSJuli' => $jumlahODPSJuli,
      'jumlahODPSAgustus' => $jumlahODPSAgustus,
      'jumlahODPSSeptember' => $jumlahODPSSeptember,
      'jumlahODPSOktober' => $jumlahODPSOktober,
      'jumlahODPSNovember' => $jumlahODPSNovember,
      'jumlahODPSDesember' => $jumlahODPSDesember
    );
    echo json_encode($data);
  }

  public function getFilterTahunTeknisi()
  {
    $tahun = $this->input->post('tahun');

    $id_user = $this->session->userdata('login_session')['id_user'];
    $id_teknisi = $this->m_teknisi->get_id_teknisi_by_user($id_user);
    $data['id_teknisi'] = $id_teknisi;

    //Januari
    $januari = 'January';
    $last_januari = date('Y-m-t', strtotime($tahun . '-' . $januari . '-01'));
    $first_januari = date('Y-m-01', strtotime($tahun . '-' . $januari . '-01'));
    $jumlahPT2Januari = $this->m_odp->jmlperbulanPT2Pegawai($first_januari, $last_januari, $id_teknisi)->num_rows();
    $jumlahODPSJanuari = $this->m_odp->jmlperbulanODPSPegawai($first_januari, $last_januari, $id_teknisi)->num_rows();

    //Februari
    $februari = 'February';
    $last_februari = date('Y-m-t', strtotime($tahun . '-' . $februari . '-01'));
    $first_februari = date('Y-m-01', strtotime($tahun . '-' . $februari . '-01'));
    $jumlahPT2Februari = $this->m_odp->jmlperbulanPT2Pegawai($first_februari, $last_februari, $id_teknisi)->num_rows();
    $jumlahODPSFebruari = $this->m_odp->jmlperbulanODPSPegawai($first_februari, $last_februari, $id_teknisi)->num_rows();

    //Maret
    $maret = 'March';
    $last_maret = date('Y-m-t', strtotime($tahun . '-' . $maret . '-01'));
    $first_maret = date('Y-m-01', strtotime($tahun . '-' . $maret . '-01'));
    $jumlahPT2Maret = $this->m_odp->jmlperbulanPT2Pegawai($first_maret, $last_maret, $id_teknisi)->num_rows();
    $jumlahODPSMaret = $this->m_odp->jmlperbulanODPSPegawai($first_maret, $last_maret, $id_teknisi)->num_rows();

    //april
    $april = 'April';
    $last_april = date('Y-m-t', strtotime($tahun . '-' . $april . '-01'));
    $first_april = date('Y-m-01', strtotime($tahun . '-' . $april . '-01'));
    $jumlahPT2April = $this->m_odp->jmlperbulanPT2Pegawai($first_april, $last_april, $id_teknisi)->num_rows();
    $jumlahODPSApril = $this->m_odp->jmlperbulanODPSPegawai($first_april, $last_april, $id_teknisi)->num_rows();

    //mei
    $mei = 'May';
    $last_mei = date('Y-m-t', strtotime($tahun . '-' . $mei . '-01'));
    $first_mei = date('Y-m-01', strtotime($tahun . '-' . $mei . '-01'));
    $jumlahPT2Mei = $this->m_odp->jmlperbulanPT2Pegawai($first_mei, $last_mei, $id_teknisi)->num_rows();
    $jumlahODPSMei = $this->m_odp->jmlperbulanODPSPegawai($first_mei, $last_mei, $id_teknisi)->num_rows();

    //juni
    $juni = 'June';
    $last_juni = date('Y-m-t', strtotime($tahun . '-' . $juni . '-01'));
    $first_juni = date('Y-m-01', strtotime($tahun . '-' . $juni . '-01'));
    $jumlahPT2Juni = $this->m_odp->jmlperbulanPT2Pegawai($first_juni, $last_juni, $id_teknisi)->num_rows();
    $jumlahODPSJuni = $this->m_odp->jmlperbulanODPSPegawai($first_juni, $last_juni, $id_teknisi)->num_rows();

    //juli
    $juli = 'July';
    $last_juli = date('Y-m-t', strtotime($tahun . '-' . $juli . '-01'));
    $first_juli = date('Y-m-01', strtotime($tahun . '-' . $juli . '-01'));
    $jumlahPT2Juli = $this->m_odp->jmlperbulanPT2Pegawai($first_juli, $last_juli, $id_teknisi)->num_rows();
    $jumlahODPSJuli = $this->m_odp->jmlperbulanODPSPegawai($first_juli, $last_juli, $id_teknisi)->num_rows();

    //agustus
    $agustus = 'August';
    $last_agustus = date('Y-m-t', strtotime($tahun . '-' . $agustus . '-01'));
    $first_agustus = date('Y-m-01', strtotime($tahun . '-' . $agustus . '-01'));
    $jumlahPT2Agustus = $this->m_odp->jmlperbulanPT2Pegawai($first_agustus, $last_agustus, $id_teknisi)->num_rows();
    $jumlahODPSAgustus = $this->m_odp->jmlperbulanODPSPegawai($first_agustus, $last_agustus, $id_teknisi)->num_rows();

    //september
    $september = 'September';
    $last_september = date('Y-m-t', strtotime($tahun . '-' . $september . '-01'));
    $first_september = date('Y-m-01', strtotime($tahun . '-' . $september . '-01'));
    $jumlahPT2September = $this->m_odp->jmlperbulanPT2Pegawai($first_september, $last_september, $id_teknisi)->num_rows();
    $jumlahODPSSeptember = $this->m_odp->jmlperbulanODPSPegawai($first_september, $last_september, $id_teknisi)->num_rows();

    //oktober
    $oktober = 'October';
    $last_oktober = date('Y-m-t', strtotime($tahun . '-' . $oktober . '-01'));
    $first_oktober = date('Y-m-01', strtotime($tahun . '-' . $oktober . '-01'));
    $jumlahPT2Oktober = $this->m_odp->jmlperbulanPT2Pegawai($first_oktober, $last_oktober, $id_teknisi)->num_rows();
    $jumlahODPSOktober = $this->m_odp->jmlperbulanODPSPegawai($first_oktober, $last_oktober, $id_teknisi)->num_rows();

    //november
    $november = 'November';
    $last_november = date('Y-m-t', strtotime($tahun . '-' . $november . '-01'));
    $first_november = date('Y-m-01', strtotime($tahun . '-' . $november . '-01'));
    $jumlahPT2November = $this->m_odp->jmlperbulanPT2Pegawai($first_november, $last_november, $id_teknisi)->num_rows();
    $jumlahODPSNovember = $this->m_odp->jmlperbulanODPSPegawai($first_november, $last_november, $id_teknisi)->num_rows();

    //desember
    $desember = 'December';
    $last_desember = date('Y-m-t', strtotime($tahun . '-' . $desember . '-01'));
    $first_desember = date('Y-m-01', strtotime($tahun . '-' . $desember . '-01'));
    $jumlahPT2Desember = $this->m_odp->jmlperbulanPT2Pegawai($first_desember, $last_desember, $id_teknisi)->num_rows();
    $jumlahODPSDesember = $this->m_odp->jmlperbulanODPSPegawai($first_desember, $last_desember, $id_teknisi)->num_rows();


    $data = array(
      'jumlahPT2Januari' => $jumlahPT2Januari,
      'jumlahPT2Februari' => $jumlahPT2Februari,
      'jumlahPT2Maret' => $jumlahPT2Maret,
      'jumlahPT2April' => $jumlahPT2April,
      'jumlahPT2Mei' => $jumlahPT2Mei,
      'jumlahPT2Juni' => $jumlahPT2Juni,
      'jumlahPT2Juli' => $jumlahPT2Juli,
      'jumlahPT2Agustus' => $jumlahPT2Agustus,
      'jumlahPT2September' => $jumlahPT2September,
      'jumlahPT2Oktober' => $jumlahPT2Oktober,
      'jumlahPT2November' => $jumlahPT2November,
      'jumlahPT2Desember' => $jumlahPT2Desember,
      'jumlahODPSJanuari' => $jumlahODPSJanuari,
      'jumlahODPSFebruari' => $jumlahODPSFebruari,
      'jumlahODPSMaret' => $jumlahODPSMaret,
      'jumlahODPSApril' => $jumlahODPSApril,
      'jumlahODPSMei' => $jumlahODPSMei,
      'jumlahODPSJuni' => $jumlahODPSJuni,
      'jumlahODPSJuli' => $jumlahODPSJuli,
      'jumlahODPSAgustus' => $jumlahODPSAgustus,
      'jumlahODPSSeptember' => $jumlahODPSSeptember,
      'jumlahODPSOktober' => $jumlahODPSOktober,
      'jumlahODPSNovember' => $jumlahODPSNovember,
      'jumlahODPSDesember' => $jumlahODPSDesember
    );
    echo json_encode($data);
  }
}
