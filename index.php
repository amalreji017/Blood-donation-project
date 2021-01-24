<?php
    session_start();
    require_once('dbconfig/config.php');
?>
<?php ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>HUMAN CARE</title>
        <meta name="description" content="">
		<meta name="keywords" content="">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="index_body">
        <div class="main_div">

            <div class="div1">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p>
                    Welcome to Human Care Blood Bank.
                    Nothing is<br> more precious than gifting someone<br> life in liquid form.The blood you donate gives<br> someone another chance to live.<br>
                    <h2>GIVE THE GIFT OF LIFE</h2>  
                    <h1>DONATE BLOOD<h1>
                </p>
            </div>
            <div class="div2">
                <div class="login">
                    <form action="index.php" method="post">
                        <div class="login_container">
                            <div class="usr">
                                <input class="input_i" type="text" name="username" placeholder=" USERNAME" required> 
                            </div>
                            <div class="pswd">
                                <input class="input_i" type="password" name="pwd" placeholder="PASSWORD" required> 
                            </div>              
                            <div class="button">
                                <button  class="login_button" name="login" type="submit">LOG IN</button>
                            
                                <br><br><br><br>
                                <br><br><br><br>
                                <br><br><br>
                            </div>
                            </form>
                            <p class="signup">Don't have an account?create one<br><a href='user/signup.php'><button  class="signup_button" type="button">SIGN UP</button></a></p>
                            </div>
                        </div>
                   
                </div>

            </div>
        </div>
    </body>
    <?php
			if(isset($_POST['login']))
			{
                
                @$username=$_POST['username'];
                echo $username;
				@$password=$_POST['pwd'];
				$query = "select * from  login where username='$username' and password='$password';";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
                    $_SESSION['username'] = $username;
					$_SESSION['passsword'] = $password;
					
					//header( "Location: homepage.php");
					echo "<script>window.location.href='user/home.php';</script>";
					}
					else
					{
						echo '<script type="text/javascript">alert("Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>   
</html>