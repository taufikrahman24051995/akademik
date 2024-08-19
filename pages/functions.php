<?php 

// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "akademik");

function query ($query) {
	global $koneksi;
	$result = mysqli_query ($koneksi, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc ($result)) {
		$rows [] = $row;
	}
	return $rows;
}

function daftar ($data) {
	global $koneksi;
	$nama = htmlspecialchars($data["nama"]);
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($koneksi, $data["password"]);
	$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
	$level = htmlspecialchars($data["level"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert ('Username sudah terdaftar');
			  </script>";

		return false;
	}

	// cek konfirmasi password
	if ( $password !== $password2) {
		echo "<script>
				alert ('Konfirmasi password tidak sesuai');
			  </script>";

		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$nama', '$username', '$password', '$level')");
	return mysqli_affected_rows($koneksi);
}

function editUser($data) {
	global $koneksi;

	$id_user = $data["id_user"];
	$nama = htmlspecialchars($data["nama"]);
	$username = strtolower(stripslashes($data["username"]));
	
	$query = "UPDATE user SET nama = '$nama', username = '$username' WHERE id_user = '$id_user' ";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);

}

function UserGantiPassword($data) {
	global $koneksi;

	$password_lama = mysqli_real_escape_string($koneksi, $data["password_lama"]);
	$password_baru = mysqli_real_escape_string($koneksi, $data["password_baru"]);
	$password_baru2 = mysqli_real_escape_string($koneksi, $data["password_baru2"]);

	// cek password sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]' ");
	$data = mysqli_fetch_array($result);

    // cek password
   	$pass = password_verify($password_lama, $data['password']);

   	if ($pass === TRUE) {
        
        	// cek konfirmasi password
			if ( $password_baru !== $password_baru2) {
				echo "<script>
						alert ('Konfirmasi password tidak sesuai');
					  </script>";

				return false;
			}

			// enkripsi password
			$password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
			
			$query = "UPDATE user SET password = '$password_baru' WHERE id_user = '$_SESSION[id_user]' ";
			mysqli_query($koneksi, $query);

			return mysqli_affected_rows($koneksi);

	}
}

function tambahMahasiswa ($data) {
	global $koneksi;

	$Nim = htmlspecialchars($data["Nim"]);
	$Nama_Mhs = htmlspecialchars($data["Nama_Mhs"]);
	$Tgl_Lahir = htmlspecialchars($data["Tgl_Lahir"]);
	$Alamat = htmlspecialchars($data["Alamat"]);
	$Jenis_Kelamin = htmlspecialchars($data["Jenis_Kelamin"]);

	$query = "INSERT INTO mahasiswa VALUES ('$Nim', '$Nama_Mhs', '$Tgl_Lahir', '$Alamat', '$Jenis_Kelamin')";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusMahasiswa($Nim) {
	global $koneksi;
	mysqli_query ($koneksi, "DELETE FROM mahasiswa WHERE Nim = '$Nim'");
	
	return mysqli_affected_rows($koneksi);
}

function editMahasiswa($data) {
	global $koneksi;

	$Nim = htmlspecialchars($data["Nim"]);
	$Nama_Mhs = htmlspecialchars($data["Nama_Mhs"]);
	$Tgl_Lahir = htmlspecialchars($data["Tgl_Lahir"]);
	$Alamat = htmlspecialchars($data["Alamat"]);
	$Jenis_Kelamin = htmlspecialchars($data["Jenis_Kelamin"]);
	
	$query = "UPDATE mahasiswa SET Nim = '$Nim', Nama_Mhs = '$Nama_Mhs', Tgl_Lahir = '$Tgl_Lahir', Alamat = '$Alamat', Jenis_Kelamin = '$Jenis_Kelamin'  WHERE Nim = '$Nim' ";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function tambahDosen ($data) {
	global $koneksi;

	$Nip = htmlspecialchars($data["Nip"]);
	$Nama_Dosen = htmlspecialchars($data["Nama_Dosen"]);

	$query = "INSERT INTO dosen VALUES ('$Nip', '$Nama_Dosen')";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusDosen($Nip) {
	global $koneksi;
	mysqli_query ($koneksi, "DELETE FROM dosen WHERE Nip ='$Nip'");
	
	return mysqli_affected_rows($koneksi);
}

function editDosen($data) {
	global $koneksi;

	$Nip = htmlspecialchars($data["Nip"]);
	$Nama_Dosen = htmlspecialchars($data["Nama_Dosen"]);
	
	$query = "UPDATE dosen SET Nip = '$Nip', Nama_Dosen = '$Nama_Dosen' WHERE Nip = '$Nip' ";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function tambahMatakuliah ($data) {
	global $koneksi;

	$Kode_MK = htmlspecialchars($data["Kode_MK"]);
	$Nama_MK = htmlspecialchars($data["Nama_MK"]);
	$Sks = htmlspecialchars($data["Sks"]);

	$query = "INSERT INTO matakuliah VALUES ('$Kode_MK', '$Nama_MK', '$Sks')";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusMatakuliah($Kode_MK) {
	global $koneksi;
	mysqli_query ($koneksi, "DELETE FROM matakuliah WHERE Kode_MK ='$Kode_MK'");
	
	return mysqli_affected_rows($koneksi);
}

function editMatakuliah($data) {
	global $koneksi;

	$Kode_MK = htmlspecialchars($data["Kode_MK"]);
	$Nama_MK = htmlspecialchars($data["Nama_MK"]);
	$Sks = htmlspecialchars($data["Sks"]);
	
	$query = "UPDATE matakuliah SET Kode_MK = '$Kode_MK', Nama_MK = '$Nama_MK', Sks = '$Sks' WHERE Kode_MK = '$Kode_MK' ";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function tambahPerkuliahan ($data) {
	global $koneksi;

	$Nim = htmlspecialchars($data["Nama_Mhs"]);
	$Kode_MK = htmlspecialchars($data["Nama_MK"]);
	$Nip = htmlspecialchars($data["Nama_Dosen"]);
	$Nilai = htmlspecialchars($data["Nilai"]);

	$query = "INSERT INTO perkuliahan VALUES ('$Nim', '$Kode_MK', '$Nip', '$Nilai')";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

?>



                                        