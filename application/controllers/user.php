<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
    $this->load->library('pagination');
    $this->load->helper('cookie');
    $this->load->model('user_model');
  }

  public function index()
  {
    $data['title'] = 'User';
    $data['user'] = $this->user_model->data()->result();

    $this->load->view('templates/header', $data);
    $this->load->view('user/index');
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'User';

    $this->load->view('templates/header', $data);
    $this->load->view('user/form_tambah');
    $this->load->view('templates/footer');
  }

  public function ubah($id)
  {
    $data['title'] = 'User';
    $where = array('id_user' => $id);
    $data['user'] = $this->user_model->detail_data($where, 'user')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('user/form_ubah');
    $this->load->view('templates/footer');
  }

  public function detail_data($id)
  {
    $data['title'] = 'User';

    $where = array('id_user' => $id);
    $data['data'] = $this->user_model->detail_data($where, 'user')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('user/detail');
    $this->load->view('templates/footer');
  }

  public function proses_hapus($id)
  {
    $where = array('id_user' => $id);
    $foto = $this->user_model->ambilFoto($where);
    if ($foto) {
      if ($foto == 'user.png') {
      } else {
        unlink('./assets/upload/pengguna/' . $foto . '');
      }

      $this->user_model->hapus_data($where, 'user');
    }


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
    redirect('user');
  }

  public function proses_tambah()
  {
    $kode = $this->user_model->buat_kode();
    $namaL = $this->input->post('namaL');
    $user = $this->input->post('user');
    $email = $this->input->post('email');
    $level = $this->input->post('level');
    $pass = $this->input->post('pwd');
    $status = "Aktif";

    $data = array(
      'id_user' => $kode,
      'nama' => $namaL,
      'username' => $user,
      'email' => $email,
      'level' => $level,
      'password' => md5($pass),
      'status' => $status,
    );

    $this->user_model->tambah_data($data, 'user');
    $this->session->set_flashdata('Pesan', '
			<script>
			$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
			});
			</script>
			');
    redirect('user');
  }

  public function proses_ubah()
  {
    $kode = $this->input->post('iduser');
    $namaL = $this->input->post('namaL');
    $user = $this->input->post('user');
    $email = $this->input->post('email');
    $level = $this->input->post('level');
    $status = $this->input->post('status');
    $pass = $this->input->post('pwd');
    $passLama = $this->input->post('pwdLama');

    if ($pass == '') {
      $passUpdate = $passLama;
    } else {
      $passUpdate = md5($pass);
    }

    $data = array(
      'nama' => $namaL,
      'username' => $user,
      'email' => $email,
      'level' => $level,
      'password' => $passUpdate,
      'status' => $status,
    );

    $where = array('id_user' => $kode);

    $this->user_model->ubah_data($where, $data, 'user');
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
    redirect('user');
  }
}
