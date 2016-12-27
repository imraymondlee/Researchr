<?php
	// Require codebird
	require_once('codebird-php/src/codebird.php');
	// Require authentication parameters
	require_once('twitter_config.php');
	include("../../dbConnection.php");
	
	// Set connection parameters and instantiate Codebird	
	\Codebird\Codebird::setConsumerKey($consumer_key, $consumer_secret);
	$cb = \Codebird\Codebird::getInstance();
	$cb->setToken($access_token, $access_token_secret);
	
	$reply = $cb->oauth2_token();
	$bearer_token = $reply->access_token;
	
	// App authentication
	\Codebird\Codebird::setBearerToken($bearer_token);
		


//	Seeing if request on home page, if so grab from researchr's social media
	$serverURI = $_SERVER['REQUEST_URI'];
	$homeURI = '/researchr/';
	$indexURI = '/researchr/index.php';

	if($serverURI == $homeURI || $serverURI == $indexURI){
		$userID = 38;
	}else{
		$userID = $_GET['userID'];
	}


//Grab username from DB
	$accountsQuery = "SELECT * FROM profiles WHERE userID = $userID";
	$accountsRes = mysqli_query($connection,$accountsQuery);
	$accountsRow = mysqli_fetch_array($accountsRes);
	$twitterUser = $accountsRow["twitter"];

	// Create query
	$params = array(
		'screen_name' => $twitterUser,	
		'count' => 5
	);	
		
	// Make the REST call
	$res = (array) $cb->statuses_userTimeline($params);
	// Convert results to an associative array
	$data = json_decode(json_encode($res), true);
		
	// Optionally, store results in a file
//	file_put_contents("single_mu.json", json_encode($res));
	
?>
 
<html>
	<head>
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/grid.css">
	</head>
	
	<body>
		<div class="col-1of1 twitterInfo">
			<?php
//				echo "<img src=\"".$data['0']['user']['profile_image_url']."\"/><br/>"; //getting the profile image
				echo "<a href = 'https://twitter.com/".$params['screen_name']."'>@".$params['screen_name']."</a> <br/>"; //getting the username
				echo "Tweets: ".$data['0']['user']['statuses_count']."<br/>"; //number of updates
				echo "Follower: ".$data['0']['user']['followers_count']."<br/>"; //number of followers
				echo "Following: ".$data['0']['user']['friends_count']."<br/>"; // following
			?>
		</div>
		
		<div class="col-1of1 alignleft">
			<?php
				foreach ($data as $item){
					echo "<div style=\"height: 1px; width: 100%; background-color: rgb(86,152,251);\"></div>";
					echo '<p>';
					echo $item['text'];
					echo '<br/>';
					echo "<a href = 'https://twitter.com/".$params['screen_name']."/status/".$item['id_str']."'>".$item['created_at']."</a> <br/>";
					if(!empty($item['entities']['media']['0']['media_url'])){
						echo "<img src=\"".$item['entities']['media']['0']['media_url']."\" width=\"250\" height=\"250\"/>"; //getting the profile image
					}
					echo '</p>';
				}
			?>
		</div>
	</body>
</html>