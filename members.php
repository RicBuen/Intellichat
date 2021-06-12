<?php
   session_start();

   include "includes/UserActivity.php";
   $users = new UserActivity();
?>
<html lang = "en">
     <head>
          <title> Check to see who's logged in and who just signed up to this website </title>

          <meta charset = "utf-8"/>
          <meta name = "viewport" content = "width=device-width, initial-scale=1"/>

          <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
          <link rel = "stylesheet" href = "css/main.css"/>


          <!-- Link the Bootstrap 4 CDN CSS files (this is mainly for the navbar) -->
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
          <!-- Link the Bootstrap 4 CDN JS and jQuery files (must be in this order: jQuery, Popper, Bootstrap.js) -->
          <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
          <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
          <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>

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
                       <a href = "forumhome.php" class = "nav-link text-white"> Home </a>
                   </li>
                   <li class = "nav-item">
                       <a href = "#" class = "nav-link text-white"> Members </a>
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

          <!-- Members window (displays both the number of users who just signed up an account and the number of users who are currently logged in) -->
          <div id = "memberswindow">
               <!-- This table displays the number of user who just registered for a forum account -->
               <table id = "registeredUsers" class = "table">
                      <h4 style = "color: white; font-family: 'Lobster', cursive; font-size: 25px; text-align: center;"> Forum members </h4>
                      <thead>
                            <th> Username </th>
                            <th> Date of registration </th>
                      </thead>
                      <?php
                        $users -> RegisteredUsers();
                      ?>
               </table>
               <p id = "registeredusersError" class = "text-danger" style = "font-family: serif; text-align: center;"></p>

               <div style = "margin-top: 15%;"></div>

               <!-- This table displays the number of users currently logged on to the forum -->
               <table id = "loggedUsers" class = "table">
                      <h4 style = "color: white; font-family: 'Lobster', cursive; font-size: 25px; text-align: center;"> See who's currently logged in </h4>
                      <thead>
                            <th> Username </th>
                            <th> Status </th>
                            <th> Logged in at </th>
                      </thead>
                      <?php
                        $users -> displayLoggedUsers();
                      ?>
               </table>
               <p id = "loggedusersError" class = "text-danger" style = "font-family: serif; text-align: center;"></p>
          </div>
     </body>
</html>
