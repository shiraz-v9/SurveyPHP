<?php


// execute the header script:
require_once "header.php";

// read in the details of our MySQL server:
require_once "credentials.php";


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
    //run a sql statement that drops surveys if user have submitted
    //all users who are not admin will be shown their work
    if($loggedinuser != "admin")
    {



      $survey = "SELECT * FROM newsurvey WHERE surveyor= '$loggedinuser'";

      $result = mysqli_query($connection, $survey);

      $num = mysqli_num_rows($result);

      if ($num > 0)
      {
        echo "<br><br><br><h3>Here are your Surveys</h3>";
        echo "<table><br><tr>
        <th> surveyor</th>
        <th> Question 1 </th>
        <th> Question 2 </th>
        <th> Question 3 </th>
        <th> Question 4 </th>
        <th> Question 5 </th>
        <th> Question 6 </th>
        </tr>";
      }
      else
      {
        echo "<br><br><br><h3>No Surveys made yet..</h3>";
      }
      while ($row = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo "<td>". $row['surveyor']."</td>";
        echo "<td>". $row['question1']."</td>";
        echo "<td>". $row['question2']."</td>";
        echo "<td>". $row['question3']."</td>";
        echo "<td>". $row['question4']."</td>";
        echo "<td>". $row['question5']."</td>";
        echo "<td>". $row['question6']."</td>";
        echo "</tr>";
      }
      echo "</table>";

    }


    //ADMINISTRATOR only
    if($loggedinuser == "admin")
    {
      $survey = "SELECT * FROM newsurvey ";

      $result = mysqli_query($connection, $survey);

      $num = mysqli_num_rows($result);

      if ($num > 0)
      {
        echo "<br><br><br><h3>ALL THE SURVEYS</h3>";
        echo "<table><br><tr>
        <th> ID </th>
        <th> Surveyor </th>
        <th> Question 1 </th>
        <th> Question 2 </th>
        <th> Question 3 </th>
        <th> Question 4 </th>
        <th> Question 5 </th>
        <th> Question 6 </th>
        </tr>";
      }
      else
      {
        echo "<br><br><br><h3>No Surveys made yet..</h3>";
      }
      while ($row = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo "<td>". $row['surveyorID']."</td>";
        echo "<td>". $row['surveyor']."</td>";
        echo "<td>". $row['question1']."</td>";
        echo "<td>". $row['question2']."</td>";
        echo "<td>". $row['question3']."</td>";
        echo "<td>". $row['question4']."</td>";
        echo "<td>". $row['question5']."</td>";
        echo "<td>". $row['question6']."</td>";
        echo "</tr>";
      }
      echo "</table>";

    }


}


require_once "footer.php";
include'styleSheet.css';
?>
