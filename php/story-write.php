
<?php require_once 'config.php'; include 'header.php'; ?>

<div class="container">
	<form action="transaction.php" method="POST" class="mind flex-column">
		<h2>Story Write</h2><br>
		<textarea name="story-content" id="" cols="70" rows="40" required="required">
			<?=$story_content['story_content']?>
		</textarea>

		<input type="submit" name="story-content-save" value="Save" class="button">
	</form>
</div>  
</body>
</html>