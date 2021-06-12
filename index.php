<?php
  include "includes/AccountHandler.php";
  $account = new Accounts();
?>
<html lang = "en">
     <head>
          <title> Login to start creating forums on IntelliChat </title>
          <meta charset = "utf-8"/>
          <meta name = "viewport" content = "width=device-width, initial-scale=1"/>

          <link rel = "stylesheet" href = "css/login.css"/>
          <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
     </head>

     <body>
          <div id = "headings">
               <h1> Welcome to the IntelliChat forums. A place to discuss a wide variety of topics </h1>
               <h4> Please login to enter </h4>
          </div>

          <div id = "loginwindow">
               <h4> Member Login </h4>

               <form method = "POST" action = "index.php">
                   <input type = "text" placeholder = "Enter Username" name = "loginuname"/>
                   <br/>
                   <input type = "password" placeholder = "Enter Password" name = "loginpwd"/>
                   <br/>
                   <input type = "submit" value = "Login" name = "loginButton"/>
               </form>

               <?php
                  if(isset($_POST['loginButton']))
                  {
                     $uname = $_POST['loginuname'];
                     $pwd = $_POST['loginpwd'];

                     $account -> login($uname, $pwd);
                  }
               ?>

               <a href = "forgotpassword.php"><h4> Forgot password? Click here </h4></a>
               <a href = "signupPage.php" style = "text-decoration: none; color: white;"><h4> Don't have an account yet? Click here to sign up for an account </hr></a>
          </div>
   </body>
</html>
