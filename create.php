<?php require_once 'config.php';

if ($_SESSION['session_control'] == true) {
        include 'header.php';  
        $stories =  mysqli_query( $connection , "SELECT * FROM stories WHERE userID = '".$_SESSION['id']."'"); ?>

<div class="container-story">          
  <div class="head">
    <h1>My Works</h1>
    <a href="create-content.php"><input type="submit" value="+Yeni Hikaye" class="button"></a>
  </div>

  <?php while ($story_data = mysqli_fetch_array($stories)) { 

    //Stars tablosundan hikayenin yıldız sayısı çekiyoruz.
    $star_count_sql =  mysqli_query( $connection , "SELECT count(storyID) as star_count FROM stars WHERE storyID = '".$story_data['storyID']."'");
    $star_count_data = mysqli_fetch_array($star_count_sql); 

    //Reading_list tablosundan okunma sayısını çekiyoruz.
    $story_count_sql =  mysqli_query( $connection , "SELECT count(readed_storyID) as reader_count FROM reading_list WHERE readed_storyID = '".$story_data['storyID']."'");
    $story_count_data = mysqli_fetch_array($story_count_sql); 

    //comments tablosundan yorum sayısını çekiyoruz.
    $comment_count_sql =  mysqli_query( $connection , "SELECT count(storyID) as comment_count FROM comments WHERE storyID = '".$story_data['storyID']."'");
    $comment_count_data = mysqli_fetch_array($comment_count_sql); 

  ?>
  <div class="content">
    <img src="<?=$story_data['story_photo']?>" alt="Cover Image" title="Cover" class="image-style">
    <div class="story-detail">
      <h3><a href="story-details.php?id=<?=$story_data['storyID']?>"><?=$story_data['story_title'] ?></a></h3>
      <p><?=$story_data['updated_date']?></p>

      <p><?=$story_data['story_desc']?></p>

      <div class="story-other">
        <span><img src="img/gray_star.png" alt="" title="Beğeni Sayısı"></span>
        <span><?=$star_count_data['star_count']?></span>

        <span><img src="img/book.png" alt="" title="Okama Sayısı"></span>
        <span><?=$story_count_data['reader_count']?></span>

        <span><img src="img/comment.png" alt="" title="Yorum Sayısı"></span>
        <span><?=$comment_count_data['comment_count']?></span>
      </div>
    </div>
  </div>

  <?php } }else {
    header('Location:login.php');
  } ?>
</div>
</body>
</html>