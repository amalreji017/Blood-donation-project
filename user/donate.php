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
        echo '<script type="text/javascript">alert("Database Error!!")</script>';
        echo "<script>window.location.href='home.php';</script>";       
    }else{
        $row=$query_run->fetch_assoc();
        $name=$row['name'];
        $sql='select * from user where name="'.$name.'"';
        $query_run=mysqli_query($con,$sql);
        if(!$query_run){
            echo '<script type="text/javascript">alert("Database Error!!")</script>'; 
            echo "<script>window.location.href='home.php';</script>";
        }else{
            $row=$query_run->fetch_assoc();
            $age=$row['age'];
            $blood=$row['blood'];
            $address=$row['address'];
            $phone=$row['phone'];     
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="UTF-8">
<title>DONATE BLOOD</title>
<link rel="stylesheet" href="../css/style.css">
<style>
  .dbutton{
    position:absolute;
    top: 82%;
    left:28%;
    width: 40%;
}
.dback{
    float: right;
    width:60px;
}
</style>
</head>
<body class="dbody">
<div class="dcontainer">
  <div class="dhead">
    <h1>DONATE!!<h1>
    <h2>Donor Details</h2>
  </div>
  <div class="dform">
    <form class="dform" method="post" action="donate.php">
      <div class="ddetails">
        <label>Name</label> <br>
        <input class="dinput" type="text" name="name" value="<?php echo $name;?>" required>
      </div>
      
      <div class="ddetails">
        <label>Age</label><br>
        <input class="dinput" type="text" name="age" value="<?php echo $age;?>" required>
      </div>
      
      <div class="ddetails">
        <label>Blood-group</label><br>
        <input class="dinput" type="text" name="bloodgrp" value="<?php echo $blood;?>" required>
      </div>
      <div class="ddetails">
        <label>Weight</label><br>
        <input class="dinput" type="text" name="weight" required>
      </div>
      <div class="ddetails">
        <label>Phone-no</label><br>
        <input class="dinput"  type="text" name="phno" value="<?php echo $phone;?>" required>
      </div>
      <div class="ddetails">
        <label>City</label><br>
        <input class="dinput" type="text" name="city" required>
      </div>
      <div class="ddetails">
        <label for="gender">Gender:</label><br>
        <input type="radio" name="gender"  value="female" required><label>Female</label>
        <input type="radio" name="gender"  value="male" required><label>Male</label>
        <input type="radio" name="gender"  value="other" required><label>Other</label>     
      </div>
      <div class="ddetails">
        <label for="ld">Last donation within 3 months:</label><br>
        <input type="radio" name="ld"  value="yes" required><label>YES</label>
        <input type="radio" name="ld"  value="no" required><label>NO</label>     
      </div>
      <div class="dbutton">
      <button class="dsbutton" type="submit" name="submit">SUBMIT</button>
        <a href="home.php"><button class="dback" type="button">BACK</button></a>
      </div>
    </form>
  </div>
</div>
<?php
if(isset($_POST['submit'])){
    $name=$_POST["name"];
    $age=$_POST['age'];
    $gender=$_POST["gender"];
    $weight=$_POST['weight'];
    $bloodgrp=$_POST["bloodgrp"];
    $phno=$_POST["phno"];
    $city=$_POST["city"];
    $ld=$_POST['ld'];
    if($ld=="no"){
        $sql='select * from blooddonor where name="'.$name.'";';
        $query_run=mysqli_query($con,$sql);
        if($query_run){
          if(mysqli_num_rows($query_run)>0){
              echo '<script type="text/javascript">alert("Details can only be submitted once!!")</script>';
              echo "<script>window.location.href='home.php';</script>";
          }else{
            if(($gender=="male") && ($weight>=60)){
              $sql='insert into blooddonor (name,gender,weight,contact,bloodtype,age,city) values 
              ("'.$name.'","'.$gender.'","'.$weight.'","'.$phno.'","'.$bloodgrp.'","'.$age.'","'.$city.'");';
              $query_run=mysqli_query($con,$sql);
              if(!$query_run){
                echo '<script type="text/javascript">alert("Database Error 1!!")</script>';
                echo "<script>window.location.href='home.php';</script>"; 
              }else{
                echo "<script>window.location.href='home.php';</script>";
              }
            }else if($weight>=50){
              $sql='insert into blooddonor (name,gender,weight,contact,bloodtype,age,city) values 
              ("'.$name.'","'.$gender.'","'.$weight.'","'.$phno.'","'.$bloodgrp.'","'.$age.'","'.$city.'");';
              $query_run=mysqli_query($con,$sql);
              if(!$query_run){
                echo '<script type="text/javascript">alert("Database Error 2!!")</script>';
                echo "<script>window.location.href='home.php';</script>"; 
              }else{
                echo "<script>window.location.href='home.php';</script>";
              }
            }else{
                echo '<script type="text/javascript">alert("UNDERWEIGHT,CANNOT DONATE!!")</script>';
                echo "<script>window.location.href='home.php';</script>";
            }
          }

      }
    }else{
      echo '<script type="text/javascript">alert("ONE CAN DONATE ONCE EVERY 3 MONTH ONLY!!!")</script>';
      echo "<script>window.location.href='home.php';</script>";
    }
  }


?>

</body>
</html>