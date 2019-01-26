// CLassnya we
class Login_class {
	constructor(obj, url, durasi) {
        // Alertnya
        this.alert = $(obj.alert);
        // Alert sukses
        this.success = $(obj.success);
        // alert gagal
        this.danger = $(obj.danger);
        // alert gagal
        this.pesan = $(obj.pesan);
		// Url
        this.url = url;
        // durasi si tineOutnya
		this.durasi = durasi;
    }
    // Masuk app
    masukApp(method, data)
    {
    	this.danger.slideDown('slow');
        this.pesan.text('Tunggu sebentar');
        $('body, html').animate({scrollTop:$('.container').offset().top}, 'slow');
        setTimeout((e) => {
            if (this.alert.slideUp('slow')) {
                // Untuk masuk ke aplikasi
                this.masukAppLagi(method, data);
            }
        }, this.durasi);
    }
    // Masuk app lagi
    masukAppLagi(method, data)
    {
    	$.ajax({
    		url: this.url + 'masuk',
            data: data,
            dataType: "JSON",
            type: method,
            success: (e) => {
                if (e.status == 'berhasil') {
                    this.success.slideDown('slow');
                    this.pesan.text(e.pesan);
                    this.alertHilang('masuk');
                }else{
                    this.danger.slideDown('slow');
                    var pesannya = '';
                    if (e.pesan.length <= 2) {
                    	for (var i = 0; i < e.pesan.length; i++) {
	                        pesannya += (e.pesan[i])+'<br>';
	                    }
	                    this.pesan.html(pesannya);
                    }else{
                    	pesannya = e.pesan;
	                    this.pesan.text(pesannya);
                    }
                    console.log(e.pesan);
                    this.alertHilang();
                }
            }
    	})
    }
    // ALertnya Hilang
    alertHilang(text = null)
    {
    	setTimeout((e) => {
    		if (this.alert.slideUp('slow'))
    		{
                if (text != null) {
                    location.reload();
                }
    		}
    	}, this.durasi);
    }

}