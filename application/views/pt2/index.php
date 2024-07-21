<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar <?= $title ?></h1>
    <div>
      <?php if ($this->session->userdata('login_session')['level'] == 'admin' || ($this->session->userdata('login_session')['level'] == 'pegawai' && $teknisi_id)) : ?>
        <a href="<?= base_url('odp/tambah') ?>" class="btn btn-primary btn-icon-split">
          <span class="text text-white">Tambah Data</span>
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
        </a>
      <?php endif; ?>
      <!-- <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
        <a href="<?= base_url('laporan/cetak') ?>" class="btn btn-warning btn-icon-split">
          <span class="text text-white">Cetak Data</span>
          <span class="icon text-white-50">
            <i class="fas fa-folder"></i>
          </span>
        </a>
      <?php endif; ?> -->
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
                <th>Foto ODP</th>
                <th>Kode ODP</th>
                <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                  <th>Teknisi</th>
                <?php endif; ?>
                <th>Lokasi</th>
                <th>Tanggal Pemasangan</th>
                <th>Status</th>
                <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'pegawai') : ?>
                  <th width="1%">Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody style="cursor:pointer;" id="tbody">
              <?php $no = 1;
              foreach ($pt2 as $data) : ?>
                <tr>
                  <td onclick="detail('<?= $data->id_odp ?>')"><?= $no++ ?>.</td>
                  <td onclick="detail('<?= $data->id_odp ?>')"><img src="<?= base_url() ?>assets/upload/odp/<?= $data->foto_odp ?>" width="100px" alt=""></td>
                  <td onclick="detail('<?= $data->id_odp ?>')"><?= $data->kode_odp ?></td>
                  <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                    <td onclick="detail('<?= $data->id_odp ?>')"><?= $data->nama_teknisi ?></td>
                  <?php endif; ?>
                  <td onclick="detail('<?= $data->id_odp ?>')"><?= $data->lokasi ?></td>
                  <td onclick="detail('<?= $data->id_odp ?>')"><?= date('d F Y', strtotime($data->tgl_pendataan)) ?></td>
                  <td onclick="detail('<?= $data->id_odp ?>')"><?= $data->status ?></td>
                  <?php if ($this->session->userdata('login_session')['username'] == $data->nama_teknisi || $this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'pegawai') : ?>
                    <td>
                      <center>
                        <a href="<?= base_url() ?>odp/selesai/<?= $data->id_odp ?>" class="btn btn-success btn-sm">
                          <i class="fas fa-check mr-1"></i>
                          <span>Selesai</span>
                        </a>
                        <!-- <a href="<?= base_url() ?>odp/ubah/<?= $data->id_odp ?>" class="btn btn-circle btn-warning btn-sm">
                            <i class="fas fa-pen"></i>
                          </a>
                          <a href="javascript:void(0)" onclick="konfirmasi('<?= $data->id_odp ?>')" class="btn btn-circle btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </a> -->
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
<script src="<?= base_url(); ?>assets/js/barang.js"></script>
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