<?php include '../config.php';  if ($_SESSION['session_control'] == true) {

    include 'header.php'; include 'menuler.php';  
    /*Kullanıcı bilgilerini çekiyoruz*/
    $users_info_sql   =  mysqli_query( $connection , "SELECT * FROM kullanicilar WHERE id = '".$_GET['uid']."'");
    $users_data  =  mysqli_fetch_array($users_info_sql);
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Kullanıcı Bilgilerini Düzenle</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Bilgileri Düzenle Mesaj
                    </div>
                    <div class="panel-body">
                        <form role="form" action="admin-transaction.php" method="POST">
                            <input type="text" name="uid" value="<?=$_GET['uid']?>" hidden="hidden">
                            <div class="form-group">
                                <label>Kullanıcı Adı</label>
                                <input class="form-control" type="text" name="user_name" value="<?=$users_data['user_name']?>">
                            </div>
                            <div class="form-group">
                                <label>Tam Adı</label>
                                <input class="form-control" type="text" name="full_name" value="<?=$users_data['full_name']?>">
                            </div>
                            <div class="form-group">
                                <label>E-Posta Adresi</label>
                                <input class="form-control" type="text" name="user_mail" value="<?=$users_data['user_mail']?>">
                            </div>
                            <div class="form-group">
                                <label>Doğum Tarihi</label>
                                <input class="form-control" type="date" name="birthdate" value="<?=$users_data['birthdate']?>">
                            </div>
                            <div class="form-group">
                                <label>Cinsiyet</label>
                                <select class="form-control" name="gender" value="<?=$users_data['gender']?>">
                                    <option>Erkek</option>
                                    <option>Kız</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Wattpad' a Katıldığı Tarih</label>
                                <input class="form-control" type="text" name="joined_date" value="<?=$users_data['joined_date']?>">
                            </div>
                            <div class="form-group">
                                <label>Biyografi</label>
                                <textarea class="form-control" rows="3" name="biography"><?=$users_data['biography']?></textarea>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-lg btn-danger" name="user_delete_button" >Kişiyi Sil</button>
                                <button type="submit" class="btn btn-lg orange-button" name="user_save_button">Güncelle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Resim Yükle
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <form action="admin-transaction.php" method="POST" enctype="multipart/form-data">
                                    <label class="header">Profil Resmini Değiştir</label>
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 200px;">
                                        <img src="../<?=$users_data['profile_photo']?>" alt="" height="150" width="200">
                                    </div>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <input type="text" name="uid" value="<?=$_GET['uid']?>" hidden="hidden">
                                        <input type="file" name="profile_image_file" id="profil">
                                        <input type="submit" value="Kaydet" name="profile_image_save_button" class="btn btn-info">
                                    </div>
                                </form>
                            </div>

                            <div class="form-group">
                                <form action="admin-transaction.php" method="POST" enctype="multipart/form-data">
                                    <label class="header">Zaman Tüneli Resmini Değiştir</label>
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 200px;">
                                        <img src="../<?=$users_data['background_image']?>" alt="" height="150" width="200" />
                                    </div>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <input type="text" name="uid" value="<?=$_GET['uid']?>" hidden="hidden">
                                        <input type="file" name="timeline_image_file" id="timeline">
                                        <input type="submit" value="Kaydet" name="timeline_image_save_button" class="btn btn-info">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /. PAGE INNER  -->
        </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
</div>

<?php include 'footer.php'; } else {
    header("refresh:0.02; url=login.php");
}?>        