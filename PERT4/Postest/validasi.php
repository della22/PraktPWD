<html>
<head>
<style>
.error {color: #FF0000;}
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

if (empty($_POST["notelp"])) {
$notelpErr = "No HP harus diisi";
}else if(!is_numeric($_POST['notelp'])) {
$notelpErr = 'No HP harus angka';
}else if(strlen($_POST['notelp']) != 12) {
$notelpErr = 'No HP harus berjumlah 12 angka';
}else{
$notelp = test_input($_POST["notelp"]);
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

<h2>Input Data Mahasiswa </h2> 

<p><span class = "error">* Harus Diisi.</span></p>

<form method = "post" action = "<?php 
echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>

<tr>
<td>Nim:</td>
<td><input type = "text" name = "nim">
<span class = "error">* <?php echo $nimErr;?></span>
</td>
</tr>

<tr>
<td>Nama:</td>
<td><input type = "text" name = "nama">
<span class = "error">* <?php echo $namaErr;?></span>
</td>
</tr>

<tr>
<td>Gender:</td>
<td>
<input type = "radio" name = "gender" value = "L">Laki-Laki
<input type = "radio" name = "gender" value = "P">Perempuan
<span class = "error">* <?php echo $genderErr;?></span>
</td>
</tr>

<tr>
<td>E-mail: </td>
<td><input type = "text" name = "email">
<span class = "error">* <?php echo $emailErr;?></span>
</td>
</tr>

<tr>
<td>No HP:</td>
<td> <input type = "text" name = "notelp">
<span class = "error">*<?php echo $notelpErr;?></span>
</td>
</tr>

<tr>
<td>Alamat:</td>
<td> <input type = "text" name = "alamat">
<span class = "error">*<?php echo $alamatErr;?></span>
</td>
</tr>

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