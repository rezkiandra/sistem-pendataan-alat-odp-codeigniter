<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-sm-flex">
      <a href="<?= base_url() ?>odps" class="btn btn-md btn-circle btn-dark">
        <i class="fas fa-arrow-left"></i>
      </a>
      &nbsp;
      <h1 class="h2 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
  </div>

  <?php foreach ($data as $d) : ?>

    <div class="d-sm-flex  justify-content-between mb-0">
      <div class="col-lg-12 mb-4">
        <!-- Barang -->
        <div class="card shadow border-bottom-dark mb-4">
          <div class="card-body d-sm-flex">
            <div class="col-lg-3">
              <img width="100%" style="border-radius: 10px;" src="<?= base_url() ?>assets/upload/odp/<?= $d->foto_odp ?>" alt="">
            </div>

            <br>

            <div class="col-lg-9">
              <!-- ID Barang -->
              <div class="form-group"><label>ID ODP</label>
                <h4 class="h4 text-gray-800"><b><?= $d->id_odp ?></b></h4>
              </div>

              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Nama Barang -->
              <div class="form-group"><label>Kode ODP</label>
                <h4 class="h4 text-gray-800"><?= $d->kode_odp ?></h4>
                <?php if ($d->kode_odp == null) : ?>
                  <h4 class="h4 font-italic text-danger">(belum didata)</h4>
                <?php endif; ?>
              </div>

              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Nama Barang -->
              <div class="form-group"><label>Lokasi</label>
                <h4 class="h4 text-gray-800"><?= $d->lokasi ?></h4>
                <?php if ($d->lokasi == null) : ?>
                  <h4 class="h4 font-italic text-danger">(belum didata)</h4>
                <?php endif; ?>
              </div>

              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Nama Barang -->
              <div class="form-group"><label>Nama Teknisi</label>
                <h4 class="h4 text-gray-800"><?= $d->nama_teknisi ?></h4>
              </div>

              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Nama Barang -->
              <div class="form-group"><label>Status</label>
                <h4 class="h4 text-gray-800"><?= $d->status ?></h4>
              </div>

              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Nama Barang -->
              <div class="form-group"><label>Tanggal Pendataan</label>
                <?php if ($d->tgl_pendataan == 0000 - 00 - 00) : ?>
                  <h4 class="h4 font-italic text-danger">(belum didata)</h4>
                <?php else : ?>
                  <h4 class="h4 text-gray-800"><?= date('d F Y', strtotime($d->tgl_pendataan)) ?></h4>
                <?php endif; ?>
              </div>

              <!-- Divider -->
              <hr class="sidebar-divider">
            </div>

          </div>
        </div>

      </div>

    <?php endforeach; ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<?php if ($this->session->flashdata('Pesan')) : ?>

<?php else : ?>
  <script>
    $(document).ready(function() {

      $('#pdf').hide();

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