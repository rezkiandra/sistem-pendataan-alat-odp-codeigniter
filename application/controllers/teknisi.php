<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi extends CI_Controller
{
  var $m_teknisi, $input, $session, $upload;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_teknisi');
  }

  public function index()
  {
    $data['title'] = 'Teknisi';
    $data['teknisi'] = $this->m_teknisi->get_data_join()->result();

    $this->load->view('templates/header', $data);
    $this->load->view('teknisi/index');
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'Tambah Teknisi';
    $data['user'] = $this->m_teknisi->get_user()->result();

    $this->load->view('templates/header', $data);
    $this->load->view('teknisi/tambah');
    $this->load->view('templates/footer');
  }

  public function ubah($id)
  {
    $data['title'] = 'Ubah Teknisi';

    $where = array('id_teknisi' => $id);
    $data['data'] = $this->m_teknisi->detail_data($where, 'teknisi')->result();
    $data['data'] = $this->m_teknisi->get_data_by_id($id)->result();
    $data['user'] = $this->m_teknisi->get_user()->result();

    $this->load->view('templates/header', $data);
    $this->load->view('teknisi/ubah');
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $data['title'] = 'Detail Teknisi';

    $data['data'] = $this->m_teknisi->detail_join($id, 'odp')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('teknisi/detail');
    $this->load->view('templates/footer');
  }

  public function proses_tambah()
  {
    $config['upload_path']   = './assets/upload/teknisi/';
    $config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';

    $namaFile = $_FILES['pas_foto']['name'];
    $error = $_FILES['pas_foto']['error'];

    $this->load->library('upload', $config);

    $nama_teknisi     =   $this->input->post('nama_teknisi');
    $id_user     = $this->input->post('id_user');
    $nomor_hp   =   $this->input->post('nomor_hp');

    if ($namaFile == '') {
      $ganti = 'box.png';
    } else {
      if (!$this->upload->do_upload('pas_foto')) {
        $error = $this->upload->display_errors();
        redirect('teknisi/tambah');
      } else {
        $data = array('pas_foto' => $this->upload->data());
        $nama_file = $data['pas_foto']['file_name'];
        $ganti = str_replace(" ", "_", $nama_file);
      }
    }

    $data = array(
      'nama_teknisi'     => $nama_teknisi,
      'id_user'     => $id_user,
      'nomor_hp'     => $nomor_hp,
      'pas_foto'     => $ganti
    );

    $this->m_teknisi->insert($data, 'teknisi');
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
    redirect('teknisi');
  }

  public function proses_ubah()
  {
    $config['upload_path']   = './assets/upload/teknisi/';
    $config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';

    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];

    $this->load->library('upload', $config);

    $id_teknisi     = $this->input->post('id_teknisi');
    $id_user     = $this->input->post('id_user');
    $nama_teknisi     = $this->input->post('nama_teknisi');
    $nomor_hp     = $this->input->post('nomor_hp');

    $flama = $this->input->post('fotoLama');

    if ($namaFile == '') {
      $ganti = $flama;
    } else {
      if (!$this->upload->do_upload('photo')) {
        $error = $this->upload->display_errors();
        redirect('teknisi/ubah/' . $id_teknisi);
      } else {
        $data = array('photo' => $this->upload->data());
        $nama_file = $data['photo']['file_name'];
        $ganti = str_replace(" ", "_", $nama_file);
        if ($flama == 'box.png') {
        } else {
          unlink('./assets/upload/teknisi/' . $flama . '');
        }
      }
    }

    $data = array(
      'id_user'     => $id_user,
      'nama_teknisi'     => $nama_teknisi,
      'nomor_hp'     => $nomor_hp,
      'pas_foto'     => $ganti,
    );

    $where = array('id_teknisi' => $id_teknisi);

    $this->m_teknisi->ubah_data($where, $data, 'teknisi');
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
    redirect('teknisi');
  }

  public function delete($id)
  {
    $where = array('id_teknisi' => $id);
    $this->m_teknisi->hapus_data($where, 'teknisi');

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
    redirect('teknisi');
  }
}
