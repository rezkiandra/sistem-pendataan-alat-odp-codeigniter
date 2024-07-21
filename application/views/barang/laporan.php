<?php
function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<!DOCTYPE html>
<html>

<head>
  <title><?= $judul ?></title>
</head>
<style>
  #customers {
    border-collapse: collapse;
    width: 100%;
  }

  #customers td {
    border: 0px solid #ddd;
    padding: 8px;
    font-size: 12px;
  }

  #customers th {
    padding: 8px;
    font-size: 12px;
  }


  #customers tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #customers tr:hover {
    background-color: #ddd;
  }

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #858796;
    color: white;
  }
</style>

<body>
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
      <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'pegawai') : ?>
        <a href="<?= base_url('laporan/cetak') ?>" class="btn btn-warning btn-icon-split">
          <span class="text text-white">Cetak Data</span>
          <span class="icon text-white-50">
            <i class="fas fa-folder"></i>
          </span>
        </a>
      <?php endif; ?>
    </div>
    <div class="card border-bottom-secondary shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table cellspacing="0" class="table" id="cetak">
            <tr>
              <th>No</th>
              <th>Foto ODP</th>
              <th>Kode ODP</th>
              <th>Lokasi</th>
              <th>Nama Pegawai Pendata</th>
              <th>Tanggal Pendataan</th>
            </tr>
            <?php $no = 1;
            foreach ($data as $d) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><img src="assets/upload/odp/<?= $d->foto_odp ?>" width="120px"></td>
                <td><?= $d->kode_odp ?></td>
                <td><?= $d->lokasi ?></td>
                <td><?= $d->nama ?></td>
                <td><?= tgl_indo($d->tgl_pendataan) ?></td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>


</html>