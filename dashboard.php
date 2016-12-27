<?php
	session_start();
	include_once("../../dbConnection.php");

	$sessionUser = $_SESSION['valid_user'];

	if(isset($_POST['submitAccount'])){
		$telForm = $_POST["phoneNumber"];
		$emailForm = $_POST["email"];
		$passwordForm = $_POST["password"];
		$passwordC = $_POST["passwordC"];
		
		
		$passMin = 8;
		$phoneLength = 10;

//		Validating all forms are fileld in
		if(!isset($telForm) || empty($telForm) || !isset($emailForm) || empty($emailForm)|| !isset($passwordForm) || empty($passwordForm) || !isset($passwordC) || empty($passwordC)){
			echo"<script> alert('Please fill in all Update Account fields');
					  window.location.href='dashboard.php';
				</script>";
		}
//Password Length Validation
		 elseif(strlen($passwordForm) < $passMin){
			echo"<script> alert('Please enter a password greater than 8 characters.');
					  window.location.href='dashboard.php';
				</script>";

		}
//Phone Number Length Validation
		 elseif(strlen($telForm) != $phoneLength){
			echo"<script> alert('Please enter a correct phone number.');
					  window.location.href='dashboard.php';
				</script>";
		}else{
			$accountQuery = "UPDATE accounts SET phoneNumber = '$telForm', email = '$emailForm', password = sha1('$passwordForm') WHERE userID = '$sessionUser'";
			$accountRes = mysqli_query($connection,$accountQuery);

			echo"<script> alert('Account Updated');
			  window.location.href='index.php';
			</script>";
		}
	}

//Update Bio
	if(isset($_POST['submitBio'])){
		$bio = $_POST["bio"];
		if(!isset($bio) || empty($bio)){
			echo"<script> alert('Please fill in all Update Profile fields.');
			</script>";
		}else{
			$profileQuery = "UPDATE profiles SET biography = '$bio' WHERE userID = '$sessionUser'";
			$profileRes = mysqli_query($connection,$profileQuery);

			echo"<script> alert('Profile Updated');
			  window.location.href='index.php';
			</script>";
		}
	}

//Link Twitter and Flickr
	if(isset($_POST['linkTwitter'])){
		$twitter = $_POST["twitter"];
		if(!isset($twitter) || empty($twitter)){
			echo"<script> alert('Please fill in all Twitter fields.');
			</script>";
		}else{
			$twitterQuery = "UPDATE profiles SET twitter = '$twitter' WHERE userID = '$sessionUser'";
			$twitterRes = mysqli_query($connection,$twitterQuery);

			echo"<script> alert('Twitter Linked');
			  window.location.href='index.php';
			</script>";
		}
	}

	if(isset($_POST['linkFlickr'])){
		$flickr = $_POST["flickr"];
		if(!isset($flickr) || empty($flickr)){
			echo"<script> alert('Please fill in Flickr fields.');
			</script>";
		}else{

//			Translating Flickr Username to Flickr ID
			$api_key = "fc1f8264b9088b1a72ff4b2882903391";
			$findUsername_url = "https://api.flickr.com/services/rest/?method=flickr.people.findByUsername&api_key=$api_key&username=$flickr";
			$xmlFileData = file_get_contents($findUsername_url);
			$xmlData = new SimpleXMLElement($xmlFileData);
			$flickrID = $xmlData->user['id'];
			
//			Query ID into DB
			$flickrQuery = "UPDATE profiles SET flickrID = '$flickrID' WHERE userID = '$sessionUser'";
			$flickrRes = mysqli_query($connection,$flickrQuery);

			echo"<script> alert('Flickr Linked');
			  window.location.href='index.php';
			</script>";
		}
	}

//My Postings
	$postingsQuery = "SELECT * FROM postings WHERE userID = '$sessionUser'";
	$postingsRes = mysqli_query($connection,$postingsQuery);



//	mysqli_close($connection);
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Researchr - Dashboard</title>
        
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
            <h2>DASHBOARD</h2>
        </div>
	
		<div class = "col-1of1">
			<h3>Update Account</h3>
			<form action = "" method = "post">
				<label for = "tel">Phone Number:</label>
				<input type = "tel" name = "phoneNumber" value = ""/> <br />

				<label for = "email">Email:</label>
				<input type = "email" name = "email" value = ""/> <br />

				<label for = "password">New Password:</label>
				<input type = "password" name = "password" value = ""/> <br />
				
				<label for = "passwordC">Confirm Password:</label>
				<input type = "password" name = "passwordC" value = ""/> <br />

				<input type = "submit" name = "submitAccount" value = "Update Account" class = "submitButton"/>
			</form>
			
			
			<h3>Update Profile</h3>
			<form action = "" method = "post">
				<div class = "col-1of1">
					<label for = "bio">Biography</label>
					<textarea name = "bio" rows = 10 cols = 70></textarea> <br />
				</div>
				<input type = "submit" name = "submitBio" value = "Update Biography" class = "submitButton"/>
			</form>
			
			<div class ="col-1of2">
				<form action = "" method = "post">
					<label for = "twitter">Twitter:</label>
					<input type = "twitter" name = "twitter" value = ""/> <br />

					<input type = "submit" name = "linkTwitter" value = "Link Twitter" class = "submitButton"/>
				</form>
			</div>
			
			<div class ="col-1of2">
				<form action = "" method = "post">
					<label for = "flickr">Flickr:</label>
					<input type = "flickr" name = "flickr" value = ""/> <br />

					<input type = "submit" name = "linkFlickr" value = "Link Flickr" class = "submitButton"/>
				</form>
			</div>
				
			<h3>My Postings</h3>
			<div class = 'col-1of1'>
				<?php
					echo "<table border=1 frame=hsides rules=rows>";

					while($row = mysqli_fetch_array($postingsRes)){
						echo "<tr>";
						echo "<td><a href='post.php?postID=".$row['postingID']."'>".$row['title']."</a></td>";
						echo "<td><a href='applications.php?postID=".$row['postingID']."'>Applications</a></td>";
						echo "<td>
							<form action = '' method = 'post'>
								<input type='hidden' name='id' value=$row[0] />
								<input type = 'submit' name = 'delete' value = 'Delete' class = 'deleteButton'/>    
							</form>
							</td>";							

						echo "</tr>";
					}

					if(isset($_POST['delete'])){
						$delID=($_POST['id']);
						$deleteQuery = "DELETE FROM postings WHERE postingID = $delID";
						$deleteQuery = mysqli_query($connection,$deleteQuery);

						echo"<script> alert('Deleted');
							window.location.href='index.php';
						</script>";
					}
					echo "</table>";
				?>
			</div>

		</div>
		

		
		
		
    
    </body>

</html>