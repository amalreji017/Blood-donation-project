<?php
    $name = 'CDjGIwt41U';
    $dbpass =  'P8S6e7Fxk6';
    $con=mysqli_connect ("remotemysql.com", $name, $dbpass,$name) or die ('I cannot connect to the database because: ' . mysql_error());
    mysqli_select_db ($con,$name);
?>
 