<?php
require dirname(__DIR__)."/koneksi/Koneksi.php";

class Armada
{
	private $conn;

	function __construct()
	{
		$database = new database;
		$db = $database->getConnection();

		return $this->conn = $db;
	}

	function rules($jenis_mobil)
	{
		switch ($jenis_mobil) {
			case 'GRAN MAX':
			case 'L300':
				return (object) array(
					'kateg_mobil' => 'S',
					'kecepatan_kosong' => '55',
					'kecepatan_muatan' => '40'
				);
				break;
			case 'ENGKEL':
				return (object) array(
					'kateg_mobil' => 'M',
					'kecepatan_kosong' => '55',
					'kecepatan_muatan' => '40'
				);
				break;
			case 'PS':
				return (object) array(
					'kateg_mobil' => 'L',
					'kecepatan_kosong' => '50',
					'kecepatan_muatan' => '35'
				);
				break;
			default:
				return (object) array(
					'kateg_mobil' => 'XL',
					'kecepatan_kosong' => '45',
					'kecepatan_muatan' => '30'
				);
				break;
		}
	}

	function readData()
	{
		$query = "SELECT * FROM armada";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		// shuffle($data);
		return json_decode(json_encode($data), FALSE);
	}

	function readDataById($ids)
	{
		// $in  = str_repeat('?,', count($ids) - 1) . '?';
		// $place_holders = implode(',', array_fill(0, count($ids), '?'));
		$place_holders = implode(',', array_fill(0, count($ids), '?'));
		$sql = "SELECT * FROM armada WHERE id IN ($place_holders)";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute($ids);
		// $stmt->debugDumpParams();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		return json_decode(json_encode($data), FALSE);
	}

	function createData($plat, $jenis_mobil)
	{
		$rules = $this->rules($jenis_mobil);

		$query = "INSERT INTO armada (plat, jenis_mobil, kateg_mobil, kecepatan_kosong, kecepatan_muatan)
            VALUES (?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->execute(array($plat, $jenis_mobil, $rules->kateg_mobil, $rules->kecepatan_kosong, $rules->kecepatan_muatan));
	}

	function updateData($id, $plat, $jenis_mobil, $status_keaktifan)
	{
		$rules = $this->rules($jenis_mobil);

		$query = "UPDATE armada SET plat=?, jenis_mobil=?, kateg_mobil=?, kecepatan_kosong=?,
            kecepatan_muatan=?, status_keaktifan=? WHERE id=?";
		$stmt = $this->conn->prepare($query);
		$stmt->execute(array($plat, $jenis_mobil, $rules->kateg_mobil, $rules->kecepatan_kosong, $rules->kecepatan_muatan, $status_keaktifan, $id));
		// $stmt->debugDumpParams();
	}

	function deleteData($id)
	{
		$query = "DELETE FROM armada WHERE id=?";
		$stmt = $this->conn->prepare($query);
		$stmt->execute(array($id));
		// $stmt->debugDumpParams();
	}
}
