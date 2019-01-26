// CUD Adalah singkatan dari Create Update Delete
class Cud {
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

	// Alert tidak Berhasil
    alertHilang()
    {
    	setTimeout((e) => {
    		this.alert.slideUp('slow');
    	}, this.durasi);
    }
	// Alert Berhasil
    alertHilangSukses(tipe = null)
    {
    	setTimeout((e) => {
    		if (this.alert.slideUp('slow'))
    		{
    			// Ini mah vareasi XD
    			reloadWe();
                if (tipe != null) {
                    formTambahHilang();
                }
    		}
    	}, this.durasi);
    }
    // Tambah data di klik
    tambahData(method, data)
    {
        this.danger.slideDown('slow');
        this.pesan.text('Tunggu sebentar');
        $('body, html').animate({scrollTop:$('.container').offset().top}, 'slow');
        setTimeout((e) => {
            if (this.alert.slideUp('slow')) {
                // Ketika alertnya hilang dia memanggil function tambahWe
                this.tambahWe(method, data);
            }
        }, this.durasi);
    }
    // Tambah Ajax
    tambahWe(method, data)
    {
        $.ajax({
            url: this.url + '/tambahSimpan',
            data: data,
            dataType: "JSON",
            type: method,
            success: (e) => {
                if (e.status == 'berhasil') {
                    this.success.slideDown('slow');
                    this.pesan.text(e.pesan);
                    this.alertHilangSukses('tambah');
                }else{
                    this.danger.slideDown('slow');
                    var pesannya = '';
                    for (var i = 0; i < e.pesan.length; i++) {
                        pesannya += (e.pesan[i])+'<br>';
                    }
                    this.pesan.html(pesannya);
                    this.alertHilang();
                }
            }
        });
    }
    // Edit data di klik
    editData(method, data)
    {
        this.danger.slideDown('slow');
        this.pesan.text('Tunggu sebentar');
        $('body, html').animate({scrollTop:$('.container').offset().top}, 'slow');
        setTimeout((e) => {
            if (this.alert.slideUp('slow')) {
                // Ketika alertnya hilang dia memanggil function editWe
                this.editWe(method, data);
            }
        }, this.durasi);
    }
    // Edit Ajax
    editWe(method, data)
    {
        $.ajax({
            url: this.url + '/editSimpan',
            data: data,
            dataType: "JSON",
            type: method,
            success: (e) => {
                if (e.status == 'berhasil') {
                    this.success.slideDown('slow');
                    this.pesan.text(e.pesan);
                    this.alertHilangSukses('edit');
                }else{
                    this.danger.slideDown('slow');
                    var pesannya = '';
                    for (var i = 0; i < e.pesan.length; i++) {
                        pesannya += (e.pesan[i])+'<br>';
                    }
                    this.pesan.html(pesannya);
                    this.alertHilang();
                }
            }
        });
    }
    // Hapus data di klik
    hapusData(value)
    {
    	this.danger.slideDown('slow');
    	this.pesan.text('Tunggu sebentar');
        $('body, html').animate({scrollTop:$('.container').offset().top}, 'slow');
    	setTimeout((e) => {
    		if (this.alert.slideUp('slow')) {
    			// Ketika alertnya hilang dia memanggil function hapusWe
    			this.hapusWe(value);
    		}
    	}, this.durasi);
    }
    // Hapus ajax
    hapusWe(value)
    {
    	$.ajax({
    		url: this.url + '/hapusData',
    		data: value,
    		dataType: "JSON",
    		type: "POST",
    		success: (e) => {
    			if (e.status == 'berhasil') {
    				this.success.slideDown('slow');
    				this.pesan.text(e.pesan);
    				this.alertHilangSukses();
    			}else{
    				this.danger.slideDown('slow');
    				this.pesan.text(e.pesan);
    				this.alertHilang();
    			}
    		}
    	});
    }
}