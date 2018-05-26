<?php  include '../config.php' ; if ($_SESSION['session_control'] == true) {

    include 'header.php'; include 'menuler.php';  

    /*Hikaye yorumlarını çekiyoruz*/
    $story_comment_sql   =  mysqli_query( $connection , "SELECT storyID, comment_authorID, commentID, comment ,comment_date FROM comments");
?>        
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Tüm Kullanıcılar</h1>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hikaye Adı</th>
                                        <th>Yorum Yapan</th>
                                        <th>Yapılan Yorum</th>
                                        <th>Yorum Tarihi</th>
                                        <th>Düzenle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($story_comment_data  =  mysqli_fetch_array($story_comment_sql)) { 
                                        
                                        /*Hikaye bilgilerini çekiyoruz*/
                                        $stories_sql   =  mysqli_query( $connection , "SELECT DISTINCT story_branch.story_branch_title FROM story_branch JOIN stories On story_branch.storyID = '".$story_comment_data['storyID']."'");
                                        $story_title_data  =  mysqli_fetch_array($stories_sql);

                                        /*Kullanıcı adını çekiyoruz*/
                                        $comment_author_name_sql   =  mysqli_query( $connection , "SELECT full_name FROM kullanicilar WHERE id = '".$story_comment_data['comment_authorID']."'");
                                        $comment_author_name_data  =  mysqli_fetch_array($comment_author_name_sql);
                                    ?>
                                    <tr>
                                        <td><?=$story_comment_data['commentID']?></td>
                                        <td><?=$story_title_data['story_branch_title']?></td>
                                        <td><?=$comment_author_name_data['full_name']?></td>
                                        <td><?=$story_comment_data['comment']?></td>
                                        <td><?=$story_comment_data['comment_date']?></td>
                                        <td>
                                            <a href="admin-transaction.php?rcommentID=<?=$story_comment_data['commentID']?>"  class="btn btn-sm btn-danger">Sil</a>
                                            <a href="yoruma_yorum.php?commentID=<?=$story_comment_data['commentID']?>"  class="btn btn-sm btn-primary">Yapılan Yorumları Gör</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/.Row-->
                <hr />
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
<?php include 'footer.php'; } else {
    header("refresh:0.02; url=login.php");
}?>   