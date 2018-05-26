<?php require_once 'config.php'; 
if ($_SESSION['session_control'] == true) {
  include 'header.php';   

  if(isset($_GET["uid"])) {

    $control_query = mysqli_query($connection, "SELECT * FROM kullanicilar WHERE id = '".$_GET["uid"]."'");

    $user_photo_sql = mysqli_query($connection, "SELECT profile_photo , biography FROM kullanicilar WHERE id = '".$_SESSION["id"]."'");
    $user_photo_data = mysqli_fetch_array($user_photo_sql);


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

     // Kişinin konuşmaları
    $conversation_pull_sql = mysqli_query($connection, "SELECT conversationID, conversation_content , conversation_author_name ,conversation_date FROM conversations WHERE page_authorID = '".$_GET['uid']."'");

    if ($control_query) {
      ?>

      <div class="timeline-image" style="background-position: bottom;background-image: url(<?=$user_data['background_image']?>);">
        <img src="<?=$user_data['profile_photo']?>" alt="Avatar">
        <h1><?=$user_data['full_name']?></h1>
        <p>@<?=$user_data['user_name']?></p>

        <div class="details">
          <div class="post">
            <span><?=$post_count['post_count']?></span>
            <div><a href="#posts">Gönderi</a></div>
          </div>
          <div class="reading-list">
            <span><?=$read_story_count['read_story_count']?></span>
            <div><a href="reading-list.php?ruid=<?=$user_data['id']?>">Okuma Listesi</a></div>
          </div>
          <div class="followers">
            <span><?=$follower_count['follower_count']?></span>
            <div>Takipçi Sayısı</div>
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
              <input type="submit" class="button" name="unfollow" value="Takibi Bırak">
              <?php } else { ?>
              <input type="submit" class="button" name="follow" value="Takip Et">
              <?php } } ?>
            </form>
          </div>

          <div id="about" class="tabcontent show">

            <?php /*if ($user_photo_data['biography'] == "Henüz biyografi eklenmedi.") { ?>
            <div class="bio">
              <p>Bilgilerinizi düzenleyin!</p>
              <a href="settings.php" class="button">Başlayın</a>
              <p>Katıldı,<?=$user_data['joined_date']?></p>
            </div>
            <?php } else { ?>
            <div class="bio">
              <p><?=$user_photo_data['biography']?></p>
            </div>
            <?php } */?>

            <div class="story-list" id="posts">
              <div class="myStory">
                <div class="header-mystory">
                  <br>
                  <h3>Hikayeleri</h3>
                  <br>
                </div>

                <?php while ($private_user_data = mysqli_fetch_array($story_sql)) { 

                   //Stars tablosundan hikayenin yıldız sayısı çekiyoruz.
                  $star_count_sql =  mysqli_query( $connection , "SELECT count(storyID) as star_count FROM stars WHERE storyID = '".$private_user_data['storyID']."'");
                  $star_count_data = mysqli_fetch_array($star_count_sql); 

                  //Reading_list tablosundan okunma sayısını çekiyoruz.
                  $story_count_sql =  mysqli_query( $connection , "SELECT count(readed_storyID) as reader_count FROM reading_list WHERE readed_storyID = '".$private_user_data['storyID']."'");
                  $story_count_data = mysqli_fetch_array($story_count_sql); 

                  //comments tablosundan yorum sayısını çekiyoruz.
                  $comment_count_sql =  mysqli_query( $connection , "SELECT count(storyID) as comment_count FROM comments WHERE storyID = '".$private_user_data['storyID']."'");
                  $comment_count_data = mysqli_fetch_array($comment_count_sql); 
                  ?>

                  <div class="storyDetails">
                    <div class="storyCover">
                      <img src="<?=$private_user_data['story_photo']?>" alt="Resimsiz">
                    </div>
                    <div class="story-feature">
                      <div class="story-title">
                        <h3><a href="story-read.php?rstory_id=<?=$private_user_data['storyID']?>"><?=$private_user_data['story_title']?></a></h3>
                      </div>
                      <div class="icons">
                        <span><img src="../img/gray_star.png" alt="" title="Beğeni Sayısı"></span>
                        <span><?=$star_count_data['star_count']?></span>

                        <span><img src="../img/book.png" alt="" title="Okama Sayısı"></span>
                        <span><?=$story_count_data['reader_count']?></span>

                        <span><img src="../img/comment.png" alt="" title="Yorum Sayısı"></span>
                        <span><?=$comment_count_data['comment_count']?></span>
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
                      <input type="submit" class="button" name="unfollow" value="Takibi Bırak">
                      <?php } else { ?>
                      <input type="submit" class="button" name="follow" value="Takip Et">
                      <?php } ?>

                    </form>
                    <div class="card-other">
                      <div class="card-works">
                        <span><?=$read_story_count['read_story_count']?></span>
                        <span title="Çalışmalar">Çalışm.</span>
                      </div>
                      <div class="card-following">
                        <span><?=$follower_count_data['follower_count']?></span>
                        <span title="Takip Edilen Kişi Sayısı">Takip Edi.</span>
                      </div>
                      <div class="card-followers">
                        <span><?=$following_count_data['following_count']?></span>
                        <span title="Takip Eden Kişi Sayısı">Takip Eden</span>
                      </div>
                    </div>
                  </div>
                </div>

                <?php } ?>
              </div>

              <div id="conversation" class="tabcontent">

                <div class="dimension">
                  <div class="conversation-comment">
                    <form action="transaction.php" method="POST">
                      <img src="<?=$user_photo_data['profile_photo']?>" alt="" height="48" width="48">
                      <input type="text" name="uid" value="<?=$_GET["uid"]?>" hidden="hidden">
                      <input type="text" name="conversation-comment" class="input-comment width" placeholder="Yorum yaz">
                      <input type="submit" name="conversation-button" class="comment-button" value="Gönder">
                    </form>
                  </div>

                  <?php while ($conversation_pull_data = mysqli_fetch_array($conversation_pull_sql)) { 

                      // Kişinin konuşmaları
                    $conversation_reply_pull_sql = mysqli_query($connection, "SELECT reply_content , reply_authorID , reply_date FROM reply_conversation WHERE commentID = '".$conversation_pull_data['conversationID']."'");

                    $reply_user_photo_sql = mysqli_query($connection, "SELECT profile_photo FROM kullanicilar WHERE user_name = '".$conversation_pull_data['conversation_author_name']."'");
                    $reply_user_photo_data = mysqli_fetch_array($reply_user_photo_sql);


                    ?>

                    <div class="conversation-comment-content">

                      <div class="conversation-user-info">
                        <img src="<?=$reply_user_photo_data['profile_photo']?>" alt="" height="48" width="48">

                        <div class="conversation-details">
                          <p><?=$conversation_pull_data['conversation_author_name']?></p>
                          <p><?=$conversation_pull_data['conversation_date']?></p>
                        </div>
                      </div>

                      <div class="conversation-message">
                        <p><?=$conversation_pull_data['conversation_content']?></p>

                        <?php while ($conversation_reply_pull_data = mysqli_fetch_array($conversation_reply_pull_sql)) { 

                          $reply_user_info_sql = mysqli_query($connection, "SELECT user_name FROM kullanicilar WHERE id = '".$conversation_reply_pull_data['reply_authorID']."'");
                          $reply_user_info_data = mysqli_fetch_array($reply_user_info_sql);

                          ?>

                          <p class="reply"><b><?=$reply_user_info_data['user_name']."(".$conversation_reply_pull_data['reply_date'].")"?>: </b><?=$conversation_reply_pull_data['reply_content']?></p>

                          <?php } ?>
                        </div>

                          <div class="conversation-message-reply">

                          <form action="transaction.php" method="POST">
                            <img src="<?=$user_photo_data['profile_photo']?>" alt="" height="48" width="48">
                            <input type="text" name="uid" value="<?=$_GET["uid"]?>" hidden="hidden">
                            <input type="text" name="conversationID" value="<?=$conversation_pull_data['conversationID']?>" hidden="hidden">
                            <input type="text" name="conversation-reply-content" class="input-comment width" placeholder="Yorum yaz">
                            <input type="submit" name="conversation-reply-button" class="comment-button" value="Cevapla">
                          </form>

                        </div>
                      </div>

                      <?php } ?>

                    </div>


                  </div>
                </div>

                <!-- Yukarı Butonu -->
                <a href="#" class="up">
                  <img src="img/scroll-up.png" alt="Yukarı Çık" title="Yukarı Çık">
                </a>

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
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
            <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
            <!-- the jScrollPane script -->
            <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
            <script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
            <script type="text/javascript">
             $('.ca-container').contentcarousel();
            </script>
            <script type="text/javascript" src="js/customize.js"></script>
          </body>
          </html>