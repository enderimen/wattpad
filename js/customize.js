// Yukarı tuşu 
$(document).ready(function(){

    $(window).scroll(function(){
    if ($(this).scrollTop() > 100)
        $(".up").fadeIn();
    else
        $(".up").fadeOut();
});

    $(".up").click(function(){
        $("html, body").animate({ scrollTop: "0" }, 500);
    });
});

/*Resim yükleme*/

$('#upload').click(function () {
	 $("#file").trigger('click');
	 alert('Resminizi seçtikten sonra kaydet butonuna basmayı unutmayınız...');
});

$('#upload_bg').click(function () {
	 $("#file_bg").trigger('click');
	 alert('Resminizi seçtikten sonra kaydet butonuna basmayı unutmayınız...');
});

$('#story-upload').click(function () {
	 $("#story-cover-file").trigger('click');
	 alert('Resminizi seçtikten sonra kaydet butonuna basmayı unutmayınız...');
});

/* Kullanıcı şifre değiştirme */

//myModal'ı seç
var modal = document.getElementById('myModal');

//myBtn u seç
var btn = document.getElementById("myBtn");

//close işaretini seç
var span = document.getElementsByClassName("close")[0];

// butona tıklayınca modal ı göster
btn.onclick = function() {
    modal.style.display = "block";
}

//çarpıya tıklayınca modal ı gizle
span.onclick = function() {
    modal.style.display = "none";
}

// modal ın arka planını karart ona da tıklayınca modal ı kapat 
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
