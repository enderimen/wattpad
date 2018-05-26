<?php include '../config.php'; if ($_SESSION['session_control'] == true) {

    include 'header.php'; include 'menuler.php';  

    /*Hikaye bölümlerini çekiyoruz*/
    $story_branches_info_sql   =  mysqli_query( $connection , "SELECT * FROM story_branch WHERE story_branchID = '".$_GET['bstoryID']."'");
    $story_branches_info_data  =  mysqli_fetch_array($story_branches_info_sql);
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Hikaye Bilgilerini Düzenle</h1>
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
                        <form action="admin-transaction.php" method="POST">
                            <input type="text" name="branch_storyID" value="<?=$_GET['bstoryID']?>" hidden="hidden">
                            <div class="form-group">
                                <label>Tam Adı</label>
                                <input class="form-control" type="text" name="full_name" value="<?=$story_branches_info_data['full_name']?>">
                            </div>
                            <div class="form-group">
                                <label>Bölüm Başlığı</label>
                                <input class="form-control" type="text" name="part_title" value="<?=$story_branches_info_data['story_branch_title']?>">
                            </div>
                            <div class="form-group">
                                <label>Yayınlanma Tarihi</label>
                                <input class="form-control" type="text" name="published_date" value="<?=$story_branches_info_data['story_branch_date']?>">
                            </div>
                            <div class="form-group">
                                <label>Biyografi</label>
                                <textarea class="form-control" rows="20" name="story_branch_content"><?=$story_branches_info_data['story_branch_content']?></textarea>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-lg btn-danger" name="story_branch_delete_button">Sil</button>
                                <button type="submit" class="btn btn-lg orange-button" name="story_branch_save_button">Güncelle</button>
                            </div>
                        </form>
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