<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location:login.php");
    exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["input_perkuliahan"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if( tambahPerkuliahan($_POST) > 0) {
        echo "
            <script>
                alert('Data perkuliahan berhasil ditambahkan');
                document.location.href = 'perkuliahan.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data perkuliahan gagal ditambahkan');
                document.location.href = 'perkuliahan.php';
            </script>
            ";
    }
}

$nama_user = query("SELECT * FROM user WHERE id_user = '$_SESSION[id_user]' ");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SISTEM INFORMASI AKADEMIK</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="shorcut icon" href="../img/graduation.png">

        <style type="text/css">
             .navbar-inverse {
                    background-color:  #fd7e14;
                    border-color: orange;
            }
            li a {
                color: #fd7e14;;
            }
            li a:hover {
                color: orange;
                text-decoration: none;
            }
            .navbar-header a{
                font-weight: bold;
            }
        </style>
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
                <div class="navbar-header">
                    <a class="navbar-brand" style="color:white;" href="#">SISTEM INFORMASI AKADEMIK</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white;">
                            <i class="fa fa-user fa-fw"></i>
                            <?php foreach ($nama_user as $row) : ?>
                                <?php echo $row["nama"]; ?>
                            <?php endforeach; ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="user_edit.php"><i class="fa fa-user fa-fw"></i> Edit User</a>
                            </li>
                            <li>
                                <a href="user_ganti_password.php"><i class="fa fa-gear fa-fw"></i> Ganti Password</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

               <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="mahasiswa.php"><i class="fa fa-graduation-cap fa-fw"></i> Data Mahasiswa</a>
                            </li>
                            <li>
                                <a href="dosen.php"><i class="fa fa-user-secret fa-fw"></i> Data Dosen</a>
                            </li>
                            <li>
                                <a href="matakuliah.php"><i class="fa fa-list-alt fa-fw"></i> Data Mata Kuliah</a>
                            </li>
                            <li>
                                <a href="perkuliahan.php" class="active"><i class="fa fa-university fa-fw"></i> Data Perkuliahan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-print fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="mahasiswa_laporan.php" target="_blank">Laporan Data Mahasiswa</a>
                                    </li>
                                    <li>
                                        <a href="dosen_laporan.php" target="_blank">Laporan Data Dosen</a>
                                    </li>
                                    <li>
                                        <a href="matakuliah_laporan.php" target="_blank">Laporan Data Mata Kuliah</a>
                                    </li>
                                    <li>
                                        <a href="perkuliahan_laporan.php" target="_blank">Laporan Data Perkuliahan</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                	<form action="" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><i class="fa fa-university fa-fw"></i> Input Data Perkuliahan</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <select name="Nama_Mhs" class="form-control" autofocus required>
                            <option value="" >Pilih...</option>
                            <?php 
                                $mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                                $jsArray = "var prdName = new Array();\n";
                                while($nama_mahasiswa = mysqli_fetch_array($mahasiswa) ) {
                                echo'<option value = "' .$nama_mahasiswa['Nim'].'">'. $nama_mahasiswa['Nim'].' '. $nama_mahasiswa['Nama_Mhs'].' </option>';
                                }
                             ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Matakuliah</label>
                        <select name="Nama_MK" class="form-control" required>
                            <option value="" >Pilih...</option>
                            <?php 
                                $matakuliah = mysqli_query($koneksi, "SELECT * FROM matakuliah");
                                $jsArray = "var prdName = new Array();\n";
                                while($nama_matakuliah = mysqli_fetch_array($matakuliah) ) {
                                echo'<option value = "' .$nama_matakuliah['Kode_MK'].'">'. $nama_matakuliah['Kode_MK'].' '. $nama_matakuliah['Nama_MK'].' </option>';
                                }
                             ?>
                        </select>
                    </div>
                     <div class="form-group">
                        <label>Nama Dosen</label>
                        <select name="Nama_Dosen" class="form-control" required>
                            <option value="" >Pilih...</option>
                            <?php 
                                $dosen = mysqli_query($koneksi, "SELECT * FROM dosen");
                                $jsArray = "var prdName = new Array();\n";
                                while($nama_dosen = mysqli_fetch_array($dosen) ) {
                                echo'<option value = "' .$nama_dosen['Nip'].'">'. $nama_dosen['Nip'].' '. $nama_dosen['Nama_Dosen'].' </option>';
                                }
                             ?>
                        </select>
                    </div>
					<div class="form-group">
						<label for="Nilai">Nilai</label>
						<input type="number" class="form-control" placeholder="Nilai" name="Nilai" id="Nilai" autocomplete="off" required>
					</div>
					<button type="submit" class="btn btn-primary" name="input_perkuliahan">Input Perkuliahan</button>
                    </form>
				</div>
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
