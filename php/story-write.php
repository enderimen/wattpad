<?php require_once 'config.php'; 
if ($_SESSION['session_control'] == true) {
	include 'header.php';   ?>

	<div class="container">
		<form action="transaction.php" method="POST" class="mind flex-row">
			<div class="story-cover">
				<img src="../img/story_photo/story_photo.png" alt="" height="300" width="200" id="story-upload">
				<input type="file" name="story-cover-file" id="story-cover-file" hidden="hidden">
				<input type="submit" name="story-cover-save" value="Photo Save" class="button">
			</div>

			<div class="write-group flex-column">
				<h2>Story Write</h2><br>
				<input type="text" name="story-branch-title" class="input" placeholder="Part Title">
				<textarea name="story-branch-content" id="" cols="70" rows="40" required="required">
				</textarea>
				<input type="text" value="<?=$storyID['storyID']?>" name="storyID" hidden="hidden">
				<input type="submit" name="story-branch-save" value="Save" class="button">
			</div>
		</form>
	</div>

	<?php }	else {
		header("Location:login.php");
	} ?>  

	<!--Js-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="../js/customize.js"></script> 
</body>
</html>