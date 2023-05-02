<?php
include 'function.php';
$specify = new Specify();

$detail = $specify->dataUser($_GET['username']);
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
<body>
    <?php
        foreach ($detail as $akun) {
    ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<div class="shadow w-350 p-3 text-center">
    		<img src="foto_profil/<?php echo $akun['pp']; ?>"
    		     class="img-fluid rounded-circle">
            <h3 class="display-4 "><?php echo $akun['fname']; ?></h3>
            <div>
                <h1 style="width: 600px;"><?php echo $akun['deskripsi']; ?></h1>
            </div>
            <a href="invest.php?username=<?php echo $akun['username']; ?>&aksi=edit" class="btn btn-primary">
            	Invest
            </a>
		</div>
    </div>
    <?php } ?>
</body>
</html>