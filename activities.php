<?php
   session_start();

   include 'includes/AccountHandler.php';
   $recentactivity = new Accounts();
?>
<html lang = "en">
     <head>
           <title> See recent activity of forum members! </title>

           <meta charset = "utf-8"/>
           <meta name = "viewport" content = "width=device-width, initial-scale=1"/>

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
                       <a href = "members.php" class = "nav-link text-white"> Members </a>
                   </li>
                   <li class = "nav-item">
                       <a href = "#" class = "nav-link text-white"> Activity </a>
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

          <!-- Forum activity table -->
          <div id = "forumactivity">
               <h3>Recent Activity</h3> <p>Activity stream for all registered members</p> </th>
               <div style = "border-bottom: 1px solid white;"></div>
               <?php
                  include "includes/UserActivity.php";
                  $recentactivity = new UserActivity();
                  $recentactivity -> RecentActivity();
               ?>
          </div>
     </body>
</html>
