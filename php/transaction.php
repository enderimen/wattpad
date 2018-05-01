<?php require_once("config.php"); 

if (isset($_POST['signup'])) {

	$usermail	=	trim($_POST['mail']);
	$fullname	=	trim($_POST['fullname']);
	$username	=	trim($_POST['username']);
	$password	=	md5(trim($_POST['password']));

	$sql	=	mysqli_query( $connection, "SELECT * FROM kullanicilar 
		WHERE 
		user_name = '$username' 
		or 
		user_mail = '$usermail'"
	);

	if (mysqli_num_rows($sql) > 0) {

		echo 	'<script language="javascript">;
		alert("Kullanıcı adı ya da email zaten kullanılmakta");  
		</script>';
		header("refresh:0.02; url=account.php");

	}else{

		/*echo 	'<script language="javascript">;
					alert("Kullanıcı Bulunamadı");  
					</script>';*/

					$add_user	=	mysqli_query( $connection, "INSERT INTO kullanicilar 
						(
						user_name, 
						full_name, 
						user_mail, 
						password, 
						profile_photo
						) 
						VALUES 
						(
						'$username',
						'$fullname',
						'$usermail',
						'$password',
						' '
					)");

					if ($add_user) {

						header("refresh:0.02; url=login.php");
					}
				}
			}

			if (isset($_POST['signin'])) {

				$username	=	trim($_POST['username']);
				$password	=	md5(trim($_POST['password']));

				$sql	=	mysqli_query( $connection, "SELECT * FROM kullanicilar 
					WHERE 
					user_name = '$username'
					AND
					password = '$password'"
				);

				if (mysqli_num_rows($sql) > 0) {

					$data = mysqli_fetch_array($sql);

					$_SESSION['session_control'] = true;
					$_SESSION['id'] = $data['id'];
					$_SESSION['username'] = $data['user_name'];

					header("refresh:0.02; url=index.php");
					return;
				}else{		

					header("refresh:0.02;Url=account.php");
				}
			}


			if (isset($_POST['user-profil-save-button'])) {

				$username		=	trim($_POST['username']);
				$last_password	=	md5(trim($_POST['last_password']));
				$new_password	=	md5(trim($_POST['new_password']));
				$usermail		=	trim($_POST['mail']);
				$fullname		=	trim($_POST['fullname']);
				$birthdate		=	trim($_POST['birthdate']);
				$gender			=	trim($_POST['gender']);	
				$biography		=	trim($_POST['about']);	

				/*if ($last_password == $new_password) {*/

					$update = mysqli_query( $connection, "UPDATE kullanicilar 
						SET 
						user_name = '$username',
						full_name = '$fullname',
						user_mail = '$usermail',
						profile_photo = ' ',
						birthdate = '$birthdate',
						gender = '$gender',
						biography = '$biography'
						WHERE 
						user_name = '".$_SESSION['username']."'
						");
					if ($update) {
						header("refresh:0.02; url=settings.php");
					}
				}

//  Profil fotoğrafı değiştirme

				if(isset($_POST['profile-save-button'])){

    if ($_FILES["profile-image-file"]["size"] < 1024*1024*1024*1024){//Dosya boyutu 2Mb tan az olsun

    	if ($_FILES["profile-image-file"]["type"] == "image/jpeg" || $_FILES["profile-image-file"]["type"] == "image/png"){
    		$dosya_adi = $_FILES["profile-image-file"]["name"];
            //Dosyaya yeni bir isim oluşturuluyor
    		$uzanti = substr($dosya_adi,-4,4);
    		$uret = array("as","rt","ty","yu","fg");
    		$sayi_tut = rand(1,10000);
    		$yeni_ad = "../img/profile_photo/photo".$uret[rand(0,4)].$sayi_tut.$uzanti;

    		if (move_uploaded_file($_FILES["profile-image-file"]["tmp_name"] , $yeni_ad)){

    			$add=mysqli_query($connection,"UPDATE kullanicilar SET profile_photo = '".$yeni_ad."' WHERE id = '".$_SESSION['id']."'");

    			if (mysqli_affected_rows($connection)){
    				echo '<script language="javascript">
    				alert("Profil Resmi kaydedildi.");
    				</script>';    
    				header("Location:settings.php"."?id=".$_SESSION['id']);
    			}                                                         
    			else{
    				header("Location:settings.php"."?id=".$_SESSION['id']);
    			}
    		}else{
    			echo '<script language="javascript">
    			alert("Dosya Yüklenemedi!");
    			</script>'; 

    			header("Location:settings.php"."?id=".$_SESSION['id']);
    		}
    	}else{
    		header("Location:settings.php"."?id=".$_SESSION['id']); 
    	}
    }else{
    	echo '<script language="javascript">
    	alert("Dosya boyutu 2 Mb ı geçemez!");
    	</script>'; 
    	header("Location:settings.php"."?id=".$_SESSION['id']);
    }
}

//  Profil sayfası timeline arkaplan fotoğrafı değiştirme

if(isset($_POST['background-save-button'])){

    if ($_FILES["background-image-file"]["size"] < 1024*1024*1024*1024){//Dosya boyutu 2Mb tan az olsun

    	if ($_FILES["background-image-file"]["type"] == "image/jpeg" || $_FILES["background-image-file"]["type"] == "image/png"){
    		$dosya_adi = $_FILES["background-image-file"]["name"];

    		$uzanti = substr($dosya_adi,-4,4);
    		$uret = array("as","rt","ty","yu","fg");
    		$sayi_tut = rand(1,10000);
    		$yeni_ad = "../img/profile_bg/photo".$uret[rand(0,4)].$sayi_tut.$uzanti;

    		if (move_uploaded_file($_FILES["background-image-file"]["tmp_name"] , $yeni_ad)){

    			$add=mysqli_query($connection,"UPDATE kullanicilar SET background_image = '".$yeni_ad."' WHERE id = '".$_SESSION['id']."'");

    			if (mysqli_affected_rows($connection)){
    				echo '<script language="javascript">
    				alert("Zaman Tüneli Fotoğrafı kaydedildi.");
    				</script>';    
    				header("Location:settings.php"."?id=".$_SESSION['id']);
    			}                                                         
    			else{
    				header("Location:settings.php"."?id=".$_SESSION['id']);
    			}
    		}else{
    			echo '<script language="javascript">
    			alert("Dosya Yüklenemedi!");
    			</script>'; 

    			header("Location:settings.php"."?id=".$_SESSION['id']);
    		}
    	}else{
    		header("Location:settings.php"."?id=".$_SESSION['id']); 
    	}
    }else{
    	echo '<script language="javascript">
    	alert("Dosya boyutu 2 Mb ı geçemez!");
    	</script>'; 
    	header("Location:settings.php"."?id=".$_SESSION['id']);
    }
}

// Story share

if (isset($_POST['save-story-info'])) {

	$story_title	=	trim($_POST['story-title']);
	$story_desc		=	trim($_POST['story-desc']);
	$story_genre	=	trim($_POST['select-genre']);

	if ($_FILES["story-cover-file"]["size"] < 1024*1024*1024*1024){	//Dosya boyutu 2Mb tan az olsun

		if ($_FILES["story-cover-file"]["type"] == "image/jpeg" || $_FILES["story-cover-file"]["type"] == "image/png"){
			$dosya_adi = $_FILES["story-cover-file"]["name"];

			$uzanti 	= 	substr($dosya_adi,-4,4);
			$uret 		= 	array("as","rt","ty","yu","fg");
			$sayi_tut 	= 	rand(1,10000);
			$yeni_ad 	= 	"../img/story_photo/photo".$uret[rand(0,4)].$sayi_tut.$uzanti;

			if (move_uploaded_file($_FILES["story-cover-file"]["tmp_name"] , $yeni_ad)){

				
				$story_photo_update = mysqli_query($connection,"UPDATE stories SET story_photo = '".$yeni_ad."' WHERE userID = '".$_SESSION['id']."'");

				if ($story_photo_update) {

					header("Location:create-content.php");
				}
			}

			$add_story	=	mysqli_query( $connection, "INSERT INTO stories 
					(
					userID, 
					story_title, 
					story_desc, 
					story_genre
					) 
					VALUES 
					(
					'".$_SESSION['id']."',
					'$story_title',
					'$story_desc',
					'$story_genre'
				)");

			if ($add_story) {

					header("Location:create-content.php");
				}

		}
	}
}











?>