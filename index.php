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
    <style>
p.italic {
  font-style: italic;
}
</style>
    <body class="index_body">
        <div class="main_div">

            <div class="div1">
                <br>
                <br>
                
                <img class="logo"src="images\Asset2.png" width="250"
         height="80">
         		
                <br>
                <br>
                <br>
                <br>
                <img class="para"src="images\Asset4.png" width="550" height="550">
                <img class="last"src="images\Asset3.png" width="250"
         height="80">
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