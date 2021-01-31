<?php
    session_start();
    if(!isset($_SESSION['username'])){
        echo "<script>window.location.href='../index.php;'</script>";
    }
    $username=$_SESSION['username'];
    require_once('../dbconfig/config.php');
?>
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>DONATE BLOOD</title>
	<link rel="stylesheet" type="text/css" href="../css/request.css"> 
<style>

body{
 background-image:url("../images/bg1.png");
 background-size:cover;
 }
 a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: none;
}

a:active {
  text-decoration: none;
}
a:link {
  color:black;
}

a:visited {
  color: black;
}

a:hover {
  color: black;
}

a:active {
  color: black;
}

.header {
    height: 50vh
    background-color: black;
    justify-contents: center;
    align-items: center;
    
}
 
.result {
    background: rgba(0,0,0,0.5);
    padding-bottom: 350px;
    padding-top: 50px;
    margin: 0;
 }

h1{
    color: #fff;
    margin-bottom: 70px;
    font size: 30px;
    letter-spacing: 2px; 
    text-align: center;
    margin: 0; 

}
h2{
    color: #fff;
    margin-bottom: 70px;
    font size: 30px;
    letter-spacing: 5px; 
    text-align: center;
    margin: 10px;
    

}

h3{
    color: #fff;
    margin-bottom: 70px;
    font size: 40px;
    letter-spacing: 5px; 
    text-align: center;

}

.search-field{
    height: 50px;
    width:  145px;
    border: none;
    border-radius: 10px;
    padding-left:20px;
    
}



.bloodgroup{
    width:200px;
}

.search-button{
    height: 50px;
    width:  150px;
    background: #B2FF33;
    border: none;
    color: #000;
    border-radius: 10px;
    
    }

.search-button:hover{
    background: #33FF98;
    cursor: pointer;
}


.back-button{
	height: 50px;
    width:  100px;
    background: #B2FF33;
    border: none;
    color: #000;
    border-radius: 10px;
    padding: 10px;
    float: right;
}

.back-button:hover{
    background: #33FF98;
    cursor: pointer;
}

.form-box{
    background: rgba(0,0,0,0.5);
    padding: 100px;
}

.box{
    left:38.5%;
    position: absolute;
    top: 28%;
    padding-top:10px;
}
.result_disp{
    color:white;
    font-size:20px;
    border:1px solid white;
    border-radius:10px;
    margin-right:10px;
    margin-left:10px;
    padding-bottom:4px;
}
ul li{
    display: inline-block;
    list-style:none;
    padding-left:280px;
}
 </style>	

</head>

<body>
    <div class="header">
     	<form action="request.php" method="post">
     		<div class="form-box">
     	    	<h1>REQUEST BLOOD</h1>
     	        <h2>We are here for you!</h2>
     	    	
     	    	<div class="box">
     	    		<input type="text" class="search-field bloodgroup" name="bloodgrp" placeholder="Blood Group">
     	    	    <button class="search-button" name="search" type="submit">
     	    		   Search
     	    	    </button>
     	    	</div>
     	    	<div>
     	    	   <button class="back-button"  type="button">
                    <a href="home.php">
     	    		Back
                     </a>
     	    	   </button>
     	    	</div>
     	    </div>
     	</form>
    </div>
     <?php 

     if(isset($_POST['search'])){
        $bloodgroup = $_POST['bloodgrp'];
        $sql='select * from blooddonor where bloodtype="'.$bloodgroup.'";';
        $query_run = mysqli_query($con,$sql);
        if($query_run)
				{
					if(mysqli_num_rows($query_run)>0){
                        ?>
                        <div class="result">
                         <h1>RESULT</h1>
                         <br>
                        <?php

                        while($row=mysqli_fetch_assoc($query_run)){
                            $name = $row['name'];
                            $city = $row['city'];
                            $contact = $row['contact'];
                            
                            ?>
                            <div class="result_disp">
                                <ul class="result_div">
                                    <li><?php echo $name; ?></li>
                                    <li><?php echo $city; ?></li>
                                    <li><?php echo $contact; ?></li>
                                </ul>
                            </div>
                            <?php
                        }
                        ?>
                        </div>
                        <?php

                    }else{
                        ?>
                        <br>
                        <div class="result">
     	                    <h1>NO DONOR COULD BE FOUND :c</h1>
                        </div>
                        <?php
                    }
     }else{

     }
    }
     
     ?>
</body>
</html>