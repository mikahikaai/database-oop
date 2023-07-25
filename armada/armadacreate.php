<?php
// echo $_SERVER['DOCUMENT_ROOT'];
// echo '<br>';
// echo __DIR__;
// echo '<br>';
// echo dirname(__DIR__);

$root = dirname(__DIR__);
// var_dump($site);
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
		<form action="doArmadaCreate.php" method="post">
			<div class="form-group">
				<label for="plat">Plat</label>
				<input type="text" name="plat" id="" class="form-control" style="text-transform: uppercase;">
			</div>
			<div class="form-group">
				<label for="jenis_mobil">Jenis Mobil</label>
				<select name="jenis_mobil" id="" class="form-control">
					<option value="" disabled>-- Pilih Jenis Mobil --</option>
					<option value="GRAN MAX">GRAN MAX</option>
					<option value="L300">L300</option>
					<option value="ENGKEL">ENGKEL</option>
					<option value="PS">PS</option>
					<option value="FUSO">FUSO</option>
				</select>
			</div>
			<div class="row">
				<div class="col mt-2">
					<button type="submit" class="btn btn-sm btn-success">Simpan</button>
					<button type="reset" class="btn btn-sm btn-warning">Reset</button>
				</div>
			</div>
		</form>
	</div>
</body>

</html>