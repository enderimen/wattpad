<?php require_once 'config.php'; 
if ($_SESSION['session_control'] == true) {
  include 'header.php';   

  if(isset($_GET["uid"])) {

    $control_query = mysqli_query($connection, "SELECT * FROM kullanicilar WHERE id = '".$_GET["uid"]."'");
    $user_data = mysqli_fetch_array($control_query);

    $follower_query = mysqli_query($connection, "SELECT followingID ,following_name FROM followers WHERE followerID  = '".$_GET["uid"]."'");

    $story_sql = mysqli_query($connection, "SELECT * FROM stories WHERE userID = '".$_GET["uid"]."'");

    // Okuma listesindeki toplam kitap sayısı
    $read_story_count_sql = mysqli_query($connection, "SELECT count(readID) as read_story_count FROM reading_list WHERE readerID = '".$user_data['id']."'");
    $read_story_count = mysqli_fetch_array($read_story_count_sql);

    // Kişinin takip ettiği toplam kişi sayısı
    $follower_count_sql = mysqli_query($connection, "SELECT count(id) as follower_count FROM followers WHERE followerID = '".$user_data['id']."'");
    $follower_count = mysqli_fetch_array($follower_count_sql);

    // Kişinin takip ettiği toplam kişi sayısı
    $post_count_sql = mysqli_query($connection, "SELECT count(storyID) post_count FROM stories WHERE userID = '".$user_data['id']."'");
    $post_count = mysqli_fetch_array($post_count_sql);

    if ($control_query) {
      ?>

      <div class="timeline-image" style="background-position: bottom;background-image: url(<?=$user_data['background_image']?>);">
        <img src="<?=$user_data['profile_photo']?>" alt="Avatar">
        <h1><?=$user_data['full_name']?></h1>
        <p>@<?=$user_data['user_name']?></p>

        <div class="details">
          <div class="post">
            <span><?=$post_count['post_count']?></span>
            <div><a href="#posts">Post</a></div>
          </div>
          <div class="reading-list">
            <span><?=$read_story_count['read_story_count']?></span>
            <div><a href="reading-list.php?ruid=<?=$user_data['id']?>">Reading List</a></div>
          </div>
          <div class="followers">
            <span><?=$follower_count['follower_count']?></span>
            <div>Following</div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'about')">Hakkımda</button>
          <button class="tablinks" onclick="openTab(event, 'conversation')">Konuşmalar</button>
          <button class="tablinks" onclick="openTab(event, 'following')">Takip Edilenler</button>

          <form action="transaction.php" method="POST">

            <input type="text" hidden="hidden" name="followingID" value="<?=$user_data['id']?>"> 
            <input type="text" hidden="hidden" name="following_name" value="<?=$user_data["user_name"]?>">
            <input type="text" hidden="hidden" name="uid" value="<?=$_GET['uid']?>">       

            <?php 
            $isFollowing = mysqli_query( $connection , "SELECT * FROM followers WHERE followerID ='".$_SESSION['id']."' AND followingID = '".$_GET['uid']."'");

            if ($_GET['uid'] != $_SESSION['id'] ) {
              if (mysqli_num_rows($isFollowing) > 0) { ?> 
              <input type="submit" class="button" name="unfollow" value="Unfollow">
              <?php } else { ?>
              <input type="submit" class="button" name="follow" value="Follow">
              <?php } } ?>
            </form>
          </div>

          <div id="about" class="tabcontent show">
            <div class="bio">
              <p>İnsanların sizi tanımalarına izin verin.</p>
              <a href="settings.php" class="button">Add Description</a>
              <p>JoinedNovember 27, 2017</p>
            </div>

            <div class="story-list" id="posts">
              <div class="myStory">
                <div class="header-mystory">
                  <br>
                  <h3>Stories by <?=$user_data['full_name']?></h3>
                  <br>
                </div>

                <?php while ($private_user_data = mysqli_fetch_array($story_sql)) { ?>

                <div class="storyDetails">
                  <div class="storyCover">
                    <img src="<?=$private_user_data['story_photo']?>" alt="Resimsiz">
                  </div>
                  <div class="story-feature">
                    <div class="story-title">
                      <h3><a href="story-read.php?rstory_id=<?=$private_user_data['storyID']?>"><?=$private_user_data['story_title']?></a></h3>
                    </div>
                    <div class="icons">
                      <span>.</span>
                      <span>.</span>
                      <span>.</span>
                    </div>
                    <br>
                    <span><?=$private_user_data['story_desc']?></span>
                  </div>
                </div>

              <?php } ?>
              
              </div>
            </div>
          </div>

          <div id="following" class="tabcontent">

            <?php while ($follower_data = mysqli_fetch_array($follower_query)) {

              $following_query = mysqli_query($connection, "SELECT * FROM kullanicilar WHERE id = '".$follower_data['followingID']."'");
              $following_data = mysqli_fetch_array($following_query);

              //  Kişiyi takip eden kişi sayısı
              $follower_count_query = mysqli_query($connection, "SELECT count(followerID) as follower_count FROM followers WHERE followerID  = '".$follower_data['followingID']."'");
              $follower_count_data = mysqli_fetch_array($follower_count_query);

              //  Kişinin takip ettiği kişi sayısı
              $following_count_query = mysqli_query($connection, "SELECT count(followingID) as following_count FROM followers WHERE followingID  = '".$follower_data['followingID']."'");
              $following_count_data = mysqli_fetch_array($following_count_query);

               // Okuma listesindeki toplam kitap sayısı
              $read_story_count_sql = mysqli_query($connection, "SELECT count(readerID) as read_story_count FROM reading_list WHERE readerID = '".$follower_data['followingID']."'");
              $read_story_count = mysqli_fetch_array($read_story_count_sql);


              ?>
              <div class="cardview">
                <div class="card-cover">
                  <img id="card-cover-image" src="<?=$following_data['background_image']?>" alt="">
                  <img id="card-profile-image" src="<?=$following_data['profile_photo']?>" alt="">
                </div>
                <div class="card-content">
                  <span><a href="profile.php?uid=<?=$follower_data['followingID']?>"><?=$following_data['full_name']?></a></span>
                  <span>@<?=$follower_data['following_name']?></span>
                  <form action="transaction.php" method="POST">

                    <input type="text" name="followingID" value="<?=$follower_data['followingID']?>" hidden="hidden"> 
                    <input type="text" name="following_name" value="<?=$follower_data['following_name']?>" hidden="hidden">
                    <input type="text" name="uid" value="<?=$_GET["uid"]?>" hidden="hidden">

                    <?php 
                    $isFollowing = mysqli_query( $connection , "SELECT * FROM followers WHERE followerID ='".$_SESSION['id']."' AND followingID = '".$follower_data['followingID']."'");

                    if ($isFollowing) { ?>
                    <input type="submit" class="button" name="unfollow" value="Unfollow">
                    <?php } else { ?>
                    <input type="submit" class="button" name="follow" value="Follow">
                    <?php } ?>

                  </form>
                  <div class="card-other">
                    <div class="card-works">
                      <span><?=$read_story_count['read_story_count']?></span>
                      <span>Works</span>
                    </div>
                    <div class="card-following">
                      <span><?=$follower_count_data['follower_count']?></span>
                      <span>Following</span>
                    </div>
                    <div class="card-followers">
                      <span><?=$following_count_data['following_count']?></span>
                      <span>Followers</span>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?>
            </div>

            <div id="conversation" class="tabcontent">
              <h1>Konuşmalar</h1>
            </div>
          </div>

      <?php } 
        } 
      } else{
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