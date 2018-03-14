<?php require_once 'config.php'; include 'header.php'; ?>

<div class="main-content">
	<div class="account-content">
		<div class="title">Account</div>	
		<form action="transaction.php" method="POST">
			<div class="user-profile-username">
				<span>Username</span>
				<input type="text" placeholder="Username" name="username" class="input" value="<?=$data['user_name']?>">
			</div>
			<div class="user-profile-password">
				<span>Last Password</span>
				<input type="text" placeholder="Last Password" name="last_password" class="input">
			</div>
			<div class="user-profile-password">
				<span>New Password</span>
				<input type="text" placeholder="New Password" name="new_password" class="input">
			</div>
			<div class="user-profile-mail">
				<span>E-Mail</span>
				<input type="text" placeholder="E-Mail" name="mail" class="input" value="<?=$data['user_mail']?>" >
			</div>
			<div class="user-profile-fullname">
				<span>Fullname</span>
				<input type="text" placeholder="Fullname" name="fullname" class="input" value="<?=$data['full_name']?>" >
			</div>
			<div class="user-profile-birthdate" class="input">
				<span>Birthdate</span>
				<input type="date" name="birthdate" id="birthdate" value="<?=$data['birthdate']?>" >
			</div>
			<div class="user-profile-gender" class="input">
				<span>Gender</span>
				<select name="gender">
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
		<form action="">
			<span>Customize</span>
			<span>Profile Image</span>
			<img src="<?=$data['profile_photo']?>" alt="" title="Profile Photo" height="200" width="200">
			<input type="file" name="profile-image-file" hidden="hidden">
			<span>Background Image</span>
			<img src="<?=$data['background_image']?>" alt="" height="150" width="150">
			<input type="file" name="background-image-file" hidden="hidden">
			<input type="submit" name="image-save-button" value="Save" class="button">
		</form>	
	</div>
</div>

</body>