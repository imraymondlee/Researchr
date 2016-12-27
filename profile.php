<?php
	session_start();
	include_once("../../dbConnection.php");


	if(isset($_SESSION['valid_user']) && !empty($_SESSION['valid_user'])) {
		$sessionUser = $_SESSION['valid_user'];
	}

	$userID = $_GET['userID'];

	$accountsQuery = "SELECT * FROM accounts WHERE userID = '$userID'";
	$accountsRes = mysqli_query($connection,$accountsQuery);
	$accountsRow = mysqli_fetch_array($accountsRes);
	$name = $accountsRow["name"];

	$profilesQuery = "SELECT * FROM profiles WHERE userID = '$userID'";
	$profilesRes = mysqli_query($connection,$profilesQuery);
	$profilesRow = mysqli_fetch_array($profilesRes);
	$bio = $profilesRow["biography"];


	$socialMedia = 1;
//	mysqli_close($connection);
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Researchr - Profile</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/grid.css">
		<script type = "text/javascript" src="jquery-1.11.3.min.js"></script>
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
<!--            Name of profile being viewed.-->
			<?php
				echo "<h3>$name</h3>";
			?>
<!--            <h3>Raymond Lee</h3>-->
        </div>
        
        <div class = "grid">
            <div class = "col-1of3">
<!--                Profile picture-->
                <img src = "img/profilePicture.png" width = "300" height = "300">

            </div>

<!--            Biography of the person-->
            <div class = "col-2of3">
				<?php
					echo "<article>$bio</article>";
				?>

            </div>
			
<!--			Show/Hide Social Media-->

			
			
			<script>
				$(document).ready(function(){
					$("button").click(function(){
						$("#socialMedia").toggle();
					});
				});
			
			</script>
			<div class = "col-1of1">
				<button class = "browseButton">Show/Hide Social Media</button>
			</div>
<!--			Social Media-->
			<div id = "socialMedia">
				<?php

					$twitterQuery = "SELECT * FROM profiles WHERE userID = $userID";
					$twitterRes = mysqli_query($connection,$twitterQuery);
					$twitterRow = mysqli_fetch_array($twitterRes);

					if($twitterRow["twitter"] != NULL){
						echo "
							<div class = 'col-1of1'>
								<h3>Twitter</h3>
						";
						include_once('codebird_tweets.php');
						echo "</div>";
					}


					$flickrIDQuery = "SELECT * FROM profiles WHERE userID = '$userID'";
					$flickrIDRes = mysqli_query($connection,$flickrIDQuery);
					$flickrIDRow = mysqli_fetch_array($flickrIDRes);

					if($flickrIDRow["flickrID"] != NULL){
						echo "
							<div class = 'col-1of1'>
								<h3>Flickr</h3>
						";
						include_once('flickr_request.php');
						echo "</div>";
					}


				?>
			</div>
        </div>
    
    </body>

</html>