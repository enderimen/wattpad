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

				$sql	=	mysqli_query( $connection, "SELECT id , user_name , full_name FROM kullanicilar 
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
					$_SESSION['fullname'] = $data['full_name'];

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

    			if (mysqli_affected_rows($connection)) {
    				echo '<script language="javascript">
    				alert("Profil Resmi kaydedildi.");
    				</script>';    
    				header("refresh:0.05;url=settings.php"."?id=".$_SESSION['id']);
    			}                                                         
    			else {
    				header("refresh:0.05;url=settings.php"."?id=".$_SESSION['id']);
    			}
    		} else {
    			echo '<script language="javascript">
    			alert("Dosya Yüklenemedi!");
    			</script>'; 

    			header("refresh:0.05;url=settings.php"."?id=".$_SESSION['id']);
    		}
    	} else {
    		header("refresh:0.05;url=settings.php"."?id=".$_SESSION['id']); 
    	}
    }else{
    	echo '<script language="javascript">
    	alert("Dosya boyutu 2 Mb ı geçemez!");
    	</script>'; 
    	header("refresh:0.05;url=settings.php"."?id=".$_SESSION['id']);
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
    				header("refresh:0.05;url=settings.php"."?id=".$_SESSION['id']);
    			}                                                         
    			else{
    				header("refresh:0.05;url=settings.php"."?id=".$_SESSION['id']);
    			}
    		}else{
    			echo '<script language="javascript">
    			alert("Dosya Yüklenemedi!");
    			</script>'; 

    			header("refresh:0.05;url=settings.php"."?id=".$_SESSION['id']);
    		}
    	}else{
    		header("refresh:0.05;url=settings.php"."?id=".$_SESSION['id']); 
    	}
    }else{
    	echo '<script language="javascript">
    	alert("Dosya boyutu 2 Mb ı geçemez!");
    	</script>'; 
    	header("refresh:0.05;url=settings.php"."?id=".$_SESSION['id']);
    }
}

// Story share

if (isset($_POST['save-story-info'])) {

	$story_title	=	trim($_POST['story-title']);
	$story_desc		=	trim($_POST['story-desc']);
	$story_genre	=	trim($_POST['select-genre']);
	
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

		header("refresh:0.05;url=story-write.php");
	}
}

// Yazılan hikayeyi kaydediyoruz

