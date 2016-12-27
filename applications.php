<?php
	session_start();
	include_once("../../dbConnection.php");


	$sessionUser = $_SESSION['valid_user'];
	$postID = $_GET['postID'];

	$applicationsQuery = "SELECT * FROM applications WHERE postingID = '$postID'";
	$applicationsRes = mysqli_query($connection,$applicationsQuery);


	$postingsQuery = "SELECT title FROM postings WHERE postingID = '$postID'";
	$postingsRes = mysqli_query($connection,$postingsQuery);
	$postingsRow = mysqli_fetch_array($postingsRes);
	$title = $postingsRow['title'];

?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Researchr - Applications</title>
        
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
			<?php
				echo"
					<h3> Applications: $title</h3>
				";		
				
				echo "<table border=1 frame=hsides rules=rows>
					<tr>
						<th>Date</th>
						<th>Applicant</th>
						<th>Contact</th>
						<th>Message</th>
						<th>Delete</th>
					</tr>
				";

				while($row = mysqli_fetch_array($applicationsRes)){
					$applicantID = $row['userID'];
					
					$applicantQuery = "SELECT * FROM accounts WHERE userID = '$applicantID'";
					$applicantRes = mysqli_query($connection,$applicantQuery);
					$applicantRow = mysqli_fetch_array($applicantRes);
					
					echo "<tr>";
					
					echo "<td>".$row['dateApplied']."</td>";
					echo "<td><a href='profile.php?userID=".$applicantID."'>".$applicantRow['name']."</a></td>";
					
					if($row['contactMethod'] == 'phone'){
						echo "<td>".$applicantRow['phoneNumber']."</td>";
					}else{
						echo "<td>".$applicantRow['email']."</td>";
					}
					echo "<td>".$row['message']."</td>";
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
					$deleteQuery = "DELETE FROM applications WHERE appID = $delID";
					$deleteQuery = mysqli_query($connection,$deleteQuery);
					echo"<script> alert('Deleted');
						window.location.href='index.php';
					</script>";
				}

				echo "</table>";

				mysqli_close($connection);
			?>
        </div>
		
    </body>
</html>