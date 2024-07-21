<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="card border-bottom-secondary shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover" id="dtHorizontalExample" cellspacing="0">
          <thead>
            <tr>
              <th width="1%">No</th>
              <th>Foto ODP</th>
              <th>Kode ODP</th>
              <th>Lokasi</th>
              <th>Nama Pendata</th>
              <th>Tanggal Pendataan</th>
            </tr>
          </thead>
          <tbody">
            <?php $no = 1;
            foreach ($odp as $data) : ?>
              <tr>
                <td><?= $no++ ?>.</td>
                <!-- <td><img src="<?= base_url('assets/upload/odp/') . $data->foto_odp ?>" width="90px"></td>
                                <td><?= $data->kode_odp ?></td>
                                <td><?= $data->lokasi ?></td>
                                <td><?= $data->kondisi ?></td>
                                <td><?= $data->nama ?></td>
                                <td><?= date('d F Y', strtotime($data->tgl_pendataan)) ?></td> -->
                <?php if ($data->kode_odp == null || $data->lokasi == null || $data->foto_odp == null) : ?>
                  <td><img src="<?= base_url('assets/upload/odp/') . $data->foto_odp ?>" width="90px"></td>
                  <td class="font-italic text-danger">(belum didata)</td>
                  <td class="font-italic text-danger">(belum didata)</td>
                  <td><?= $data->nama ?></td>
                  <td class="font-italic text-danger">(belum didata)</td>
                <?php else : ?>
                  <td><img src="<?= base_url('assets/upload/odp/') . $data->foto_odp ?>" width="90px"></td>
                  <td><?= $data->kode_odp ?></td>
                  <td><?= $data->lokasi ?></td>
                  <td><?= $data->nama ?></td>
                  <td><?= date('d F Y', strtotime($data->tgl_pendataan)) ?></td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    window.print();
  </script>
</body>

</html>