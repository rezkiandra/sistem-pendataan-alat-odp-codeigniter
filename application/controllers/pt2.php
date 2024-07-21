<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pt2 extends CI_Controller
{
  var $barang_model;
  var $jenis_model;
  var $satuan_model;
  var $input;
  var $upload;
  var $session;
  var $m_odp;
  var $m_pegawai;
  var $form_validation;

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
    $this->load->helper('date');
    $this->load->helper('cookie');
    $this->load->model('m_odp');
    $this->load->model('m_teknisi');
  }

  public function index()
  {
    $data['title'] = 'PT2';

    if ($this->session->userdata('login_session')['level'] == 'pegawai') {
      $id_user = $this->session->userdata('login_session')['id_user'];
      $id_teknisi = $this->m_teknisi->get_id_teknisi_by_user($id_user);
      $data['id_teknisi'] = $id_teknisi;

      $data['teknisi_id'] = $this->m_odp->get_teknisi_id($id_user);

      if ($id_teknisi != null) {
        $pt2 = $this->m_odp->get_pt2_by_id_teknisi($id_teknisi);
        $data['pt2'] = $pt2;
      } else {
        $data['pt2'] = [];
      }
    } elseif ($this->session->userdata('login_session')['level'] == 'admin') {
      $data['pt2'] = $this->m_odp->get_pt2()->result();
    }

    $this->load->view('templates/header', $data);
    $this->load->view('pt2/index');
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'PT2';
    $data['teknisi'] = $this->m_teknisi->get_teknisi()->result();

    if ($this->session->userdata('login_session')['level'] == 'pegawai') {
      $id_user = $this->session->userdata('login_session')['id_user'];
      $id_teknisi = $this->m_teknisi->get_id_teknisi_by_user($id_user);
      $data['id_teknisi'] = $id_teknisi;
    }

    $this->load->view('templates/header', $data);
    $this->load->view('pt2/form_tambah');
    $this->load->view('templates/footer');
  }

  public function ubah($id)
  {
    $data['title'] = 'Ubah ODP';

    //menampilkan data berdasarkan id
    $where = array('id_odp' => $id);
    $data['data'] = $this->m_odp->detail_data($where, 'odp')->result();
    $data['data'] = $this->m_odp->get_odp_by_id($id)->result();
    $data['teknisi'] = $this->m_teknisi->get_teknisi()->result();

    $this->load->view('templates/header', $data);
    $this->load->view('pt2/form_ubah');
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $data['title'] = 'Barang';

    //menampilkan data berdasarkan id
    $data['data'] = $this->m_odp->detail_join($id, 'odp')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('pt2/detail');
    $this->load->view('templates/footer');
  }

  public function proses_tambah()
  {
    $config['upload_path']   = './assets/upload/odp/';
    $config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';

    $namaFile = $_FILES['foto_odp']['name'];
    $error = $_FILES['foto_odp']['error'];

    $this->load->library('upload', $config);

    $kode_odp     = $this->input->post('kode_odp');
    $lokasi     =   $this->input->post('lokasi');
    $id_teknisi     =   $this->input->post('id_teknisi');
    $tgl_pendataan   =   $this->input->post('tgl_pendataan');
    $status   =   'Sedang Dikerjakan';

    if ($namaFile == '') {
      $ganti = 'box.png';
    } else {
      if (!$this->upload->do_upload('foto_odp')) {
        $error = $this->upload->display_errors();
        redirect('odp/tambah');
      } else {
        $data = array('foto_odp' => $this->upload->data());
        $nama_file = $data['foto_odp']['file_name'];
        $ganti = str_replace(" ", "_", $nama_file);
      }
    }

    $data = array(
      'kode_odp'     => $kode_odp,
      'lokasi'     => $lokasi,
      'id_teknisi'     => $id_teknisi,
      'tgl_pendataan'  => $tgl_pendataan,
      'status'  => $status,
      'foto_odp'     => $ganti
    );

    $this->m_odp->tambah_data($data, 'odp');
    $this->session->set_flashdata('Pesan', '
			<script>
			$(document).ready(function() {
				swal.fire({
					title: "Berhasil ditambahkan!",
					icon: "success",
					confirmButtonColor: "#4e73df",
					});
				});
			</script>
			');
    redirect('odp');
  }

  public function proses_ubah()
  {
    $config['upload_path']   = './assets/upload/odp/';
    $config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';

    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];

    $this->load->library('upload', $config);

    $id_odp     = $this->input->post('id_odp');
    $kode_odp     = $this->input->post('kode_odp');
    $lokasi     = $this->input->post('lokasi');
    $id_teknisi     = $this->input->post('id_teknisi');
    $tgl_pendataan   = $this->input->post('tgl_pendataan');
    $status   = $this->input->post('status');

    $flama = $this->input->post('fotoLama');

    if ($namaFile == '') {
      $ganti = $flama;
    } else {
      if (!$this->upload->do_upload('photo')) {
        $error = $this->upload->display_errors();
        redirect('odp/ubah/' . $id_odp);
      } else {
        $data = array('photo' => $this->upload->data());
        $nama_file = $data['photo']['file_name'];
        $ganti = str_replace(" ", "_", $nama_file);
        if ($flama == 'box.png') {
        } else {
          unlink('./assets/upload/odp/' . $flama . '');
        }
      }
    }

    $data = array(
      'kode_odp'     => $kode_odp,
      'lokasi'     => $lokasi,
      'id_teknisi'     => $id_teknisi,
      'foto_odp'     => $ganti,
      'tgl_pendataan' => $tgl_pendataan,
      'status' => $status
    );

    $where = array(
      'id_odp' => $id_odp
    );

    $this->m_odp->ubah_data($where, $data, 'odp');
    $this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    redirect('odp');
  }

  public function delete($id)
  {
    $where = array('id_odp' => $id);
    $this->m_odp->hapus_data($where, 'odp');

    $this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    redirect('odp');
  }

  public function selesai($id)
  {
    $data = array(
      'id_odp' => $id,
      'status' => 'Selesai'
    );

    $where = array('id_odp' => $id);

    $this->m_odp->tambah_data($data, 'odps');
    $this->m_odp->ubah_data($where, $data, 'odp');
    // $this->m_odp->hapus_data($where, 'odp');
    $this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    redirect('odp');
  }

  public function getData()
  {
    $id = $this->input->post('id');
    $where = array('id_barang' => $id);
    $data = $this->barang_model->detail_data($where, 'barang')->result();
    echo json_encode($data);
  }

  public function laporan()
  {
    $data['title'] = 'Laporan ODP';

    $this->load->view('templates/header', $data);
    $this->load->view('pt2/laporan');
    $this->load->view('templates/footer');
  }
}
