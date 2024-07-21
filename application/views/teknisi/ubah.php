<?php foreach ($data as $d) : ?>
  <div class="container-fluid">
    <form action="<?= base_url() ?>teknisi/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
          <a href="<?= base_url() ?>teknisi" class="btn btn-md btn-circle btn-dark">
            <i class="fas fa-arrow-left"></i>
          </a>
          &nbsp;
          <h1 class="h2 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
        <button type="submit" class="btn btn-success btn-md btn-icon-split">
          <span class="text text-white">Simpan Perubahan</span>
          <span class="icon text-white-50">
            <i class="fas fa-save"></i>
          </span>
        </button>

      </div>


      <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-8 mb-4">
          <!-- Illustrations -->
          <div class="card border-bottom-dark shadow mb-4">
            <div class="card-header py-3 bg-dark">
              <h6 class="m-0 font-weight-bold text-white">Form Barang</h6>
            </div>
            <div class="card-body">
              <div class="col-lg-12">

                <!-- ID ODP -->
                <div class="form-group"><label>ID Teknisi</label>
                  <input class="form-control" name="id_teknisi" type="text" value="<?= $d->id_teknisi ?>" readonly>
                </div>

                <div class="form-group"><label>Nama Teknisi</label>
                  <input class="form-control" name="nama_teknisi" type="text" value="<?= $d->nama_teknisi ?>">
                </div>

                <?php if ($d->nama_teknisi == null || $d->nomor_hp == null  || $d->pas_foto == null) : ?>
                  <div class="form-group"><label>User</label>
                    <select name="id_user" class="form-control chosen">
                      <option value="<?= $d->id_user ?>"><?= $d->nama ?></option>
                      <?php foreach ($user as $data) : ?>
                        <?php if ($d->id_user == $data->id_user) continue; ?>
                        <option value="<?= $data->id_user ?>"><?= $data->nama ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <?php else : ?>
                  <div class="form-group"><label>User</label>
                    <select name="id_user" class="form-control chosen">
                      <option value="<?= $d->id_user ?>"><?= $d->nama ?></option>
                      <?php foreach ($user as $data) : ?>
                        <?php if ($d->id_user == $data->id_user) continue; ?>
                        <option value="<?= $data->id_user ?>"><?= $data->nama ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <?php endif; ?>

                <div class="form-group"><label>Nomor HP</label>
                  <input class="form-control" name="nomor_hp" type="text" value="<?= $d->nomor_hp ?>">
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
                  <img src="<?= base_url() ?>assets/upload/teknisi/<?= $d->pas_foto ?>" id="outputImg" width="200" maxheight="300">
                </div>
              </center>
              <br>
              <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
              <!-- foto -->
              <div class="form-group">
                <div class="custom-file">
                  <input type="hidden" name="fotoLama" value="<?= $d->pas_foto ?>">
                  <input class="custom-file-input" type="file" id="GetFile" name="photo" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                  <label class="custom-file-label" for="customFile">Pilih File</label>
                </div>
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
  <script src="<?= base_url(); ?>assets/js/barang.js"></script>
  <script src="<?= base_url(); ?>assets/js/loading.js"></script>
  <script src="<?= base_url(); ?>assets/js/validasi/formbarang.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

  <script>
    $('.chosen').chosen({
      width: '100%',

    });
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

<?php endforeach; ?>