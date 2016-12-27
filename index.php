<?php
	session_start();
	include_once("../../dbConnection.php");

?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Researchr</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/grid.css">
		<script type="text/javascript" src="jquery-1.11.3.min.js"> </script>
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

		<div class = 'col-1of1 homeBackground homeText'>
			<h1>RESEARCHR</h1>
			<strong>Linking Researchers and Participants</strong>
			
			
		</div>
	</body>
</html>