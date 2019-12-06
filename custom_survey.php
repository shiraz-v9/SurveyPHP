<?php

require_once "header.php";
require_once "credentials.php";

$create_survey = true;

//cheking if the user is logged in

if(!isset($_SESSION['loggedInSkeleton']))
{
    // user isn't logged in, display a message saying they must be:
    echo "You must be logged in to view this page.<br>";
    $create_survey = false;
}









elseif(isset($_POST['Submit'])){


    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

     // exit the script with a useful message if there was an error:
    if (!$connection)
    {
        die("Connection failed: " . $mysqli_connect_error);
    }







    $sql = "INSERT INTO newsurvey
    (surveyor, question1, question2, question3, question4, question5, question6)
    VALUES ('{$_POST['ID']}', '{$_POST['one']}', '{$_POST['two']}', '{$_POST['three']}', '{$_POST['four']}', '{$_POST['five']}', '{$_POST['six']}')";

    $result = mysqli_query($connection, $sql);

    if ($result){

    echo "you have successfully created this survey";
    $create_survey = false;


    }

    else
    {
        // we're finished with the database, close the connection:


        echo "Error. please check again your details" ;
        $create_survey = true ;
    }

}





if($create_survey){

echo <<<_END

<!-- custom survey form -->
<body>
<form action="custom_survey.php" method="post">

    <h4>Custom Survey </h4>
    Surveyor: <input type="text" name="ID" maxlength="30" value="{$_SESSION['username']}" required><br><br>

    Question 1: <input type="text" name="one" maxlength="140" value="" ><br>
    Question 2: <input type="text" name="two" maxlength="140" value="" ><br>
    Question 3: <input type="text" name="three" maxlength="140" value="" ><br>
    Question 4: <input type="text" name="four" maxlength="140" value="" ><br>
    Question 5: <input type="text" name="five" maxlength="140" value="" ><br>
    Question 6: <input type="text" name="six" maxlength="140" value="" ><br>

    <input type="submit" name="Submit"  value="submit">
    </form>
  </body>
</html>
_END;
}


require_once "footer.php";
include 'styleSheet.css';


?>
