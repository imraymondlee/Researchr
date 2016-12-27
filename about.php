<?php
	session_start();
	include_once("../../dbConnection.php");
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Researchr - About</title>
        
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
            <h2>About</h2>
        </div>
		

		<div class = 'col-1of1 alignleft'>
			<p>
				RESEARCHR is a system designed to allow researchers to seek for participants for their studies, and for participants to look for studies to participate in. Users will have their own profile, which they can link their social media services for others to see. When researchers post their ad to seek for participants, they can specify the compensation for them upon completing the study. Partcipants are able to apply through various ads and view/post comments for the ad. When researchers look through the list of applicants, they are able to view the application containing a message, the applicant's contact method, and the applicant's profile.
			</p>
			
		</div>
		
		<div class = 'col-1of1'>
			<a href = 'creator.php' class = 'browseButton'>Creator</a>
			<a href = 'technical_details.php' class = 'browseButton'>Technical Details</a>
		</div>
    </body>

</html>