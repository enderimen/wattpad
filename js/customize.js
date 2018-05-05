$('#upload').click(function () {
	 $("#file").trigger('click');
	 //$('#kaydet').trigger('click');
	 alert('Resminizi seçtikten sonra kaydet butonuna basmayı unutmayınız...');
	 //kaydet butonu tuıklatılacak
});

$('#upload_bg').click(function () {
	 $("#file_bg").trigger('click');
	 alert('Resminizi seçtikten sonra kaydet butonuna basmayı unutmayınız...');
});

$('#story-upload').click(function () {
	 $("#story-cover-file").trigger('click');
	 alert('Resminizi seçtikten sonra kaydet butonuna basmayı unutmayınız...');
});


/*Modal*/
var modal = document.getElementsByClassName('myModal')[0];

$('.myBtn').click(function () {
	 $(".myModal").show();
});

$('.close').click(function () {
	 $(".myModal").hide();
});

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}