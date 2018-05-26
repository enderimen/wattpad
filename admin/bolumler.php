<?php include '../config.php'; if (isset($_SESSION['session_control']) == true) {
    
    include 'header.php'; include 'menuler.php'; 

    /*Hikaye bölümlerini çekiyoruz*/
    $story_branches_sql   =  mysqli_query( $connection , "SELECT * FROM story_branch WHERE story_branchID = '".$_GET['storyID']."'");

?>   
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Tüm Bölümler</h1>
                        <p class="alert alert-success">İlgili hikayenin tüm bölümlerinin listesi</p>
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
                                        <th>Bölüm Adı</th>
                                        <th>Yazar</th>
                                        <th>Yayınlandığı Tarih</th>
                                        <th>Düzenle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($story_branches_data  =  mysqli_fetch_array($story_branches_sql)) { ?>
                                    <tr>
                                        <td><?=$story_branches_data['story_branchID']?></td>
                                        <td><?=$story_branches_data['story_branch_title']?></td>
                                        <td><?=$story_branches_data['full_name']?></td>
                                        <td><?=$story_branches_data['story_branch_date']?></td>
                                        <td><a href="hikaye-detay.php?bstoryID=<?=$story_branches_data['story_branchID']?>" class="btn btn-sm btn-primary">Detay</a></td>
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