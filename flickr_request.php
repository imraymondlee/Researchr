<?php
	include_once("../../dbConnection.php");
	$api_key = "fc1f8264b9088b1a72ff4b2882903391";
	
//	Seeing if request on home page, if so grab from researchr's social media
	$serverURI = $_SERVER['REQUEST_URI'];
	$homeURI = '/researchr/';
	$indexURI = '/researchr/index.php';

	if($serverURI == $homeURI || $serverURI == $indexURI){
		$userID = 38;
	}else{
		$userID = $_GET['userID'];
	}


	$flickrIDQuery = "SELECT * FROM profiles WHERE userID = '$userID'";
	$flickrIDRes = mysqli_query($connection,$flickrIDQuery);
	$flickrIDRow = mysqli_fetch_array($flickrIDRes);
	$flickrID = $flickrIDRow["flickrID"];

	$getPhotos_url = "https://api.flickr.com/services/rest/?method=flickr.people.getPhotos&api_key=$api_key&user_id=$flickrID&per_page=4";

	$xmlFileData = file_get_contents($getPhotos_url);
	$xmlData = new SimpleXMLElement($xmlFileData);

//	echo "<table>";
//	echo "<tr>";
//	$rowCounter = 0;
//	foreach($xmlData->photos->photo as $photo){
//		$photoID = $photo['id'];
//		$secret = $photo['secret'];
//		$server = $photo['server'];
//		$farm = $photo['farm'];
//		
//		if($rowCounter == 3){
//			echo "</tr>";
//			echo "<tr>";
//			$rowCounter = 0;
//			
//			echo "<td class = 'borderlessTD'>";
//				$imgSrc = "https://farm".$farm.".staticflickr.com/".$server."/".$photoID."_".$secret."_m.jpg";
//				$imgURI = "https://www.flickr.com/photos/".$flickrID."/".$photoID;
//				echo "<a href=".$imgURI."><img src=$imgSrc></a>";
//			echo "</td>";
//			
//		}else{
//			echo "<td class ='borderlessTD'>";
//				$imgSrc = "https://farm".$farm.".staticflickr.com/".$server."/".$photoID."_".$secret."_m.jpg";
//				$imgURI = "https://www.flickr.com/photos/".$flickrID."/".$photoID;
//				echo "<a href=".$imgURI."><img src=$imgSrc></a>";
//			echo "</td>";			
//		}
//		$rowCounter ++;
//	}
//	echo "</tr>";
//	echo "</table>";
//	
//	echo "<a href='https://www.flickr.com/photos/$flickrID'>View more on Flickr</a>";



?>

<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type: "GET",
			dataType: "xml",
			url: "<?php echo $getPhotos_url ?>",
			success: parseXML
		});
		function parseXML(xml){
			$(xml).find("photo").each(function(){
				$("div#output").append("<img src='" + "https://farm" + $(this).attr("farm") + ".static.flickr.com/" +
				$(this).attr("server") + "/" + $(this).attr("id") + "_" + $(this).attr("secret") + "_m.jpg" + "'><br /> <br />");
			});
		}		
	});
</script>
<div id="output"></div>
