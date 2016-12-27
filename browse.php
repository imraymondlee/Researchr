<?php
	session_start();
	include_once("../../dbConnection.php");

//Placement of content depending on sorting
	if(isset($_POST["sortBy"])){
		$val = $_POST["sortBy"];
		if($val == "newest"){
			$browseQuery = "SELECT * FROM postings ORDER BY datePosted DESC";

		}else if($val == "oldest"){
			$browseQuery = "SELECT * FROM postings ORDER BY datePosted ASC";


		}else if($val == "highestPay"){
			$browseQuery = "SELECT * FROM postings ORDER BY pay DESC";


		}else if($val == "lowestPay"){
			$browseQuery = "SELECT * FROM postings ORDER BY pay ASC";
		}
	}else{
		$browseQuery = "SELECT * FROM postings ORDER BY datePosted DESC";
	}

	$browseRes = mysqli_query($connection,$browseQuery);
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Researchr - Browse</title>
        
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
            <h2>BROWSE</h2>
        </div>
        
        <div class = "grid">
<!--            Post a listing. TO DO: Create page to create listings-->
            <div class = "col-1of2 alignleft">
<!--				Create post when logged in or not-->
				<?php
					if(isset($_SESSION['valid_user']) && !empty($_SESSION['valid_user'])) {
						echo"<a href = 'create_post.php' class = 'browseButton'>Post</a>";
					}else{
						echo"<a href = 'login.php' class = 'browseButton'>Log In to Post</a>";
					}
				?>
				
            </div>
        
            <div class = "col-1of2 alignright">
<!--                Sort current listings-->
                <form action='' method = 'post'>
                    <label for = "sortBy" class = "sortByLabel" >Sort By:</label>
                    <select name="sortBy">
                        <option value="newest">Newest</option>
                        <option value="oldest">Oldest</option>
                        <option value="highestPay">Highest Pay</option>
                        <option value="lowestPay">Lowest Pay</option>
                    </select>
                    <input type = "submit" name = "submit" value = "Submit" class = "browseButton sortBy"/>  
                </form>
            </div>
        </div>
        
        <div class = "col-1of1">
            <?php
//Displaying the table
                echo "<table border=1 frame=hsides rules=rows>";
                	while($row = mysqli_fetch_array($browseRes)){
						echo "<tr>";
						echo "<td><a href='post.php?postID=".$row['postingID']."'>".$row['title']."</a></td>";
						echo "<td> <strong>Date Posted: </strong>"
							.$row['datePosted'].
							"</td>";
						echo "<td> <strong>Pay: </strong>$"
							.$row['pay'].
							"</td>";
						echo "</tr>";
					}
            	echo"</table>";
            ?>
        </div>
    </body>

</html>