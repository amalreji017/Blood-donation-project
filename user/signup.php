<?php
 session_start();
 require_once('../dbconfig/config.php');
?>

<!doctype html>
<html>
    <head>
        <title>Sign up</title>
        <style>
            body{
                text-align:center;
            }
            .sdiv{
                position:absolute;
                display:block;
                top:44%;
                left:38%;

            }
            input{
                display:inline-block;
                padding:10px 20px;
                width:90px;
            }
            label{
                width:70px;
                padding:7px 10px;

            }
        </style>
        
    </head>
    <body>
        <a href="../index.php"><button>HOME</button></a>
        <form action='signup.php' method='post'>
            <div class="sdiv">
                <div>
                    <label>Email</label>
                    <input type="text" name="email" placeholder="EMAIL" required>
                    
                </div>
                <div>
                    <label>Username</label>
                    <input type="text" name="user" placeholder="USERNAME" required>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" id="pass" name="pass" placeholder="******" required>
                </div>
                <div>
                    <label>Confirm password</label>
                    <input type="password" id="cpass" name="con_pass" placeholder="******" required>
                    <h4></h4>
                </div>
                <div>
                   <button name="signup" type="submit">SIGN UP</button>
                </div>
            </div>
        </form>
        <?php 
            if (isset($_POST['signup'])){
                $email=$_POST['email'];
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $cpass=$_POST['con_pass'];
                if ($pass==$cpass){
                $sql="select * from  login where username='$user' or email='$email';";
                $query_run = mysqli_query($con,$sql);
                if($query_run){
                    if(mysqli_num_rows($query_run)>0){
                        echo '<script type="text/javascript">alert("USERNAME/EMAIL already taken")</script>';
                        echo "<script>window.location.href='signup.php';</script>";
                    }else{
                        //inserting credentials to table
                        $sql='insert into login (username,email,password) values ("'.$user.'","'.$email.'","'.$pass.'");';
                        $query_run=mysqli_query($con,$sql);
                        if(!$query_run){
                            echo '<script type="text/javascript">alert("Database Error")</script>';
                        }else{
                            echo "<script>window.location.href='login.php';</script>";
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
 