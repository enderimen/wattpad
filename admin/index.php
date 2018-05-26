<?php include '../config.php'; if ($_SESSION['session_control'] == true) {

    include 'header.php'; include 'menuler.php';  

  /*Kullanıcı bilgilerini çekiyoruz*/
  $users_info_sql   =  mysqli_query( $connection , "SELECT id , user_name, full_name, user_mail , joined_date FROM kullanicilar");


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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>Tam Adı</th>
                                        <th>E-Posta</th>
                                        <th>Katıldığı Tarih</th>
                                        <th>Düzenle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($users_data  =  mysqli_fetch_array($users_info_sql)) { ?>
                                    <tr>
                                        <td><?=$users_data['id']?></td>
                                        <td><?=$users_data['user_name']?></td>
                                        <td><?=$users_data['full_name']?></td>
                                        <td><?=$users_data['user_mail']?></td>
                                        <td><?=$users_data['joined_date']?></td>
                                        <td><a href="kullanici-detay.php?uid=<?=$users_data['id']?>" class="btn btn-sm btn-primary">Detayları Gör</a></td>
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