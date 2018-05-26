<?php require_once 'config.php'; 
if ($_SESSION['session_control'] == true) {
  include 'header.php';   

  $story_author_name_sql =  mysqli_query( $connection , "SELECT story_title FROM stories WHERE storyID = '".$_GET['id']."'");
  $story_author_name_data = mysqli_fetch_array($story_author_name_sql);

  @$story_branch  = mysqli_query( $connection , "SELECT * FROM story_branch WHERE storyID = '".$_GET['id']."'");
  ?>

<div class="container">
 <div class="table-of-content">
   <div class="table-of-content-head">
     <h2><?=$story_author_name_data['story_title']?></h2>
     <a href="story-write.php?storyid=<?=$_GET['id']?>"><p>+Yeni Bölüm</p></a>
   </div>
   
   <?php while ($story_branches  =  mysqli_fetch_array($story_branch)) { ?>
   
   <div class="story-card-view">
     <div class="title-date">
       <div class="title"><h3><a href="story-edit.php?wstory_id=<?=$story_branches['story_branchID']?>"><?=$story_branches['story_branch_title']?></a></h3></div>
       <div class="stroy-other-info">Yayınlanma: <?=$story_branches['story_branch_date']?></div>
     </div>
      
     <div class="story-rate">
      <span><img src="img/gray_star.png" alt="" title="Beğeni Sayısı"></span>
      <span>12</span>

      <span><img src="img/book.png" alt="" title="Okama Sayısı"></span>
      <span>9</span>

      <span><img src="img/comment.png" alt="" title="Yorum Sayısı"></span>
      <span>5</span>
    </div>
  </div>

  <?php } ?>
</div>
</div>  

<?php } else {
    header("Location:login.php");
} ?>

<!--Js-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="js/customize.js"></script>

</body>
</html>