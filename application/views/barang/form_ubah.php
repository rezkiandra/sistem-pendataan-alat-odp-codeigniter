<?php foreach ($data as $d) : ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <form action="<?= base_url() ?>odp/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
          <a href="<?= base_url() ?>odp" class="btn btn-md btn-circle btn-dark">
            <i class="fas fa-arrow-left"></i>
          </a>
          &nbsp;
          <h1 class="h2 mb-0 text-gray-800">Ubah Barang</h1>
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
                <div class="form-group"><label>ID ODP</label>
                  <input class="form-control" name="id_odp" type="text" value="<?= $d->id_odp ?>" readonly>
                </div>

                <!-- Kode ODP -->
                <div class="form-group"><label>Kode ODP</label>
                  <input class="form-control" name="kode_odp" type="text" value="<?= $d->kode_odp ?>" placeholder="Masukkan kode odp...">
                </div>

                <!-- Lokasi ODP -->
                <div class="form-group"><label>Lokasi</label>
                  <textarea name="lokasi" id="lokasi" cols="30" rows="4" class="form-control" placeholder="Masukkan lokasi..."><?= $d->lokasi ?></textarea>
                </div>

                <!-- Nama Pegawai -->
                <div class="form-group"><label>Nama Teknisi</label>
                  <select name="id_teknisi" class="form-control chosen">
                    <option value="<?= $d->id_teknisi ?>"><?= $d->nama_teknisi ?></option>
                    <?php foreach ($teknisi as $data) : ?>
                      <?php if ($d->id_teknisi == $data->id_teknisi) continue; ?>
                      <option value="<?= $data->id_teknisi ?>"><?= $data->nama_teknisi ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>


                <!-- Kode ODP -->
                <div class="form-group"><label>Tanggal Pendataan</label>
                  <input class="form-control" name="tgl_pendataan" type="date" value="<?= $d->tgl_pendataan ?>">
                </div>

                <!-- Kode ODP -->
                <!-- <div class="form-group"><label for="status">Status</label>
                  <select name="status" id="status" class="form-control chosen">
                    <option value="<?= $d->status ?>"><?= $d->status ?></option>
                    <?php if ($d->status == 'Sedang Dikerjakan') : ?>
                      <option value="Selesai">Selesai</option>
                    <?php else : ?>
                      <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                    <?php endif; ?>
                  </select>
                </div> -->
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
                  <img src="<?= base_url() ?>assets/upload/odp/<?= $d->foto_odp ?>" id="outputImg" width="200" maxheight="300">
                </div>
              </center>
              <br>
              <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
              <!-- foto -->
              <div class="form-group">
                <div class="custom-file">
                  <input type="hidden" name="fotoLama" value="<?= $d->foto_odp ?>">
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