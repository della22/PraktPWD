<?php
session_start();
if (@$_SESSION['id'] == NULL) {
    header("location: index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Beranda</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div>
    </nav>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Beranda
                    </div>
                    <div class="card-body">
                    <h5 class="card-title">Selamat Datang di Beranda!</h5>
                    <p class="card-text">Berikut Data Pengguna : </p>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td>ID User</td>
                                    <td>:</td>
                                    <td><?= $_SESSION['id'] ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Nama Lengkap</td>
                                    <td width="5%">:</td>
                                    <td><?= $_SESSION['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $_SESSION['mail'] ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Login</td>
                                    <td>:</td>
                                    <td><?= date('d/m/Y h:i:s') ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="logout.php" onclick="return confirm('Yakin Logout?')" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>