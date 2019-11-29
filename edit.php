<!--delete statement in here-->
<?php
require_once "header.php";
require_once "credentials.php";

// connect to the host:
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


// exit the script with a useful message if there was an error:
if (!$connection)
{
	die("Connection failed: " . $mysqli_connect_error);
}

if (!isset($_SESSION['loggedInSkeleton']))
{
	// user isn't logged in, display a message saying they must be:
	echo "You must be logged in to view this page.<br>";
}


else if (isset($_POST['username'])){
    // take copies of the credentials the user submitted: 
    $editusername = $_POST['username']; 

	

			
            
            echo "Here you can edit details for " . $editusername ."<br>";
    
            $query = "SELECT username,password,firstname,surname,email,DOB,telephone FROM users
            WHERE username = '$editusername'";
			
            $result = mysqli_query($connection, $query);
        
            $num = mysqli_num_rows($result);
                
                if ($num>0){
                    //drop in a form to edit user as admin
                    while ($row = mysqli_fetch_array($result)){
                         
                         //echo "<td>". $row['username']."</td>";
                         $value1 = $row['password'];
                         $value2 = $row['firstname'];
                         $value3 = $row['surname'];
                         $value4 = $row['email'];
                         $value5 = $row['DOB'];
                         $value6 = $row['telephone'];
                        
                        
                        //Validation is needed again since I am updating values
                        $username_val = "";
                        $password_val = "";
                        $firstname_val = "";
                        $surname_val = "";
                        $email_val = "";
                        $DOB_val = "";
                        $telephone_val = "";
                        
                        $username_val = validateString($editusername, 1, 16);
                        $password_val = validateString($value1, 1, 16);
                        $firstname_val = validateString($value2, 1,32);
                        $surname_val = validateString($value3, 1,64);
                        //the following line will validate the email as a string, but maybe you can do a better job...
                        $email_val = validateString($value4, 1, 64);
                        $DOB_val = validateString($value5, 1,16);
                        $telephone_val = validateString($value6, 1,16);
                        
                        $errors = $username_val.$password_val .$firstname_val.$surname_val.$email_val.$DOB_val.$telephone_val;
                        

echo <<<_END
<!DOCTYPE html>
<html>

<body>
<form action="edit.php" method="post">
    <br> Username: <input type="text" name="username" maxlength="16" value="$editusername" required>$username_val
     Password: <input type="password" name="password" maxlength="16" value="$value1" required>$password_val
     firstname: <input type="text" name="firstname" maxlength="64" value="$value2" required>$firstname_val
     surname: <input type="text" name="surname" maxlength="64" value="$value3" required>$surname_val
     mail: <input type="email" name="email" maxlength="64" value="$value4" required>$email_val
     DOB: <input type="date" name="DOB" maxlength="12" value="$value5" required>$DOB_val
     phone: <input type="text" name="telephone" maxlength="15" value="$value6" required>$telephone_val
    <input type="submit" value="Update">
    </form>	
</body>
_END;
                    }

                }
                else {
                    echo "<br>Sorry, that's not a matching username";
                }
    
    if ($errors == "" || isset($_POST['username']))
	{
		
		// Insert the new details into database
		$query =    "UPDATE users
                    SET password = '$value1',
                    firstname = '$value2',
                    surname = '$value3',
                    email = '$value4',
                    DOB = '$value5',
                    telephone = '$value6',
                    WHERE username = '$editusername';";
        
            $result = mysqli_query($connection, $query);
            
            if ($result){
                echo "<br>User has been updated successfully";
            }
        
            elseif (!$result){
            echo "<br>something went wrong" ;
            }
    
    
    
    

    }
}
    
require_once "footer.php";
include 'styleSheet.css';
?>