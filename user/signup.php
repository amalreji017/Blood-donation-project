<?php
 session_start();
 require_once('../dbconfig/config.php');
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SIGNUP</title>
        <meta name="description" content="">
		<meta name="keywords" content="">
        <link rel="stylesheet" href="../css/signup.css">
    </head>
    <body class="signup_body">
        <div class="home_s">
        <a href="../index.php">
        <div class="homediv"><p>HOME</  p></div></a>
        </div>
        <form action='signup.php' method='post'>
            <div class="sdiv">
                <div class="formdiv">
                <div>
                            <input type="text" name="name" placeholder="NAME" required>
                            
                        </div>
                        <div>
                            <input type="text" name="email" placeholder="EMAIL" required>
                            
                        </div>
                        <div>
                            <input type="text" name="user" placeholder="USERNAME" required>
                        </div>
                        <div>
                            <input type="password" id="pass" name="pass" placeholder="PASSWORD" required>
                        </div>
                        <div>
                            <input type="password" id="cpass" name="con_pass" placeholder="CONFIRM PASSWORD" required>
                            <h4 class="pmatch"></h4>
                        </div>
                        <div>
                        <button class="signup_button" name="signup" type="submit">SIGN UP</button>
                        </div>
                </div>
            </div>
        </form>
        <?php 
            if (isset($_POST['signup'])){
                $email=$_POST['email'];
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $cpass=$_POST['con_pass'];
                $name=$_POST['name'];
                if ($pass==$cpass){
                    $sql="select * from  login where username='$user' or email='$email';";
                    $query_run = mysqli_query($con,$sql);
                    if($query_run){
                        if(mysqli_num_rows($query_run)>0){
                            echo '<script type="text/javascript">alert("USERNAME/EMAIL already taken")</script>';
                            echo "<script>window.location.href='signup.php';</script>";
                        }else{
                            //inserting credentials to table
                            $sql='insert into login (username,email,password,name) values ("'.$user.'","'.$email.'","'.$pass.'","'.$name.'");';
                            $query_run=mysqli_query($con,$sql);
                            if(!$query_run){
                                echo '<script type="text/javascript">alert("Database Error")</script>';
                            }else{
                                $sql='insert into user(name,email) values ("'.$name.'","'.$email.'");';
                                $query_run = mysqli_query($con,$sql);
                                if(!$query_run){
                                    echo '<script type="text/javascript">alert("Database Error")</script>';
                                    echo "<script>window.location.href='signup.php';</script>";
                                }else{
                                echo "<script>window.location.href='../index.php';</script>";
                                }
                            }
                        }
                    }
                //if pass!=cpass                    
                }else{
                    echo '<script type="text/javascript">alert("Passwords Don\'t match")</script>';
                }
                
            }
        ?>
        <script src="script.js"></script>
    </body>
</html>
 