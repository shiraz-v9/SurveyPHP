<!--delete statement in here-->
<?php
require_once "header.php";
require_once "credentials.php";

// connect to the host:
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


// exit the script with a useful message if there was an error:
if (!$connection)
{
	die("Connection failed: " . $mysqli_connect_error);
}

if (!isset($_SESSION['loggedInSkeleton']))
{
	// user isn't logged in, display a message saying they must be:
	echo "You must be logged in to view this page.<br>";
}


else{
	if ($_GET['username'] == $username){
		echo "this is the name " +  $username;

			$query = "SELECT * FROM users";
			



			//$update = "UPDATE FROM users WHERE 'username' = $username"
			}
}
require_once "footer.php";
include 'styleSheet.css';

?>
