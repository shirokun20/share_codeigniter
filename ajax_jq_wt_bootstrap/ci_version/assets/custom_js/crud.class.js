// Created By Shirokun 20
class Crud {
    constructor(url) {
        this.url = url;
    }
    tambah(method, data, callback) {
        var aksi = $.ajax({
            url: this.url + '/tambahSimpan',
            data: data,
            dataType: "JSON",
            type: method,
        });
        aksi.done((e) => {
            callback(e);
        })
    }
    mengambilData(request, callback = null) {
        var aksi = $.ajax({
            url: this.url + '/listData/',
            data: request.data,
            dataType: "JSON",
            type: request.method,
        });
        aksi.done((e) => {
            callback(e);
        });
    }
    mengambil(request, callback = null) {
        var aksi = $.ajax({
            url: this.url + '/ambilData/',
            data: request.data,
            dataType: "JSON",
            type: request.method,
        });
        aksi.done((e) => {
            callback(e);
        });
    }
    edit(method, data, callback = null) {
        var aksi = $.ajax({
            url: this.url + '/editSimpan',
            data: data,
            dataType: "JSON",
            type: method,
        });
        aksi.done((e) => {
            callback(e);
        });
    }
    hapus(method, data, callback = null) {
        var aksi = $.ajax({
            url: this.url + '/hapusData',
            data: data,
            dataType: "JSON",
            type: "POST",
        });
        aksi.done((e) => {
            callback(e);
        })
    }
}