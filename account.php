<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Create Account - Wattpad</title>

    <!--Javascript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/customize.js"></script>
 
    <!--Css-->
     <link href="css/account.css" rel="stylesheet">

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
      <div class="account-form">
        <h1>Hesap Oluştur</h1>
        <form action="transaction.php" method="POST">
          <input type="email" name="mail" placeholder="E-Posta" required="required" />
          <input type="text" name="fullname" placeholder="Tam Adınız" required="required" />
          <input type="text" name="username" placeholder="Kullanıcı Adınız" required="required" />
          <input type="password" name="password" placeholder="Şifre" required="required" />
          <input type="submit" name="signup" value="Oluştur"/>
        </form>
        <div class="signup"><span>Bir hesabın var mı?<a href="login.php"> Giriş Yapın!</a></span></div>
      </div>
    </div>
  </body>
</html>