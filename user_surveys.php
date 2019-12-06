<?PHP

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
  $show_answer_form = false;
}
else
{
  if($loggedinuser)
  {
    $fill = "SELECT * FROM newsurvey WHERE surveyorID=$ID";

    $result = mysqli_query($connection, $fill);

    $num = mysqli_num_rows($result);

    if ($num > 0)
    {
      //echo "<br><h3>Here is it</h3><br>";
    }
    while ($row = mysqli_fetch_assoc($result))
    {

      //new variables created so theey can be used concatenated with form fields
      $row['surveyorID']."<br>";
      $row['surveyor']."<br>";
      $q1 =$row['question1']."<br>";
      $q2 =$row['question2']."<br>";
      $q3 =$row['question3']."<br>";
      $q4 =$row['question4']."<br>";
      $q5 =$row['question5']."<br>";
      $q6 =$row['question6']."<br>";

      $show_answer_form = true;
    }
  }
}



if ($show_answer_form){
echo <<<_END
<!-- simple survey form -->

<form action="simpleSurvey.php" method="post">

    <h4>Here's your selected survey </h4>
    $q1<br> <input type="text" name="a1" maxlength="140" value="" required><br>
    $q2<br> <input type="text" name="a2" maxlength="140" value="" required><br>
    $q3<br> <input type="text" name="a3" maxlength="140" value="" required><br>
    $q4<br> <input type="text" name="a4" maxlength="140" value="" required><br>
    $q5<br> <input type="text" name="a5" maxlength="140" value="" required><br>
    $q6<br> <input type="text" name="a6" maxlength="140" value="" required><br>

    <input type="submit" name="Submit"  value="submit">
    </form>




_END;
}


require_once "footer.php";
include'styleSheet.css';



?>