if (isset($_POST['story-branch-save'])) {

	$story_branch_title		=	trim($_POST['story-branch-title']);
	$story_branch_content	=	trim($_POST['story-branch-content']);
	$story_ID				=	trim($_POST['storyID']);
	
	$add_story	=	mysqli_query( $connection, "INSERT INTO story_branch 
		(
		storyID,
		userID,
		full_name,
		story_branch_title,
		story_branch_content
		)
		VALUES
		(
		'$story_ID',
		'".$_SESSION['id']."',
		'".$_SESSION['fullname']."',
		'$story_branch_title',
		'$story_branch_content'
	)");

	if ($add_story) {

		echo '<script language="javascript">
		alert("Story Saved!");
		</script>'; 

		header("refresh:0.05;url=story-write.php");
	}
}


// Hikayenin kapak resmini güncelliyoruz.
if(isset($_POST['story-cover-save'])){

    if ($_FILES["story-cover-file"]["size"] < 1024*1024*1024*1024){//Dosya boyutu 2Mb tan az olsun

    	if ($_FILES["story-cover-file"]["type"] == "image/jpeg" || $_FILES["story-cover-file"]["type"] == "image/png"){
    		
    		$dosya_adi = $_FILES["story-cover-file"]["name"];
    		$uzanti = substr($dosya_adi,-4,4);
    		$uret = array("as","rt","ty","yu","fg");
    		$sayi_tut = rand(1,10000);
    		$yeni_ad = "../img/story_photo/photo".$uret[rand(0,4)].$sayi_tut.$uzanti;

    		if (move_uploaded_file($_FILES["story-cover-file"]["tmp_name"] , $yeni_ad)){

    			$story_photo_update = mysqli_query($connection,"UPDATE stories SET story_photo = '".$yeni_ad."' WHERE storyID = '".$_POST['storyID']."'");

    			if (mysqli_affected_rows($connection)){
    				echo
    				'<script language="javascript">
    				alert("Kapak Fotoğrafı Güncellendi.");
    				</script>';    
    				header("refresh:0.05;url=story-write.php");
    			}                                                         
    			else{
    				header("refresh:0.05;url=story-write.php");
    			}
    		}else{
    			echo '<script language="javascript">
    			alert("Dosya Yüklenemedi!");
    			</script>'; 
    			header("refresh:0.05;url=story-write.php");
    		}
    	}else{
    		header("refresh:0.05;url=story-write.php");
    	}
    }else{
    	echo '<script language="javascript">
    	alert("Dosya boyutu 2 Mb ı geçemez!");
    	</script>'; 
    	header("refresh:0.05;url=story-write.php");
    }
}

// Yazılan hikayeyi güncelliyoruz

if (isset($_POST['story-branch-update'])) {

	$story_branch_edit_title		=	trim($_POST['story-branch-edit-title']);
	$story_branch_edit_content		=	trim($_POST['story-branch-edit-content']);
	$story_ID						=	trim($_POST['storyID']);
	
	$update_story	=	mysqli_query( $connection, "UPDATE story_branch 
		SET 
		story_branch_title = '$story_branch_edit_title',
		story_branch_content = '$story_branch_edit_content'
		WHERE 
		story_branchID = '".$story_ID."'
		");

	if ($update_story) {

		echo '<script language="javascript">
		alert("Story Updated!");
		</script>';

		header("refresh:0.05;url=story-edit.php?wstory_id=".$story_ID."");
	}
}


// Takip Et

if (isset($_POST['follow'])) {

	$followingID		=	trim($_POST['followingID']);
	$following_name		=	trim($_POST['following_name']);
	$uid				=	trim($_POST['uid']);
	
	$control_query 		=	mysqli_query( $connection, "SELECT * FROM followers 
		WHERE 
		followingID = '$followingID' 
		and
		followerID = '".$_SESSION['id']."'"
	);

	if (mysqli_num_rows($control_query) > 0) {

		echo '<script language="javascript">
		alert("Kişi zaten takip ediliyor.!");
		</script>'; 

		header("refresh:0.01;url=profile.php?uid=".$uid."");

	} else {

		$add_follower	=	mysqli_query( $connection, "INSERT INTO followers 
			(
			followerID,
			follower_name,
			followingID,
			following_name
			)
			VALUES
			(
			'".$_SESSION['id']."',
			'".$_SESSION['username']."',
			'$followingID',
			'$following_name'
		)");

		if ($add_follower) {

			echo '<script language="javascript">
			alert("Following!");
			</script>'; 

			header("refresh:0.05;url=profile.php?uid=".$uid."");
		}
	}
}

// Takibi Bırak

if (isset($_POST['unfollow'])) {

	$followingID		=	trim($_POST['followingID']);
	$following_name		=	trim($_POST['following_name']);
	$uid				=	trim($_POST['uid']);
	
	$control_query 		=	mysqli_query( $connection, "DELETE FROM followers 
		WHERE 
		followingID = '$followingID'
		and
		followerID = '".$_SESSION['id']."'"
	);

	if (mysqli_num_rows($control_query) > 0) {

		echo '<script language="javascript">
		alert("Kişi takipten çıkarıldı.!");
		</script>'; 

		header("refresh:0.01;url=profile.php?uid=".$uid."");
	}
}

// Okuma listeme ekle 

if (isset($_POST['add_read_list'])) {

	$rstoryID	=	trim($_POST['rstoryID']);
	$story_authorID = trim($_POST['userID']);

	$control_query 	=	mysqli_query( $connection, "SELECT * FROM reading_list 
		WHERE 
		readerID = '".$_SESSION['id']."'
		and
		readed_storyID = '".$story_authorID."'"
	);

	if (mysqli_num_rows($control_query) > 0) {

		echo '<script language="javascript">
		alert("Kitap zaten listenizde!");
		</script>'; 

		header("refresh:0.05;url=story-read.php?rstory_id=".$rstoryID."");

	} else {
	$read_list_query 	=	mysqli_query( $connection, "INSERT INTO reading_list 
			(
			readerID,
			readed_storyID,
			story_authorID
			)
			VALUES
			(
			'".$_SESSION['id']."',
			'$rstoryID',
			'$story_authorID'
		)");

		if ($read_list_query) {

			echo '<script language="javascript">
			alert("Listene Eklendi!");
			</script>'; 

			header("refresh:0.05;url=story-read.php?rstory_id=".$rstoryID."");
		}
	}
}

// Okuma listesinden çıkar

if (isset($_POST['un_read_list'])) {

	$storyID	=	trim($_POST['rstoryID']);
	
	$un_read_list_sql	=	mysqli_query( $connection, "DELETE FROM reading_list 
		WHERE 
		readed_storyID = '$storyID'
		and
		readerID = '".$_SESSION['id']."'"
	);

	if ($un_read_list_sql)  {

		echo '<script language="javascript">
		alert("Listeden çıkarıldı.!");
		</script>'; 

		header("refresh:0.05;url=story-read.php?rstory_id=".$storyID."");
	}
}

?>