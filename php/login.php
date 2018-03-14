<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Login - Wattpad</title>

    <!--Javascript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/customize.js"></script>
 
    <!--Css-->
     <link href="../css/login.css" rel="stylesheet">

    <!--Shortcut icon-->
      <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <header>
      <div class="center">
        <div class="logo">
          <img src="img/logo.png" alt="">
        </div>
      </div>
    </header>

    <div class="container">
      <div class="phone">
        <img src="img/phone.png" alt="">
      </div>
      <div class="login-form">
        <h1>Log in to Wattpad</h1>
        <form action="transaction.php" method="POST">
          <input type="text" name="username" placeholder="Username" required="required" />
          <input type="password" name="password" placeholder="Password" required="required" />
          <input type="submit" name="signin" value="Log in"/>
        </form>
        <div class="signin"><span>Don't have an account? <a href="account.php">Sign up</a></span></div>
      </div>
    </div>
  </body>
</html>