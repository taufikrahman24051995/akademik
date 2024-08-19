<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location:login.php");
    exit;
}

require 'functions.php';

$dosen = query("SELECT * FROM dosen ORDER BY Nip ASC");

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

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

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
                                <a href="perkuliahan.php"><i class="fa fa-university fa-fw"></i> Data Perkuliahan</a>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><i class="fa fa-user-secret fa-fw"></i> Data Dosen</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a href="dosen_input.php"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Input Dosen</button></a>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th><div align="center">No</div></th>
                                                    <th><div align="center">NIP</div></th>
                                                    <th><div align="center">Nama Dosen</div></th>
                                                    <th><div align="center">Aksi</div></th>
                                                </tr>
                                            </thead>

                                            <?php $i = 1; ?>
                                            <?php foreach ($dosen as $row) : ?>

                                            <tr>
                                                <td align="center"><?php echo $i; ?></td>
                                                <td align="center"><?php echo $row["Nip"]; ?></td>
                                                <td align="center"><?php echo $row["Nama_Dosen"]; ?></td>
                                                <td align="center">
                                                        <a style="text-decoration: none; color: white;" href="dosen_edit.php?Nip=<?php echo $row["Nip"]; ?>" >
                                                        <button class="btn btn-success">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                        </a>
                                                        |
                                                        <a style="text-decoration: none; color: white;" href="dosen_hapus.php?Nip=<?php echo $row["Nip"]; ?>" onclick="return confirm('Hapus data dosen');" >
                                                        <button class="btn btn-danger">
                                                        <i class="fa fa-trash"></i> Hapus 
                                                    </button>
                                                        </a>
                                                </td>
                                            </tr>

                                            <?php $i++; ?>
                                            <?php endforeach; ?>

                                        </table>
                                    </div>
                                </div>

                    </div>                <!-- /.table-responsive -->
                  
                </div>
             <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>


    </body>
	
</html>
