<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
    height: 100%;
    margin: 0;
}

.bg {
    /* The image used */
    background-image: url("SARV.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.center {
	position: absolute;
    display: block;
    margin-left: 45%;
    margin-right: auto;
	top : 5%;
    width: 10%;
	height : 20%;
	border-radius: 50%;
}


.inputuser {
	
    position: absolute;
	background-color : #0f0f0a;
	border : 1px solid gray;
	height : 40px;
	width : 300px;
	top: 40%;
    left: 40%;

    
}


.inputpass {
	
    position: absolute;
	background-color : #0f0f0a;
	border : 1px solid gray;
	height : 40px;
	width : 300px;
	top: 50%;
    left: 40%;

    
}

.btn {
	background-color: #ff0066;
    color: black;
    padding: 15px 20px;
    border: 1px solid black;
    cursor: pointer;
    width: 22%;
    opacity: 0.9;
	margin-top : 420px;
	margin-left : 40%;
	box-shadow : 0 4px 8px 0 #000000;
	font-size: 20px;
	font-weight: bold;
}

.btn:hover {opacity: 1;}

.text {
	color : #ff0066;
	 text-align: center;
	 position : absolute;
	 top : 200px;
	 right : 630px;
	  font-size: 30px;
	  font-weight: bold;
	  font-family: Arial, Helvetica, sans-serif;
}

.btntwo {
	color : #b8b894;
	background-color: inherit;
	border : none;
	cursor: pointer;
	 text-align: center;
	 position : absolute;
	 top : 380px;
	 right : 516px;
	  font-size: 15px;
	  
	  font-style: italic
}
.btntwo:hover {opacity: 0.6;}

.texttwo {
	color : #b8b894;
	background-color: inherit;
	border : none;
	cursor: pointer;
	 text-align: center;
	 position : absolute;
	 top : 540px;
	 right : 670px;
	  font-size: 15px;
	  font-weight: bold;
	  font-style: italic
	  font-family: Arial, Helvetica, sans-serif;
}



.btnthree {
	color : #b8b894;
	background-color: inherit;
	border : none;
	cursor: pointer;
	 text-align: center;
	 position : absolute;
	 top : 540px;
	 right : 570px;
	  font-size: 15px;
	  font-weight: bold;
	  font-style: italic
}

.btnthree:hover {opacity: 0.6;}

.bg input[type = text] , .bg input[type=password]{
	color : #ff1a75 ;
}

.errorusername {
	color: #ff0066;
    position : absolute;
	left : 860px;
	top : 270px;
}

.errorpassword {
	color: #ff0066;
    position : absolute;
	left : 860px;
	top : 340px;
}

.errorpublic {
	color: #ff0066;
    position : absolute;
	left : 600px;
	top : 420px;
}

</style>
</head>
<body>
<?php
session_start();

$usererror = "";
$passerror = "";
$publicerror = "";

if(isset($_POST["submit"])){
			$user = $_POST['username'];
			$_SESSION['username'] = $user;
			$pass = $_POST['password'];
			
			if(empty($user) || empty($pass)){
		    if(empty($user)){
	            $usererror = "username is required";
		    }
		    if(empty($pass)){
	           $passerror = "password is required";
		    }
		    }
			else{
			$connection = mysqli_connect('localhost' , 'root' , '', 'website') or die(mysqli_error());
	        mysqli_select_db($connection , "website") or die("can not select database");
			
			if($connection){
			
			$query = mysqli_query($connection , "SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'");
			$numOfRows = mysqli_num_rows($query);
			if($numOfRows != 0){
				while($row = mysqli_fetch_assoc($query)){
					$dbusername = $row['username'];
					$dbpassword = $row['password'];
				}
				
				if($user == $dbusername && $pass == $dbpassword){
					header("Location: http://localhost:8080/project/homepage.php");
					exit();
				}
				
			}
			else{
				$publicerror = "Invalid username or password!";
			}
			}
			else{
				echo "can not connect to database";
			}
}
}


if(isset($_POST['subsign'])){
	
	header("Location: http://localhost:8080/project/signUp.php");
}	

if(isset($_POST['subpass'])){
	header("Location: http://localhost:8080/project/forgotpass.php");
	
	
	
}
 ?>
<div class="bg">
 <div class="text">Sign in</div>
 <div class="texttwo">don't have an account?</div>
<form action="Login.php" method = "POST">
    
    <img src="nono.png" alt="Paris" class="center">
	
	
    <input type="text"  class = "inputuser" placeholder="  Enter Username" name="username" >
	<span class="errorusername"> <?php  echo $usererror;?></span><br />
	<input type="password" class = "inputpass" placeholder="  Enter Password" name="password" >
    <span class="errorpassword"> <?php  echo $passerror;?></span><br />
    <span class="errorpublic"> <?php  echo $publicerror;?></span><br />
    
    
    <button type = "submit" class = "btntwo" name="subpass">forgot password?</button>
    <button type="submit" class="btn" name="submit">Login</button>
	<button type="submit" class="btnthree" name="subsign">sign up here</button>
 </form>
 </div>
 

 
 
</body>
</html>
