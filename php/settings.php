<?php require_once 'config.php'; 
if ($_SESSION['session_control'] == true) {
	include 'header.php';   ?>

	<div class="main-content">
		<div class="account-content">
			<div class="title">Account</div>	
			<form action="transaction.php" method="POST">
				<div class="user-profile-username">
					<span>Username</span>
					<input type="text" placeholder="Username" required="required" name="username" class="input" value="<?=$data['user_name']?>">
				</div>
				<div class="user-profile-password">
					<span>Last Password</span>
					<input type="text" placeholder="Last Password"  required="required" name="last_password" class="input">
				</div>
				<div class="user-profile-password">
					<span>New Password</span>
					<input type="text" placeholder="New Password" required="required" name="new_password" class="input">
				</div>
				<div class="user-profile-mail">
					<span>E-Mail</span>
					<input type="text" placeholder="E-Mail" required="required" name="mail" class="input" value="<?=$data['user_mail']?>" >
				</div>
				<div class="user-profile-fullname">
					<span>Fullname</span>
					<input type="text" placeholder="Fullname" required="required" name="fullname" class="input" value="<?=$data['full_name']?>" >
				</div>
				<div class="user-profile-birthdate" class="input">
					<span>Birthdate</span>
					<input type="date" required="required" name="birthdate" id="birthdate" value="<?=$data['birthdate']?>" >
				</div>
				<div class="user-profile-gender" class="input">
					<span>Gender</span>
					<select required="required" name="gender">
						<option value="Boy">Boy</option>
						<option value="Girl">Girl</option>
					</select>
				</div>

				<div class="user-profile-about">
					<span>About Me</span>
					<textarea id="" cols="40" rows="10" name="about" placeholder="Write your biography" no-resize><?=$data['biography']?></textarea>
				</div>

				<div class="user-profil-save-button">
					<input type="submit" value="Save" name="user-profil-save-button" class="button">
				</div>
			</form>
		</div>

		<div class="customize">
			<form action="transaction.php" method="POST" enctype="multipart/form-data">
				<span>Customize</span>
				<span>Profile Image</span>
				
				<img src="<?=$data['profile_photo']?>" alt="" title="Profile Photo Load" id="upload" height="200" width="200">
				<input type="file" name="profile-image-file" hidden="hidden" id="file">
				<input type="submit" name="profile-save-button" value="Save" class="button">

				<span>Background Image</span>
				
				<img src="<?=$data['background_image']?>" alt="" title="Background Photo Load" id="upload_bg" height="150" width="150">
				<input type="file" name="background-image-file" hidden="hidden" id="file_bg">
				<input type="submit" name="background-save-button" value="Save" class="button">
			</form>	
		</div>
	</div>
	<?php }else{
		header("Location:login.php");
	}
	?>

	<!--Js-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="../js/customize.js"></script>
</body>