<!-- Begin Page Content -->
<div class="container-fluid">

  <?php foreach ($user as $u) : ?>

    <form action="<?= base_url() ?>user/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">


      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
          <a href="<?= base_url() ?>user" class="btn btn-md btn-circle btn-dark">
            <i class="fas fa-arrow-left"></i>
          </a>
          &nbsp;
          <h1 class="h2 mb-0 text-gray-800">Ubah Pengguna</h1>
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
                <!-- ID User-->
                <div class="form-group"><label>ID User</label>
                  <input class="form-control" name="iduser" type="text" value="<?= $u->id_user ?>" readonly>
                </div>

                <!-- Nama Lengkap -->
                <div class="form-group"><label>Nama Lengkap</label>
                  <input class="form-control" name="namaL" type="text" value="<?= $u->nama ?>">
                </div>

                <!-- Username -->
                <div class="form-group"><label>Username</label>
                  <input class="form-control" name="user" type="text" value="<?= $u->username ?>">
                </div>

                <!-- Email -->
                <div class="form-group"><label>Email</label>
                  <input class="form-control" name="email" type="email" value="<?= $u->email ?>">
                </div>

                <!-- Level -->
                <div class="form-group"><label>Level</label>
                  <select name="level" class="form-control">
                    <option value="admin" <?php if ($u->level == "admin") : ?> Selected <?php endif; ?>>Admin</option>
                    <option value="pegawai" <?php if ($u->level == "pegawai") : ?> Selected <?php endif; ?>>Pegawai</option>
                  </select>
                </div>

                <!-- Status -->
                <div class="form-group"><label>Status</label>
                  <select name="status" class="form-control">
                    <option value="Aktif" <?php if ($u->status == "Aktif") : ?> Selected <?php endif; ?>>Aktif</option>
                    <option value="Tidak Aktif" <?php if ($u->status == "Tidak Aktif") : ?> Selected <?php endif; ?>>Tidak Aktif</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-success btn-md btn-icon-split">
                  <span class="text text-white">Simpan Perubahan</span>
                  <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                  </span>
                </button>


              <br>
            </div>
          </div>

        </div>
      </div>


    </form>

</div>
<!-- /.container-fluid -->

<?php endforeach; ?>

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