<?php
    session_start();
    require_once('../dbconfig/config.php');
    if(!isset($_SESSION['username'])){
        echo "<script>window.location.href='../index.php;'</script>";
    }
    $username=$_SESSION['username'];
    $sql = 'select name from login where username="'.$username.'"';
    $query_run = mysqli_query($con,$sql);
    if(!$query_run){
        echo "error!!";
    }else{
        if(mysqli_num_rows($query_run)>0){
            while($row=mysqli_fetch_assoc($query_run)){
                $name = $row['name'];
                $sql = 'select * from user where name = "'.$name.'";';
                $query_run  = mysqli_query($con,$sql);
                if($query_run){
                    if(mysqli_num_rows($query_run)>0){
                        while($row=mysqli_fetch_assoc($query_run)){
                            $age = $row['age'];
                            $blood = $row['blood'];
                            $address = $row['address'];
                            $phone = $row['phone'];
                            $email = $row['email']; 
                        }
                    }
                }else{
                    echo "error!!";
                }
            }

        }else{
            echo "Error:name not found";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Human Care</title>
        <link rel="stylesheet" type="text/css" href="../css/propage.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <style>
            body{
                background-image: url("../images/bg1.png");
                background-size: cover;
            }
            .sidebar{
                position:absolute;
                width:20%;
                height:100%;
                background-color:black;
                background: rgba(0, 0, 0, 0.75);
                left:-10px;
                top:-3px;
                z-index:-1;
            } 
            
            .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 50px;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            }

            .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 16px;
            color: white ;
            display: block;
            transition: 0.3s;
            }

            .sidenav a:hover {
            color: #f1f1f1;
            }

            .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            }

            #main{
            transition: margin-left 0.5s;
            padding: 16px;
            }

            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
            }
            .edit_btn{
                position:absolute;
                left:100px;
                top:350px;
                background-color:red;
                color:white;
                padding:3px;
                width:80px;
                height:40px;
                border-radius:20px;
            }

        </style>
    </head>
    
    <body> 
    	
        <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="#"><?php echo $name;?></a>
                <a href="#">Age : <?php echo $age;?></a>
                <a href="#">Blood Group : <?php echo $blood;?></a>
                <a href="#">Address : <?php echo $address;?></a>
                <a href="#">Email : <?php echo $email;?></a>
                <a href="#">Phone : <?php echo $phone;?></a>
                <a href="edit.php"><button class="edit_btn"  type="button">EDIT</button></a>
        </div>
       <div id="main">
           <nav class="navbar">
            <ul>
                <li class="pro"><i class="fa fa-user" aria-hidden="true"></i> <span style="font-size:20px;cursor:pointer;margin-left:10px;" onclick="openNav()">PROFILE</span></li>
                <li><a class="userr" href="#"><?php echo $name; ?></a></li>
                <li><a class="logoutt" href="../logout.php">Logout</a></li>
            </ul>
           </nav>

           <div class="box1">
                <h2>Donate Blood</h2>
                <p>"Tears of a mother <br> cannot save her child <br> but your blood can."</p>
                <a href="donate.php"><button class="b1" type="button">Donate</button></a>
           </div>
         
           <div class="box2">
                <h2>Request Blood</h2>
                <p>"You are not alone in <br> this, we are there for <br> you."</p>
                <a href="request.php"><button class="b2" type="button">Request</button></a>
            </div>


       </div>


       
        <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        }
        </script> 
       
        
    </body>
        
</html>