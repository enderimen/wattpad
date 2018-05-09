<?php require_once 'config.php'; 

if ($_SESSION['session_control'] == true) {
	include 'header.php'; 

	if (isset($_POST['search_button'])) {

		$search_value = addslashes(strip_tags(trim($_POST['search_value'])));

		if ($search_value != "") {

			$search_user_sql = mysqli_query($connection, "SELECT id, user_name , full_name , profile_photo FROM kullanicilar  WHERE full_name OR user_name LIKE '%$search_value%'");

			$search_story_sql = mysqli_query($connection, "SELECT story_title, story_desc ,story_photo FROM stories  WHERE story_title LIKE '%$search_value%'");
		}else {
			echo 	'<script language="javascript">;
						alert("Lütfen aranacak bir ifade giriniz!");  
					</script>';
			header('refresh:0.01; url=index.php');
		}
	}
	?>

	<div class="container">
		<div class="search-content">			
			<div class="flex-column">
				<?php while ($search_story_data = mysqli_fetch_array($search_story_sql)) {  ?>
				<div class="search-stories">
					<div class="search-card">
						<img src="<?=$search_story_data['story_photo']?>" alt="" height="180" width="140">
						<div class="search-details">
							<span><a href=""><?=$search_story_data['story_title']?></a></span>
							<span><p><?=$search_story_data['story_desc']?></p></span>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>

			<div class="flex-column">
				<?php while ($search_user_data = mysqli_fetch_array($search_user_sql)) { ?>
				<div class="search-users">
					<div class="search-user">
						<img src="<?=$search_user_data['profile_photo']?>" alt="" height="80" width="80">
						<div class="user-details">
							<span>
								<a href="profile.php?uid=<?=$search_user_data['id']?>"><?=$search_user_data['full_name']?></a>
							</span>
							<span>
								<a href=""><?=$search_user_data['user_name']?></a>
							</span>
						</div>
					</div>	
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<?php } ?>