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
     <link href="css/login.css" rel="stylesheet">

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
        <h1>Wattpad | Giriş Yap</h1>
        <?php if (isset($_GET['ok']) == 'l') { ?>
          <p class="red-text">Böyle bir kullanıcı bulunmamakta!</p>
        <?php } ?>
        <form action="transaction.php" method="POST">
          <input type="text" name="username" placeholder="Kullanıcı Adı" required="required"  value="<?php if(isset($_COOKIE['user_name'])){ echo $_COOKIE['user_name'];} ?>" />
          <input type="password" name="password" placeholder="Şifre" required="required" value="<?php if(isset($_COOKIE['user_password'])){ echo $_COOKIE['user_password'];} ?>"  />
          <input type="submit" name="signin" value="Giriş Yap"/>
          <div class="remember">
            <input type="checkbox" 
              <?php if (isset($_COOKIE['user_name']))
                {
                  echo "checked='checked'";
                } 
              ?> name="rememberMe" class="rememberMe">Beni Hatırla
          </div>
        </form>
        <div class="signin"><span>Bir hesabınız yok mu? <a href="account.php">Kayıt Olun!</a></span></div>
      </div>
    </div>
  </body>
</html>