<?php

require 'Armada.php';

$armada = new Armada;
// echo $_SERVER['DOCUMENT_ROOT'];
// echo '<br>';
// echo __DIR__;
// echo '<br>';
// echo dirname(__DIR__);
// var_dump($site);
// die();
$id = $_GET['id'];
$data = $armada->deleteData($id);
header("Location: /armada");
