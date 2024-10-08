<?php 
require 'functions.php';

if(isset($_POST["daftar"])) {
    if (daftar($_POST) > 0) {
        echo "<script>
                alert ('User baru berhasil ditambahkan');
                document.location.href = 'login.php';
              </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}

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

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="shorcut icon" href="../img/graduation.png">

        <style type="text/css">
            .panel-orange {
                color: #000;
                border-color: #fd7e14;
            }
            .panel-heading {
                color: #fff;
                background-color: #fd7e14;
            }
            .panel-title {
                font-weight: bold;
            }
            .btn-orange {
                background-color: #fd7e14;
                color: #fff;
                font-weight: bold;
            }
            .panel-body a {
                text-decoration: none;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-orange">
                        <div class="panel-heading">
                            <center>
                            <h3 class="panel-title">SISTEM INFORMASI AKADEMIK</h3>
                            </center>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" placeholder="Nama" name="nama" type="text" id="nama" autocomplete="off" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input class="form-control" placeholder="Username" name="username" type="username" id="username" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" placeholder="Password" name="password" type="password" id="password" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">Konfirmasi Password</label>
                                        <input class="form-control" placeholder="Password" name="password2" type="password" id="password2" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control" required>
                                            <option value="" >Pilih...</option>
                                            <option value="mahasiswa" >Mahasiswa</option>
                                            <option value="dosen" >Dosen</option>
                                        </select>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-lg btn-orange btn-block" name="daftar">Daftar</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
