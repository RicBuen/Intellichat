<?php
   session_start(); //needed for starting session

   //for updating user information
   include 'includes/ProfileHandler.php';
   $update = new ProfileHandler();

   $userid = $_SESSION['userid'];
?>
<html>
     <head lang = "en">
          <title> Welcome to your profile </title>
          <meta charset = "utf-8"/>
          <meta name = "viewport" content = "width=device-width, initial-scale=1"/>

          <link rel = "stylesheet" href = "css/userprofile.css"/>

          <!-- Link the Bootstrap 4 CDN CSS files (this is mainly for the navbar) -->
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

          <!-- Link the Bootstrap 4 CDN JS and jQuery files (must be in this order: jQuery, Popper, Bootstrap.js) -->
          <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
          <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
          <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>

          <!-- Link the ajaxJS files  -->
          <script src = "ajaxJS/updatePicture.js"></script>


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
                             <a href = "#" class = "dropdown-link btn btn-primary d-flex justify-content-center"> Go to account settings </a>
                        </div>
                    </li>
                    <li class = "nav-item">
                        <a href = "includes/logout.php" class = "nav-link text-white"> Logout </a>
                    </li>
                </ul>
           </nav>

           <div style = "margin-top: 7%;"></div>

          <!-- Displays profile image and settings for changing picture -->
          <div id = "profileimage-window" style = "margin: 5%; padding: 20px; border-radius: 5px; border-style: dotted; border-width: thin; font-family: serif;">
              <img src = <?php echo '\'' . $_SESSION['pic'] . '\''; ?> height = '150' width = '150'/>
              <h3 style = "font-family: serif;"> Select new image to upload: </h3>
              <form action = 'userprofile.php' method = 'POST' enctype = 'multipart/form-data' style = "margin-top: 5%;" class = "form-inline">
                   <div class = "form-control">
                        <input type = 'file' name = 'getFile' class = "form-control-file"/>
                   </div>
                   <input type = 'submit' value = 'Upload Photo' name = 'submit-pic' class = 'btn btn-success form-control'/>
              </form>
              <?php
                if(isset($_POST['submit-pic']))
                {
                   $update -> uploadPics($userid);
                }
              ?>
          </div>

          <!-- Settings for changing user info -->
          <div id = "settings-window" style = "margin: 5%; padding: 10px; border-radius: 5px; border-width: thin; border-style: dotted;">
               <h3 style = "text-align: center; font-family: serif;"> Change Info </h3>
               <div class = "container d-flex justify-content-center">
                    <form action = 'userprofile.php' method = "POST" class = "form-inline" style = "font-family: serif;">
                          <div class = "form-group">
                              <input type = "text" name = "changefname" placeholder = "Set new firstname" class = "form-control mr-sm-2"/>
                              <input type = "submit" name = "new-fname" value = "Change firstname" class = "btn btn-success text-white"/>
                          </div>
                    </form>
                    <?php
                       if(isset($_POST['new-fname']))
                       {
                          $newfname = $_POST['changefname'];
                          $update -> updateFname($userid, $newfname);
                       }
                    ?>
               </div>
               <div class = "container d-flex justify-content-center">
                    <form action = 'userprofile.php' method = "POST" class = "form-inline" style = "font-family: serif;">
                          <div class = "form-group">
                              <input type = "text" name = "changelname" placeholder = "Set new lastname" class = "form-control mr-sm-2"/>
                              <input type = "submit" name = "new-lname" value = "Change lastname" class = "btn btn-success text-white"/>
                          </div>
                    </form>
                    <?php
                       if(isset($_POST['new-lname']))
                       {
                          $newlname = $_POST['changelname'];
                          $update -> updateLname($userid, $newlname);
                       }
                    ?>
               </div>
               <div class = "container d-flex justify-content-center">
                    <form action = 'userprofile.php' method = "POST" class = "form-inline" style = "font-family: serif;">
                          <div class = "form-group">
                               <input type = "text" name = "changeuname" placeholder = "Set new username" class = "form-control mr-sm-2"/>
                               <input type = "submit" name = "new-uname" value = "Change username" class = "btn btn-success text-white"/>
                          </div>
                    </form>
                    <?php
                       if(isset($_POST['new-uname']))
                       {
                          $newuname = $_POST['changeuname'];
                          $update -> updateUname($userid, $newuname);
                       }
                    ?>
               </div>
               <div class = "container d-flex justify-content-center">
                    <form action = 'userprofile.php' method = "POST" class = "form-inline" style = "font-family: serif;">
                          <div class = "form-group">
                               <input type = "password" name = "changepwd" placeholder = "Set new password" class = "form-control mr-sm-2"/>
                               <input type = "submit" name = "new-pwd" value = "Change password" class = "btn btn-success text-white"/>
                          </div>
                    </form>
                    <?php
                      if(isset($_POST['new-pwd']))
                      {
                         $newpwd = $_POST['changepwd'];
                         $update -> updatePwd($userid, $newpwd);
                      }
                    ?>
               </div>
               <div class = "container d-flex justify-content-center">
                    <form action = 'userprofile.php' method = "POST" class = "form-inline" style = "font-family: serif;">
                          <div class = "form-group">
                               <input type = "email" name = "changeemail" placeholder = "Set new email" class = "form-control mr-sm-2"/>
                               <input type = "submit" name = "new-email" value = "Change email" class = "btn btn-success text-white"/>
                          </div>
                    </form>
                    <?php
                      if(isset($_POST['new-email']))
                      {
                         $newemail = $_POST['changeemail'];
                         $update -> updateEmail($userid, $newemail);
                      }
                    ?>
               </div>
               <div class = "container d-flex justify-content-center">
                    <form action = 'userprofile.php' method = "POST" class = "form-inline" style = "font-family: serif;">
                          <div class = "form-group">
                               <input type = "text" name = "changestatus" placeholder = "Set new status" class = "form-control mr-sm-2"/>
                               <input type = "submit" name = "new-status" value = "Change status" class = "btn btn-success text-white"/>
                          </div>
                    </form>
                    <?php
                      if(isset($_POST['new-status']))
                      {
                         $newstatus = $_POST['changestatus'];
                         $update -> updateStatus($userid, $newstatus);
                      }
                    ?>
               </div>
          </div>

          <!-- Displays messages from other users and messages sent -->
          <div id = "message-window" style = "margin: 5%; padding: 10px; border-radius: 5px; border-style: dotted; border-width: thin; font-family: serif;">
              <!-- Messages from other users -->
              <div id = "messageinbox">
                   <h4 text-align: center;> Your private message inbox (messages other forum members have sent to you): </h4>
                   <table id = "usermessageinbox" style = "margin-top: 5%;">
                        <tr>
                           <th> From </th>
                           <th> Title </th>
                           <th> Date sent </th>
                           <th> Message </th>
                        </tr>
                        <?php
                          $update -> DisplayMessage2($_SESSION['userid']);
                        ?>
                   </table>
              </div>

              <!-- Messages you sent -->
               <div id = "sentmessages" style = "margin-top: 10%;">
                    <h4> Private messages you have sent to other forum members: </h4>
                    <table id = "messagessend" style = "margin-top: 10px;">
                         <tr>
                            <th> To </th>
                            <th> Title </th>
                            <th> Date sent </th>
                            <th> Message </th>
                         </tr>
                         <?php
                            $update -> DisplayMessages1($_SESSION['userid']);
                         ?>
                    </table>
               </div>
          </div>

          <!-- Option for sending private message -->
          <div id = "privatemessage-window" style = "margin: 5%; padding: 20px; border-radius: 5px; border-style: dotted; border-width: thin; font-family: serif;">
               <h3 style = "text-align: center;"> Send Private Message </h3>

               <form method = "POST" action = "userprofile.php" id = "sendpm">
                     <div class = "form-group d-flex justify-content-center">
                          <label> Enter username of forum member: <input type = "text" name = "memberName" class = "form-control"/> </label>
                     </div>
                     <div class = "form-group d-flex justify-content-center">
                          <label style = "margin-top: 10px;"> Enter title of private message: <input type = "text" name = "messageTitle" class = "form-control"/> </label>
                     </div>
                     <div class = "form-group">
                          <p style = "text-align: center;"> Enter Message: </p>
                          <textarea name = "pm-message" rows = "10" style = "resize: none;" class = "form-control"></textarea>
                     </div>
                     <div class = "form-group d-flex justify-content-center">
                          <input type = "submit" name = "submitPM" value = "Send PM" style = "margin-top: 20px;" class = "btn btn-success"/>
                     </div>
               </form>
               <?php
                  if(isset($_POST['submitPM']))
                  {
                     $datecreated = date("m/d/Y"); //when the message was created
                     $username = $_SESSION['username']; //username of the member sending the message
                     $membername = $_POST['memberName']; //username of the member who the message is being sent to
                     $messagetitle = $_POST['messageTitle']; //title of the private message
                     $messagecontent = $_POST['pm-message']; //content of the private message

                     $update -> PrivateMessage($_SESSION['userid'], $messagetitle, $messagecontent, $membername, $username, $datecreated);
                  }
               ?>
          </div>

          <!-- List of threads you last made -->
          <div id = "user-posts" style = "margin: 5%; padding: 10px; border-radius: 5px; border-style: dotted; border-width: thin; font-family: serif;">
               <h3 style = "margin-bottom: 15px;"> Some threads you have made </h3>
               <table id = "threadsCreated">
                     <tr>
                        <th> Threads you have created: </th>
                        <th> Subject of your threads: </th>
                        <th> Topic of your threads </th>
                        <th> Date of threads posted: </th>
                     </tr>
                     <?php
                        include 'includes/ThreadHandler.php';

                        $showThreads = new ThreadHandler();
                        $showThreads -> showThreads($_SESSION['userid']);
                     ?>
               </table>
          </div>
     </body>
</html>
