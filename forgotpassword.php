<?php
  include "includes/AccountHandler.php";
  $account = new Accounts();
?>
<html lang = "en">
     <head>
          <title> Forgot Password? Change password right away </title>
          <meta charset = "utf-8"/>

          <link rel = "stylesheet" href = "css/forgotpassword.css"/>
     </head>

     <body>
          <div id = "forgotpwdWindow">
               <h4> Forgot password? Enter your username and email to change your password right away </h4>

               <form method = "POST" action = "forgotpassword.php" id = "information-input">
                    <input type = "text" name = "uname" placeholder = "Enter Username"/>
                    <input type = "email" name = "uemail" placeholder = "Enter Email"/>
                    <input type = "password" name = "newPwd" placeholder = "Enter new password"/>
                    <input type = "submit" value = "Submit Info" name = "submitButton"/>
               </form>
               <p id = "errMessage" style = "font-family: serif;"></p>
               <?php
                  if(isset($_POST['submitButton']))
                  {
                     $UserName = $_POST['uname'];
                     $Email = $_POST['uemail'];
                     $NewPwd = $_POST['newPwd'];

                     $account -> ChangePwd($UserName, $Email, $NewPwd);
                  }
               ?>

               <a href = "index.php" id = "backtoLogin"> <h5>Go back to the login page</h5> </a>
          </div>
     </body>
</html>
