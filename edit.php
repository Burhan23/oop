<?php
include 'db_conn.php';
$db = new database();
require 'function.php';

$select = new Select();
$specify = new Specify();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $detail = $specify->selectUserById($_SESSION['id']);
}
else{
  header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/edit.css">
    <title>Update</title>
</head>
<body style="background-image: url('css/editbackgound.jpeg'); background-size:cover;">
<h2>Edit Informasi Produk</h2>
    <div class="container">
    <form action="proses.php?aksi=update" method="post">
    <?php
    foreach ($detail as $akun) {
    ?>
    <input type="hidden" name="id" value="<?php echo $akun['id'] ?>">
        <div class="mb-3">
            <label for="nama_product" class="form-label">Email</label>
            <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Nama product .." value="<?php echo $akun['email'] ?>">
        </div>
        <div class="mb-3">
            <label for="nama_product" class="form-label">Username</label>
            <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Nama product .." value="<?php echo $akun['username'] ?>">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Password</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi .." value="">
         </div>
         <div class="mb-3">
            <label for="deskripsi" class="form-label">Konfirmasi Password Lama</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi .." value="">
         </div>
        <input type="submit" class="btn btn-primary" value="Simpan">
        <a class="btn btn-warning" href="index_pengrajin.php">Batal</a>
    <?php } ?>	
    </form>
</body>
</html>