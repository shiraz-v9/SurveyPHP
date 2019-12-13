<?php
   require_once "header.php";
   require_once "credentials.php";

   $name = "";
   $surname = "";
   $password = "";
   $email = "";
   $DOB = "";
   $phone= "";



   $show_account_form = false;

   $message = "";

   if (!isset($_SESSION['loggedInSkeleton']))
   {
       // user isn't logged in, display a message saying they must be:
       echo "You must be logged in to view this page.<br>";
   }
       elseif(isset($_POST['update'])) {





       $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


       if (!$connection)
       {
           die("Connection failed: " . $mysqli_connect_error);
       }

       $name = $_POST['firstname'];
       $surname = $_POST['surname'];
       $password = $_POST['password'];
       $email = $_POST['email'];
       $DOB = $_POST['DOB'];
       $phone = $_POST['telephone'];


       $errors = "";

       // check that all the validation tests passed before going to the database:
       if ($errors == "")
       {
           $username = $_POST["username"];
           $query = "SELECT * FROM users WHERE username='$username'";
           $result = mysqli_query($connection, $query);
           $n = 1;


           if ($n > 0)
           {
               // we need an UPDATE:
               $query = "UPDATE users SET username= '$username', password= '$password', firstname='$name', surname='$surname', email= '$email' , DOB= '$DOB' , telephone= '$phone'
               WHERE username = '$username'";
               $result = mysqli_query($connection, $query);
           }


           // no data returned, we just test for true(success)/false(failure):
           if ($result)
           {
               // show a successful update message:

               $message = "<br>Profile successfully updated<br>";
           }
           else
           {
               // show the set profile form:
               $show_account_form = true;
               // show an unsuccessful update message:
               $message = "Update failed<br>";
           }
       }
       else
       {
           // validation failed, show the form again with guidance:
           $show_account_form = true;
           // show an unsuccessful update message:
           $message = "Update failed, please check the errors above and try again<br>";
       }

       // we're finished with the database, close the connection:
       mysqli_close($connection);
   }


       elseif(isset($_POST['delete'])) {

       $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
       $username = $_POST["username"];

       if (!$connection)
       {
           die("Connection failed: " . $mysqli_connect_error);
       }
       // sql to delete a record
       $sql = "DELETE FROM users WHERE username='$username'";
       if (mysqli_query($connection, $sql)) {

         echo "<br><h3>Record deleted successfully</h3><br>";

       }
       else {

         echo "Error deleting record: " . mysqli_error($connection);

       }

       }


       else
       {


       $username = $_GET['ID'];

       $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

       if (!$connection)
       {
           die("Connection failed: " . $mysqli_connect_error);
       }




       $query = "SELECT * FROM users WHERE username='$username' ";

       $result = mysqli_query($connection, $query);


       $n = mysqli_num_rows($result);

       if ($n > 0)
       {

           $row = mysqli_fetch_assoc($result);

           $name = $row['firstname'];
           $surname = $row['surname'];
           $email = $row['email'];
           $password = $row['password'];
           $DOB = $row['DOB'];
           $phone = $row['telephone'];

       }

       $show_account_form = true;

        mysqli_close($connection);

   }
   if ($show_account_form)
   {
       // display the user's row data in a table for easy editing
   echo <<<_END
       <form action="update_user.php" method="post">
       <table>
       <br>
       <tr>
       <td>Username: </td><td><input type="text" name="username" maxlength="32" value= "$username" </td>
       </tr>
       <tr>
       <td>First name: </td><td><input type="text" name="firstname" maxlength="32" value= "$name" </td>
       </tr>
       <tr>
       <td>Surname: </td><td><input type="text" name="surname" maxlength="64" value= "$surname" </td>
       </tr>
       <tr>
       <td>Password: </td><td><input type="text" name="password" maxlength="16" value= "$password" </td>
       </tr>
       <tr>
       <td>Email: </td><td><input type="email" name="email" maxlength="64" value= "$email" </td>
       </tr>
       <tr>
       <td>DOB: </td><td><input type="date" name="DOB" maxlength="16" value= "$DOB" </td>
       </tr>
       <tr>
       <td >telephoneNumber: </td><td><input type="text" name="telephone" maxlength="15" value= "$phone"</td>
       </tr>

        </table>
       <br>
       <input type="submit" name = "update" value="Update">
       <input type="submit" name = "delete" value="Delete">

   </form>
   <br>
_END;
   }

   echo $message;

   require_once "footer.php";
   include 'styleSheet.css';

   ?>
