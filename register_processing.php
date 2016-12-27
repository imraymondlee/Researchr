<html lang = "en">
    <head>
        <title>Register Processing</title>
		<link rel="stylesheet" href="css/main.css">
    </head>
    
    <body>
        <pre>
            <?php
				include("../../dbConnection.php");

//Grabbing POST information from registration
                $name = $_POST["name"];
                $phoneNumber = $_POST["phonenumber"];
                $email = $_POST["email"];
                $password = $_POST["password"];
				$passwordC = $_POST["passwordC"];



				$passMin = 8;
				$phoneLength = 10;

//				Checking to see if email is unique
				$uniqueQuery = "SELECT * FROM accounts WHERE email = \"$email\" LIMIT 1";

				$uniqueResult = $connection->query($uniqueQuery);
//		Validating all forms are fileld in
				if(!isset($name) || empty($name) || !isset($phoneNumber) || empty($phoneNumber) || !isset($email) || empty($email)|| !isset($password) || empty($password) || !isset($passwordC) || empty($passwordC)){
					echo"<script> alert('Please fill in all fields');
							  window.location.href='register.php';
						</script>";
				}
//Password Length Validation
				 elseif(strlen($password) < $passMin){
					echo"<script> alert('Please enter a password greater than 8 characters.');
							  window.location.href='register.php';
						</script>";
					
				}
//Phone Number Length Validation
				 elseif(strlen($phoneNumber) != $phoneLength){
					echo"<script> alert('Please enter a correct phone number.');
							  window.location.href='register.php';
						</script>";
				}
//Submit Registration
				else{
					if (mysqli_num_rows($uniqueResult) == 1){
						echo"<script> alert('This email has already been registered.');
							window.location.href='register.php';
						</script>";
					}
					else if (mysqli_num_rows($uniqueResult) != 1){
						$newUser = $connection->insert_id;
						$query = "INSERT INTO accounts VALUES ($newUser, '$name', '$phoneNumber', '$email', sha1('$password'))";
						$profileQuery = "INSERT INTO profiles VALUES ($newUser, ' ', 'placeholder', DEFAULT, DEFAULT)";

						$result = $connection->query($query);
						$profileResult = $connection->query($profileQuery);		

						echo"<script> alert('Registering');
							  window.location.href='index.php';
						</script>";
					}
				}

				

				mysqli_close($connection);


            ?>
        </pre>
        <br />
    </body>
</html>