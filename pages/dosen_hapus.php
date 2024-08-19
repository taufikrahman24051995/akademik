<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location:login.php");
    exit;
}

require 'functions.php';

$Nip = $_GET["Nip"];

if ( hapusDosen($Nip) > 0) {
		echo "
			<script>
				alert('Data dosen berhasil dihapus');
				document.location.href = 'dosen.php';
			</script>
			";
	} else {
		echo "
			<script>
				alert('data dosen gagal dihapus');
				document.location.href = 'dosen.php';
			</script>
			";
	}

?>