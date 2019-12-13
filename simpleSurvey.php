<?php
   require_once "header.php";
   require_once "credentials.php";



       $display_simpleform = true;






   //cheking if the user is logged in
   if (!isset($_SESSION['loggedInSkeleton']))
       {
               $display_simpleform = false;

           // user isn't logged in, display a message saying they must be:
           echo "You must be logged in to view this page.<br>";
       }






   elseif(isset($_POST['submit'])){

   //     $display_simpleform = true;
       $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        // exit the script with a useful message if there was an error:
       if (!$connection)
       {
           die("Connection failed: " . $mysqli_connect_error);
       }







       $sql = "INSERT INTO simplesurvey
       (surveyID, q1, q2, q3, q4, q5)
       VALUES ('{$_POST['ID']}',
         '{$_POST['answer1']}',
         '{$_POST['answer2']}',
         '{$_POST['answer3']}',
         '{$_POST['answer4']}',
         '{$_POST['answer5']}')";

       $result = mysqli_query($connection, $sql);

       if ($result){

       echo "you have successfully sent this form";
       $display_simpleform = false;
       mysqli_close($connection);

       }






       else {
           // we're finished with the database, close the connection:


           echo "Error. please check again your details" ;
           $display_simpleform = true ;
       }







   }

   if ($display_simpleform){
   echo <<<_END
   <!-- simple survey form -->

   <form action="simpleSurvey.php" method="post">

       <h3>Simple Survey </h3>
       <table>

       <tr><td>SurveyID:</td> <td><input type="text" name="ID" maxlength="30" value="{$_SESSION['username']}" required><br></td></tr>
       <tr><td>Name:</td> <td><input type="text" name="answer1" maxlength="30" value="" required><br></td></tr>
       <tr><td>Surname:</td> <td><input type="text" name="answer2" maxlength="30" value="" required><br></td></tr>

        </tr><td><p>Gender</p></td>
        <td>
        <input type="radio" name="answer3" value="Man"> Man<br>
        <input type="radio" name="answer3" value="Woman"> Woman<br>
        <input type="radio" name="answer3" value="Prefer not to say"> Prefer not to say<br>
        </td></tr>
        <tr><td>Pick your favourite colour</td> <td><input type="color" name="answer4" value="0"><br></td></tr>

        </tr><td><p>Select your preferred way to travel</p></td>


       <td><input type="checkbox" name="answer5" value="Car" >
       Car<br>
       <input type="checkbox" name="answer5" value="Public transport"> Public transport<br>
       <input type="checkbox" name="answer5" value="Bike" > Bike<br>
       <input type="checkbox" name="answer5" value="Walk" > Walk<br>
       </td></tr>
       <tr><td><input type="submit" name="submit"  value="submit"></td></tr>
       </table>
       </form>




_END;
   }

   require_once "footer.php";
   include 'styleSheet.css';


   ?>
