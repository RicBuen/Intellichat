<?php
   session_start();

   include "includes/ThreadHandler.php";

   /* For the Culture threads */
   $philosophyThreads = new ThreadHandler(); //for displaying the most recent philsophy threads
   $religionThreads = new ThreadHandler(); //for displaying the most recent religion threads
   $artThreads = new ThreadHandler(); //for displaying the most recent art threads

   /* For the Natural Science and Mathematics threads */
   $astronomyThreads = new ThreadHandler(); //for displaying the most recent astronomy threads
   $biologyThreads = new ThreadHandler(); //for displaying the most recent biology threads
   $chemistryThreads = new ThreadHandler(); //for displaying the most recent chemistry threads
   $earthsciThreads = new ThreadHandler(); //for displaying the most recent earth science threads
   $mathThreads = new ThreadHandler(); //for displaying the most recent mathematics threads
   $physicsThreads = new ThreadHandler(); //for displaying the most recent physics threads

   /* For the Social Science threads */
   $anthroThreads = new ThreadHandler(); //for displaying the most recent anthropology threads
   $archThreads = new ThreadHandler(); //for displaying the most recent archeology threads
   $lingThreads = new ThreadHandler(); //for displaying the most recent linguistics threads
   $psyThreads = new ThreadHandler(); //for displaying the most recent psychology threads
   $socThreads = new ThreadHandler(); //for displaying the most recent sociology threads

   /* For the Technology threads */
   $comphardThreads = new ThreadHandler(); //for displaying the most recent computer hardware threads
   $compsoftThreads = new ThreadHandler(); //for displaying the most recent computer software threads
   $phoneThreads = new ThreadHandler(); //for displaying the most recent smartphones threads
   $vidgmThreads = new ThreadHandler(); //for displaying the most recent video game threads

   /* For the International News threads */
   $intnewsThreads = new ThreadHandler(); //for displaying the most recent international news threads
   
   //if user is logged in, set their log_status to active in the activeaccounts table
   include "includes/UserActivity.php";
   $useractivity = new UserActivity();
   
   $userid = $_SESSION['userid'];
   $username = $_SESSION['username'];
   $useractivity -> setLoggedUsers($userid, $username);
