<?php

require __DIR__ . '/Armada.php';

$armada = new Armada;
// echo $_SERVER['DOCUMENT_ROOT'];
// echo '<br>';
// echo __DIR__;
// echo '<br>';
// echo dirname(__DIR__);

$root = dirname(__DIR__);
// var_dump($site);
// die();
$id = array($_GET['id']);
$data = $armada->readDataById($id);
// var_dump($data);
// die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php include $root . "/partials/head.php" ?>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="/" class="btn btn-sm btn-danger mt-2 float-end">Kembali</a>
			</div>
		</div>
		<form action="doArmadaUpdate.php?id=<?= $_GET['id'] ?>" method="post">
			<div class="form-group">
				<label for="plat">Plat</label>
				<input type="text" name="plat" id="" class="form-control" style="text-transform: uppercase;" value="<?= $data->plat ?>">
			</div>
			<div class="form-group">
				<label for="jenis_mobil">Jenis Mobil</label>
				<select name="jenis_mobil" id="" class="form-control">
					<option value="" disabled>-- Pilih Jenis Mobil --</option>
					<?php
					$array_jenis_mobil = ['L300', 'GRAN MAX', 'ENGKEL', 'PS', 'FUSO'];
					foreach ($array_jenis_mobil as $jenis_mobil) {
						$selected = $jenis_mobil == $data->jenis_mobil ? 'selected' : '';
					?>
						<option <?= $selected ?> value="<?= $jenis_mobil ?>"><?= $jenis_mobil ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="status_keaktifan">Status Keaktifan</label>
				<select name="status_keaktifan" id="" class="form-control">
					<option value="" disabled>-- Pilih Status Keaktifan --</option>
					<?php
					$array_status_keaktifan = ['AKTIF', 'NON AKTIF'];
					foreach ($array_status_keaktifan as $status_keaktifan) {
						$selected = $status_keaktifan == $data->status_keaktifan ? 'selected' : '';
					?>
						<option <?= $selected ?> value="<?= $status_keaktifan ?>"><?= $status_keaktifan ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="row">
				<div class="col mt-2">
					<button type="submit" class="btn btn-sm btn-success">Ubah</button>
					<button type="reset" class="btn btn-sm btn-warning">Reset</button>
				</div>
			</div>
		</form>
	</div>
</body>

</html>