<?php include 'header.php'; ?>

<div class="main-content">
	<div class="account-content">
		<div class="title">Account</div>

		<form action="">
			<div class="user-profile-username">
				<span>Username</span>
				<input type="text" placeholder="Username" name="username" class="input">
			</div>
			<div class="user-profile-password">
				<span>Password</span>
				<input type="text" placeholder="Password" name="password" class="input">
			</div>
			<div class="user-profile-mail">
				<span>E-Mail</span>
				<input type="text" placeholder="e-mail" name="mail" class="input">
			</div>
			<div class="user-profile-fullname">
				<span>Fullname</span>
				<input type="text" placeholder="e-mail" name="fullname" class="input">
			</div>
			<div class="user-profile-birthdate" class="input">
				<span>Birthdate</span>
				<input type="date" name="birthdate" id="birthdate">
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
				<textarea id="" cols="40" rows="10" name="about" placeholder="Write your biography" no-resize></textarea>
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
			<img src="img/logo.png" alt="" title="Profile Photo" height="200" width="200">
			<input type="file" name="profile-image-file" hidden="hidden">
			<span>Background Image</span>
			<img src="img/logo.png" alt="" height="150" width="150">
			<input type="file" name="background-image-file" hidden="hidden">
			<input type="submit" name="image-save-button" value="Save" class="button">
		</form>	
	</div>
</div>

</body>