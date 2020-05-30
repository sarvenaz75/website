<html>
<head>
<link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


body, html {
    height: 100%;
    margin: 0;
}

.bg {
    /* The image used */
    background-image: url("SARVIIII.jpg");
	

    /* Full height */
    height: 100%; 
    eg);
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

* {
	box-sizing : border-box;
}
body {
	margin: 0;
}








.navbar {
	overflow: hidden;
	background-color: inherit;
	font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
	float : right;
	font-size : 16px;
	
	color : white;
	text-align : center;
	padding : 14px 16px;
	text-decoration : none;
}


.navbar a:hover {
	background-color:#ff3385;
}




.searchbar {
	 position: absolute;
	background-color : black;
	border : 2px solid black;
	border-top-left-radius: 25px;
	border-bottom-left-radius : 25px;
	border-top-right-radius: 25px;
	border-bottom-right-radius : 25px;
	height : 52px;
	width : 330px;
	top: 350px;
    left: 800px;
}



.searchbtn {
	position : absolute;
	top : 350px;
	left : 1070px;
	background-color: inherit;
    color: black;
    padding: 15px 20px;
    border: 1px solid pink;
    cursor: pointer;
    height : 51px;
    opacity: 0.9;
	
	font-size: 17px;
	font-weight: bold;
	 font-family: Arial, Helvetica, sans-serif;
	 border-top-right-radius: 25px;
	
	border-left-color : #ff0066;
	border-top-style: none;
	border-bottom-style: none;
	border-right-style: none;
}

.bg input[type=text] {
	color : white ;
	text-indent: 20px;
}



.icon {
	color : #ff0066;
}

.java{
position : absolute;
	top : 200px;
	left : 200px;
	background-color: #ff0066;
    color: black;
    padding: 15px 20px;
    border: 4px solid black;
    cursor: pointer;
    
    opacity: 0.9;
	box-shadow : 0 4px 8px 0 #000000;
	font-size: 100px;
	font-weight: bold;
	 font-family: Arial, Helvetica, sans-serif;
	 border-radius : 50%;
	 width : 30%;
	 height : 60%;
}

.cplus{
position : absolute;
	top : 50px;
	left : 50px;
	background-color: #ff0066;
    color: black;
    padding: 15px 20px;
    border: 4px solid black;
    cursor: pointer;
    
    opacity: 0.9;
	box-shadow : 0 4px 8px 0 #000000;
	font-size: 150px;
	font-weight: bold;
	 font-family: Arial, Helvetica, sans-serif;
	 border-radius : 50%;
	 width : 30%;
	 height : 60%;
}

.cplus:hover {
	background-color:#99003d;
}

.java:hover {
	background-color : #99003d;
}


.searcherror {
	color: #ff0066;
    position : absolute;
	left : 850px;
	top : 430px;
}

input:focus {
  
  outline: none;
  border: 2px solid #b5b5b5;
  
  
}


</style>
</head>

<body>

<?php
session_start();
$searcherror = "";

if(isset($_POST['go'])){
$username = $_SESSION['username'];


	
	
$inputsearch = $_POST['search'];

    if(empty($inputsearch)){
		$searcherror = "";
	}
	else{
	$connection = mysqli_connect('localhost' , 'root' , '', 'website') or die(mysqli_error());
	    mysqli_select_db($connection , "website") or die("can not select database");
				
		if($connection){
			$query = mysqli_query($connection ,"SELECT * FROM users WHERE username = '".$username."'");
			$numOfRows = mysqli_num_rows($query);
				if($numOfRows != 0){
					while($row = mysqli_fetch_assoc($query)){
						$dbusername = $row['username'];
						$dbcourse = $row['course'];
						
					}
					if($dbcourse == $inputsearch ){
					    if($inputsearch == "java"){
							header("Location: http://localhost:8080/project/javapage.php");
                        }
						if($inputsearch == "c++"){
							header("Location: http://localhost:8080/project/cpage.php");
						}
						
						
								 
					}
					else {
						$searcherror = "you haven't registered in this course";
					}
				}
			}
			else {
				echo "cannot connect to database";
			}
			
		}
}
		
 if(isset($_POST['subjava'])){
	 $username = $_SESSION['username'];


	

	$connection = mysqli_connect('localhost' , 'root' , '', 'website') or die(mysqli_error());
	    mysqli_select_db($connection , "website") or die("can not select database");
				
		if($connection){
			$query = mysqli_query($connection ,"SELECT * FROM users WHERE username = '".$username."'");
			$numOfRows = mysqli_num_rows($query);
				if($numOfRows != 0){
					while($row = mysqli_fetch_assoc($query)){
						$dbusername = $row['username'];
						$dbcourse = $row['course'];
						
					}
					if($dbcourse == "java" ){
					    
							header("Location: http://localhost:8080/project/javapage.php");
					}
                        
					else{
						header("Location: http://localhost:8080/project/javaerror.php");
						
						
								 
					}
					
				
			}
		}
			else {
				echo "cannot connect to database";
			}
			
		
 }

 
 if(isset($_POST['subc'])){
	 $username = $_SESSION['username'];


	

	$connection = mysqli_connect('localhost' , 'root' , '', 'website') or die(mysqli_error());
	    mysqli_select_db($connection , "website") or die("can not select database");
				
		if($connection){
			$query = mysqli_query($connection ,"SELECT * FROM users WHERE username = '".$username."'");
			$numOfRows = mysqli_num_rows($query);
				if($numOfRows != 0){
					while($row = mysqli_fetch_assoc($query)){
						$dbusername = $row['username'];
						$dbcourse = $row['course'];
						
					}
					if($dbcourse == "c++" ){
					    
							header("Location: http://localhost:8080/project/cpage.php");
					}
                        
					else{
						header("Location: http://localhost:8080/project/cerror.php");
						
						
								 
					}
					
				
			}
		}
			else {
				echo "cannot connect to database";
			}
			
		
 }

 
 
?>


<div class="bg">
<form action="homepage.php" method = "POST">





<div class="navbar">
    
	<a href="http://localhost:8080/project/login.php" target = "_blank">Log out</a>
	
	
</div>


	<input type="text" class="searchbar" placeholder="   what are you looking for ? " name = "search">


	<button type="submit" class="searchbtn" name="go"><i class="fa fa-search icon"></i></button>
	
	<div class="searcherror"> <?php  echo $searcherror;?></div>
	
	<button type="submit" class="java" name="subjava">java</button>
    <button type="submit" class="cplus" name="subc">C++</button>
	</form>
	</div>





</body>
</html>
