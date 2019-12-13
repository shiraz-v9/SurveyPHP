<?PHP

// execute the header script:
require_once "header.php";

// read in the details of our MySQL server:
require_once "credentials.php";

//THE GET METHOD GET THE SURVEY ID USER CLICKED ON
$ID = $_GET['ID'];

$loggedinuser = $_SESSION['username'];

//variable names set to null
$value1 = "";
$value2 = "";
$value3 = "";
$value4 = "";
$value5 = "";

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
    $fill = "SELECT * FROM surveyquestion WHERE surveyorID=$ID";

    $result = mysqli_query($connection, $fill);

    $num = mysqli_num_rows($result);

    if ($num > 0)
    {
      //echo "<br><h3>Here is it</h3><br>";
    }
    while ($row = mysqli_fetch_assoc($result))
    {

      //new variables created so theey can be used concatenated with form fields
      $row['surveyorID'];
      $user = $row['surveyor'];
      $q1 =$row['surveyName'];
      $q2 =$row['question2'];
      $q3 =$row['question3'];
      $q4 =$row['question4'];
      $q5 =$row['question5'];
      $q6 =$row['question6'];

      $show_answer_form = true;
    }
  }
}





if ($show_answer_form){
echo <<<_END
<!-- simple survey form -->

<form action="survey_answers.php" method="post">
		<!-- NAME AND SURVEY OWNER  -->
    <h4>Welcome to <h2>$q1 by $user</h2></h4>
    <!-- $q1 <input type="text" name="a1" maxlength="140" value="$value1" required><br><br> -->
		UserID: <br><input type="text" name="ID" maxlength="30" value="{$_SESSION['username']}" readonly><br><br>

		<!-- HIDDEN FIELD BECAUSE WE DO NOT WANT THIS TO BE SEEN BY USERS -->
		<input type="hidden" name="FK" maxlength="30" value="$user" readonly>

    $q2 <br><input type="text" name="a1" maxlength="140" value="$value1" required placeholder="Answer to question 1"><br><br>
    $q3 <br><input type="text" name="a2" maxlength="140" value="$value2" required placeholder="Answer to question 2"><br><br>
    $q4 <br><input type="text" name="a3" maxlength="140" value="$value3" required placeholder="Answer to question 3"><br><br>
    $q5 <br><input type="text" name="a4" maxlength="140" value="$value4" required placeholder="Answer to question 4"><br><br>
    $q6 <br><input type="text" name="a5" maxlength="140" value="$value5" required placeholder="Answer to question 5"><br><br>

    <input type="submit" name="Submit"  value="submit">
    </form>




_END;
}


require_once "footer.php";
include'styleSheet.css';



?>
