<?php
	define("DEVELOPMENT",TRUE); //menyatakan situs masih dalam pengembangan

	function dbConnect() {
		$server = "localhost";
		$user = "root";
		$pass = "";
		$db = "rs_bonaventura";
		$db=new mysqli($server, $user, $pass, $db);
		return $db;
	}

	function getDataPerawat($ID_Perawat){
		$db=dbConnect();
		if($db->connect_errno == 0){
			$res = $db->query("SELECT * FROM tabel_perawat ORDER BY ID_Perawat");
			if ($res) {
				$data = $res->fetch_assoc();
				$res->free();
				return $data;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	function getDataPasien($No_RM){
		$db=dbConnect();
		if($db->connect_errno == 0){
			$res = $db->query("SELECT * FROM tabel_pasien ORDER BY No_RM");
			if ($res) {
				$data = $res->fetch_assoc();
				$res->free();
				return $data;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	function getDataTindakan($No_Registrasi){
		$db=dbConnect();
		if($db->connect_errno == 0){
			$res = $db->query("SELECT * FROM tabel_tindakan ORDER BY No_Registrasi");
			if ($res) {
				$data = $res->fetch_assoc();
				$res->free();
				return $data;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	function getIDPerawat(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM tabel_perawat ORDER BY ID_Perawat");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
	}

	function getNama(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM tabel_pasien ORDER BY No_RM");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
	}

	function getNamaEdit(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM tabel_pasien ORDER BY Nama");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
	}

	function getViewData(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT tabel_pasien.No_RM, tabel_pasien.Nama, tabel_pasien.Alamat, tabel_pasien.Jenis_Kelamin, tabel_pasien.TTL, tabel_tindakan.No_Ruang, tabel_tindakan.Diagnosa, tabel_perawat.ID_Perawat, tabel_perawat.ID_Poliklinik
			FROM tabel_tindakan
			INNER JOIN tabel_pasien
			ON tabel_tindakan.Nama_Pasien=tabel_pasien.Nama
			INNER JOIN tabel_perawat
			ON tabel_perawat.ID_Perawat=tabel_tindakan.ID_Perawat");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
	}
?>