<?php
  include "includes/AccountHandler.php";
  $account = new Accounts();
?>
<html lang = "en">
     <head>
          <title> Register an account now! </title>
          <meta chartset = "utf-8"/>
          <meta name = "viewport" content = "width=device-width, initial-scale=1"/>

          <link rel = "stylesheet" href = "css/signup.css"/>
     </head>

     <body>
          <div id = "headings">
              <h1> Welcome </h1>
              <h4> Please sign up now to join our discussion forum </h4>
          </div>

          <div id = "signupwindow">
              <h3> Member Signup </h3>

              <form method = "POST" action = "signupPage.php">
                   <input type = "text" placeholder = "Enter First Name" name = "fname"/>
                   <br/>
                   <input type = "text" placeholder = "Enter Last Name" name = "lname"/>
                   <br/>
                   <input type = "email" placeholder = "Enter your Email" name = "email"/>
                   <br/>
                   <input type = "text" placeholder = "Enter Desired Username" name = "uname"/>
                   <br/>
                   <input type = "password" placeholder = "Enter Desired Password" name = "pwd"/>
                   <br/>
                   <input type = "submit" value = "Register" name = "submitButton"/>
              </form>

              <?php
                if(isset($_POST['submitButton']))
                {
                  $accountCreatedDate = date("m/d/Y"); //date of when the user first created his/her account
                  $fname = $_POST['fname'];
                  $lname = $_POST['lname'];
                  $email = $_POST['email'];
                  $uname = $_POST['uname'];
                  $pwd = $_POST['pwd'];

                  $account -> signup($accountCreatedDate, $fname, $lname, $email, $uname, $pwd);
                }
              ?>

              <a href = 'index.php'> <h5> Already have an account, log in now </h5> </a>
          </div>
     </body>
</html>
