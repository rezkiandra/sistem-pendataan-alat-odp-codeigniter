<!-- Begin Page Content -->
<div class="container-fluid">
  <form action="<?= base_url('odp/proses_tambah') ?>" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div class="d-sm-flex">
        <a href="<?= base_url() ?>odp" class="btn btn-md btn-circle btn-dark">
          <i class="fas fa-arrow-left"></i>
        </a>
        &nbsp;
        <h1 class="h2 mb-0 text-gray-800">Tambah <?= $title ?></h1>
      </div>
    </div>

    <div class="d-sm-flex  justify-content-between mb-0">
      <div class="col-lg-8 mb-4">
        <!-- Illustrations -->
        <div class="card border-bottom-dark shadow mb-4">
          <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">Form <?= $title ?></h6>
          </div>
          <div class="card-body">
            <div class="col-lg-12">
              <!-- Nama Barang -->
              <div class="form-group"><label for="kode_odp">Kode ODP</label>
                <input class="form-control" id="kode_odp" name="kode_odp" type="text" placeholder="Masukkan kode odp..." autocomplete="off">
              </div>

              <!-- Stok -->
              <div class="form-group"><label for="lokasi">Lokasi</label>
                <textarea name="lokasi" class="form-control" id="lokasi" cols="30" rows="8" placeholder="Masukkan lokasi..."></textarea>
              </div>

              <!-- Nama Barang -->
              <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                <div class="form-group"><label for="id_teknisi">Nama Teknisi</label>
                  <select name="id_teknisi" id="id_teknisi" class="form-control chosen">
                    <option value="" selected disabled>Pilih Teknisi</option>
                    <?php foreach ($teknisi as $data) : ?>
                      <option value="<?= $data->id_teknisi ?>"><?= $data->nama ?></option>
                      <?php endforeach ?>;
                  </select>
                </div>
              <?php elseif ($this->session->userdata('login_session')['level'] == 'pegawai') : ?>
                <input type="hidden" name="id_teknisi" value="<?= $id_teknisi ?>">
              <?php endif; ?>


              <!-- Nama Barang -->
              <div class="form-group"><label for="tgl_pendataan">Tanggal Pendataan</label>
                <input class="form-control" id="tgl_pendataan" name="tgl_pendataan" type="date">
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
            <h6 class="m-0 font-weight-bold text-white">Foto</h6>
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
                <input class="custom-file-input" type="file" id="GetFile" name="foto_odp" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
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