<?php require_once 'config.php'; 
if ($_SESSION['session_control'] == true) {
	include 'header.php';   

	@$story_branch_read_sql = mysqli_query( $connection , "SELECT * FROM story_branch WHERE storyID = '".$_GET['rstory_id']."'"); 

	$story_branch_read = mysqli_fetch_array($story_branch_read_sql);

	@$story_comment_pull_sql = mysqli_query( $connection , "SELECT * FROM comments WHERE storyID = '".$_GET['rstory_id']."'"); 

	?>

	<div class="container">
		<div class="mind flex-row">
			
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

				<div class="comment-star">
					<div class="comment-star-head">
						<?php 
						$isUnlist = mysqli_query( $connection , "SELECT * FROM reading_list WHERE readerID = '".$_SESSION['id']."' AND readed_storyID = '".$_GET['rstory_id']."'");

						if (mysqli_num_rows($isUnlist) > 0) { ?>
						<form action="transaction.php" method="POST">
							<input type="submit" value="Un read List" name="un_read_list">
						<?php } else { ?>
							<input type="submit" value="Add to Read List" name="add_read_list">
						</form>
						<?php } ?>	

						<a href="transaction.php?str=<?=$_GET['rstory_id']?>"><img src="../img/void_star.png" alt="" class="star-like"></a>
					</div>

					<form action="transaction.php" method="POST">
						<div class="comment-details">
							<img src="../img/book1.jpg" alt="" height="64" width="64">
							<input type="text" name="comment" placeholder="Yorum yaz..." class="input-comment">
							<input type="submit" name="comment-button" class="comment-button" value="Gönder">
						</div>
					</form>

					<div class="comment-show-content">
						
						<?php while ($story_comment_pull_data = mysqli_fetch_array($story_comment_pull_sql)) { 
							$comment_author_sql     =  mysqli_query( $connection , "SELECT user_name , profile_photo FROM kullanicilar WHERE id = '".$story_comment_pull_data['comment_authorID']."'");
							$comment_author_data  =  mysqli_fetch_array($comment_author_sql);
							?>
							<div class="comment-content">
								<img src="<?=$comment_author_data['profile_photo']?>" alt="" height="48" width="48">
								<div class="comment-content-details">
									<p><?=$comment_author_data['user_name']?></p>
									<p><?=$story_comment_pull_data['comment_date']?></p>
									<p><?=$story_comment_pull_data['comment']?></p>
								</div>							
							</div>
							<?php while () { ?>

								<p class="comment-to-comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates veritatis quam voluptatem ea, ipsa culpa quasi</p>
							
							<?php } ?>
							
							<form action="transaction.php" method="POST">
								<div class="comment-details comment-to-comment-details">
									<input type="text" name="commentID" value="<?=$story_comment_pull_data['commentID']?>" hidden="hidden">
									<input type="text" name="rstoryID" value="<?=$_GET['rstory_id']?>" hidden="hidden">
									
									<img src="../img/book1.jpg" alt="" height="48" width="48">
									
									<input type="text" name="comment_to" class="input-comment" placeholder="Yorum yaz...">
									<input type="submit" name="comment-to-comment-button" class="comment-button" value="Yanıtla">
								</div>
							</form>

							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php } else {
			header("Location:login.php");
		} ?>  
	</body>
	</html>