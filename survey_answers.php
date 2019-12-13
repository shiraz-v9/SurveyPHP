<?PHP
   // execute the header script:
   require_once "header.php";

   // read in the details of our MySQL server:
   require_once "credentials.php";





   $loggedinuser = $_SESSION['username'];

   if (!isset($_SESSION['loggedInSkeleton']))
   {
       // user isn't logged in, display a message saying they must be:
       echo "You must be logged in to view this page.<br>";
   }


   if(isset($_POST['Submit']))
   {


     $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


     if (!$connection)
     {
         die("Connection failed: " . $mysqli_connect_error);
     }

     $sql = "INSERT INTO surveyanswer
     (username, author, answer1, answer2, answer3, answer4, answer5)
     VALUES ('{$_POST['ID']}',
       '{$_POST['FK']}',
       '{$_POST['a1']}',
       '{$_POST['a2']}',
       '{$_POST['a3']}',
       '{$_POST['a4']}',
       '{$_POST['a5']}')";

       $result = mysqli_query($connection, $sql);

       if ($result){

       echo "you have successfully sent this form";
       $display_simpleform = false;
       mysqli_close($connection);

       }



   }


   else if ($loggedinuser)
   {
     echo "<br><br><h3>Here are all your answers</h3>";

     $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


     if (!$connection)
     {
         die("Connection failed: " . $mysqli_connect_error);
     }



     //display all the answers
     $userresult = $query = "SELECT * FROM surveyanswer WHERE author='$loggedinuser'";

     $result = mysqli_query($connection, $userresult);

     $num = mysqli_num_rows($result);

     if ($num > 0)
     {
       echo "<table><br><tr>

       <th> Username </th>
       <th> answer1</th>
       <th> answer2</th>
       <th> answer3</th>
       <th> answer4</th>
       <th> answer5</th>


       </tr>";

     }
     else
     {
       echo "<h4>No answers yet...</h4>";
     }

     while ($row = mysqli_fetch_assoc($result))
     {

       echo "<td>". $row['username']."</td>";
       echo "<td>". $row['answer1']."</td>";
       echo "<td>". $row['answer2']."</td>";
       echo "<td>". $row['answer3']."</td>";
       echo "<td>". $row['answer4']."</td>";
       echo "<td>". $row['answer5']."</td>";

       echo "</tr>";
     }
     echo "</table>";


     //admin views more than user


      if ($loggedinuser == 'admin'){


       echo "<br><br><h3>Here are all the survey answers</h3>";

       $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


       if (!$connection)
       {
           die("Connection failed: " . $mysqli_connect_error);
       }



       //display all the answers
       $adminresult = $query = "SELECT * FROM surveyanswer ";

       $result = mysqli_query($connection, $adminresult);

       $num = mysqli_num_rows($result);

       if ($num > 0)
       {
         echo "<table><br><tr>
         <th> ID</th>
         <th> Author</th>
         <th> Username </th>
         <th> answer1</th>
         <th> answer2</th>
         <th> answer3</th>
         <th> answer4</th>
         <th> answer5</th>


         </tr>";

       }

       while ($row = mysqli_fetch_assoc($result))
       {
         echo "<td>". $row['answerID']."</td>";
         echo "<td>". $row['author']."</td>";
         echo "<td>". $row['username']."</td>";
         echo "<td>". $row['answer1']."</td>";
         echo "<td>". $row['answer2']."</td>";
         echo "<td>". $row['answer3']."</td>";
         echo "<td>". $row['answer4']."</td>";
         echo "<td>". $row['answer5']."</td>";

         echo "</tr>";
       }
       echo "</table>";
     }
   }





   include'styleSheet.css';
   require_once "footer.php";
   ?>
