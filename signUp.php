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

.inputemail {
	
    position: absolute;
	background-color : #0f0f0a;
	border : 1px solid gray;
	height : 40px;
	width : 300px;
	top: 38%;
    left: 40%;

    
}

.inputuser {
	
    position: absolute;
	background-color : #0f0f0a;
	border : 1px solid gray;
	height : 40px;
	width : 300px;
	top: 48%;
    left: 40%;

    
}


.inputpass {
	
    position: absolute;
	background-color : #0f0f0a;
	border : 1px solid gray;
	height : 40px;
	width : 300px;
	top: 58%;
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
	margin-top : 470px;
	margin-left : 40%;
	box-shadow : 0 4px 8px 0 #000000;
	font-size: 20px;
	font-weight: bold;
}


.text {
	color : #ff0066;
	 text-align: center;
	 position : absolute;
	 top : 190px;
	 right : 630px;
	  font-size: 30px;
	  font-weight: bold;
	  font-family: Arial, Helvetica, sans-serif;
}


.erroremail {
	color: #ff0066;
    position : absolute;
	left : 850px;
	top : 260px;
}

.erroruser {
	color: #ff0066;
    position : absolute;
	left : 850px;
	top : 330px;
}

.errorpass {
	color: #ff0066;
    position : absolute;
	left : 850px;
	top : 390px;
}

.bg input[type = text] , .bg input[type=password]{
	color :  #ff0066;
}

.texttwo {
	color : #ff0066;
	background-color: inherit;
	border : none;
	cursor: pointer;
	 text-align: center;
	 position : absolute;
	 top : 440px;
	 right : 560px;
	  font-size: 15px;
	  font-weight: bold;
	  font-style: italic
	  font-family: Arial, Helvetica, sans-serif;
}

.rad {
	color : #ff0066;
	position : absolute;
	top : 480px;
	right : 725px;
}



</style>
</head>

<body>


<?php
session_start();
$emailerror = "";
$usererror = "";
$passworderror = "";







if(isset($_POST["submit"])){
	    
	
	

        $email = $_POST['email'];
		$user = $_POST['username'];
		$_SESSION['username'] = $user;
		$pass = $_POST['password'];
		$course = $_POST['course'];
		
	    if(empty($email) || empty($user) || empty($pass)){
        if(empty($email)){
	       $emailerror = "email is required";
		}
		if(empty($user)){
	       $usererror = "username is required";
		}
		if(empty($pass)){
	       $passworderror = "password is required";
		}
		}
		else{
		$connection = mysqli_connect('localhost' , 'root' , '', 'website') or die(mysqli_error());
	    mysqli_select_db($connection , "website") or die("can not select database");
				
		if($connection){
			
			
			
			
				$query = mysqli_query($connection ,"SELECT * FROM users WHERE username = '".$user."'");
				$numOfRows = mysqli_num_rows($query);
				if($numOfRows == 0){
					if($course == java){
						$course = "java";
					}
					else{
						$course = "c++";
					}
					$sql = "INSERT INTO users( email ,username , password , course) VALUES('$email', '$user' , '$pass' , '$course')";
					$result = mysqli_query($connection , $sql);
					
					if($result){
					    
						
                 		 header("Location: http://localhost:8080/project/homepage.php");
					     exit();
						
						
								 
					}
					else{
						$emailerror = "failure!";
					}
				}
				else{
					$usererror = "Username already exist!";
				}
				}
				
				else{
					$emailerror = "can not connect to database";
				}
	        
		
		
			
			
			
			
			
			
			
		}
			
		
		
}


?>

<div class="bg">
 <div class="text">Sign Up</div>
 <div class="texttwo">Which language would you like to learn?</div>
<form action="signUp.php" method = "POST">
    
    <img src="gray1.jpg" alt="Paris" class="center">
	
	
    <input type="text"  class = "inputemail" placeholder="  Enter Email" name="email" >
	<span class="erroremail"> <?php  echo $emailerror;?></span><br />
	<input type="text"  class = "inputuser" placeholder="  Enter Username" name="username" >
	<span class="erroruser"> <?php  echo $usererror;?></span><br />
	<input type="password" class = "inputpass" placeholder="  Enter Password" name="password" >
	<span class="errorpass"> <?php echo $passworderror;?></span><br />
	<div class = "rad">
	<Input type = 'Radio' name = "course" value = 'java' checked = "checked" >java
	<Input type = 'Radio' name = "course" value = 'c++' >c++
	
	</div>
    
    <button type="submit" class="btn" name="submit">Register</button>
	
 </form>
 </div>











</body>

</html>
