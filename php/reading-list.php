<?php require_once 'config.php'; 
  if ($_SESSION['session_control'] == true) {
      	include 'header.php';  

      	//if(isset($_GET["uid"])) {

      	$reading_stories_sql =  mysqli_query( $connection , "SELECT * FROM reading_list WHERE readerID = '".$_GET['ruid']."'");
	?>

<div class="container">
	<div class="title">
		<span>Library</span>
	</div>

	<div class="reading-list-content">
		
		<?php 	if (mysqli_num_rows($reading_stories_sql) == 0) { ?>
		
		<p><br><br><br>Henüz hiçbir kitap bulunmamakta.</p>
		
		<?php }else{ while ($reading_stories = mysqli_fetch_array($reading_stories_sql)) { 
		
		$reading_stories_details_sql =  mysqli_query( $connection , "SELECT * FROM stories WHERE storyID = '".$reading_stories['readed_storyID']."'");
		$reading_stories_details = mysqli_fetch_array($reading_stories_details_sql); 

		$story_author_user_sql =  mysqli_query( $connection , "SELECT user_name, profile_photo,id  FROM kullanicilar WHERE id = '".$reading_stories['story_authorID']."'");
		$story_author_user = mysqli_fetch_array($story_author_user_sql); ?>

		<div class="library-cardview">
			<img src="<?=$reading_stories_details['story_photo']?>" alt="" height="260" width="200" id="cover-image">
			<div class="reading-list-user-info">
				<div class="reading-cardview-profile-name">
					<span><a href="story-read.php?rstory_id=<?=$reading_stories['readed_storyID']?>"><?=$reading_stories_details['story_title']?></a></span>
					<span><a href="profile.php?uid=<?=$story_author_user['id']?>"><?=$story_author_user['user_name']?></a></span>
				</div>
				<div class="reading-cardview-profile-photo">
					<img src="<?=$story_author_user['profile_photo']?>" alt="" height="48" width="48">
				</div>
			</div>
			<div class="reading-list-other">
				<div class="reading-view">
					<span><i class="fa fa-eye"></i></span>
					<span>2.5M</span>
				</div>
				<div class="reading-star">
					<span><i class="fa fa-star"></i></span>
					<span>37.2K</span>
				</div>
			</div>
		</div>

		<?php } } ?>
	</div>
</div>

<?php } else{
   header("Location:login.php");
}
?>

</script>
</body>