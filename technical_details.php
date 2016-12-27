<?php
	session_start();
	include_once("../../dbConnection.php");
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>RESEARCHR - Creator</title>
        
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
            <h2>Technical Details</h2>
        </div>

		<div class = 'col-1of1 alignleft'>
			<p>Visitors of RESEARCHR are able to browse through current ads of research study opportunities. In addition, they are able to view  user profiles and information about the website, creator, and technical details. When registering, they input their information and it is stored in the database. The Profile page, which can be viewed by both visitors and members shows the biography of the member along with their Flickr and Twitter feeds. In addition, the Browse page shows the list of current opportunities, with the ability to sort, where they can access each individual posting page. In the posting pages, it shows a description of the study along with comments that users have posted. An account is required in order to apply and post comments.</p>
			
			<p>Upon logging in, users are able to manage their account through the Dashboard page. From here, they can update their account informaton, update their profile by adding a biography and linking social media services, or view postings they have posted along with applicants to those posts. When viewing applications, they will be able to see the message that the applicant has sent along with their preferred contact method. The profile page, which can be viewed by both visitors and members shows the biography of the member along with their Flickr and Twitter feeds. In order to post an ad, an account is required, which they can then submit information about the ad. </p>

			<p>
				This is all done through PHP where the client request the page from the server. There are then connections to the MySQL database
where user information, posts, comments, and applications are stored. Queries are ran when accessing these information and then are sent back to
				the server where it is sent to the client once formatted. Using the Flickr API, photos are grabbed from Flickr into an XML file, which is then formatted for the client. This is the same with Twitter, but their REST API is used.
			</p>
		</div>
		
		<div class = 'col-1of1'>
			<a href = 'creator.php' class = 'browseButton'>Creator</a>
			<a href = 'about.php' class = 'browseButton'>About</a>
		</div>
    </body>

</html>