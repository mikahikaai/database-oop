<?php
$root = dirname(__DIR__);
require 'Armada.php';

// echo $_SERVER['DOCUMENT_ROOT'];
// echo '<br>';
// echo __DIR__;

$database = new Database();
$db = $database->getConnection();

$armada = new Armada;
// var_dump($data->plat);
// die();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include $root ."\partials\head.php" ?>
</head>

<body>
  <div class="container">
    <a href="./armadacreate.php" class="btn btn-sm btn-success mt-2">Tambah Data</a>
    <a href="/" class="btn btn-sm btn-danger mt-2 float-end">Kembali</a>
    <table class="table table-hover table-bordered table-collapse table-striped mt-2">
      <thead>
        <th>No</th>
        <!-- <th>Id</th> -->
        <th>Plat</th>
        <th>Jenis Mobil</th>
        <th>Kategori</th>
        <th>Kecepatan Kosong</th>
        <th>Kecepatan Muatan</th>
        <th>Status Aktif</th>
        <th>Opsi</th>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $nomor = range(1, 29);
        // $get_nomor = array_rand($nomor, rand(1, sizeof($nomor)));
        $get_nomor = array_rand($nomor, rand(1, 10));
        foreach ($armada->readData() as $data) { ?>
          <!-- foreach (array_slice($armada->readData(),0,3) as $data) { ?> -->
          <tr>
            <td><?= $no++ ?></td>
            <!-- <td><?= $data->id ?></td> -->
            <td><?= $data->plat ?></td>
            <td><?= $data->jenis_mobil ?></td>
            <td><?= $data->kateg_mobil ?></td>
            <td><?= $data->kecepatan_kosong ?></td>
            <td><?= $data->kecepatan_muatan ?></td>
            <td><?= $data->status_keaktifan ?></td>
            <td>
              <a class="btn btn-sm btn-primary" href="./armadaupdate.php?id=<?= $data->id ?>">Ubah</a>
              <a class="btn btn-sm btn-danger" href="./armadadelete.php?id=<?= $data->id ?>">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <?php
  // $plat = 'DA '. rand(1000, 9999) .' ' . chr(rand(65,90)) . chr(rand(65,90));
  // $jenis_mobil = ['L300','GRAN MAX','ENGKEL','PS', 'FUSO'];
  // $armada->createData($plat, $jenis_mobil[rand(0, sizeof($jenis_mobil)-1)]);
  // echo 'Data Armada Berhasil Ditambahkan';

  // $plat = 'DA '. 6666 .' ' . chr(rand(65,90)) . chr(rand(65,90));
  // $jenis_mobil = ['L300','GRAN MAX','ENGKEL','PS', 'FUSO'];
  // $id = 47;
  // $armada->updateData($id ,$plat, $jenis_mobil[rand(0, sizeof($jenis_mobil)-1)]);
  // echo 'Data Armada Berhasil Diubah';

  // $id = 33;
  // $armada->deleteData($id);
  // echo 'Data Armada Berhasil Dihapus';
  ?>
</body>

</html>