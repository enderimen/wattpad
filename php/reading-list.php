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
		
		<?php while ($reading_stories = mysqli_fetch_array($reading_stories_sql)) { 
		
		$reading_stories_details_sql =  mysqli_query( $connection , "SELECT * FROM stories WHERE storyID = '".$reading_stories['readed_storyID']."'");
		$reading_stories_details = mysqli_fetch_array($reading_stories_details_sql); 

		$story_author_user_sql =  mysqli_query( $connection , "SELECT user_name, profile_photo  FROM kullanicilar WHERE id = '".$reading_stories['story_authorID']."'");
		$story_author_user = mysqli_fetch_array($story_author_user_sql); ?>

		<div class="library-cardview">
			<img src="<?=$reading_stories_details['story_photo']?>" alt="" height="260" width="200" id="cover-image">
			<div class="reading-list-user-info">
				<div class="reading-cardview-profile-name">
					<span><?=$reading_stories_details['story_title']?></span>
					<span><?=$story_author_user['user_name']?></span>
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

		<?php } ?>
	</div>
</div>

<?php } else{
   header("Location:login.php");
}
?>

</script>
</body>