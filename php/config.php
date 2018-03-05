<?php
	$server	  = "localhost";
	$username = "root";
	$password = "";
	$database =	"wattpad";

	$connection = mysqli_connect($server,$username,$password,$database)or die("MySQL Bağlantısı sağlanamadı.Hata: ".mysqli_error($connection));
	
	mysqli_query($connection,"SET NAMES UTF8");
	
	session_start();##Oturum Başlatıldı.
	ob_start();##Sitenin arabelleğe alınmasını sağlıyoruz.
?>