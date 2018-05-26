  <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <div class="inner-text pull-left">
                                <p class="pull-left"><?=$_SESSION['admin_name']?></p>
                            <br />
                                <small class="pull-left">Son Oturum : <?=date("F j, Y, h:i:s"); ?> </small>
                            </div>
                        </div>
                    </li>


                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard"></i>Kullanıcılar</a>
                    </li>
                    <li>
                        <a href="hikayeler.php"><i class="fa fa-book"></i>Hikayeler</a>
                    </li>
                    <li>
                        <a href="yorumlar.php"><i class="fa fa-comment-o"></i>Yorumlar</a>
                    </li>
                    <li>
                        <a href="takipciler.php"><i class="fa fa-users"></i>Takipçiler</a>
                    </li>
                    <li>
                        <a href="okuma-listesi.php"><i class="fa fa-list-ul"></i>Okuma Listeleri</a>
                    </li>
                    <li>
                        <a href="kategoriler.php"><i class="fa fa-bars"></i>Kategoriler</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->