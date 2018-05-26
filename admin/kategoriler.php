<?php include '../config.php'; if ($_SESSION['session_control'] == true) {

    include 'header.php'; include 'menuler.php';

    
    $category_sql  =  mysqli_query( $connection , "SELECT category_name FROM categories"); 

?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Kategoriler</h1>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i>Hikaye Türü
                </div>

                <div class="panel-body">
                    <div class="list-group">
                        <?php while ($category_data = mysqli_fetch_array($category_sql)) { ?>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-code-fork fa-fw"></i><?=$category_data['category_name']?>
                            <div class="pull-right text-muted small">
                            </div>  
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-plus fa-fw"></i>Kategori Ekle
                </div>

                <div class="panel-body">
                    <form action="admin-transaction.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Kategori Adı" name="category_name"/>
                            <span class="form-group input-group-btn">
                                <button class="btn orange-button" name="category_add_button" type="submit">Ekle</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /. ROW  -->
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<?php include 'footer.php'; } else {
    header("refresh:0.02; url=login.php");
}?>        