<?php
include 'db_conn.php';
$db = new database();
require 'function.php';

$select = new Select();
$specify = new Specify();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $userini = $specify->selectUserById($_SESSION['id']);
}
else{
  header("Location: login.php");
}
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: darkblue;">
    <?php
        foreach ($userini as $akun) {
          if ($akun['role'] == '1') {
    ?>
    <nav class="nav">
      <a class="nav-link" href = "index_pengrajin.php">Back</a></nav>
    <?php } 
          elseif ($akun['role'] == '2') {
    ?>
    <<nav class="nav">
      <a class="nav-link" href = "index_investor.php">Back</a></nav>
    <?php } ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<div class="shadow w-350 p-3 text-center">
    		<img src="foto_profil/<?php echo $akun['pp']; ?>"
    		     class="img-fluid rounded-circle">
            <h3 class="display-4" style="color:white;"><?php echo $akun['fname']; ?></h3>
            <div>
                <h1 style="width: 600px; color:cornflowerblue;"><?php echo $akun['deskripsi']; ?></h1>
            </div>
            <div>
                <h1 style="width: 600px; color:white;">Dana : Rp,-<?php echo $akun['dana']; ?></h1>
            </div>
            <div>Cek Dana is
              <?php var_dump (is_numeric($akun['dana']))?>
            </div>
            <a href="edit.php" class="btn btn-primary">
            	Edit Profile
            </a>
             <a href="logout.php" class="btn btn-warning">
                Logout
            </a>
		</div>
    </div>
    <?php } ?>
</body>
</html>