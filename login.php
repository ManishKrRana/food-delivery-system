<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel="icon" href="./images/favicon.png">
   <title>FoodBox - login</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

   <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
   <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

   <link rel="stylesheet" href="css/login.css">
   <link href="css/style.css" rel="stylesheet">
   <link href="css/bootstrap.min.css" rel="stylesheet">

   <style type="text/css">
      #buttn {
         color: #fff;
         background-color: #ff3300;
      }
   </style>

</head>

<body>
   <?php
   include("connection/connect.php"); //INCLUDE CONNECTION
   error_reporting(0); // hide undefine index errors
   session_start(); // temp sessions
   if (isset($_POST['submit']))   // if button is submit
   {
      $username = $_POST['username'];  //fetch records from login form
      $password = $_POST['password'];

      if (!empty($_POST["submit"]))   // if records were not empty
      {
         $loginquery = "SELECT * FROM users WHERE username='$username' && password='" . md5($password) . "'"; //selecting matching records
         $result = mysqli_query($db, $loginquery); //executing
         $row = mysqli_fetch_array($result);

         if (is_array($row))  // if matching records in the array & if everything is right
         {
            $_SESSION["user_id"] = $row['u_id']; // put user id into temp session
            header("refresh:1;url=index.php"); // redirect to index.php page
         } else {
            $message = "Invalid Username or Password!"; // throw error
         }
      }
   }
   ?>
   <div class="pen-title">
      <h1>Login Form</h1>
   </div>
   <!-- Form Module-->
   <div class="module form-module">
      <div class="toggle">
      </div>
      <div class="form">
         <h2>Login to your account</h2>
         <span style="color:red;"><?php echo $message; ?></span>
         <span style="color:green;"><?php echo $success; ?></span>
         <form action="" method="post">
            <input type="text" placeholder="Username" name="username" />
            <input type="password" placeholder="Password" name="password" />
            <input type="submit" id="buttn" name="submit" value="login" />
         </form>
      </div>
      <div class="cta">Not registered?<a href="registration.php" style="color:#f30;"> Create an account</a></div>
   </div>
   <section class="app-section">
      <div class="app-wrap">
         <div class="container">
            <div class="row text-img-block text-xs-left">
               <div class="container">
                  <div class="col-xs-12 col-sm-6  right-image text-center">
                     <figure> <img src="images/app.png" alt="Right Image"> </figure>
                  </div>
                  <div class="col-xs-12 col-sm-6 left-text">
                     <h3>The Best Food Delivery App</h3>
                     <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery &amp; Takeout App.</p>
                     <div class="social-btns">
                        <a href="#" class="app-btn apple-button clearfix">
                           <div class="pull-left"><i class="fa fa-apple"></i> </div>
                           <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                        </a>
                        <a href="#" class="app-btn android-button clearfix">
                           <div class="pull-left"><i class="fa fa-android"></i> </div>
                           <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>

</html>