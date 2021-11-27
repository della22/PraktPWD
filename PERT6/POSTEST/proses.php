<?php
session_start();
include "koneksi.php";
$user = $_POST['id_user'];
$email = $_POST['email'];
$pass = md5($_POST['password']);
$sql = "SELECT * FROM users WHERE id_user='$user' AND email='$email' AND password='$pass'";
if($_POST["captcha_code"] == $_SESSION["captcha_code"]){
    $login = mysqli_query($con, $sql);
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);
    if ($ketemu > 0){
        $_SESSION['id'] = $r['id_user'];
        $_SESSION['mail'] = $r['email'];
        $_SESSION['nama'] = $r['nama_lengkap'];
        header("location: beranda.php");
    }else{
        echo "<center>Login gagal username, email & password tidak benar<br>";
        echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
    }
    mysqli_close($con);
}else{
    echo "<center>Login gagal! Captcha tidak sesuai<br>";
    echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
