<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location:login.php");
    exit;
}

require 'functions.php';

$Kode_MK = $_GET["Kode_MK"];

if ( hapusMatakuliah($Kode_MK) > 0) {
		echo "
			<script>
				alert('Data matakuliah berhasil dihapus');
				document.location.href = 'matakuliah.php';
			</script>
			";
	} else {
		echo "
			<script>
				alert('data matakuliah gagal dihapus');
				document.location.href = 'matakuliah.php';
			</script>
			";
	}

?>