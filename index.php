<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Wattpad</title>

    <!--Javascript-->
    <script src="js/customize.js"></script>
 
    <!--Css-->
     <link href="css/main.css" rel="stylesheet">

    <!--Shortcut icon-->
      <link rel="shortcut icon" href="" type="image/x-icon" />
    
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
          <img src="img/logo.png" alt="Anasayfa" title="Anasayfa">
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
          <li><a href="#news">Oluştur</a></li>
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
          <a href="javascript:void(0)" class="dropbtn">Topluluklar</a>
          <div class="dropdown-content">
            <a href="#">Profilim</a>
            <a href="#">Okuma Listem</a>
            <a href="#">Hikayelerim</a>            
            <a href="#">Ayarlar</a>
            <a href="#">Çıkış</a>
          </div>
        </li>
        </div>
      </div>
    </header>

    <div class="container">
      <div class="discover-module">
        <div class="discover-header">
            <p>Önerilenler</p>
        </div>
      </div>
    </div>

  </body>
</html>