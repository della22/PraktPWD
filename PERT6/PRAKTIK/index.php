<?php
session_start();
if(@$_SESSION['id'] != NULL){
    header("location: beranda.php");
}
?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pertemuan 6 -Aplication and Security</title>
    <style>
        body{
            background-color: #f39c12;
        }
    </style>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <div class="card">
                    <div class="card-header text-center mt-2">
                        <h5>Application and Security</h5>
                    </div>
                    <div class="card-body">
                        <form action="proses.php" method="POST">
                            <div class="row">
                                <div class="form-group">
                                    <label for="uname">Username *</label>
                                    <input type="text" name="id_user" class="form-control" Required>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="uname">Password *</label>
                                    <input type="password" name="password" class="form-control" Required>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="uname">Captcha *</label>
                                    <div class="row">
                                        <div class="col-sm-9">
                                        <input type="text" name="captcha_code" class="form-control" Required>
                                </div>
                                <div class="col-sm-3">
                                    <img src='captcha.php'/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <button type="submit" name="login" class="btn btn-info float-right">Login </button> 
                        </div>
                    </div>
                </form>
            </div>
    </div>
    </div>