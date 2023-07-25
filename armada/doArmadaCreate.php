<?php
require 'Armada.php';

$armada = new Armada;

$plat = strtoupper($_POST['plat']);
$jenis_mobil = $_POST['jenis_mobil'];
$armada->createData($plat, $jenis_mobil);
header("Location: /armada");
