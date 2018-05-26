<?php require_once 'config.php'; 
if ($_SESSION['session_control'] == true) {
	include 'header.php';   ?>

	<div id="myModal" class="modal">

		<div class="modal-content">
			<span class="close">&times;</span>
			<p>Şifre Güncelle</p>

			<form action="transaction.php" method="POST">
				<div class="user-profile-password">
					<input type="password" placeholder="Eski Şifre"  required="required" name="last_password" class="input">
				</div>
				<div class="user-profile-password">
					<input type="password" placeholder="Eski Şifre Tekrar"  required="required" name="retry_password" class="input">
				</div>
				<div class="user-profile-password">
					<input type="password" placeholder="Yeni Şifre" required="required" name="new_password" class="input">
				</div>
				<div class="user-profile-password-save">
					<input type="submit" name="password_save" class="comment-button" value="Güncelle">
				</div>
			</form>
		</div>
	</div>

	<div class="main-content">
		<div class="account-content">
			<div class="title">Hesap</div>	
				
			<form action="transaction.php" method="POST">
				<div class="user-profile-username">
					<span>Kullanıcı Adı</span>
					<input type="text" placeholder="Username" required="required" name="username" class="input" value="<?=$data['user_name']?>">
				</div>
				<div class="user-profile-password">
					<span>Şifre</span>
					<input type="button" value="Değiştir" id="myBtn">
				</div>
				<div class="user-profile-mail">
					<span>E-Posta</span>
					<input type="text" placeholder="E-Mail" required="required" name="mail" class="input" value="<?=$data['user_mail']?>" >
				</div>
				<div class="user-profile-fullname">
					<span>Tam Ad</span>
					<input type="text" placeholder="Fullname" required="required" name="fullname" class="input" value="<?=$data['full_name']?>" >
				</div>
				<div class="user-profile-birthdate" class="input">
					<span>Doğum Tarihi</span>
					<input type="date" required="required" name="birthdate" id="birthdate" value="<?=$data['birthdate']?>" >
				</div>
				<div class="user-profile-gender" class="input">
					<span>Cinsiyet</span>
					<select required="required" name="gender">
						<option value="Boy">Erkek</option>
						<option value="Girl">Kız</option>
					</select>
				</div>

				<div class="user-profile-about">
					<span>Hakkımda</span>
					<textarea id="" cols="40" rows="10" name="about" placeholder="Write your biography" no-resize><?=$data['biography']?></textarea>
				</div>

				<div class="user-profil-save-button">
					<input type="submit" value="Save" name="user-profil-save-button" class="button">
				</div>
			</form>
		</div>

		<div class="customize">
			<form action="transaction.php" method="POST" enctype="multipart/form-data">
				<span>Kişileştir</span>
				<span>Profil Resmi</span>
				
				<img src="<?=$data['profile_photo']?>" alt="" title="Profile Photo Load" id="upload" height="200" width="200">
				<input type="file" name="profile-image-file" hidden="hidden" id="file">
				<input type="submit" name="profile-save-button" value="Save" class="button">

				<span>Profil Arkaplan Resmi</span>
				
				<img src="<?=$data['background_image']?>" alt="" title="Background Photo Load" id="upload_bg" height="200" width="200">
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
	<script src="js/customize.js"></script>
</body>