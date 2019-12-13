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

 echo <<<_END
<!DOCTYPE html>
<html>
<head>
<title>COMPETITORS</title>
</head>

<body>
    <h1>Our Competitors</h1>
    <p> In this section I will be comparing some popular survey websites and   evaluate how they are presented.
    My competitor choice is <b>Google forms, Survey Monkey & Microsoft Forms.</b></p>

    <h2> Google forms</h2><p>
    Google within their popular way of collaborating through G suite they have forms that can be made through collaboration if you are working in a team, or they can be made individually for the public for free.<br>
    The layout of the forms is very straightforward, there are many already made templates that you as a user can choose and edit.
    </p>

		<img src="img/gtemplates.png" alt="Google Form">


    <p>You do need a Google account to make a form, and without it you will need to sign up first;<br>
    I was already logged in so this step was not even showed up to me.

    I am familiar with Google forms because I have created one for the “dog adoption” website assignment in college and it was asking basic questions like name, address & availability, this was going to come back to me as the user submitting his preferences in dog breed with a preferred date, where i can get back to them through that information that they’ve submitted.<br>

    There is a large selection of question types a user can add to this including short answer, paragraph, multiple choices, drop down and file upload.
    I think the file upload is a great solution for businesses to include their term and conditions where the user must answer to proceed.<br>


    The responses can be viewed individually or can be seen as a summary where you have barcharts as analysis tools where appropriate.
    One great feature about Google is that everything works well in their Gsuite ecosystem, where you can make forms work on their docs or sheets, view the answers and use their built in tools as you like.
    Not to forget that there are tons of third party tools that users can download and enhance functionality on their forms.
    </p>

		<img src="img/gform.png" alt="Google Form">



    <h2>Survey Monkey</h2>
    <p>Survey Monkey is another huge platform where users can build their own surveys. I have used survey monkey to submit some surveys in the past and is mostly used by businesses. <br>
    It is not free like Google.  <br>Their monthly membership will cost you from £32 individual and their business one cost £25.
    They have a free plan where users can make surveys, but limited to customisation optionality, where they offer you few already made themes, just like Google. I would say it is more business liked because with premium plans you can have your business brand instead of their default one.
    <br>The presentation of the website is very neat, where you are presented with a live animation of a demo of what their website could be used for in your business/workplace.<br>
    Ease of use of their website I would say it is easy to complete surveys

    </p>

		<p><h1>Analysis and Design</h1>

<p>Within this section of the assignment, I will be comparing different type of surveys across the internet, mainly the more suitable competitors and analyse them in terms of their: login process, layout, ease of use, their question types and the analysis tool.

The first website we will be looking at is https://www.surveymonkey.com/

Layout of surveys

There are three ways in which the survey monkey presents their surveys. The first method is where a user can create a multiple-choice survey that fits in one page and the user who would answer the survey can choose between five answers. The second method in which you can layout a survey would be when each question is presented at a time, which means that before proceeding to the next question the user must first answer the question shown on the screen and after answering that the user can then proceed to the next question, this allows the user to focus on each question at once so they can really focus on each question. The last type of service provided by Survey Monkey is a live-chat type of option where the user can engage in a conversation with the SurveyMonkey Genius who will then ask question, in this format the user can feel more involved in completing the survey and can get a better feedback.

Ease of use

The developers of Survey Monkey made their website very user friendly, so that people that are good at developing professional surveys as well as users that are new to this field can easily create the type of survey they want to make. Before creating a survey, the user has the option to choose if they want a survey created for them based upon a few question the website will ask, or if they want to start from a blank page and start their own personalised survey from scratch for the more professional users. My opinion of their ease to use is that it’s exceptional that the Survey has an option of creating a survey for the less experienced users, however they could have an option where there is a layout which they can choose in ask the questions they have in mind for users who want to create a survey with their own questions, but also do not want to spend a lot of time on designing the layout.

Log in process

The log in process of this website is very similar to other website, in order to register a user must enter a creative username, followed by a password, an email address as well as first and last name as shown in the screenshot by the side. There is also an option for the user to signup via their social media. I would like to critique the fact that Survey Monkey requires very few details in order to register a user. I would rather ask for more details to validate a user to make sure, the users cannot spam such as asking for their telephone number and make sure they are old enough by asking their data of birth as it can be relevant, however they do ask for more information once a user is registered so that surveys are better suited for that specific user.











Question Types

There are a lot of different ways that Survey Monkey has presented the type of questions a user can ask, such as the basic options such as check boxes  and dropdown menus between questions for multiple choice type of surveys, or a comment box or single text box for questions that are more openminded and need more details so that the user doesn’t feel they are stuck between a few options. There are also more dynamic options like rating type of questions in which the user can use the stars to rate certain statement type of surveys or rate opinions of a creator. The survey monkey has far too many types of question to be compared to my website, however I will be using some of these options in consideration.

Analysis Tools

There are two ways in which survey monkey analyses the data that the users have inputted after completing the survey, the first method is simply a summary of how many people have chosen which options and these can be outputted simply in data or bar charts to see which were the most popular choices. This method of outputting the analysis result is very effective because the user can easily get a feedback. Another analysis allows the user to assess answers from each person who undertook the survey to check their answers in more details instead of having an over overview from each and every person who has undertook the survey.</p>


<h2>Microsoft Forms</h2>
<p>This third survey website as the name says is Developed by Microsoft and let users create Surveys & quizzes and analyse its data in Microsoft Excel.
The layout of this is super simple and neat, users are presented with a Question and responses tab after creating a Microsoft account.
You can choose between a few themes that are available or make you own background by uploading a picture.<br><br>

<img src="img/msform.png" alt="Microsoft Form">

<br><br>Ease of use<br>
This survey website so far has been the easiest to use compared to the other two, because all the data type you can have on it they are self-explanatory and tell you what you can do with it.
For example Rating option would allow users to create a section where you can get reviews here is an example that I have used:<br><br>

<img src="img/rating.png" alt="Microsoft Form">

<br><br>You can make a ranking available and get to know what is doing best, you could use this in your environment and get feedback, I have made an example for movies in the following image:<br><br>

<img src="img/ranking.png" alt="Microsoft Form">

<br><br>The Log-in process for straightforward you need an Outlook or Hotmail account both owned my Microsoft, or you can also log-in and create surveys with your organisation account, me as a student at MMU i can use my student ID to create and share surveys.<br>

The tools that you can use for analysis are displayed in the following image, where survey owners can see responses, average time to complete which i think is great because you know how much time you can tell it takes to users before attempting.
You can export the file to Excel ad store the data on your local machine. You also get a nice visualization of the multiple choice questions, radio buttons and rankings that give the administrator meaningful information.<br><br>

<img src="img/mftools.png" alt="Microsoft Form">

</p>
</body>

</html>





_END;
}

// finish off the HTML for this page:
require_once "footer.php";
include'styleSheet.css';
?>
