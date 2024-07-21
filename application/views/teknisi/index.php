<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Teknisi</h1>
    <div>
      <!-- <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
        <a href="<?= base_url('laporan/cetak') ?>" class="btn btn-warning btn-icon-split">
          <span class="text text-white">Cetak Data</span>
          <span class="icon text-white-50">
            <i class="fas fa-folder"></i>
          </span>
        </a>
      <?php endif; ?> -->
      <a href="<?= base_url('teknisi/tambah') ?>" class="btn btn-primary btn-icon-split">
        <span class="text text-white">Tambah Data</span>
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
      </a>
    </div>

  </div>

  <div class="col-lg-12 mb-4" id="container">

    <!-- Illustrations -->
    <div class="card border-bottom-dark shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover" id="dtHorizontalExample" cellspacing="0">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>Pas Foto</th>
                <th>Nama Teknisi</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'pegawai') : ?>
                  <th width="1%">Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody style="cursor:pointer;" id="tbody">
              <?php $no = 1;
              foreach ($teknisi as $data) : ?>
                <tr>
                  <td onclick="detail('<?= $data->id_teknisi ?>')"><?= $no++ ?>.</td>
                  <td onclick="detail('<?= $data->id_teknisi ?>')"><img src="assets/upload/teknisi/<?= $data->pas_foto ?>" alt="" width="70px"></td>
                  <td onclick="detail('<?= $data->id_teknisi ?>')"><?= $data->nama_teknisi ?></td>
                  <td onclick="detail('<?= $data->id_teknisi ?>')"><?= $data->email ?></td>
                  <td onclick="detail('<?= $data->id_teknisi ?>')"><?= $data->nomor_hp ?></td>
                  <?php if ($this->session->userdata('login_session')['username'] == $data->nama_teknisi || $this->session->userdata('login_session')['level'] == 'admin') : ?>
                    <td>
                      <center>
                        <a href="<?= base_url() ?>teknisi/ubah/<?= $data->id_teknisi ?>" class="btn btn-circle btn-success btn-sm">
                          <i class="fas fa-pen"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="konfirmasi('<?= $data->id_teknisi ?>')" class="btn btn-circle btn-danger btn-sm">
                          <i class="fas fa-trash"></i>
                        </a>
                      </center>
                    </td>
                  <?php else : ?>
                    <td></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/teknisi.js"></script>
<?php if ($this->session->flashdata('Pesan')) : ?>
  <?= $this->session->flashdata('Pesan') ?>
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