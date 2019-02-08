// Api ini dibuat oleh bang shirokun...
class Api {
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
        //Fw
        this.fw = $(obj.fw);
    }
    mengirimSms(method, data) {
        this.danger.slideDown('slow');
        this.pesan.text('Tunggu sebentar');
        setTimeout((e) => {
            if (this.alert.slideUp('slow')) {
                this._mengirimSms(method, data)
            }
        }, this.durasi);
    }
    hilangAlert(value = null) {
        setTimeout((e) => {
            if (this.alert.slideUp('slow')) {
                if (value != null) {
                    fw[0].reset();
                }
            }
        }, this.durasi);
    }
    _mengirimSms(method, data) {
        var ajaxNya = $.ajax({
            url: this.url + '/mengirimPesan',
            data: data,
            dataType: "JSON",
            type: method,
        });
        ajaxNya.done((e) => {
            if (e[0].status == "pending") {
                this.success.slideDown('slow');
                this.pesan.text('Berhasil mengirim sms');
                this.hilangAlert('osas');
            } else {
                this.danger.slideDown('slow');
                this.pesan.text('Gagal mengirim sms');
                this.hilangAlert();
            }
        });
    }
}