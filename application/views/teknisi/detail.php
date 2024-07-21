<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-sm-flex">
      <a href="<?= base_url() ?>teknisi" class="btn btn-md btn-circle btn-dark">
        <i class="fas fa-arrow-left"></i>
      </a>
      &nbsp;
      <h1 class="h2 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
  </div>

  <?php foreach ($data as $d) : ?>

    <div class="d-sm-flex justify-content-between mb-0">
      <div class="col-lg-12 mb-4">
        <div class="card shadow border-bottom-dark mb-4">
          <div class="card-body d-sm-flex">
            <div class="col-lg-3">
              <img width="100%" style="border-radius: 10px;" src="<?= base_url() ?>assets/upload/teknisi/<?= $d->pas_foto ?>" alt="">
            </div>
            <br>
            <div class="col-lg-9">
              <!-- ID Barang -->
              <div class="form-group"><label>ID Teknisi</label>
                <h4 class="h4 text-gray-800"><b><?= $d->id_teknisi ?></b></h4>
              </div>
              <hr class="sidebar-divider">

              <div class="form-group"><label>Nama Teknisi</label>
                <h4 class="h4 text-gray-800"><?= $d->nama_teknisi ?></h4>
              </div>
              <hr class="sidebar-divider">

              <div class="form-group"><label>Nomor HP.</label>
                <h4 class="h4 text-gray-800"><?= $d->nomor_hp ?></h4>
              </div>
              <hr class="sidebar-divider">

              <div class="form-group"><label>User</label>
                <h4 class="h4 text-gray-800"><?= $d->nama ?></h4>
              </div>
              <hr class="sidebar-divider">

              <div class="form-group"><label>Email</label>
                <h4 class="h4 text-gray-800"><?= $d->email ?></h4>
              </div>
              <hr class="sidebar-divider">

              <div class="form-group"><label>Level</label>
                <h4 class="h4 text-gray-800"><?= $d->level ?></h4>
              </div>
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