<?php include '../config.php'; 

if (isset($_POST['login'])) {

    $admin_name     =   trim($_POST['admin_name']);
    $admin_password       =   trim($_POST['password']);

    $login_control = mysqli_query( $connection, "SELECT * FROM admin 
        WHERE 
        admin_name     = '$admin_name'
        AND
        admin_password = '$admin_password'"
    );
    
    if (mysqli_num_rows($login_control) > 0) {

        $_SESSION['session_control']    = true;
        $_SESSION['admin_name']         = $admin_name;

        if (isset($_POST['rememberMe'])) {

            if (isset($_SERVER['HTTP_COOKIE'])) 
            {
            
                $cookie_time = 60 * 60 * 24; // 1 Günlük bir süre veriyoruz
                @$cookie_time_onSet = $cookie_time + time(); // Giriş yaptığı andan itibaren 1 günlük süreyi başlatıyoruz

                setcookie("admin_name", $admin_name, $cookie_time_onSet);
                setcookie("admin_password", $admin_password, $cookie_time_onSet);
            }
        } else {
            setcookie("admin_name", '');
            setcookie("admin_password", '');
        }

        header("refresh:0.02; url=index.php");

    }else{
        header("refresh:0.02; url=login.php?state=f");
    }
}


if (isset($_POST['user_save_button'])) {

				$username		=	trim($_POST['user_name']);
				$fullname		=	trim($_POST['full_name']);
				$usermail		=	trim($_POST['user_mail']);
				$birthdate		=	trim($_POST['birthdate']);
				$gender			=	trim($_POST['gender']);
				$joined_date	=	trim($_POST['joined_date']);	
				$biography		=	trim($_POST['biography']);
				$uid			=	trim($_POST['uid']);	

				$update = mysqli_query( $connection, "UPDATE kullanicilar 
					SET 
					user_name = '$username',
					full_name = '$fullname',
					user_mail = '$usermail',
					birthdate = '$birthdate',
					gender 	  = '$gender',
					biography = '$biography'
					WHERE 
					id = '".$uid."'
					");
				
				if ($update) {

					echo '<script> alert("Bilgileriniz güncellendi!"); </script>'; 
					header("refresh:0.02; url=kullanici-detay.php?uid=".$uid."");
				}
}

if (isset($_POST['user_delete_button'])) {

	$uid				=	trim($_POST['uid']);
	
	$control_query 		=	mysqli_query( $connection, "DELETE FROM kullanicilar 
		WHERE 
		id = '$uid'
		");

	if ($control_query) {

		echo '<script language="javascript">
		alert("Silme İşlemi Başarılı!");
		</script>'; 

		header("refresh:0.01;url=index.php");
	}
}

if (isset($_POST['category_add_button'])) {

				$category_name	=	trim($_POST['category_name']);

				$category_add = mysqli_query( $connection, "INSERT INTO categories(category_name) VALUES ('$category_name')");
				
				if ($category_add) {

					echo '<script> alert("Kategori Eklendi!"); </script>'; 
					header("refresh:0.02; url=kategoriler.php");
				}
}

if (isset($_POST['story_branch_save_button'])) {

				$fullname				=	trim($_POST['full_name']);
				$part_title				=	trim($_POST['part_title']);
				$published_date			=	trim($_POST['published_date']);	
				$story_branch_content	=	trim($_POST['story_branch_content']);
				$story_branchID			=	trim($_POST['branch_storyID']);	

				$update = mysqli_query( $connection, "UPDATE story_branch 
					SET 
					full_name 		   	 = '$fullname',
					story_branch_title 	 = '$part_title',
					story_branch_content = '$story_branch_content',
					story_branch_date 	 = '$published_date'
					WHERE
					story_branchID = '".$story_branchID."'
					");
				
				if ($update) {

					echo '<script> alert("Hikaye Bilgileri Güncellendi!"); </script>'; 
					header("refresh:0.02; url=hikaye-detay.php?bstoryID=".$story_branchID."");
				}
}

//  Profil fotoğrafı değiştirme

if(isset($_POST['profile_image_save_button'])){

    if ($_FILES["profile_image_file"]["size"] < 1024*1024*1024*1024){//Dosya boyutu 2Mb tan az olsun

    	if ($_FILES["profile_image_file"]["type"] == "image/jpeg" || $_FILES["profile_image_file"]["type"] == "image/png"){
    		
    		$dosya_adi = $_FILES["profile_image_file"]["name"];
            //Dosyaya yeni bir isim oluşturuyoruz
    		$uzanti = substr($dosya_adi,-4,4);
    		$uret = array("as","rt","ty","yu","fg");
    		$sayi_tut = rand(1,10000);
    		$yeni_ad = "img/profile_photo/photo".$uret[rand(0,4)].$sayi_tut.$uzanti;

    		if (move_uploaded_file($_FILES["profile_image_file"]["tmp_name"] , "../".$yeni_ad)){

    			$add=mysqli_query($connection,"UPDATE kullanicilar SET profile_photo = '".$yeni_ad."' WHERE id = '".$_POST['uid']."'");

    			if (mysqli_affected_rows($connection)) {
    				echo '<script language="javascript">
    				alert("Profil Resmi kaydedildi.");
    				</script>';    
    				header("refresh:0.05;url=kullanici-detay.php?uid=".$_POST['uid']."");
    			}                                                         
    			else {
    				header("refresh:0.05;url=kullanici-detay.php?uid=".$_POST['uid']."");
    			}
    		} else {
    			echo '<script language="javascript">
    			alert("Dosya Yüklenemedi!");
    			</script>'; 

    			header("refresh:0.05;url=kullanici-detay.php?uid=".$_POST['uid']."");
    		}
    	} else {
    		header("refresh:0.05;url=kullanici-detay.php?uid=".$_POST['uid'].""); 
    	}
    }else{
    	echo '<script language="javascript">
    	alert("Dosya boyutu 2 Mb ı geçemez!");
    	</script>'; 
    	header("refresh:0.05;url=kullanici-detay.php?uid=".$_POST['uid']."");
    }
}


//  Profil fotoğrafı değiştirme

if(isset($_POST['timeline_image_save_button'])){

    if ($_FILES["timeline_image_file"]["size"] < 1024*1024*1024*1024){//Dosya boyutu 2Mb tan az olsun

    	if ($_FILES["timeline_image_file"]["type"] == "image/jpeg" || $_FILES["timeline_image_file"]["type"] == "image/png"){
    		
    		$dosya_adi = $_FILES["timeline_image_file"]["name"];
            //Dosyaya yeni bir isim oluşturuyoruz
    		$uzanti = substr($dosya_adi,-4,4);
    		$uret = array("as","rt","ty","yu","fg");
    		$sayi_tut = rand(1,10000);
    		$yeni_ad = "img/profile_bg/photo".$uret[rand(0,4)].$sayi_tut.$uzanti;

    		if (move_uploaded_file($_FILES["timeline_image_file"]["tmp_name"] , "../".$yeni_ad)){

    			$add=mysqli_query($connection,"UPDATE kullanicilar SET background_image = '".$yeni_ad."' WHERE id = '".$_POST['uid']."'");

    			if (mysqli_affected_rows($connection)) {
    				echo '<script language="javascript">
    				alert("Profil Resmi kaydedildi.");
    				</script>';    
    				header("refresh:0.05;url=kullanici-detay.php?uid=".$_POST['uid']."");
    			}                                                         
    			else {
    				header("refresh:0.05;url=kullanici-detay.php?uid=".$_POST['uid']."");
    			}
    		} else {
    			echo '<script language="javascript">
    			alert("Dosya Yüklenemedi!");
    			</script>'; 

    			//header("refresh:0.05;url=kullanici-detay.php?uid=".$_POST['uid']."");
    		}
    	} else {
    		header("refresh:0.05;url=kullanici-detay.php?uid=".$_POST['uid'].""); 
    	}
    }else{
    	echo '<script language="javascript">
    	alert("Dosya boyutu 2 Mb ı geçemez!");
    	</script>'; 
    	header("refresh:0.05;url=kullanici-detay.php?uid=".$_POST['uid']."");
    }
}



if (isset($_POST['comment_save_button'])) {

                $reply_commentID       =   trim($_POST['reply_commentID']);
                $reply_comment         =   trim($_POST['reply_comment']); 
                $comment_author_name   =   trim($_POST['comment_author_name']); 

                $update = mysqli_query( $connection, "UPDATE comment_to_comment 
                    SET 
                    c_t_c_content               = '$reply_comment',
                    c_t_c_comment_author_name   = '$comment_author_name'
                    WHERE
                    comment_to_commentID = '".$reply_commentID."'
                    ");
                
                if ($update) {

                    echo '<script> alert("Yorum Bilgileri Güncellendi!"); </script>'; 
                    header("refresh:0.02; url=yorum-duzenle.php?commentID=".$reply_commentID."");
                }
}

//Kullanıcı Sil

if (isset($_POST['user_delete_button'])) {

    $uid                =   trim($_POST['uid']);
    
    $control_query      =   mysqli_query( $connection, "DELETE FROM kullanicilar 
        WHERE 
        id = '".$uid."'"
    );

    if ($control_query) {

        echo '<script language="javascript">
        alert("Kişi bilgileri silindi!");
        </script>'; 

        header("refresh:0.01;url=index.php");
    }
}

// Hikaye Sil

if (isset($_POST['story_branch_delete_button'])) {

    $branch_storyID     =   trim($_POST['branch_storyID']);
    
    $control_query      =   mysqli_query( $connection, "DELETE FROM story_branch 
        WHERE 
        story_branchID = '".$branch_storyID."'"
    );

    if ($control_query) {

        echo '<script language="javascript">
        alert("Hikaye bilgileri silindi!");
        </script>'; 

        header("refresh:0.01;url=hikayeler.php");
    }
}

// Yorum Sil

if (isset($_GET['rcommentID'])) {

    $commentID    =   trim($_GET['rcommentID']);
    
    $control_query      =   mysqli_query( $connection, "DELETE FROM comments 
        WHERE 
        commentID = '".$commentID."'"
    );

    if ($control_query) {

        echo '<script language="javascript">
        alert("İlgili yorum silindi!");
        </script>'; 

        header("refresh:0.01;url=yorumlar.php");
    }
}

// Yoruma yapılan yorumu Sil

if (isset($_POST['comment_delete_button'])) {

    $reply_commentID    =   trim($_POST['reply_commentID']);
    
    $control_query      =   mysqli_query( $connection, "DELETE FROM comment_to_comment 
        WHERE 
        comment_to_commentID = '".$reply_commentID."'"
    );

    if ($control_query) {

        echo '<script language="javascript">
        alert("İlgili yoruma verilen cevap silindi!");
        </script>'; 

        header("refresh:0.01;url=yorumlar.php");
    }
}

// Takipçi Sil

if (isset($_GET['rfollowerID'])) {

    $followerID    =   trim($_GET['rfollowerID']);
    
    $control_query =   mysqli_query( $connection, "DELETE FROM followers 
        WHERE 
        id = '".$followerID."'"
    );

    if ($control_query) {

        echo '<script language="javascript">
        alert("Kişi artık takip edilmiyor!");
        </script>'; 

        header("refresh:0.01;url=takipciler.php");
    }
}

// Okuma listesinden kitap çıkar

if (isset($_GET['readerlistID'])) {

    $readerlistID    =   trim($_GET['readerlistID']);
    
    $control_query =   mysqli_query( $connection, "DELETE FROM reading_list 
        WHERE 
        readID = '".$readerlistID."'"
    );

    if ($control_query) {

        echo '<script language="javascript">
        alert("İlgili kitap, kişinin okuma listesinden çıkarıldı!");
        </script>'; 

        header("refresh:0.01;url=okuma-listesi.php");
    }
}




?>