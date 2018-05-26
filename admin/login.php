<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wattpad | Panel</title>

  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <!--Shortcut icon-->
  <link rel="shortcut icon" href="assets/img/icon.png" type="image/x-icon" />

  <style>
</style>
</head>
<body >
  <div class="container bg">
    <div class="row text-center" style="padding-top:100px;">
      <div class="col-md-12">
        <img src="assets/img/logo.png" height="100" width="300" />
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <div class="panel-body">
          <form role="form" action="admin-transaction.php" method="POST">
            <hr />
            <h5>Giriş Yap</h5>
            <?php if (isset($_GET['state'])  == "f" ){ ?>
              <h5 style="color: red">Admin Bulanamadı!</h5>
            <?php } ?>
            <br />
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-tag"></i></span>
              <input type="text" name="admin_name" class="form-control" placeholder="Yönetici Adı" value="<?php if(isset($_COOKIE['admin_name'])){ echo $_COOKIE['admin_name'];} ?>" required="required"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" name="password" class="form-control"  placeholder="Yönetici Şifreniz" value="<?php if(isset($_COOKIE['admin_password'])){ echo $_COOKIE['admin_password'];} ?>" required="required"/>
            </div>
            <div class="form-group">
              <label class="checkbox-inline">
                <input type="checkbox" <?php if (isset($_COOKIE['admin_name'])){echo "checked='checked'";} ?> name="rememberMe"/> Beni Hatırla
              </label>
          </div>
          <input type="submit" name="login" class="btn col-md-12 pull-right orange-button" value="Giriş Yap">
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
