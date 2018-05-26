<?php include '../config.php';  if ($_SESSION['session_control'] == true) {

    include 'header.php'; include 'menuler.php';  

    /*Takipçi listesi*/
    $followers_sql   =  mysqli_query( $connection , "SELECT * FROM followers");
?>       
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Takipçiler</h1>
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
                                        <th>Takipçi Adı</th>
                                        <th>Takip Edilen Kişi</th>
                                        <th>Düzenle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($followers_data  =  mysqli_fetch_array($followers_sql)) { ?>
                                    <tr>
                                        <td><?=$followers_data['id']?></td>
                                        <td><?=$followers_data['follower_name']?></td>
                                        <td><?=$followers_data['following_name']?></td>
                                        <td><a href="admin-transaction.php?rfollowerID=<?=$followers_data['id']?>" class="btn btn-sm btn-danger">Takibi Bırak</td>
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