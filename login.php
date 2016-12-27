<?php
//force HTTPS for the form submission if not set already
	if($_SERVER["HTTPS"] != "on") {
		header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit;
	}

	session_start();
	include_once("../../dbConnection.php");


	if(isset($_POST['submit'])){
		$emailForm = $_POST["emailForm"];
		$passwordForm = sha1($_POST["passwordForm"]);
		$query = "SELECT * FROM accounts WHERE email = \"$emailForm\"";
		$res = mysqli_query($connection,$query);
		$row = mysqli_fetch_array($res);

//		Form Validation
		if(!isset($emailForm) || empty($emailForm) || !isset($passwordForm) || empty($passwordForm)){
			echo"<script> alert('Please Enter Login Information');
			</script>";
		}else{
//			Login Validation
			if($row['password']==($passwordForm)){
				$_SESSION['valid_user'] = $row['userID'];
				echo"<script> alert('Logging In');
						  window.location.href='index.php';
					</script>";
			}else{
				echo"<script> alert('Incorrect Login Information');
				</script>";
			}
		}
	}
	mysqli_close($connection);
?>


<html>
    <head>
        <meta charset = "utf-8">
        <title>Researchr - Log In</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/grid.css">
    </head>

    
    <body>
        <header>
<!--            Navigation Bar. TO DO: Visitors will not be able to see Profile and Log Out. Logged In members will not see Login and Register-->
            <nav>
				<div class = 'homeButton'>
					<a href = 'index.php'>RESEARCHR</a>
				</div>
				<a href = 'about.php'>About</a>
                <a href = "browse.php">Browse</a>
                <a href = "login.php">Log In</a>
                <a href = "register.php">Register</a>
            </nav>
        </header>
        
        <div class = "col-1of1">
            <h2>LOG IN</h2>
<!--LOGIN FORM-->
            <form action = "login.php" method = "post">
                <label for = "emailForm">Email:</label>
                <input type = "email" name = "emailForm" value = ""/> <br />
                <label for = "passwordForm">Password:</label>
                <input type = "password" name = "passwordForm" value = ""/> <br />
                <input type = "submit" name = "submit" value = "Log In" class = "submitButton"/>    
            </form>
        </div>

        
    
    </body>

</html>