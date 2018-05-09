    <?php  
    require_once 'config.php'; 

    if ($_SESSION['session_control'] == true) {
        include 'header.php';  
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

                $all_users_stories_sql = mysqli_query( $connection , "SELECT * FROM stories WHERE userID = ".$all_users['userID']."");

                while ($all_users_stories = mysqli_fetch_array($all_users_stories_sql)) { ?>
                
                <!-- Modal 
                <div class="myModal modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div class="modal-image-details">
                            <img src="" alt="" height="300" width="200">
                        </div>
                        <div class="modal-story-details">
                            <h3 class="title"></h3>
                            <p></p>     
                            <form action="transaction.php" method="POST">
                                <input type="submit" value="Add to readList" name="add_read_list" class="button">
                                <a href="story-read.php?ruid=">Read</a>
                            </form> 
                        </div>
                    </div>
                </div>-->

                <div class="ca-item ca-item-1">
                    <div class="ca-item-main">
                        <div class="ca-icon">
                         <img src="<?=$all_users_stories['story_photo']?>" alt="" height="400" width="200">
                        </div>
                     <div class="slide-content">
                         <span class="myBtn"><a href="story-read.php?rstory_id=<?=$all_users_stories['storyID']?>"><?=$all_users_stories['story_title']?></a></span>
                         <span class="gray-text"><a href="profile.php?uid=<?=$all_users_stories['userID']?>">by <?=$all_users['full_name']?></a></span>
                         <div class="slider-other gray-text">
                            <span><i class="fa fa-eye"></i></span>
                            <span>45</span>

                            <span><i class="fa fa-star"></i></span>
                            <span><?=$all_users_stories['storyID']?></span>

                            <span><i class="fa fa-list"></i></span>
                            <span>129</span>
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
</div>

<?php } else{
   header("Location:login.php");
}
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<!-- the jScrollPane script -->
<script type="text/javascript" src="../js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="../js/jquery.contentcarousel.js"></script>
<script type="text/javascript">
   $('.ca-container').contentcarousel();
</script>
<script type="text/javascript" src="../js/customize.js"></script>
</body>
</html>