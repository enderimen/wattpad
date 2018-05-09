    <?php require_once 'config.php'; include 'header.php'; 

    @$category_story_sql  =  mysqli_query( $connection , "SELECT * FROM stories WHERE story_genre = '".$_GET['category']."'"); 

    ?>

    <div class="container">     
  
        <?php while ($category_story_data  =  mysqli_fetch_array($category_story_sql)) { 

          @$user_pull_sql  =  mysqli_query( $connection , "SELECT user_name FROM kullanicilar WHERE id = '".$category_story_data['userID']."'"); 
          $user_pull_data  =  mysqli_fetch_array($user_pull_sql)          
        ?>

        <div class="category-content flex-row">
          <div class="category-story-cover">
            <img src="../img/book1.jpg" alt="" height="230" width="160"> 
          </div>

          <div class="category-story-details">
            <p><a href="story-read.php?rstory_id=<?=$category_story_data['storyID']?>"><?=$category_story_data['story_title']?></a></p>
            <p><a href="profile.php?uid=<?=$category_story_data['userID']?>"><?=$user_pull_data['user_name']?></a></p>

            <div class="category-story-other">
                <span><i class="fa fa-eye"></i></span>
                <span><a href="">45</a></span>

                <span><i class="fa fa-star"></i></span>
                <span><a href="">11</a></span>

                <span><i class="fa fa-list"></i></span>
                <span><a href="">12</a></span>
            </div>

            <div class="category-story-desc">
              <p><?=$category_story_data['story_desc']?></p>
            </div>

            <a href="#"><div class="category-story-tags"><?=$category_story_data['story_genre']?></div></a>          
        </div>
      </div>
      
      <?php } ?>


    </div>
  </body>
</html>