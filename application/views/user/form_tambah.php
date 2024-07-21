<!-- Begin Page Content -->
<div class="container-fluid">

  <form action="<?= base_url() ?>user/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div class="d-sm-flex">
        <a href="<?= base_url() ?>user" class="btn btn-md btn-circle btn-dark">
          <i class="fas fa-arrow-left"></i>
        </a>
        &nbsp;
        <h1 class="h2 mb-0 text-gray-800">Tambah Pengguna</h1>
      </div>

    </div>

    <div class="d-sm-flex  justify-content-between mb-0">
      <div class="col-lg-8 mb-4">
        <!-- form -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Pengguna</h6>
          </div>
          <div class="card-body">
            <div class="col-lg-12">
              <!-- Nama Lengkap -->
              <div class="form-group"><label for="namaL">Nama Lengkap</label>
                <input class="form-control" id="namaL" name="namaL" type="text" placeholder="Masukkan nama lengkap">
              </div>
              <!-- Username -->
              <div class="form-group"><label for="user">Username</label>
                <input class="form-control" id="user" name="user" type="text" placeholder="Masukkan username">
              </div>

              <!-- Email -->
              <div class="form-group"><label for="email">Email</label>
                <input class="form-control" id="email" name="email" type="email" placeholder="Masukkan email">
              </div>

              <!-- Level -->
              <div class="form-group"><label for="level">Level</label>
                <select name="level" class="form-control" id="level">
                  <option value="">Pilih Level</option>
                  <option value="admin">Admin</option>
                  <option value="pegawai">Pegawai</option>
                </select>
              </div>

              <!-- Password -->
              <div class="form-group"><label for="pwd">Password</label>
                <input class="form-control" id="pwd" name="pwd" type="password" placeholder="Masukkan password">
              </div>

              <!-- Konfirmasi Password -->
              <div class="form-group"><label for="kpwd">Konfirmasi Password</label>
                <input class="form-control" id="kpwd" name="kpwd" type="password" placeholder="Masukkan konfirmasi password">
              </div>

              <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                  <i class="fas fa-save"></i>
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>


  </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formuser.js"></script>

<?php if ($this->session->flashdata('Pesan')) : ?>

<?php else : ?>
  <script>
    $(document).ready(function() {

      let timerInterval
      Swal.fire({
        title: 'Memuat...',
        timer: 1000,
        onBeforeOpen: () => {
          Swal.showLoading()
        },
        onClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {

      })
    });
  </script>
<?php endif; ?>