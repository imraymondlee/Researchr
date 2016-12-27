<?php
	session_start();
	include_once("../../dbConnection.php");


//	IF IT IS NOT EMPTY DO THIS
	$sessionUser = $_SESSION['valid_user'];


	if(isset($_POST['submit'])){
		$title = $_POST["title"];
		$location = $_POST["location"];
		$pay = $_POST["pay"];
		$bodyText = $_POST["body"];

//		Validating all forms are fileld in
		if(!isset($title) || empty($title) || !isset($location) || empty($location) || !isset($pay) || empty($pay)|| !isset($bodyText) || 				empty($bodyText)){
				echo"<script> alert('Please Fill in All Information');
				</script>";
		}else{
//			All forms are filled in and are submitted
			$query = "INSERT INTO postings VALUES ($connection->insert_id, '$sessionUser', '$title', '$location', '$pay', CURRENT_DATE(), 					'$bodyText')";
			$result = mysqli_query($connection,$query);
			echo"<script> alert('Posted');
				 window.location.href='index.php';
				 </script>";
		}
	}
	mysqli_close($connection);
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Researchr - Post</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/grid.css">
    </head>
    
    <body>
        <header>
<!--            Navigation Bar. Logged in an non logged in users will have a different nav bar-->
            <nav>
				<?php
					if(isset($_SESSION['valid_user']) && !empty($_SESSION['valid_user'])) {
						$sessionUser = $_SESSION['valid_user'];	
						echo "
							<div class = 'homeButton'>
								<a href = 'index.php'>RESEARCHR</a>
							</div>
							<a href = 'about.php'>About</a>
							<a href = 'dashboard.php'>Dashboard</a>
							<a href = 'profile.php?userID=$sessionUser'>Profile</a>
							<a href = 'browse.php'>Browse</a>
							<a href = 'logout.php'>Log Out</a>
						";
					}else{
						echo "
							<div class = 'homeButton'>
								<a href = 'index.php'>RESEARCHR</a>
							</div>
							<a href = 'about.php'>About</a>
							<a href = 'browse.php'>Browse</a>
							<a href = 'login.php'>Log In</a>
							<a href = 'register.php'>Register</a>
						";
					}
				?>
			</nav>
        </header>

        <div class = "col-1of1">
            <h2>Create Post</h2>
        </div>
        
        <form action = "" method = "post">
				<div class = "col-1of4">
                	<label for = "title" class = "titleLabel">Title</label>
                	<input type = "text" name = "title" value = ""/> <br />
				</div>
			
				<div class = "col-1of4">
					&nbsp
				</div>
				
				<div class = "col-1of4">
			    	<label for = "location" class = "locationLabel">Location</label>
                	<input type = "text" name = "location" value = "" class = "locationInput"/> <br />
				</div>
			
				<div class = "col-1of4">
					<label for = "pay">Pay</label>
                	<input type = "text" name = "pay" value = "" class = "payInput"/> <br />
				</div>
			
				<div class = "col-1of1">
				<label for = "body">Body Text</label>
				<textarea name = "body" rows = 20 cols = 80></textarea> <br />
					
				<input type = "submit" name = "submit" value = "Submit" class = "submitButton"/>    
				</div>
       </form>
    </body>

</html>