
<?php require_once 'config.php'; include 'header.php'; ?>

<div class="container">
	<form action="transaction.php" method="POST" class="mind flex-column">
		<h2>Story Write</h2><br>
		<input type="text" name="story-title" placeholder="Story Title" class="input" required="required">
		<textarea name="story-branch-content" id="" cols="70" rows="40" required="required"></textarea>
		<input type="text" value="<?=$_GET['storyid']?>" name="storyID">
		
		<input type="submit" name="story-branch-save" value="Save" class="button">
	</form>
</div>  
</body>
</html>