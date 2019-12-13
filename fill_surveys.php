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
       if($loggedinuser)
       {



         $survey = "SELECT * FROM surveyquestion ";

         $result = mysqli_query($connection, $survey);

         $num = mysqli_num_rows($result);

         if ($num > 0)
         {
           echo "<br><br><br><h3>Here are some Surveys</h3>";
           echo "<table><br><tr>
           <th> Select survey</th>
           <th> Complete This </th>


           </tr>";
         }
         else
         {
           echo "<br><br><h3>No Surveys available yet..</h3>";
         }
         while ($row = mysqli_fetch_array($result))
         {
           echo "<tr>";
           $ID = $row['surveyorID'];
           echo "<td>". $row['surveyName']."</td>";
           //SENDING THE ROW ID IN EACH TD LINK
           echo "<td>"."<a href='user_surveys.php?ID=$ID'>Fill </a>"."</td>";






           echo "</tr>";
         }
         echo "</table>";

       }
     }


     require_once "footer.php";
     include 'styleSheet.css';

   ?>
