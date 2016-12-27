<?php
	session_start();
	include_once("../../dbConnection.php");
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Researchr - Creator</title>
        
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
            <h2>Creator</h2>
        </div>

		<div class = 'col-1of1 alignleft'>
			<h3>Raymond Lee</h3>
			<p>
				Raymond Lee is an Interactive Arts and Technology student at Simon Fraser University with a concentration in interactive systems. His concentration focuses on the interaction between users and systems, specifically on how to design, develop, and implement it with software applications. From this, he hopes to become a full-stack developer as he has skills with working with the front-end and is currently learning the back-end. His inspiration for RESEARCHR was from the number of ads out there looking for research participants, but there wasn't an effective way to deliver the message. 
			</p>
		</div>
		
		<div class = 'col-1of1'>
			<a href = 'about.php' class = 'browseButton'>About</a>
			<a href = 'technical_details.php' class = 'browseButton'>Technical Details</a>
		</div>
    </body>

</html>