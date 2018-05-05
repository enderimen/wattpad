<?php require_once 'config.php'; 
if ($_SESSION['session_control'] == true) {
	include 'header.php';   ?>

<div class="container">
	<form action="transaction.php" method="POST" class="mind flex-column">
		<h2>Story Update</h2><br>
		<input type="text" name="story-branch-edit-title" class="input" placeholder="Part Title" value="<?=$story_branch_fill['story_branch_title']?>">
		<textarea name="story-branch-edit-content" id="" cols="70" rows="30" required="required">
			<?=$story_branch_fill['story_branch_content']?>
		</textarea>
		<input type="text" value="<?=$_GET['wstory_id']?>" name="storyID" hidden="hidden">
		<input type="submit" name="story-branch-update" value="Update" class="button">
	</form>
</div>

<?php } else {
		header("Location:login.php");
} ?>  
</body>
</html>