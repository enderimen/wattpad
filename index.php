    <?php  
    require_once 'config.php'; 

    if ($_SESSION['session_control'] == true) {
        include 'header.php';  
        @$all_users_sql =  mysqli_query( $connection , "SELECT DISTINCT userID,full_name FROM story_branch");
        ?>
        <div class="container">

            <div class="discover-module">
              <div class="discover-header">
                 <p>Önerilenler</p>
             </div>

             <?php while ($all_users = mysqli_fetch_array($all_users_sql)) { ?>
             <div class="ca-container">
               <div class="ca-wrapper">
                <?php 

                $all_users_stories_sql = mysqli_query( $connection , "SELECT storyID , story_photo ,story_genre ,userID ,story_desc,story_title FROM stories WHERE userID = ".$all_users['userID']."");

                while ($all_users_stories = mysqli_fetch_array($all_users_stories_sql)) { 

                    //Stars tablosundan hikayenin yıldız sayısı çekiyoruz.
                    $star_count_sql =  mysqli_query( $connection , "SELECT count(storyID) as star_count FROM stars WHERE storyID = '".$all_users_stories['storyID']."'");
                    $star_count_data = mysqli_fetch_array($star_count_sql); 

                    //Reading_list tablosundan okunma sayısını çekiyoruz.
                    $story_count_sql =  mysqli_query( $connection , "SELECT count(readerID) as reader_count FROM reading_list WHERE readerID = '".$all_users_stories['storyID']."'");
                    $story_count_data = mysqli_fetch_array($story_count_sql); 

                    //comments tablosundan yorum sayısını çekiyoruz.
                    $comment_count_sql =  mysqli_query( $connection , "SELECT count(storyID) as comment_count FROM comments WHERE storyID = '".$all_users_stories['storyID']."'");
                    $comment_count_data = mysqli_fetch_array($comment_count_sql); 

                    ?>

                    <div class="ca-item ca-item-1">
                        <div class="ca-item-main">
                            <div class="ca-icon">
                               <img src="<?=$all_users_stories['story_photo']?>" alt="" height="400" width="200">
                           </div>
                           <div class="slide-content">
                               <span class="myBtn"><a href="story-read.php?rstory_id=<?=$all_users_stories['storyID']?>"><?=$all_users_stories['story_title']?></a></span>
                               <span class="gray-text"><a href="profile.php?uid=<?=$all_users_stories['userID']?>">by <?=$all_users['full_name']?></a></span>

                                <div class="slider-other gray-text">
                                    <span><img src="img/gray_star.png" alt="Beğeni Sayısı" title="Beğeni Sayısı"></span>
                                    <span><?=$star_count_data['star_count']?></span>

                                    <span><img src="img/book.png" alt="Kitap Sayısı" title="Kitap Sayısı"></span>
                                    <span><?=$story_count_data['reader_count']?></span>

                                    <span><img src="img/comment.png" alt="Yorum Sayısı" title="Yorum Sayısı"></span>
                                    <span><?=$comment_count_data['comment_count']?></span>
                                </div>
                                <div class="story-description"><?=$all_users_stories['story_desc']?></div>
                            <div class="slider-labels gray-text">
                                <div class="label">
                                    <a href="category.php?category=<?=$all_users_stories['story_genre']?>"><?=$all_users_stories['story_genre']?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    				
                <?php } ?>

            </div>
        </div>

        <?php } ?>

    </div>
    <!-- Yukarı Butonu -->
    <a href="#" class="up">
        <img src="img/scroll-up.png" alt="Yukarı Çık" title="Yukarı Çık">
    </a>
</div>

<?php } else{
 header("Location:login.php");
}
?>

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