<?php require_once 'config.php'; include 'header.php'; 


?>
  
      <div class="container-story">          
        <div class="head">
          <h1>My Works</h1>
            <a href="create-content.php"><input type="submit" value="+New Story" class="button"></a>
        </div>

        <?php while ($story_data = mysqli_fetch_array($stories)) { ?>
        <div class="content">
          <img src="<?=$story_data['story_photo']?>" alt="Cover Image" title="Cover" class="image-style">
          <div class="story-detail">
            <h3><a href="story-details.php?id=<?=$story_data['storyID']?>"><?=$story_data['story_title'] ?></a></h3>
            <p><?=$story_data['updated_date']?></p>

            <p>Konu</p>

            <div class="story-other">
              <span><i class="far fa-eye"></i></span>
              <span><i class="fal fa-star"></i></span>
              <span><i class="fal fa-comment"></i></span>
            </div>
          </div>
        </div>
        
        <?php } ?>
      </div>
  </body>
</html>