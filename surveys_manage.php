<?php

// Things to notice:
// This is the page where each user can MANAGE their surveys
// As a suggestion, you may wish to consider using this page to LIST the surveys they have created
// Listing the available surveys for each user will probably involve accessing the contents of another TABLE in your database
// Give users options such as to CREATE a new survey, EDIT a survey, ANALYSE a survey, or DELETE a survey, might be a nice idea
// You will probably want to make some additional PHP scripts that let your users CREATE and EDIT surveys and the questions they contain
// REMEMBER: Your admin will want a slightly different view of this page so they can MANAGE all of the users' surveys

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
	$display_charts = false;
}

// the user must be signed-in, show them suitable page content
else
{
	echo "<p>Here you can complete existing surveys or create some<br></p>";
  echo "<p>Select & complete from the surveys below <br></p>";


    echo " <br><br><a href = 'simpleSurvey.php'>" . "Simple Survey" . "</a>";
    echo " <a href = 'custom_survey.php'>" . "Create Survey" . "</a>";
		echo " <a href = 'fill_surveys.php'>" . "Fill Surveys" . "</a>";
		echo " <a href = 'my_surveys.php'>" . "My Surveys" . "</a>";
		echo " <a href = 'survey_answers.php'>" . "All Answers" . "</a>";

		//CHARTS ARE FOR ADMIN ONLY
    $display_charts = false;



    // a little extra that only the admin will see:
	if ($_SESSION['username'] == "admin")
	{



        echo "<br><br><h3> Simple Survey Answers</h3>";

        $query = "SELECT * FROM simplesurvey";



        $result = mysqli_query($connection, $query);

        $n = mysqli_num_rows($result);


        if ($n>0){
            echo "<table><br><br><tr>
            <th> Username</th>
            <th> Name </th>
            <th> Surname </th>
            <th> Gender </th>
            <th> Favourite Colour </th>
            <th> Preferred travel way </th>



            </tr>";



            while ($row = mysqli_fetch_array($result))
        {

             echo "<tr>";
             echo "<td>". $row['surveyID']."</td>";
             echo "<td>". $row['q1']."</td>";
             echo "<td>". $row['q2']."</td>";
             echo "<td>". $row['q3']."</td>";
             echo "<td>". $row['q4']."</td>";
             echo "<td>". $row['q5']."</td>";




             echo "</tr>";
         }
            echo "</table>";


            //CHART QUERY for MAN
            $man = "SELECT COUNT(q3) FROM simplesurvey
            WHERE q3 = 'Man'";
            //variables that will store gender details
            $result = mysqli_query($connection, $man);
            while ($row = mysqli_fetch_array($result))
            $answer1 = $row['COUNT(q3)'];


             //CHART QUERY for Female
            $female = "SELECT COUNT(q3) FROM simplesurvey
            WHERE q3 = 'Woman'";
            //variables that will store gender details
            $result = mysqli_query($connection, $female);
            while ($row = mysqli_fetch_array($result))
            $answer2 = $row['COUNT(q3)'];

            //CHART QUERY for Prefer not to say
            $other = "SELECT COUNT(q3) FROM simplesurvey
            WHERE q3 = 'Prefer not to say'";
            //variables that will store gender details
            $result = mysqli_query($connection, $other);
            while ($row = mysqli_fetch_array($result))
            $answer3 = $row['COUNT(q3)'];
            $display_charts = true;



						//SECOND CHART QUERIES
						//counting how many cars
						$sql = "SELECT COUNT(q5) FROM simplesurvey
            WHERE q5 = 'Car'";
            //variables that will store details
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($result))
            $car = $row['COUNT(q5)'];

						//counting how many Public transport
						$sql = "SELECT COUNT(q5) FROM simplesurvey
						WHERE q5 = 'Public transport'";
						//variables that will store details
						$result = mysqli_query($connection, $sql);
						while ($row = mysqli_fetch_array($result))
						$transport = $row['COUNT(q5)'];

						//counting how many Bikes
						$sql = "SELECT COUNT(q5) FROM simplesurvey
						WHERE q5 = 'Bike'";
						//variables that will store details
						$result = mysqli_query($connection, $sql);
						while ($row = mysqli_fetch_array($result))
						$Bike = $row['COUNT(q5)'];

						//counting how many Bikes
						$sql = "SELECT COUNT(q5) FROM simplesurvey
						WHERE q5 = 'Walk'";
						//variables that will store details
						$result = mysqli_query($connection, $sql);
						while ($row = mysqli_fetch_array($result))
						$Walk = $row['COUNT(q5)'];



        }


	}


}



//THE FOLLOWING CHARTS ARE FROM Google
//I HAVE INSERTED MY SQL VARIABLES INSIDE TO MAKE THEM WORK
if($display_charts){
echo "<h3> CHARTS </h3>";
echo <<<_END
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Male to Female Ratio', 'Hours per Day'],
          ['Woman', $answer2 ],
          ['Man', $answer1 ],
          ['Prefer not to say', $answer3 ]
        ]);

        var options = {
          title: 'Male to Female Ratio',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 600px; height: 500px;"></div>



		<br><br><br>


  	<!--here is my interactive chart. author GOOGLE-->
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the controls package.
      google.charts.load('current', {'packages':['corechart', 'controls']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawDashboard);

      // Callback that creates and populates a data table,
      // instantiates a dashboard, a range slider and a pie chart,
      // passes in the data and draws it.
      function drawDashboard() {

        // Create our data table.
        var data = google.visualization.arrayToDataTable([
          ['Name', 'SLIDER'],
          ['Car' , $car],
          ['Public transport', $transport],
          ['Bike', $Bike],
          ['Walk', $Walk]
        ]);

        // Create a dashboard.
        var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard_div'));

        // Create a range slider, passing some options
        var donutRangeSlider = new google.visualization.ControlWrapper({
          'controlType': 'NumberRangeFilter',
          'containerId': 'filter_div',
          'options': {
            'filterColumnLabel': 'SLIDER'
          }
        });

        // Create a pie chart, passing some options
        var pieChart = new google.visualization.ChartWrapper({
          'chartType': 'PieChart',
          'containerId': 'chart_div',
          'options': {
            'width': 600,
            'height': 500,
            'pieSliceText': 'value',
            'legend': 'right'
          }
        });

        // Establish dependencies, declaring that 'filter' drives 'pieChart',
        // so that the pie chart will only display entries that are let through
        // given the chosen slider range.
        dashboard.bind(donutRangeSlider, pieChart);

        // Draw the dashboard.
        dashboard.draw(data);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the dashboard-->
    <div id="dashboard_div">
      <!--Divs that will hold each control and chart-->
      <div id="filter_div"></div>
      <div id="chart_div"></div>
    </div>
  </body>
</html>

_END;
}



// finish off the HTML for this page:
require_once "footer.php";

?>
