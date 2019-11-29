<?php

// Things to notice:
// You need to add code to this script to implement the admin functions and features
// Notice that the code not only checks whether the user is logged in, but also whether they are the admin,
//before it displays the page content
// When an admin user is verified, you can implement all the admin tools functionality from this script, or distribute
//them over multiple pages - your choice

// execute the header script:
require_once "header.php";

// read in the details of our MySQL server:
require_once "credentials.php";



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

// the user must be signed-in, show them suitable page content
else
{
	// only display the page content if this is the admin account (all other users get a "you don't have permission..." message):
	if ($_SESSION['username'] == "admin")
	{
		echo "This is the adminitrator tools where you (Admin) should be able to access a
		list of all users and, upon clicking on a username, that user’s associated account information should be displayed.<br>";


        $query = "SELECT * FROM users";

        // this query can return data ($result is an identifier):
        $result = mysqli_query($connection, $query);

        $n = mysqli_num_rows($result);


        if ($n>0){

        echo "<table><br><br><tr>
            <th> Username</th>
            <th> Password</th>
            <th> Name</th>
            <th> Surname</th>
            <th> Email</th>
            <th> Date of Birth</th>
            <th> Phone </th>
            

            </tr>";







         while ($row = mysqli_fetch_array($result))
        {
             echo "<tr>";
             echo "<td>". $row['username']."</td>";
             echo "<td>". $row['password']."</td>";
             echo "<td>". $row['firstname']."</td>";
             echo "<td>". $row['surname']."</td>";
             echo "<td>". $row['email']."</td>";
             echo "<td>". $row['DOB']."</td>";
             echo "<td>". $row['telephone']."</td>";

             
             
             echo "</tr>";
         }


             echo "</table>";







            }
    }



            else
            {
                echo "You don't have permission to view this page...<br>";
            }
}


// finish off the HTML for this page:
echo <<<_END
<!DOCTYPE html>
<html>
<head>
 <style>a:active</style>
</head>
<body>

<br>
<a href='account_set.php'>Update record</a>
<a href='edit.php'>Edit page</a>

<!-- edit username form -->
    <form action="edit.php" method="post">
      <br>enter username you want to edit: <br>
      Username: <input type="text" name="username" maxlength="16" value="" required>

      <input type="submit" value="Submit">
    </form>	




</body>
_END;

require_once "footer.php";
include'styleSheet.css';



?>
