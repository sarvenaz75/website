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



.inputpassconfirm {
	
    position: absolute;
	background-color : #0f0f0a;
	border : 1px solid gray;
	height : 40px;
	width : 300px;
	top: 50%;
    left: 40%;

    
}

.inputuser {
	
    position: absolute;
	background-color : #0f0f0a;
	border : 1px solid gray;
	height : 40px;
	width : 300px;
	top: 30%;
    left: 40%;

    
}


.inputpass {
	
    position: absolute;
	background-color : #0f0f0a;
	border : 1px solid gray;
	height : 40px;
	width : 300px;
	top: 40%;
    left: 40%;

    
}


.submit {
	background-color: #ff0066;
    color: black;
    padding: 15px 20px;
    border: 1px solid black;
    cursor: pointer;
    width: 22%;
    opacity: 0.9;
	margin-top : 470px;
	margin-left : 40%;
	box-shadow : 0 4px 8px 0 #000000;
	font-size: 20px;
	font-weight: bold;
}


.userError {
	color: #ff0066;
    position : absolute;
	left : 850px;
	top : 210px;
}

.passError {
	color: #ff0066;
    position : absolute;
	left : 850px;
	top : 275px;
}

.confirmationError {
	color: #ff0066;
    position : absolute;
	left : 850px;
	top : 340px;
}

.bg input[type = text] , .bg input[type=password]{
	color :  #ff0066;
}

.publicerror {
	color: #ff0066;
    position : absolute;
	left : 550px;
	top : 450px;
}




</style>
</head>


<body>


<?php


$usererror = "";
$passworderror = "";
$passwordcheckerror = "";
$publicerror = "";

if(isset($_POST["subshow"])){
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$passcheck = $_POST['passwordConfirmation'];
			
			if(empty($user) || empty($pass) || empty($passcheck)){
		    if(empty($user)){
	            $usererror = "username is required";
		    }
		    if(empty($pass)){
	           $passworderror = "password is required";
		    }
			if(empty($passcheck)){
				$passwordcheckerror = "please Confirm password";
			}
		    }
			else{
			$connection = mysqli_connect('localhost' , 'root' , '', 'website') or die(mysqli_error());
	        mysqli_select_db($connection , "website") or die("can not select database");
			
			if($connection){
			
			$query = mysqli_query($connection , "SELECT * FROM users WHERE username='".$user."'");
			$numOfRows = mysqli_num_rows($query);
			if($numOfRows != 0){
				if($passcheck == $pass){
				$passquery = mysqli_query($connection , "UPDATE users SET password='$pass' WHERE username='".$user."'");
				if($passquery){
				    $publicerror =  "your password has been changed successfully ".'<a href="http://localhost:8080/project/login.php">Click here to login</a>';
					

			    }
			    else{
				    $publicerror = "Unable to change password !";
			    } 
				}
				else{
					$publicerror = "confirm password and new password do not match !";
				}
			}
            else{
				$publicerror = "username does not exist !";
			}			
			}
			else{
				echo "can not connect to database";
			}
            }
			
}



?>


<div class="bg">
<form action="" method = "POST">
 <input type="text"  class = "inputuser" placeholder="  Enter Username" name="username" >
 <span class="userError"> <?php  echo $usererror;?></span><br />
	<input type="password" class = "inputpass" placeholder="  Enter Password" name="password" >
	<span class="passError"> <?php  echo $passworderror;?></span><br />
	<input type="password" class = "inputpassconfirm" placeholder="  Confirm Password" name="passwordConfirmation" >
	<span class="confirmationError"> <?php  echo $passwordcheckerror;?></span><br />
	
	
	<div class="publicerror"> <?php  echo $publicerror;?></div><br />
    
     <button type = "submit" class = "submit" name="subshow">change my password</button>
</form>
</div>

</body>
</html>