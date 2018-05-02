
<?php require_once 'config.php'; include 'header.php'; ?>

<div class="container">
 <div class="table-of-content">
   <div class="table-of-content-head">
     <h2>Story Details - Story Name</h2>
     <a href="story-branch.php?storyid=<?=$_GET['id']?>"><p>+New Part</p></a>
   </div>
   
   <?php while ($story_branches  =  mysqli_fetch_array($story_branch)) { ?>
   
   <div class="stroy-card-view">
     <div class="title-date">
       <div class="title"><a href="story-write.php?wstory_id=<?=$story_branches['story_branchID']?>"><?=$story_branches['story_branch_title']?></a></div>
       <div class="stroy-other-info">Published: <?=$story_branches['story_branch_date']?></div>
     </div>
      
     <div class="story-rate">
      <span><i class="fa fa-eye"></i></span>
      <span>12</span>

      <span><i class="fa fa-star"></i></span>
      <span>9</span>

      <span><i class="fa fa-list"></i></span>
      <span>5</span>
    </div>
  </div>

  <?php } ?>
</div>
</div>  

<!--Js-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="../js/customize.js"></script>

</body>
</html>