<?php
    session_start();
    if(!isset($_SESSION['username'])){
        echo "<script>window.location.href='home.php';</script>";
    }
    require_once('../dbconfig/config.php');

    $username=$_SESSION['username'];
    $sql='select name from login where username="'.$username.'";';
    $query_run=mysqli_query($con,$sql);
    if(!$query_run){
        echo "<script>window.location.href='home.php';</script>";
    }else{
        $row=$query_run->fetch_assoc();
        $name=$row['name'];
        $sql='select * from user where name="'.$name.'"';
        $query_run=mysqli_query($con,$sql);
        if(!$query_run){
            echo "<script>window.location.href='home.php';</script>"; 
        }else{
            $row=$query_run->fetch_assoc();
            $age=$row['age'];
            $blood=$row['blood'];
            $address=$row['address'];
            $phone=$row['phone'];
            $email=$row['email'];       
        }
    }
?>
<!doctype html>
<html>
    <head>
        <title>EDIT</title>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/style.css">
        <style>
 
        </style>
    </head>
    <body class="editbody">
        <div class="editform">
            <form class="eform" action="edit.php" method=post>
                    <div class="head">
                        <h1>PROFILE DETAILS</h1>
                    </div>
                    <div class="editdetails">
                        <label>NAME</label><br>
                        <input name="name" type="text" value="<?php echo $name; ?>">
                    </div>
                    <div class="editdetails">
                        <label class="age">AGE</label><br>
                        <input name="age" type="text" value="<?php echo $age; ?>">
                    </div>
                    <div class="editdetails">
                        <label>BLOOD</label><br>
                        <input name="blood" type="text" value="<?php echo $blood; ?>">
                    </div>
                    <div class="editdetails">
                        <label>ADDRESS</label><br>
                        <input name="address" type="text" value="<?php echo $address; ?>">
                    </div>
                    <div class="editdetails">
                        <label>CONTACT</label><br>
                        <input name="phone" type="text" value="<?php echo $phone; ?>">
                    </div>
                    <div class="ebutton">
                        <button name="edit" type="submit">SAVE</button>
                        <a href="home.php"><button class="eback" type="button">BACK </button></a>
                    </div>
                </div>
            </form>
        </div>
        <?php
        if(isset($_POST['edit'])){
            $name=$_POST['name'];
            $age=$_POST['age'];
            $blood=$_POST['blood'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];
            $sql="update user set   age='$age',address='$address',blood='$blood',phone='$phone' where email='$email'";
            $query_run=mysqli_query($con,$sql);
            if(!$query_run){
                echo '<script type="text/javascript">alert("Database Error")</script>';
                echo "<script>window.location.href='edit.php';</script>"; 
            }else{
                echo "<script>window.location.href='home.php';</script>"; 
            }
        }
        ?>
    </body>
</html>