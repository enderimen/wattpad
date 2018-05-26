<?php  include '../config.php' ; if ($_SESSION['session_control'] == true) {

    include 'header.php'; include 'menuler.php';  

    /*Hikaye yorumlarına yapılan yorumları çekiyoruz*/
    $story_comment_to_comment_sql   =  mysqli_query( $connection , "SELECT * FROM comment_to_comment WHERE commentID = '".$_GET['commentID']."'");
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
                                        <th>İlgili Yorum</th>
                                        <th>Yapılan Yorum</th>
                                        <th>Yorum Yapan</th>
                                        <th>Düzenle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($story_comment_to_comment_data  =  mysqli_fetch_array($story_comment_to_comment_sql)) { 

                                        /*Hangi yoruma yorum yapılmış o veriyi çekiyoruz*/
                                        $story_comment_sql   =  mysqli_query( $connection , "SELECT comment FROM comments WHERE commentID = '".$_GET['commentID']."'");
                                        $story_comment_data  =  mysqli_fetch_array($story_comment_sql)  
                                    ?>
                                    <tr>
                                        <td><?=$story_comment_to_comment_data['comment_to_commentID']?></td>
                                        <td><?=$story_comment_data['comment']?></td>
                                        <td><?=$story_comment_to_comment_data['c_t_c_content']?></td>
                                        <td><?=$story_comment_to_comment_data['c_t_c_comment_author_name']?></td>
                                        <td><a href="yorum-duzenle.php?commentID=<?=$story_comment_to_comment_data['comment_to_commentID']?>"  class="btn btn-sm btn-info">Düzenle</a></td>
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