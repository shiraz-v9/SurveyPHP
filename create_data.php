<?php
   // Things to notice:
   // This file is the first one we will run when we mark your submission
   // Its job is to:
   // Create your database (currently called "skeleton", see credentials.php)...
   // Create all the tables you will need inside your database (currently it makes a simple "users" table, you will probably need more and will want to expand fields in the users table to meet the assignment specification)...
   // Create suitable test data for each of those tables
   // NOTE: this last one is VERY IMPORTANT - you need to include test data that enables the markers to test all of your site's functionality

   // read in the details of our MySQL server:
   require_once "credentials.php";

   // We'll use the procedural (rather than object oriented) mysqli calls

   // connect to the host:
   $connection = mysqli_connect($dbhost, $dbuser, $dbpass);

   // exit the script with a useful message if there was an error:
   if (!$connection)
   {
   	die("Connection failed: " . $mysqli_connect_error);
   }

   // build a statement to create a new database:
   $sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;

   // no data returned, we just test for true(success)/false(failure):
   if (mysqli_query($connection, $sql))
   {
   	echo "Database created successfully, or already exists<br>";
   }
   else
   {
   	die("Error creating database: " . mysqli_error($connection));
   }

   // connect to our database:
   mysqli_select_db($connection, $dbname);

   ///////////////////////////////////////////
   ////////////// USERS TABLE //////////////
   ///////////////////////////////////////////

   // if there's an old version of our table, then drop it:
   $sql = "DROP TABLE IF EXISTS users";

   // no data returned, we just test for true(success)/false(failure):
   if (mysqli_query($connection, $sql))
   {
   	echo "Dropped existing table: users<br>";
   }

   else
   {
   	die("Error checking for existing table: " . mysqli_error($connection));
   }

   // make our table:
   // notice that the username field is a PRIMARY KEY and so must be unique in each record
   $sql = "CREATE TABLE users(username VARCHAR(16), password VARCHAR(16), firstname VARCHAR(16), surname VARCHAR(16), email VARCHAR(64), DOB VARCHAR(12), telephone VARCHAR(16),PRIMARY KEY(username))";

   // no data returned, we just test for true(success)/false(failure):
   if (mysqli_query($connection, $sql))
   {
   	echo "Table created successfully: users<br>";
   }

   else
   {
   	die("Error creating table: " . mysqli_error($connection));
   }


   // put some data in our table:
   // create an array variable for each field in the DB that we want to populate
   $usernames[] = 'admin'; $passwords[] = 'secret'; $firstnames[] = 'Kashif'; $surnames[] ='Tauseef'; $emails[] = 'kashiftauseef@gmail.com'; $DOBs[] = '20/03/1996'; $telephones [] = '07412817604';

   $usernames[] = 'barrym'; $passwords[] = 'letmein'; $firstnames[] = 'barton'; $surnames[] ='morris'; $emails[] = 'barry@m-domain.com'; $DOBs[] = '20/03/1996'; $telephones [] = '07412817604';

   $usernames[] = 'mandyb'; $passwords[] = 'abc123'; $firstnames[] = 'mandy'; $surnames[] ='maddison'; $emails[] = 'webmaster@mandy-g.co.uk'; $DOBs[] = '20/03/1998'; $telephones [] = '07412817605';

   $usernames[] = 'bpt'; $passwords[] = 'abc123'; $firstnames[] = 'Baptista'; $surnames[] ='herrero'; $emails[] = 'bettakobam-3436@yopmail.com'; $DOBs[] = '03-03-1990'; $telephones [] = '2025550114';

   $usernames[] = 'beccas'; $passwords[] = 'abc123'; $firstnames[] = 'Becerra'; $surnames[] ='Lucas'; $emails[] = 'uxennina-3863@yopmail.com'; $DOBs[] = '16-03-1990'; $telephones [] = '2025550137';

   $usernames[] = 'barven'; $passwords[] = 'abc123'; $firstnames[] = 'Barbosa'; $surnames[] ='Steven'; $emails[] = 'ommulerurr-7266@yopmail.com'; $DOBs[] = '22-05-1993'; $telephones [] = '2025550133';

   $usernames[] = 'banilla'; $passwords[] = 'abc123'; $firstnames[] = 'Baca'; $surnames[] ='Bonilla'; $emails[] = 'asagurryn-8477@yopmail.com'; $DOBs[] = '01-11-1994'; $telephones [] = '2025550193';

   $usernames[] = 'jourab'; $passwords[] = 'abc123'; $firstnames[] = 'Jourdain'; $surnames[] ='Bap'; $emails[] = 'meluwovaff-8288@yopmail.com'; $DOBs[] = '21-02-1994'; $telephones [] = '2025550182';






   // loop through the arrays above and add rows to the table:
   for ($i=0; $i<count($usernames); $i++)
   {
   	// create the SQL query to be executed
       $sql = "INSERT INTO users (username, password, firstname, surname, email, DOB, telephone) VALUES ('{$usernames[$i]}', '{$passwords[$i]}', '{$firstnames[$i]}','{$surnames[$i]}', '{$emails[$i]}', '{$DOBs[$i]}', '{$telephones[$i]}')";

   	// run the above query '$sql' on our DB
       // no data returned, we just test for true(success)/false(failure):
   	if (mysqli_query($connection, $sql))
   	{
   		echo "row inserted correctly <br>";
   	}

   	else
   	{
   		die("Error inserting row: <br>" . mysqli_error($connection));
   	}
   }








   //CREATE TABLE

   ///////////////////////////////////////////
   ////////////// survey table  //////////////
   ///////////////////////////////////////////

   // if there's an old version of our table, then drop it:
   $sql = "DROP TABLE IF EXISTS simplesurvey";

   // no data returned, we just test for true(success)/false(failure):
   if (mysqli_query($connection, $sql))
   {
   	echo "<br>Dropped existing table: simpleSurvey<br>";
   }

   else
   {
   	die("Error checking for existing table: " . mysqli_error($connection));
   }






   // make our table:
   // notice that the username field is a PRIMARY KEY and so must be unique in each record
   $sql = "CREATE TABLE simplesurvey(surveyID VARCHAR(16),
   q1 VARCHAR(30),
   q2 VARCHAR(30),
   q3 VARCHAR(30),
   q4 VARCHAR(30),
   q5 VARCHAR(30),
   PRIMARY KEY(surveyID))";

   // no data returned, we just test for true(success)/false(failure):
   if (mysqli_query($connection, $sql))
   {
   	echo "Table created successfully: simplesurvey<br>";
   }

   else
   {
   	die("Error creating table: " . mysqli_error($connection));
   }


   //SAMPLE DATA HERE
   $surveyID[] = 'banilla'; $q1[] = 'Baca'; $q2[] = 'Bonilla'; $q3[] = 'Woman'; $q4[] = '#78ED61'; $q5[] = 'Car';

   $surveyID[] = 'barven'; $q1[] = 'Barbosa'; $q2[] = 'Steven'; $q3[] = 'Man'; $q4[] = '#EDD261'; $q5[] = 'Car';

   $surveyID[] = 'beccas'; $q1[] = 'Becerra'; $q2[] = 'Lucas'; $q3[] = 'Prefer not to say'; $q4[] = '#ED6B61'; $q5[] = 'Car';

   $surveyID[] = 'bpt'; $q1[] = 'Baptista'; $q2[] = 'herrero'; $q3[] = 'Man'; $q4[] = '#9AED61'; $q5[] = 'Bike';

   $surveyID[] = 'jourab'; $q1[] = 'Jourdain'; $q2[] = 'Bap'; $q3[] = 'Woman'; $q4[] = '#6189ED'; $q5[] = 'Walk';





   // loop through the arrays above and add rows to the table:
   for ($i=0; $i<count($surveyID); $i++)
   {
   	// create the SQL query to be executed
       $sql = "INSERT INTO simplesurvey
       (surveyID, q1, q2, q3, q4, q5)
       VALUES ('{$surveyID[$i]}',
       '{$q1[$i]}',
       '{$q2[$i]}',
       '{$q3[$i]}',
       '{$q4[$i]}',
       '{$q5[$i]}')";

   	// run the above query '$sql' on our DB
       // no data returned, we just test for true(success)/false(failure):
   	if (mysqli_query($connection, $sql))
   	{
   		echo "row inserted correctly <br>";
   	}

   	else
   	{
   		die("Error inserting row: <br>" . mysqli_error($connection));
   	}
   }






   ///////////////////////////////////////////
   /////////// surveyquestion table  /////////
   ///////////////////////////////////////////

   // if there's an old version of our table, then drop it:
   $sql = "DROP TABLE IF EXISTS surveyquestion";

   // no data returned, we just test for true(success)/false(failure):
   if (mysqli_query($connection, $sql))
   {
   	echo "<br>Dropped existing table: surveyquestion<br>";
   }

   else
   {
   	die("Error checking for existing table: " . mysqli_error($connection));
   }


   // make our table:
   // notice that the username field is a PRIMARY KEY and so must be unique in each record
   $sql = "CREATE TABLE surveyquestion(surveyorID int NOT NULL AUTO_INCREMENT,
   surveyor VARCHAR(16),
   surveyName VARCHAR(140),
   question2 VARCHAR(140),
   question3 VARCHAR(140),
   question4 VARCHAR(140),
   question5 VARCHAR(140),
   question6 VARCHAR(140),
   PRIMARY KEY(surveyorID))";

   // no data returned, we just test for true(success)/false(failure):
   if (mysqli_query($connection, $sql))
   {
   	echo "Table created successfully: surveyquestion<br>";
   }

   else
   {
   	die("Error creating table: " . mysqli_error($connection));
   }


   //SAMPLE DATA HERE
   $surveyor[] = 'banilla'; $surveyName[] = 'random1'; $question2[] = 'favourite snack?'; $question3[] = 'Are you a Windows or Mac user?'; $question4[] = 'Coffee or Tea?'; $question5[] = 'Leave or Remain?'; $question6[] = 'Favourite Comedy?';

   $surveyor[] = 'beccas'; $surveyName[] = 'random2'; $question2[] = 'What Life Lessons Would You Pass On To Your Children?'; $question3[] = 'Who Or What Inspires You To Be A Better Person?'; $question4[] = 'What Is The Best And Worst Part Of Your Personality?'; $question5[] = 'What Is The Reason You Are Most Grateful In Your Life?'; $question6[] = 'Do You Have A Special Place You Like To Visit Regularly?';

   $surveyor[] = 'banilla'; $surveyName[] = 'random3'; $question2[] = 'What Is Your Favorite Type Of Workout?'; $question3[] = 'Do You Have Tattoos?'; $question4[] = 'Who Gives You The Courage To Try New Things?'; $question5[] = 'When You Meet Someone You’re Attracted To, What Do You First Notice About Them?'; $question6[] = 'Who From Your Past Do You Really Wish You’d Stayed In Contact With?';




   // loop through the arrays above and add rows to the table:
   for ($i=0; $i<count($surveyor); $i++)
   {
   	// create the SQL query to be executed
       $sql = "INSERT INTO surveyquestion
       (surveyor, surveyName, question2, question3, question4, question5, question6)
       VALUES ('{$surveyor[$i]}',
       '{$surveyName[$i]}',
       '{$question2[$i]}',
       '{$question3[$i]}',
       '{$question4[$i]}',
       '{$question5[$i]}',
       '{$question6[$i]}')";

   	// run the above query '$sql' on our DB
       // no data returned, we just test for true(success)/false(failure):
   	if (mysqli_query($connection, $sql))
   	{
   		echo "row inserted correctly <br>";
   	}

   	else
   	{
   		die("Error inserting row: <br>" . mysqli_error($connection));
   	}
   }







   ///////////////////////////////////////////
   //////////// answers table  ///////////////
   ///////////////////////////////////////////

   // if there's an old version of our table, then drop it:
   $sql = "DROP TABLE IF EXISTS surveyanswer";

   // no data returned, we just test for true(success)/false(failure):
   if (mysqli_query($connection, $sql))
   {
   	echo "<br>Dropped existing table: surveyanswer<br>";
   }

   else
   {
   	die("Error checking for existing table: " . mysqli_error($connection));
   }

   // make our table:
   // notice that the username field is a PRIMARY KEY and so must be unique in each record
   $sql = "CREATE TABLE surveyanswer(answerID int NOT NULL AUTO_INCREMENT,
   username VARCHAR(16),
   author VARCHAR(16),
   answer1 VARCHAR(140),
   answer2 VARCHAR(140),
   answer3 VARCHAR(140),
   answer4 VARCHAR(140),
   answer5 VARCHAR(140),


   PRIMARY KEY(answerID))";

   // no data returned, we just test for true(success)/false(failure):
   if (mysqli_query($connection, $sql))
   {
   	echo "Table created successfully: surveyanswer<br>";
   }

   else
   {
   	die("Error creating table: " . mysqli_error($connection));
   }

   //SAMPLE DATA HERE
   $username[]='barrym'; $author[] = 'banilla'; $answer1[] = 'CRISPS'; $answer2[] = 'MAC'; $answer3[] = 'COFFEE'; $answer4[] = 'NO COMMENT'; $answer5[] = 'KEVIN HART';

   $username[]='mandyb'; $author[] = 'beccas'; $answer1[] = 'survive'; $answer2[] = 'God'; $answer3[] = 'too positive and too emotional'; $answer4[] = 'God'; $answer5[] = 'Yes';

   $username[]='beccas'; $author[] = 'banilla'; $answer1[] = 'Biceps'; $answer2[] = 'yes'; $answer3[] = 'myself'; $answer4[] = 'eyes'; $answer5[] = 'few old friends';

   // loop through the arrays above and add rows to the table:
   for ($i=0; $i<count($username); $i++)
   {
   	// create the SQL query to be executed
       $sql = "INSERT INTO surveyanswer
       (username, author, answer1, answer2, answer3, answer4, answer5)
       VALUES ('{$username[$i]}',
			 '{$author[$i]}',
   		'{$answer1[$i]}',
       '{$answer2[$i]}',
       '{$answer3[$i]}',
       '{$answer4[$i]}',
       '{$answer5[$i]}')";


   		// run the above query '$sql' on our DB
   			// no data returned, we just test for true(success)/false(failure):
   		if (mysqli_query($connection, $sql))
   		{
   			echo "row inserted correctly <br>";
   		}

   		else
   		{
   			die("Error inserting row: <br>" . mysqli_error($connection));
   		}
   	}


   	// we're finished, close the connection:
   	mysqli_close($connection);
   	include'styleSheet.css';

   ?>
