<?php
    session_start();
    if(!isset($_SESSION['username'])){
        echo "<script>window.location.href='../index.php;'</script>";
    }
    $username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ASD PROJECT</title>
        <meta name="description" content="">
		<meta name="keywords" content="">
        <link rel="stylesheet" href="css/style.css">
         
    </head>
    <body>
        <div class="div1">
         <h1>WELCOME <?php echo $username; ?></h1>
        </div>
    </body>
</html>