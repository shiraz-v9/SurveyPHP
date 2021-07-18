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

   		<img src="img/gform.png" alt="Google Form" style="width:600px; height:600px">



       <h2>Survey Monkey</h2>
       <p>
   		Survey Monkey is another huge platform where users can build their own surveys. I have used survey monkey in the past and is mostly used by businesses.
   		It is not free like Google and MS Forms, unless you chose to go with just basic optionality.
   		Here is the price list that SurveyMonkey offers:<br>

   		<br>The Basic plan is FREE.<br>
   		The Standard Monthly plan costs £99 a month.<br>
   		The Advantage plan costs £32 a month, billed annually.<br>
   		The Premier plan costs £99 a month, billed annually.<br>
   		The Team Advantage plan costs £25 a month, per user, billed annually.<br>
   		The Team Premier plan costs £75 a month, per user, billed annually.<br>


   		<br>The layout of this website is fairly similar to the other competitors, their main color for the layout is green, however this could be changed if you’re a premium user.<br>

   		The login process requires credit card details for a sign-up, but if you’re choosing basic  you only need username, password, email, firstname and lastname.<br>
   		You could save time by signing up with Google and LinkedIn where the site uses permissions from third party that you agree to be stored in their database.<br></p>

   		<img src="img/smsignup.png" alt="SurveyMonkey" style="width:400px; height:450px">

   		<p>Ease of use for this website i’d say is more user friendly from the other two because it is offering drag and drop functionality for their sections as shown below.<br>
   		Not to forget that you that you’re allowed to switch to a different question type when you have already typed your data without re-typing anything.<br><br>

   		<img src="img/smgif.gif" alt="SurveyMonkey" style="width:500px; height:300px"><br>

   		Another pro of SurveyMonkey is If you have a list of questions that you have typed outside for example MS Word once pasting it on the website, it will automatically convert that string to a question type that is great for saving time.<br>
   		The question types that the user is offered is similar data options like Microsoft Forms like ratings, rankings, but they also it differs from the two where this one is offering file upload, where users can upload documents such as terms & conditions if you’re a business.<br>
   		Analysis tools that are offered to the user for the responses given are charts for the meaningful data that can be personalised and compared with different groups in your surveys.
   		Individual responses can be viewed or you can take a glance at the summarised answers rich with graphs and charts of your choice.<br>
   		You can download and save your data in several ways, selecting from summary or all data you can download and view results as PDF, PPT, XLS and CSV files. <br>
   		PDF includes visually attractive graphs that could be great to include in you presentations.<br>


       </p>




   <h2>Microsoft Forms</h2>
   <p>This third survey website as the name says is Developed by Microsoft and let users create Surveys & quizzes and analyse its data in Microsoft Excel.
   The layout of this is super simple and neat, users are presented with a Question and responses tab after creating a Microsoft account.
   You can choose between a few themes that are available or make you own background by uploading a picture.<br><br>

   <img src="img/msform.png" alt="Microsoft Form" style="width:600px; height:400px">

   <br><br>Ease of use<br>
   This survey website so far has been the easiest to use compared to the other two, because all the data type you can have on it they are self-explanatory and tell you what you can do with it.
   For example Rating option would allow users to create a section where you can get reviews here is an example that I have used:<br><br>

   <img src="img/rating.png" alt="Microsoft Form">

   <br><br>You can make a ranking available and get to know what is doing best, you could use this in your environment and get feedback, I have made an example for movies in the following image:<br><br>

   <img src="img/ranking.png" alt="Microsoft Form">

   <br><br>The Log-in process for straightforward you need an Outlook or Hotmail account both owned my Microsoft, or you can also log-in and create surveys with your organisation account, me as a student at MMU i can use my student ID to create and share surveys.<br>

   The tools that you can use for analysis are displayed in the following image, where survey owners can see responses, average time to complete which i think is great because you know how much time you can tell it takes to users before attempting.
   You can export the file to Excel ad store the data on your local machine. You also get a nice visualization of the multiple choice questions, radio buttons and rankings that give the administrator meaningful information.<br><br></p>

   <img src="img/mftools.png" alt="Microsoft Form" style="width:600px; height:400px">

   <h2>Critical Analysis</h2>

   <p>Between these three choices that I have made for potential competitors I’d have to say that all three of these websites are professional looking and offer a bug-free and smooth experience. <br>You can get more done with some such as SurveyMonkey and personalise as you wish using your own logos and colors and you’re stuck with basic background personalisation with G forms and MS forms.<br>
   I would personally go with SurveyMonkey if I was a business that constantly needs to get insight about the environment & work, because it just looks complete and professional where i get great meaningful data out of it, even though you do need to pay a price for it.<br>

   I would choose something simpler as Google Forms if I am making some simple surveys, for example I am asking about a party invitation to my friends, to sign-in they could just use their Google account because I know almost everyone has it, and I would not make the process difficult for others for a simple invitation that do not need a lot of attention, i’d feel safe with this choice.<br>
   </p>


   <h2>Conclusions</h2>

   <p>I have taken a lot of inspiration from this above listed websites to make my own survey assignment with PHP and SQL.<br>
   I feel like a lot of things can be improved if I go through more details such as incorporating my own website as a HTML embedding in users website just like Google form does.<br>
   </p>


   </body>

   </html>





_END;
   }

   // finish off the HTML for this page:
   require_once "footer.php";
   include'styleSheet.css';
   ?>
