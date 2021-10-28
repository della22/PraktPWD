<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
.warning {color: #FF0000;}
</style>
</head>
<body>
<?php
// define variables and set to empty values
$nimErr = $namaErr = $genderErr = $emailErr = $notelpErr = $alamatErr = "";
$nim = $nama = $gender = $email = $notelp = $alamat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["nim"])) {
$nimErr = "Nim harus diisi";
}else if(!is_numeric($_POST['nim'])) {
$nimErr = 'Nim harus angka';
}else {
$nim = test_input($_POST["nim"]);
}

if (empty($_POST["nama"])) {
$namaErr = "Nama harus diisi";
}else {
$nama = test_input($_POST["nama"]);
}

if (empty($_POST["gender"])) {
$genderErr = "Gender harus dipilih";
}else {
$gender = test_input($_POST["gender"]);
}

if (empty($_POST["email"])) {
$emailErr = "Email harus diisi";
}else {
$email = test_input($_POST["email"]);

// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailErr = "Email tidak sesuai format"; 
}
}

if (empty($_POST["notelp"])) 
  {
    $notelpErr = "No HP tidak boleh kosong";
  } 
  else 
  {
    $notelp = test_input($_POST["notelp"]);
    if(!is_numeric($notelp)) 
    {
      $notelpErr = 'No HP hanya boleh angka';
    }
  }

if (empty($_POST["alamat"])) {
$alamatErr = "Alamat harus diisi";
}else {
$alamat = test_input($_POST["alamat"]);
}
}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>

<div class="row">
<div class="col-md-6">
<div class="card">
  <div class="card-header">
    Input Data Mahasiswa
  </div>

<p><span class = "error">* Harus Diisi.</span></p>

<div class="card-body">
<form method = "post" action = "<?php 
echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-group row">
    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
    <div class="col-sm-10">
      <input type="text" name="nim" class="form-control <?php echo ($nimErr !="" ? "is-invalid" : ""); ?>" 
      id="nim" placeholder="NIM" value="<?php echo $nim; ?>"><span class="warning"><?php echo $nimErr; ?></span>
    </div>
</div>

<div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" name="nama" class="form-control <?php echo ($namaErr !="" ? "is-invalid" : ""); ?>" 
      id="nama" placeholder="Nama" value="<?php echo $nama; ?>"><span class="warning"><?php echo $namaErr; ?></span>
    </div>
</div>

<div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Gender</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="gender" value="L">
        <label class="form-check-label" for="gender">Laki-laki</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="gender" value="P">
        <label class="form-check-label" for="gender">Perempuan</label>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control <?php echo ($emailErr !="" ? "is-invalid" : ""); ?>" 
      id="email" placeholder="Email" value="<?php echo $email; ?>"><span class="warning"><?php echo $emailErr; ?></span>
    </div>
</div>

<div class="form-group row">
    <label for="notelp" class="col-sm-2 col-form-label">No HP</label>
    <div class="col-sm-10">
      <input type="text" name="notelp" class="form-control <?php echo ($notelpErr !="" ? "is-invalid" : ""); ?>" 
      id="notelp" placeholder="Nomor HP" value="<?php echo $notelp; ?>"><span class="warning"><?php echo $notelpErr; ?></span>
    </div>
</div>

<div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" name="alamat" class="form-control <?php echo ($alamatErr !="" ? "is-invalid" : ""); ?>" 
      id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>"><span class="warning"><?php echo $alamatErr; ?></span>
    </div>
</div>

<td>
<input type = "submit" name = "submit" value = "Submit"> 
</td>
</table>
</form>

</body>
</html>


<?php
        // Check If form submitted, insert form data into users table.
        if(isset($_POST['submit'])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $notelp = $_POST['notelp'];
            $alamat = $_POST['alamat'];
            // include database connection file
            include_once("koneksi.php");
            // Insert user data into table
            $result = mysqli_query($con, "INSERT INTO mhs(nim,nama,gender,email,notelp,alamat) VALUES('$nim','$nama', '$gender','$email','$notelp','$alamat')");
            // Show message when user added
            echo "Data berhasil disimpan. <a href='simpan.php'>View Users</a>";
        }
    ?>