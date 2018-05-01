<?php require_once 'config.php'; 
  if ($_SESSION['session_control'] == true) {
      include 'header.php';   ?>

<div class="timeline-image" style="background-position: bottom;background-image: url(<?=$data['background_image']?>);">
  <img src="<?=$data['profile_photo']?>" alt="Avatar">
  <h1><?=$data['full_name']?></h1>
  <p>@<?=$data['user_name']?></p>

  <div class="details">
    <div class="post">
      <span>1</span>
      <div>Post</div>
    </div>
    <div class="reading-list">
      <span>1</span>
      <div>Reading List</div> 
    </div>
    <div class="followers">
      <span>1</span>
      <div>Followers</div>
    </div>
  </div>
</div>

<div class="container">
  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'about')">About</button>
    <button class="tablinks" onclick="openTab(event, 'following')">Following</button>
  </div>

  <div id="about" class="tabcontent show">
    <div class="bio">
      <p>İnsanların sizi tanımalarına izin verin.</p>
      <form action="">
        <input type="submit" value="Add Description" class="button">
      </form>
      <p>JoinedNovember 27, 2017</p>
    </div>

    <div class="myStory">
      <div class="header-mystory">
        <h1>My Strories</h1>
      </div>
      <div class="storyDetails">
        <div class="storyCover">
          <img src="../img/logo.png" alt="Resimsiz">
        </div>
        <div class="story-feature">
          <div class="story-title">
            <h3>Untitled</h3>
          </div>
          <div class="icons">
            <span>.</span>
            <span>.</span>
            <span>.</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="following" class="tabcontent">
    <div class="cardview">
      <div class="card-cover">
        <img id="card-cover-image" src="../img/logo.png" alt="">
        <img id="card-profile-image" src="../img/logo.png" alt="">
      </div>
      <div class="card-content">
        <span>Adı</span>
        <span>Kullanıcı Adı</span>
        <input type="button" value="Following" class="button green">
        <div class="card-other">
          <div class="card-works">
            <span>8</span>
            <span>Works</span>
          </div>
          <div class="card-following">
            <span>8</span>
            <span>Following</span>
          </div>
          <div class="card-followers">
            <span>8</span>
            <span>Followers</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php }else{
  header("Location:login.php");
}
?>

<!--Javascript-->
<script>
  /*Profil Sayfası Tab Menu*/

  function openTab(evt, tabName) {

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "flex";
    evt.currentTarget.className += " active";
  }
</script>

</body>
</html>