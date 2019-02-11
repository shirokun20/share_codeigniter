// Creted By Shirokun 20
class AlertClass {
    constructor(obj, durasi) {
        // Alertnya
        this.alert = $(obj.alert);
        // Alert sukses
        this.success = $(obj.success);
        // alert gagal
        this.danger = $(obj.danger);
        // alert gagal
        this.pesan = $(obj.pesan);
        // durasi si tineOutnya
        this.durasi = durasi;
    }
    // Alert Before
    alertBefore(callback = null) {
        this.danger.slideDown('slow');
        this.pesan.text('Tunggu sebentar');
        $('body, html').animate({
            scrollTop: $('.container').offset().top
        }, 'slow');
        setTimeout((e) => {
            if (this.alert.slideUp('slow')) {
                if (callback != null) {
                    callback({
                        status: 'ready',
                    });
                } else {
                    callback({
                        status: 'Not ready',
                    });
                }
            }
        }, this.durasi);
    }
    // Alert After
    alertAfter(hasil, lanjut) {
        if (hasil.status == 'berhasil') {
            this.success.slideDown('slow');
            this.pesan.text(hasil.pesan);
        } else {
            this.danger.slideDown('slow');
            var pesannya = '';
            for (var i = 0; i < hasil.pesan.length; i++) {
                pesannya += (hasil.pesan[i]) + '<br>';
            }
            this.pesan.html(pesannya);
        }
        if (lanjut != null) {
            this.alertHilang(lanjut);
        }
    }
    // Alert Hilang
    alertHilang(kepo = null) {
        setTimeout((e) => {
            if (this.alert.slideUp('slow')) {
                if (kepo != null) {
                    if (kepo.rld != null) {
                        kepo.rld();
                    }
                    if (kepo.fw != null) {
                        kepo.fw();
                    }
                }
            }
        }, this.durasi);
    }
}