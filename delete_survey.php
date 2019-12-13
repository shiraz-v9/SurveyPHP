<?PHP
//delete survey pages

// execute the header script:
require_once "header.php";

// read in the details of our MySQL server:
require_once "credentials.php";

//THE GET METHOD GET THE SURVEY ID USER CLICKED ON
$ID = $_GET['ID'];

$loggedinuser = $_SESSION['username'];

// connect to the host:
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// exit the script with a useful message if there was an error:
if (!$connection)
{
	die("Connection failed: " . $mysqli_connect_error);
}

// checks the session variable named 'loggedInSkeleton'
// take note that of the '!' (NOT operator) that precedes the 'isset' function
if (!isset($_SESSION['loggedInSkeleton']))
{
	// user isn't logged in, display a message saying they must be:
	echo "You must be logged in to view this page.<br>";

}


else
{
  if($loggedinuser)
  {
    $delete = "DELETE FROM surveyquestion WHERE surveyorID='$ID'";

    $result = mysqli_query($connection, $delete);

    //$num = mysqli_num_rows($result);

    if ($result)
    {
      echo "<br><h3>Survey deleted successfully</h3><br>";
    }
    else{
      echo "Error deleting record: " . mysqli_error($connection);
    }


  }
}


require_once "footer.php";
include'styleSheet.css';




?>
