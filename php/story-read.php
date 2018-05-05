<?php require_once 'config.php'; 
if ($_SESSION['session_control'] == true) {
	include 'header.php';   

	@$story_branch_read_sql = mysqli_query( $connection , "SELECT * FROM story_branch WHERE storyID = '".$_GET['rstory_id']."'"); 

	$story_branch_read = mysqli_fetch_array($story_branch_read_sql);

	?>

	<div class="container">
		<form action="transaction.php" method="POST" class="mind flex-row">
			
			<div class="story-menus">
				
				<?php while ($menu = mysqli_fetch_array($story_branch_read_sql)) { ?>
				<div class="menu">
					<a href="story-read.php?rstory_id=<?=$menu['story_branchID']?>"><?=$menu['story_branch_title']?></a>
				</div>
				<?php } ?>
			</div>
			<div class="story-read-content">
				<h2>Welcome</h2><br>

				<h2><?=$story_branch_read['story_branch_title']?></h2>
				<br><br>
				<p><?=$story_branch_read['story_branch_content']?></p>
				
				<br><br>
				
				<input type="text" value="<?=$story_branch_read['userID']?>" name="userID" hidden="hidden">
				<input type="text" value="<?=$_GET['rstory_id']?>" name="rstoryID" hidden="hidden">

				<?php 
                    $isUnlist = mysqli_query( $connection , "SELECT * FROM reading_list WHERE readerID = '".$_SESSION['id']."' AND readed_storyID = '".$_GET['rstory_id']."'");

                    if (mysqli_num_rows($isUnlist) > 0) { ?>
                    <input type="submit" value="Un read List" name="un_read_list" class="button">
                    <?php } else { ?>
                    <input type="submit" value="Add to readList" name="add_read_list" class="button">
                    <?php } ?>
                
			</div>
		</form>
	</div>

	<?php } else {
		header("Location:login.php");
	} ?>  
</body>
</html>