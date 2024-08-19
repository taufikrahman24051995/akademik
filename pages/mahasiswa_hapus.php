<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location:login.php");
    exit;
}

require 'functions.php';

$Nim = $_GET["Nim"];

if ( hapusMahasiswa($Nim) > 0) {
		echo "
			<script>
				alert('Data mahasiswa berhasil dihapus');
				document.location.href = 'mahasiswa.php';
			</script>
			";
	} else {
		echo "
			<script>
				alert('data mahasiswa gagal dihapus');
				document.location.href = 'mahasiswa.php';
			</script>
			";
	}

?>