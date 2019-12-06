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






elseif(isset($_POST['Submit'])){
    
//     $display_simpleform = true;
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
     // exit the script with a useful message if there was an error:
    if (!$connection)
    {
        die("Connection failed: " . $mysqli_connect_error);
    }
    
   
    
    
    
    
    
    $sql = "INSERT INTO simplesurvey
    (surveyID, q1, q2, q3, q4, q5)
    VALUES ('{$_POST['ID']}', '{$_POST['answer1']}', '{$_POST['answer2']}', '{$_POST['answer3']}', '{$_POST['answer4']}', '{$_POST['answer5']}')";
    
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
    
    <h4>Simple Survey </h4>
    SurveyID: <input type="text" name="ID" maxlength="30" value="{$_SESSION['username']}" required><br><br>
    Name: <input type="text" name="answer1" maxlength="30" value="" required><br>
     <br> Surname: <input type="text" name="answer2" maxlength="30" value="" required><br>
     
     <p>Gender</p>
     
     <input type="radio" name="answer3" value="Man"> Man<br>
     <input type="radio" name="answer3" value="Woman"> Woman<br>
     <input type="radio" name="answer3" value="Prefer not to say"> Prefer not to say<br>
     
     <br>Pick your favourite colour <input type="color" name="answer4" value="0"><br>
     
     <p>Select your preferred way to travel</p>
     
     
    <input type="checkbox" name="answer5" value="Car" > 
    Car<br>
    <input type="checkbox" name="answer5" value="Public transport"> Public transport<br>
    <input type="checkbox" name="answer5" value="Bike" > Bike<br>
    <input type="checkbox" name="answer5" value="Walk" > Walk<br> 
    
    <input type="submit" name="Submit"  value="submit">
    </form>




_END;
}

require_once "footer.php";
include 'styleSheet.css';


?>