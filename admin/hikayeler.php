<?php include '../config.php';  if ($_SESSION['session_control'] == true) {

    include 'header.php'; include 'menuler.php';  
    /*Hikaye bilgilerini çekiyoruz*/
    $stories_sql   =  mysqli_query( $connection , "SELECT * FROM stories");

?>   
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Tüm Hikayeler</h1>
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
                                        <th>Hikaye Türü</th>
                                        <th>Yayınlandığı Tarih</th>
                                        <th>Düzenle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($stories_data  =  mysqli_fetch_array($stories_sql)) { ?>
                                    <tr>
                                        <td><?=$stories_data['storyID']?></td>
                                        <td><?=$stories_data['story_title']?></td>
                                        <td><?=$stories_data['story_genre']?></td>
                                        <td><?=$stories_data['updated_date']?></td>
                                        <td><a href="bolumler.php?storyID=<?=$stories_data['storyID']?>" class="btn btn-sm btn-primary">Diğer Bölümleri Gör</a></td>
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