<!-- Begin Page Content -->
<div class="container-fluid">
  <form action="<?= base_url('teknisi/proses_tambah') ?>" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div class="d-sm-flex">
        <a href="<?= base_url('teknisi') ?>" class="btn btn-md btn-circle btn-dark">
          <i class="fas fa-arrow-left"></i>
        </a>
        &nbsp;
        <h1 class="h2 mb-0 text-gray-800"><?= $title ?></h1>
      </div>
    </div>

    <div class="d-sm-flex  justify-content-between mb-0">
      <div class="col-lg-8 mb-4">
        <!-- Illustrations -->
        <div class="card border-bottom-dark shadow mb-4">
          <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">Form Teknisi</h6>
          </div>
          <div class="card-body">
            <div class="col-lg-12">
              <!-- Nama Barang -->
              <div class="form-group"><label for="nama_teknisi">Nama Teknisi</label>
                <input class="form-control" id="nama_teknisi" name="nama_teknisi" type="text" placeholder="Masukkan nama..." autocomplete="off">
              </div>

              <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                <div class="form-group"><label for="id_user">Nama User</label>
                  <select name="id_user" id="id_user" class="form-control chosen">
                    <option value="" selected disabled>Pilih User</option>
                    <?php foreach ($user as $data) : ?>
                      <?php if ($data->id_teknisi != null) continue; ?>
                      <option value="<?= $data->id_user ?>"><?= $data->nama ?></option>
                      <?php endforeach ?>;
                  </select>
                </div>
              <?php elseif ($this->session->userdata('login_session')['level'] == 'pegawai') : ?>
                <input type="hidden" name="id_user" value="<?= $this->session->userdata('login_session')['id_user'] ?>">
              <?php endif; ?>

              <div class="form-group"><label for="nomor_hp">Nomor HP</label>
                <input class="form-control" id="nomor_hp" name="nomor_hp" type="tel" placeholder="Masukkan nomor hp..." autocomplete="off">
              </div>
            </div>
            <br>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <!-- Illustrations -->
        <div class="card border-bottom-dark shadow mb-4">
          <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">Pas Foto</h6>
          </div>
          <div class="card-body">
            <div class="card bg-warning text-white shadow">
              <div class="card-body">
                Format
                <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
              </div>
            </div>
            <br>
            <center>
              <div id="img">
                <img src="<?= base_url('assets/upload/odp/box.png') ?>" id="outputImg" width="200" maxheight="300">
              </div>
            </center>
            <br>
            <!-- foto -->
            <div class="form-group">
              <div class="custom-file">
                <input class="custom-file-input" type="file" id="GetFile" name="pas_foto" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                <label class="custom-file-label" for="customFile">Pilih File</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-md btn-icon-split w-100">
              <span class="text text-white">Simpan Data</span>
              <span class="icon text-white-50">
                <i class="fas fa-save"></i>
              </span>
            </button>
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
<script src="<?= base_url(); ?>assets/js/barang.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formbarang.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<script>
  $('.chosen').chosen({
    width: '100%',

  });

  function get_date() {
    const date = new Date();
  }
</script>

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