?>
<html lang = "en">
    <head>
         <title> Welcome to IntelliChat </title>
         <meta charset = "utf-8"/>
         <meta name = "viewport" content = "width=device-width, initial-scale=1"/>

         <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
         <link rel = "stylesheet" href = "css/main.css"/>
         
         <!-- Link the Bootstrap 4 CDN CSS files (this is mainly for the navbar) -->
         <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
         
         <!-- For changing the background color of navbar elements when hovering cursor on them -->
         <style>
             .nav-item:hover
             {
                background-color: blue;
             }
         </style>
    </head>

    <body>
          <!-- Navbar -->
          <nav class = "navbar navbar-expand-sm bg-dark navbar-dark fixed-top" style = 'border-radius: 10px; font-family: serif;'>
               <ul class = "navbar-nav mr-auto">
                   <li class = "nav-item">
                       <a href = "#" class = "nav-link text-white"> Home </a>
                   </li>
                   <li class = "nav-item">
                       <a href = "members.php" class = "nav-link text-white"> Members </a>
                   </li>
                   <li class = "nav-item">
                       <a href = "activities.php" class = "nav-link text-white"> Activity </a>
                   </li>
               </ul>
               <ul class = "navbar-nav ml-auto">
                   <li class = "nav-item dropdown">
                       <a href = "#" class = "nav-link dropdown-toggle text-white" data-toggle = "dropdown"> Hello: <?php echo $_SESSION['username']; ?> </a>
                       <div class = "dropdown-menu" style = "padding: 10px;">
                            <span class = "dropdown-link d-flex justify-content-center" style = "padding: 10px;"> <?php echo "<img src = '" . $_SESSION['pic'] . "' height='70' width='70'/>"; ?> </span>
                            <span class = "dropdown-link d-flex justify-content-center"> <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> </span>
                            <span class = "dropdown-link d-flex justify-content-center"> <?php echo $_SESSION['useremail']; ?> </span>
                            <span class = "dropdown-link d-flex justify-content-center"> <?php echo $_SESSION['status']; ?> </span>
                            <span class = "dropdown-link d-flex justify-content-center"> <?php echo $_SESSION['regdate']; ?> </span>
                            <a href = "userprofile.php" class = "dropdown-link btn btn-primary d-flex justify-content-center"> Go to account settings </a>
                       </div>
                   </li>
                   <li class = "nav-item">
                       <a href = "includes/logout.php" class = "nav-link text-white"> Logout </a>
                   </li>
               </ul>
          </nav>
          
          <div style = "margin-top: 7%;"></div> 

         <!-- Search for forums -->
         <div id = "searchwindow">
             <p> Search for your favorite topic thread </p>

             <form method = "POST" action = "forumhome.php">
                  <input type = "text" name = "threadname" placeholder = "Enter thread name"/>
                  <br/>
                  <input type = "text" name = "subjectname" placeholder = "Enter subject (Culture, Social Science, etc)"/>
                  <br/>
                  <input type = "submit" name = "submit-search" value = "Search"/>
             </form>
             <?php
                 if(isset($_POST['submit-search']))
                 {
                    $ThreadName = $_POST['threadname'];
                    $SubjectName = $_POST['subjectname'];

                    $searchThread = new ThreadHandler();
                    $searchThread -> searchThreads($ThreadName, $SubjectName);
                 }
             ?>
         </div>

         <!-- Forum window -->
         <div id = "forumwindow">
             <!-- Culture -->
             <table class = "maintable" style = "margin-bottom: 10px;">
                  <thead>
                      <tr>
                         <th class = "leftside"> Culture </th>
                         <th class = "rightside"> Latest Posts </th>
                      </tr>
                  </thead>

                  <tbody>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Culture/Philosophy.php">Philosophy</a> </td>
                         <td class = "rightside"> <?php $philosophyThreads -> obtainTopicThread("Culture", "Philosophy"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Culture/Religion.php">Religion</a> </td>
                         <td class = "rightside"> <?php $religionThreads -> obtainTopicThread("Culture", "Religion"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Culture/Art.php">Art</a> </td>
                         <td class = "rightside"> <?php $artThreads -> obtainTopicThread("Culture", "Art"); ?> </td>
                      </tr>
                  </tbody>
             </table>

             <!-- Social Science -->
             <table class = "maintable" style = "margin-bottom: 10px;">
                  <thead>
                      <tr>
                         <th class = "leftside"> Social Science </th>
                         <th class = "rightside"> Latest Posts </th>
                      </tr>
                  </thead>

                  <tbody>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Social Science/Anthropology.php">Anthropology</a> </td>
                         <td class = "rightside"> <?php $anthroThreads -> obtainTopicThread("Social Science", "Anthropology"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Social Science/Archeology.php">Archeology</a> </td>
                         <td class = "rightside"> <?php $archThreads -> obtainTopicThread("Social Science", "Archeology"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Social Science/Sociology.php">Sociology</a></td>
                         <td class = "rightside"> <?php $socThreads -> obtainTopicThread("Social Science", "Sociology"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Social Science/Psychology.php">Psychology</a></td>
                         <td class = "rightside"> <?php $psyThreads -> obtainTopicThread("Social Science", "Psychology"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Social Science/Linguistics.php">Linguistics</a></td>
                         <td class = "rightside"> <?php $lingThreads -> obtainTopicThread("Social Science", "Linguistics"); ?> </td>
                      </tr>
                  </tbody>
             </table>

             <!-- Natural Science and Mathematics -->
             <table class = "maintable" style = "margin-bottom: 10px;">
                  <thead>
                      <tr>
                         <th class = "leftside"> Natural Science and Mathematics </th>
                         <th class = "rightside"> Latest Posts </th>
                      </tr>
                  </thead>

                  <tbody>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Natural Science and Mathematics/Biology.php">Biology</a> </td>
                         <td class = "rightside"> <?php $biologyThreads -> obtainTopicThread("Natural Science and Mathematics", "Biology"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Natural Science and Mathematics/Chemistry.php">Chemistry</a> </td>
                         <td class = "rightside"> <?php $chemistryThreads -> obtainTopicThread("Natural Science and Mathematics", "Chemistry"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Natural Science and Mathematics/Physics.php">Physics</a> </td>
                         <td class = "rightside"> <?php $physicsThreads -> obtainTopicThread("Natural Science and Mathematics", "Physics"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Natural Science and Mathematics/EarthScience.php">Earth Science</a> </td>
                         <td class = "rightside"> <?php $earthsciThreads -> obtainTopicThread("Natural Science and Mathematics", "Earth Science"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Natural Science and Mathematics/Astronomy.php">Astronomy</a> </td>
                         <td class = "rightside"> <?php $astronomyThreads -> obtainTopicThread("Natural Science and Mathematics", "Astronomy"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Natural Science and Mathematics/Mathematics.php">Mathematics</a> </td>
                         <td class = "rightside"> <?php $mathThreads -> obtainTopicThread("Natural Science and Mathematics", "Mathematics"); ?> </td>
                      </tr>
                  </tbody>
             </table>

             <!-- International News -->
             <table class = "maintable" style = "margin-bottom: 10px;">
                  <thead>
                      <tr>
                         <th class = "leftside"> Things happening outside the Internet </th>
                         <th class = "rightside"> Latest Posts </th>
                      </tr>
                  </thead>

                  <tbody>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/World News/News.php">International News</a> </td>
                         <td class = "rightside"> <?php $intnewsThreads -> obtainTopicThread("World News", "International News"); ?> </td>
                      </tr>
                  </tbody>
             </table>

             <!-- Technology -->
             <table class = "maintable">
                  <thead>
                      <tr>
                         <th class = "leftside"> What's going on now in Tech </th>
                         <th class = "rightside"> Latest Posts </th>
                      </tr>
                  </thead>

                  <tbody>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Technology/CompSoft.php">Computer Software/Programs</a> </td>
                         <td class = "rightside"> <?php $compsoftThreads -> obtainTopicThread("Technology", "Computer Software"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Technology/CompHard.php">Computer Hardware</a> </td>
                         <td class = "rightside"> <?php $comphardThreads -> obtainTopicThread("Technology", "Computer Hardware"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Technology/VidGm.php">Video Games</a> </td>
                         <td class = "rightside"> <?php $vidgmThreads -> obtainTopicThread("Technology", "Video Games"); ?> </td>
                      </tr>
                      <tr>
                         <td class = "leftside"> <a href = "Subjects/Technology/Phones.php">Smartphones and Tablets</a> </td>
                         <td class = "rightside"> <?php $phoneThreads -> obtainTopicThread("Technology", "Smartphones"); ?> </td>
                      </tr>
                  </tbody>
             </table>
         </div>
         
         <!-- Link the Bootstrap 4 CDN JS and jQuery files (must be in this order: jQuery, Popper, Bootstrap.js) -->
         <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
         <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
         <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    </body>
</html>
