<?php
	session_start();
	include_once("../../dbConnection.php");


	if(isset($_SESSION['valid_user']) && !empty($_SESSION['valid_user'])) {
		$sessionUser = $_SESSION['valid_user'];
	}

	$postID = $_GET['postID'];

	$postingQuery = "SELECT * FROM postings WHERE postingID = '$postID'";
	$postingRes = mysqli_query($connection,$postingQuery);
	$postingRow = mysqli_fetch_array($postingRes);
	$title = $postingRow["title"];
	$location = $postingRow["location"];
	$pay = $postingRow["pay"];
	$datePosted = $postingRow["datePosted"];
	$bodyText = $postingRow["bodyText"];
	$userID = $postingRow["userID"];

	$posterQuery = "SELECT * FROM accounts WHERE userID = '$userID'";
	$posterRes = mysqli_query($connection,$posterQuery);
	$posterRow = mysqli_fetch_array($posterRes);
	$poster = $posterRow["name"];

?>

<html>
    <head>
        <meta charset = "utf-8">
		<?php
			echo"<title>Researchr - $title</title>";
		?>
        
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
					<h3>$title</h3>
					
					<div class = 'col-1of4'>
						<strong>Location: </strong>
						$location
					</div>
					
					<div class = 'col-1of4'>
						<strong>Pay: </strong>
						$
						$pay
					</div>
					
					<div class = 'col-1of4'>
						<strong>Date Posted: </strong>
						$datePosted
					</div>

					<div class = 'col-1of4'>
						<strong>Posted By: </strong>
						<td><a href='profile.php?userID=".$userID."'>".$poster."</a></td>
					</div>
					
					<div class = 'col-1of1 alignLeft'>
						$bodyText
					</div>
				";

				

			
			
				if(isset($_SESSION['valid_user'])){
					echo"
						<h3>Apply</h3>
						
						<form action = '' method = 'post'>
							<label for = 'message'>Message to Apply</label>
							<textarea name = 'message' rows = 10 cols = 70></textarea> <br />

							<div class = 'col-1of1'>
								<label for = 'contactMethod'>Contact Method</label>
								<input type='radio' name='contactMethod' value='email'>Email <br />
								<input type='radio' name='contactMethod' value='phone'>Phone <br />
							</div>
							
							<input type = 'submit' name = 'submitApplication' value = 'Submit' class = 'submitButton'/>
						</form>
					";
					
					if(isset($_POST['submitApplication'])){
						$message = $_POST["message"];
						$contactMethod = $_POST["contactMethod"];
						
						$query = "INSERT INTO applications VALUES ($connection->insert_id, '$postID', '$sessionUser', CURRENT_DATE(), '$contactMethod', '$message')";
						$result = $connection->query($query);
						
						echo"<script> alert('Submitted');
							window.location.href='index.php';
						</script>";
					}
				}
			?>
			
        </div>
		
		<div class = 'col-1of1'>
			<h3>Comments</h3>
			
			
			<script type="text/javascript" src="jquery-1.11.3.min.js"> </script>
			<script>
			var postID = "<?php echo $postID ?>"; 
			
//				AUTOMATIC UPDATE COMMENTS
			$(document).ready(function() {
				setInterval(load, 1000);
//				$("#display").click(function() {        
				function load() {  
				 	$.ajax({    //create an ajax request to load_page.php
						type: "GET",
						url: "comments.php?postID="+postID,             
						dataType: "html",   //expect html to be returned                
						success: function(response){                    
							$("#responsecontainer").html(response); 
						}
					});
				};
			});
			</script>	
			
<!--			<input type="button" id="display" value="Display Comments" class = "browseButton"/>-->
			<div id="responsecontainer" align="center">
			</div>
			
			
			<?php
			//Allowing members to comment
				if(isset($_SESSION['valid_user'])){
					echo"
						<form action = '' method = 'post'>
							<textarea name = 'comment' rows = 5 cols = 60></textarea> <br />
							<input type = 'submit' name = 'post' value = 'Post' class = 'submitButton'/>    
						</form>
					";
				}

				if(isset($_POST['post'])){
					$comment = $_POST["comment"];

					$commentQuery = "INSERT INTO comments VALUES ($connection->insert_id, '$postID', '$sessionUser', CURRENT_DATE(), '$comment')";
					$commentResult = mysqli_query($connection,$commentQuery);
					echo"<script> alert('Posted');
						window.location.href='post.php?postID=$postID';
					</script>";
				}	
			?>
		</div>
		
    
    </body>

</html>