<?php
require 'Armada.php';

$armada = new Armada;

$id = $_GET['id'];
$plat = strtoupper($_POST['plat']);
$jenis_mobil = $_POST['jenis_mobil'];
$status_keaktifan = $_POST['status_keaktifan'];
$armada->updateData($id, $plat, $jenis_mobil, $status_keaktifan);
header("Location: /armada");
