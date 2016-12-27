<?php
	//force HTTPS for the form submission if not set already
	if($_SERVER["HTTPS"] != "on") {
		header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit;
	}
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Researchr - Register</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/grid.css">
    </head>
    
    <body>
        <header>
<!--            Navigation Bar. TO DO: Visitors will not be able to see Profile and Log Out. Logged In members will not see Login and Register-->
            <nav>
				<div class = 'homeButton'>
					<a href = 'index.php'>RESEARCHR</a>
				</div>
				<a href = 'about.php'>About</a>
                <a href = "browse.php">Browse</a>
                <a href = "login.php">Log In</a>
                <a href = "register.php">Register</a>
            </nav>
        </header>
        
        
        <div class = "col-1of1">
            <h2>REGISTER</h2>
<!--Registration form-->
            <form action = "register_processing.php" method = "post">
                <label for = "name">Name:</label>
                <input type = "text" name = "name" value = ""/> <br />
                <label for = "tel">Phone Number:</label>
                <input type = "tel" name = "phonenumber" value = ""/> <br />
                <label for = "email">Email:</label>
                <input type = "email" name = "email" value = ""/> <br />
                <label for = "password">Create Password:</label>
                <input type = "password" name = "password" value = ""/> <br />
                <label for = "passwordC">Confirm Password:</label>
                <input type = "password" name = "passwordC" value = ""/> <br />
                <input type = "submit" name = "submit" value = "Submit" class = "submitButton"/>    
            </form>
            
        </div>
    
    </body>

</html>