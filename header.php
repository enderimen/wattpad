<?php
 if ($_SESSION['session_control'] == true) {

  /*Settings sayfası için gerekli bilgiler çekildi*/
  $sql     =  mysqli_query( $connection , "SELECT * FROM kullanicilar WHERE user_name = '".$_SESSION['username']."'");
  $data    =  mysqli_fetch_array($sql);

  @$story_category_sql  = mysqli_query( $connection , "SELECT category_name FROM categories"); 
?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Wattpad</title>

  <!--Css-->
  <link rel="stylesheet" href="css/create.css">
  <link rel="stylesheet" href="css/story-read.css">
  <link rel="stylesheet" href="css/category.css">
  <link rel="stylesheet" href="css/create-content.css">
  <link rel="stylesheet" href="css/story-details.css">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/settings.css">
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/slider.css">
  <link rel="stylesheet" href="css/jquery.jscrollpane.css">
  <link rel="stylesheet" href="css/reading-list.css">
  <link rel="stylesheet" href="css/main.css">

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
              
              <?php while($story_category_data = mysqli_fetch_array($story_category_sql)) { ?>
              <a href="category.php?category=<?=$story_category_data['category_name']?>"><?=$story_category_data['category_name']?></a>
              <?php } ?>

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
            <input id="search" name="search_value" placeholder="Hikaye & Kişi Ara" type="text" />
            <input id="btn-search" name="search_button" type="submit" value="" title="Ara" />
          </form>
        </div>

        <div class="setting">
          <li class="dropdown-settings">
            <a href="javascript:void(0)" class="dropbtn"><?=$data['user_name']?></a>
            <div class="dropdown-content">
              <a href="profile.php?uid=<?=$_SESSION['id']?>">Profilim</a>
              <a href="reading-list.php?ruid=<?=$_SESSION['id']?>">Okuma Listem</a>
              <a href="settings.php">Ayarlar</a>
              <a href="logout.php">Çıkış</a>
            </div>
          </li>
        </div>
      </div>
    </header>

    <?php } else{
       header("Location:login.php");
    }