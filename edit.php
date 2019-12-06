<?php
require_once "header.php";
require_once "credentials.php";


$user = "";
$value1 = "";
$value2 = "";
$value3 = "";
$value4 = "";
$value5 = "";
$value6 = "";



//Validation is needed again since I am updating values
$username_val = "";
$password_val = "";
$firstname_val = "";
$surname_val = "";
$email_val = "";
$DOB_val = "";
$telephone_val = "";



// message to output to user:
$message = "";

$editusername = "";

if (!isset($_SESSION['loggedInSkeleton']))
    {
        // user isn't logged in, display a message saying they must be:
        echo "You must be logged in to view this page.<br>";
    }

else if (isset($_POST['username']))
{

    $editusername = $_POST['username'];
    $update_form = true;
    echo "Here you can edit details for " . $editusername ."<br>";
}
    
    elseif(isset($_POST['submit']))
    {   
    //now it is time to display the form
    $update_form = true;
    // connect to the host:
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


    // exit the script with a useful message if there was an error:
    if (!$connection)
    {
        die("Connection failed: " . $mysqli_connect_error);
    }
    
    // SANITISATION CODE :
//    $newuser = sanitise($_POST['username'], $connection);
//    $password = sanitise($_POST['password'], $connection);
    $firstname = sanitise($_POST['firstname'], $connection);
    $surname = sanitise($_POST['surname'], $connection);
    $email = sanitise($_POST['email'], $connection);
    $DOB = sanitise($_POST['DOB'], $connection);
    $telephone = sanitise($_POST['telephone'], $connection);
    
    // SERVER-SIDE VALIDATION
//    $username_val = validateString($newuser, 1, 16);
//    $password_val = validateString($password, 1, 16);
    $firstname_val = validateString($firstname, 1,32);
    $surname_val = validateString($surname, 1,64);
    //the following line will validate the email as a string, but maybe you can do a better job...
    $email_val = validateString($email, 1, 64);
    $DOB_val = validateString($DOB, 1,16);
    $telephone_val = validateString($telephone, 1,16);
    
    //ERRORS WILL BE CONCATENATED
    $errors = $username_val.$password_val .$firstname_val.$surname_val.$email_val.$DOB_val.$telephone_val;

    

        
        if ($errors == "")
        {

        $query = "SELECT * FROM users WHERE username = '$user'";

        $result = mysqli_query($connection, $query);

        $num = mysqli_num_rows($result);
  

        if ($num > 0 )
        {    
            // Insert the new details into database
            $update =   "UPDATE users SET firstname = '$firstname', surname = '$surname',               email = '$email', DOB = '$DOB', telephone = '$telephone', WHERE users.username = '$editusername'";
            //username = '$newuser',
            //password = '$password',

            $result = mysqli_query($connection, $update);
        }






        if ($result)
        {
            $update_form = false;
            $message = "Profile successfully updated<br>";
            // we're finished with the database, close the connection:
            //
        }

        else
        {
            $update_form = true;
            $message =  "<br>Update failed";
        }

        }
        mysqli_close($connection);
    }

else 
{
    echo "<br>Sorry, that's not a matching username";
}
    
if($update_form)
{
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    // if the connection fails, we need to know, so allow this exit:
    if (!$connection)
    {
        die("Connection failed: " . $mysqli_connect_error);
    }
    // check for a row in our profiles table with a matching username:
    $data = "SELECT * FROM users WHERE username='$editusername'";
    
    // this query can return data ($result is an identifier):
    $result = mysqli_query($connection, $data);
    
    // how many rows came back? (can only be 1 or 0 because username is the primary key in our table):
    $n = mysqli_num_rows($result);
    
    if ($n > 0)
    {
        // use the identifier to fetch one row as an associative array (elements named after columns):
        $row = mysqli_fetch_assoc($result);   
        
        $user = $row['username'];
        $value1 = $row['password'];
        $value2 = $row['firstname'];
        $value3 = $row['surname'];
        $value4 = $row['email'];
        $value5 = $row['DOB'];
        $value6 = $row['telephone'];
    }
    
    // we're finished with the database, close the connection:
	mysqli_close($connection);
    
}

 

if ($update_form){
echo <<<_END
<!DOCTYPE html>
<html>

<body>
<form action="edit.php" method="post">
<!--
     Username: <input type="username" name="username" maxlength="32" value="$user" >$username_val
     <br>Password: <input type="password" name="password" maxlength="16" value="$value1" >$password_val
-->
<p> Username $user </p>
     <br>firstname: <input type="text" name="firstname" maxlength="64" value="$value2" >$firstname_val
     <br>surname: <input type="text" name="surname" maxlength="64" value="$value3" >$surname_val
     <br>mail: <input type="email" name="email" maxlength="64" value="$value4" >$email_val
     <br>DOB: <input type="date" name="DOB" maxlength="12" value="$value5" >$DOB_val
     <br>phone: <input type="text" name="telephone" maxlength="15" value="$value6" >$telephone_val
     <br><input type="submit" name= "submit" value="submit">
    </form>	
</body>
_END;
}

//display our message to the user:
echo $message;
    
require_once "footer.php";
include 'styleSheet.css';
?>