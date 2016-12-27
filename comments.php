<?php
	session_start();
	include_once("../../dbConnection.php");


	if(isset($_SESSION['valid_user']) && !empty($_SESSION['valid_user'])) {
		$sessionUser = $_SESSION['valid_user'];
	}

	$postID = $_GET['postID'];

//Displaying the table
	$viewCommentQuery = "SELECT * FROM comments WHERE postingID = '$postID' ORDER BY date ASC";
	$viewCommentRes = mysqli_query($connection,$viewCommentQuery);


	echo "<div class= 'col-1of1'> <table border=1 frame=hsides rules=rows>";
		while($row = mysqli_fetch_array($viewCommentRes)){
			$userComment = $row['userID'];

			$userCommentQuery = "SELECT * FROM accounts WHERE userID = '$userComment'";
			$userCommentRes = mysqli_query($connection,$userCommentQuery);
			$userCommentRow = mysqli_fetch_array($userCommentRes);
			$commentName = $userCommentRow['name'];

			echo "<tr>";
			echo "<td><a href='profile.php?userID=".$row['userID']."'>".$commentName."</a> <br />"
				.$row['date'].
			"</td>";
			echo "<td>".$row['comment']."</td>";
			echo "</tr>";
		}
	echo"</table> </div>";


?>