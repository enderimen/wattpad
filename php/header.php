<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Wattpad</title>
  
  <!--Css-->
  <link rel="stylesheet" href="../css/fontawesome.min.css">
  <link rel="stylesheet" href="../css/create.css">
  <link rel="stylesheet" href="../css/profile.css">
  <link rel="stylesheet" href="../css/settings.css">
  <link rel="stylesheet" href="../css/slider.css">
  <link rel="stylesheet" href="../css/jquery.jscrollpane.css">
  <link rel="stylesheet" href="../css/reading-list.css">
  <link rel="stylesheet" href="../css/main.css">

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
          <a href="index.php">
            <img src="img/logo.png" alt="Anasayfa" title="Anasayfa">
          </a>
        </div>
        
        <ul id="menu">
          <li class="dropdown-discover">
            <a href="javascript:void(0)" class="dropbtn">Keşfet</a>
            <div class="dropdown-content">
              <a href="#">Random</a>
              <a href="#">Adventure</a>
              <a href="#">Horror</a>
              <a href="#">Romance</a>
              <a href="#">Anime</a>    
              <a href="#">Science Fiction</a>
              <a href="#">Billionaire</a>
              <a href="#">ChickLit</a>
              <a href="#">Paranormal</a>
              <a href="#">Fantasy</a>                     
            </div>
          </li>
          <li><a href="create.php">Oluştur</a></li>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Topluluklar</a>
            <div class="dropdown-content">
              <a href="#">Clubs</a>
              <a href="#">The Wattys</a>
              <a href="#">Writting Contents</a>
              <a href="#">Writers</a>
              <a href="#">JustWritelt</a>                            
            </div>
          </li>
        </ul> 

        <div class="search">
          <form action="search.php" method="POST">
            <input id="search" name="aranan" placeholder="Hikaye & Kişi Ara" type="text" />
            <input id="btn-search" name="ara" type="submit" value="" title="Ara" />
          </form>
        </div>

        <div class="setting">
          <li class="dropdown-settings">
            <a href="javascript:void(0)" class="dropbtn">Kullanıcı</a>
            <div class="dropdown-content">
              <a href="profile.php">Profilim</a>
              <a href="reading-list.php">Okuma Listem</a>
              <a href="#">Hikayelerim</a>            
              <a href="settings.php">Ayarlar</a>
              <a href="#">Çıkış</a>
            </div>
          </li>
        </div>
      </div>
    </header>