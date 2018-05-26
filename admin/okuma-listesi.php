<?php include '../config.php';  if ($_SESSION['session_control'] == true) {

    include 'header.php'; include 'menuler.php';  
    
    /*Kişinin okuma listesini çekiyoruz*/
    $readeing_list_sql   =  mysqli_query( $connection , "SELECT * FROM reading_list");

?>   
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Kullanıcılar Okuma Listeleri</h1>
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
                                        <th>Okur Adı</th>
                                        <th>Okunan Kitap Adı</th>
                                        <th>Kitap Yazarı</th>
                                        <th>Düzenle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($readeing_list_data  =  mysqli_fetch_array($readeing_list_sql)) { 
                                        
                                        /*Kullanıcı bilgilerini çekiyoruz*/
                                        $user_name_sql   =  mysqli_query( $connection , "SELECT full_name FROM kullanicilar WHERE id = '".$readeing_list_data['readerID']."'");
                                        $user_name_data  =  mysqli_fetch_array($user_name_sql);

                                        /*Kitap adını çekiyoruz*/
                                        $story_name_sql   =  mysqli_query( $connection , "SELECT story_branch_title FROM story_branch WHERE storyID = '".$readeing_list_data['readed_storyID']."'");
                                        $story_name_data  =  mysqli_fetch_array($story_name_sql);

                                        /*Kitap yazarı bilgilerini çekiyoruz*/
                                        $story_author_name_sql   =  mysqli_query( $connection , "SELECT full_name FROM kullanicilar WHERE id = '".$readeing_list_data['story_authorID']."'");
                                        $story_author_name_data  =  mysqli_fetch_array($story_author_name_sql);
                                    ?>
                                    <tr>
                                        <td><?=$readeing_list_data['readID']?></td>
                                        <td><?=$user_name_data['full_name']?></td>
                                        <td><?=$story_name_data['story_branch_title']?></td>
                                        <td><?=$story_author_name_data['full_name']?></td>
                                        <td><a href="admin-transaction.php?readerlistID=<?=$readeing_list_data['readID']?>" class="btn btn-sm btn-danger">Sil</a></td>
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
    <!-- /. WRAPPER  -->
<?php include 'footer.php'; } else {
    header("refresh:0.02; url=login.php");
}?>        