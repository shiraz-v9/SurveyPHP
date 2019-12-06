<?php

// Things to notice:
// You need to add your Analysis and Design element of the coursework to this script
// There are lots of web-based survey tools out there already.
// It’s a great idea to create trial accounts so that you can research these systems. 
// This will help you to shape your own designs and functionality. 
// Your analysis of competitor sites should follow an approach that you can decide for yourself. 
// Examining each site and evaluating it against a common set of criteria will make it easier for you to draw comparisons between them. 
// You should use client-side code (i.e., HTML5/JavaScript/jQuery) to help you organise and present your information and analysis 
// For example, using tables, bullet point lists, images, hyperlinking to relevant materials, etc.

// execute the header script:
require_once "header.php";

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
	echo "Your information for the Analysis and Design component of the coursework goes here... See the assignment specification for more details.<br>";
    
 echo <<<_END
<!DOCTYPE html>
<html>
<head>
<title>COMPETITORS</title>
</head>

<body>
    <h1>Analysis & design</h1>
    <p> In this section I will be comparing some popular survey websites and   evaluate how they are presented. 
    My competitor choice is Survey Monkey & Google forms.</p>

    <h3> Google forms</h3><p>
    Google within their popular way of collaborating through G suite they have forms that can be made through collaboration if you are working in a team, or they can be made individually for the public for free.<br>
    The layout of the forms is very straightforward, there are many already made templates that you as a user can choose and edit.
    </p>
    
    
    <p>You do need a Google account to make a form, and without it you will need to sign up first;<br>
    I was already logged in so this step was not even showed up to me.

    I am familiar with Google forms because I have created one for the “dog adoption” website assignment in college and it was asking basic questions like name, address & availability, this was going to come back to me as the user submitting his preferences in dog breed with a preferred date, where i can get back to them through that information that they’ve submitted.<br>

    There is a large selection of question types a user can add to this including short answer, paragraph, multiple choices, drop down and file upload.
    I think the file upload is a great solution for businesses to include their term and conditions where the user must answer to proceed.<br>


    The responses can be viewed individually or can be seen as a summary where you have barcharts as analysis tools where appropriate. 
    One great feature about Google is that everything works well in their Gsuite ecosystem, where you can make forms work on their docs or sheets, view the answers and use their built in tools as you like. 
    Not to forget that there are tons of third party tools that users can download and enhance functionality on their forms. 
    </p>
    
    
    
    <h3>Survey Monkey</h3>
    <p>Survey Monkey is another huge platform where users can build their own surveys. I have used survey monkey to submit some surveys in the past and is mostly used by businesses. <br>
    It is not free like Google.  <br>Their monthly membership will cost you from £32 individual and their business one cost £25.
    They have a free plan where users can make surveys, but limited to customisation optionality, where they offer you few already made themes, just like Google. I would say it is more business liked because with premium plans you can have your business brand instead of their default one. 
    <br>The presentation of the website is very neat, where you are presented with a live animation of a demo of what their website could be used for in your business/workplace.<br>
    Ease of use of their website I would say it is easy to complete surveys
    
    </p>
</body>

</html>
 
   
    
    
    
_END;
}

// finish off the HTML for this page:
require_once "footer.php";
?>