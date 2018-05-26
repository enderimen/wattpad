    <?php require_once 'config.php'; 
    if ($_SESSION['session_control'] == true) {
      include 'header.php';  

      @$category_story_sql  =  mysqli_query( $connection , "SELECT * FROM stories WHERE story_genre = '".$_GET['category']."'"); 

      ?>

      <div class="container">     

        <?php while ($category_story_data  =  mysqli_fetch_array($category_story_sql)) { 

          @$user_pull_sql  =  mysqli_query( $connection , "SELECT user_name,id FROM kullanicilar WHERE id = '".$category_story_data['userID']."'"); 
          $user_pull_data  =  mysqli_fetch_array($user_pull_sql);

          //Stars tablosundan hikayenin yıldız sayısı çekiyoruz.
          $star_count_sql =  mysqli_query( $connection , "SELECT count(storyID) as star_count FROM stars WHERE storyID = '".$category_story_data['storyID']."'");
          $star_count_data = mysqli_fetch_array($star_count_sql); 

          //Reading_list tablosundan okunma sayısını çekiyoruz.
          $story_count_sql =  mysqli_query( $connection , "SELECT count(readed_storyID) as reader_count FROM reading_list WHERE readed_storyID = '".$category_story_data['storyID']."'");
          $story_count_data = mysqli_fetch_array($story_count_sql); 

          //comments tablosundan yorum sayısını çekiyoruz.
          $comment_count_sql =  mysqli_query( $connection , "SELECT count(storyID) as comment_count FROM comments WHERE storyID = '".$category_story_data['storyID']."'");
          $comment_count_data = mysqli_fetch_array($comment_count_sql); 

           //Stories tablosundan story resmini çekiyoruz.
          $stories_image_sql =  mysqli_query( $connection , "SELECT story_photo FROM stories WHERE story_genre = '".$_GET['category']."' and userID = '".$user_pull_data['id']."'");
          $stories_image_data = mysqli_fetch_array($stories_image_sql); 
          
          ?>

          <div class="category-content flex-row">
            <div class="category-story-cover">
              <img src="<?=$stories_image_data['story_photo']?>" alt="" height="230" width="160"> 
            </div>

            <div class="category-story-details">
              <a href="story-read.php?rstory_id=<?=$category_story_data['storyID']?>"><?=$category_story_data['story_title']?></a>
              <a href="profile.php?uid=<?=$category_story_data['userID']?>"><?=$user_pull_data['user_name']?></a>

              <div class="category-story-other">
                <span><img src="img/gray_star.png" alt="" title="Beğeni Sayısı"></span>
                <span><?=$star_count_data['star_count']?></span>

                <span><img src="img/book.png" alt="" title="Okama Sayısı"></span>
                <span><?=$story_count_data['reader_count']?></span>

                <span><img src="img/comment.png" alt="" title="Yorum Sayısı"></span>
                <span><?=$comment_count_data['comment_count']?></span>
              </div>

              <div class="category-story-desc">
                <p><?=$category_story_data['story_desc']?></p>
              </div>

              <a href=""><div class="category-story-tags"><?=$category_story_data['story_genre']?></div></a>          
            </div>
          </div>

          <?php 
        } 
      } else {
        header("Location:login.php");
      } ?>


    </div>
  </body>
  </html>