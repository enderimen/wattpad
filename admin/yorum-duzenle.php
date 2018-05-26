<?php include '../config.php';  if ($_SESSION['session_control'] == true) {

    include 'header.php'; include 'menuler.php';  

    /*Hikaye yorumlarına yapılan yorumları çekiyoruz*/
    $story_comment_to_comment_sql   =  mysqli_query( $connection , "SELECT * FROM comment_to_comment WHERE comment_to_commentID = '".$_GET['commentID']."'");
    $story_comment_to_comment_data  =  mysqli_fetch_array($story_comment_to_comment_sql);
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Yorum Düzenle</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Yorum Düzenle Mesaj
                    </div>
                    <div class="panel-body">
                        <form action="admin-transaction.php" method="POST">
                            <input type="text" name="reply_commentID" value="<?=$_GET['commentID']?>" hidden="hidden">
                            <div class="form-group">
                                <label>Yapılan Yorum</label>
                                <input class="form-control" type="text" name="reply_comment" value="<?=$story_comment_to_comment_data['c_t_c_content']?>">
                            </div>
                            <div class="form-group">
                                <label>Yorum Yapan</label>
                                <input class="form-control" type="text" name="comment_author_name" value="<?=$story_comment_to_comment_data['c_t_c_comment_author_name']?>">
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-lg btn-danger" name="comment_delete_button">Sil</button>
                                <button type="submit" class="btn btn-lg orange-button" name="comment_save_button">Güncelle</button>
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