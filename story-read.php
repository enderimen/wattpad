<?php require_once 'config.php'; 
if ($_SESSION['session_control'] == true) {
	include 'header.php';   

	@$story_branch_read_sql = mysqli_query( $connection , "SELECT * FROM story_branch WHERE storyID = '".$_GET['rstory_id']."'"); 

	@$star_image_sql = mysqli_query( $connection , "SELECT star_url FROM stars WHERE star_authorID = '".$_SESSION['id']."' and storyID = '".$_GET['rstory_id']."'"); 
	$story_image_url = mysqli_fetch_array($star_image_sql);

	$story_branch_read = mysqli_fetch_array($story_branch_read_sql);

	@$story_comment_pull_sql = mysqli_query( $connection , "SELECT * FROM comments WHERE storyID = '".$_GET['rstory_id']."'"); 

	 $user_photo_sql = mysqli_query($connection, "SELECT profile_photo FROM kullanicilar WHERE id = '".$_SESSION["id"]."'");
    $user_photo_data = mysqli_fetch_array($user_photo_sql);

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
				<h2>Hoş Geldiniz</h2><br>

				<h2><?=$story_branch_read['story_branch_title']?></h2>
				<br><br>
				<p><?=$story_branch_read['story_branch_content']?></p>
				
				<br><br>
				
				<div class="comment-star">
					<div class="comment-star-head">
						
						<?php 

						$star_control_sql = mysqli_query($connection,"SELECT * FROM stars WHERE storyID ='".$_GET['rstory_id']."' AND star_authorID = '".$_SESSION['id']."'");
						$star_count_sql = mysqli_query($connection,"SELECT count(starID) as star_count FROM stars WHERE storyID ='".$_GET['rstory_id']."'");
						
						$star_count_data = mysqli_fetch_array($star_count_sql);

						if (mysqli_num_rows($star_control_sql) > 0) { ?>
						 	<a href="transaction.php?str=<?=$_GET['rstory_id']?>">
						 		<img src="<?=$story_image_url['star_url']?>" alt="" class="star-like">
						 	</a>
						 	<span class="star_count"><?=$star_count_data['star_count']." Yıldız"?></span>
						
						<?php } else { ?>	
						
							<a href="transaction.php?str=<?=$_GET['rstory_id']?>">
								<img src="img/void_star.png" alt="" class="star-like">
							</a>
							<span class="star_count"><?=$star_count_data['star_count']." Yıldız"?></span>

						<?php }
						$isUnlist = mysqli_query( $connection , "SELECT readID FROM reading_list WHERE readerID = '".$_SESSION['id']."' AND readed_storyID = '".$_GET['rstory_id']."'");

						$isMe = mysqli_query( $connection , "SELECT readID FROM reading_list WHERE readerID = '".$_SESSION['id']."' AND story_authorID = '".$_SESSION['id']."'");

						if (mysqli_num_rows($isUnlist) > 0) { ?>
														
							<form action="transaction.php" method="POST">
								<input type="text" value="<?=$story_branch_read['userID']?>" name="userID" hidden="hidden">
								<input type="text" value="<?=$_GET['rstory_id']?>" name="rstoryID" hidden="hidden">
								<input type="submit" value="Listemden Çıkar" name="un_read_list" class="button">
							</form>

							<?php } else { ?>
							<form action="transaction.php" method="POST">
								<input type="text" value="<?=$story_branch_read['userID']?>" name="userID" hidden="hidden">
								<input type="text" value="<?=$_GET['rstory_id']?>" name="rstoryID" hidden="hidden">
								<input type="submit" value="Okuma Listeme Ekle" name="add_read_list" class="button">
							</form>
							<?php }?>

					</div>

					<form action="transaction.php" method="POST">
						<div class="comment-details">
							<input type="text" value="<?=$story_branch_read['userID']?>" name="userID" hidden="hidden">
							<input type="text" value="<?=$_GET['rstory_id']?>" name="rstoryID" hidden="hidden">
							<img src="<?=$user_photo_data['profile_photo']?>" alt="" height="64" width="64">
							<input type="text" name="comment" placeholder="Yorum yaz..." class="input-comment">
							<input type="submit" name="comment-button" class="comment-button" value="Gönder">
						</div>
					</form>

					<div class="comment-show-content">
						
						<?php while ($story_comment_pull_data = mysqli_fetch_array($story_comment_pull_sql)) { 

							$comment_author_sql     =  mysqli_query( $connection , "SELECT user_name , profile_photo FROM kullanicilar WHERE id = '".$story_comment_pull_data['comment_authorID']."'");
							$comment_author_data  =  mysqli_fetch_array($comment_author_sql);

							$comment_to_comment_pull_sql = mysqli_query( $connection , "SELECT c_t_c_content , c_to_c_authorID, c_t_c_comment_author_name FROM comment_to_comment WHERE commentID = '".$story_comment_pull_data['commentID']."'"); 

							?>
							<div class="comment-content">
								<img src="<?=$comment_author_data['profile_photo']?>" alt="" height="48" width="48">
								<div class="comment-content-details">
									<p><b><?=$comment_author_data['user_name']?></b></p>
									<p><b><?=$story_comment_pull_data['comment_date']?></b></p>
									<p style="margin-top: 10px"><?=$story_comment_pull_data['comment']?></p>
								</div>							
							</div>
							<?php while ($comment_to_comment_pull_data = mysqli_fetch_array($comment_to_comment_pull_sql)) { ?>

								<p class="comment-to-comment"><b><?=$comment_to_comment_pull_data['c_t_c_comment_author_name']?>: </b><?=$comment_to_comment_pull_data['c_t_c_content']?></p>
							
							<?php } ?>
							
							<form action="transaction.php" method="POST">
								<div class="comment-details comment-to-comment-details">
									<input type="text" name="commentID" value="<?=$story_comment_pull_data['commentID']?>" hidden="hidden">
									<input type="text" name="rstoryID" value="<?=$_GET['rstory_id']?>" hidden="hidden">
									
									<img src="<?=$user_photo_data['profile_photo']?>" alt="" height="48" width="48">
									
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