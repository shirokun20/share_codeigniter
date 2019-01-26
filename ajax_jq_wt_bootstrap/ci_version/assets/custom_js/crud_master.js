// url si controller
var url = window.location.href;
// pencarian dengan text
var mencari = $('[name="mencari"]');
// pencarian dengan kelamin
var gender = $('[name="gender2"]');
// Jumlah data
var jd = $('.jumlah-datanya');
// datanya
var datanya = $('.datanya');
// Mengambil data di class Users
var check = new Users(datanya, url, jd);
// alert Object
var alertObject = {
    alert: '.alert',
    success: '.alert-success',
    danger: '.alert-danger',
    pesan: '.pesan'
}
// CUD
var cud = new Cud(alertObject, url, 2500);
// btn tambah
var btn_tambah = $('.btn-tambah');
// btn reload
var btn_reload = $('.btn-reload');
// btn_batal
var btn_batal = $('.btn-batal');
// btn_sTambah
var btn_sTambah = $('.btn-sTambah');
// btn_sEdit
var btn_sEdit = $('.btn-sEdit');
// vareasi
var sTambah = $('.sTambah');
var sEdit = $('.sEdit');
// Form Wajib
var fw = $('.form-wajib');
// Formnya
var fNya = $('.formNya');
// Modal 
var modalNya = $('.myModal');
// ready function
$(() => {
    fw.on('submit', (e) => {
        return false;
    });
    // Meload datanya
    check.datanya('GET');
    // Ketiuka Button Reload diklik
    btn_reload.on('click', (e) => {
        check.datanya('GET', {
            mencari: mencari.val(),
            gender: gender.val(),
        });
    });
    // Ketika input cari di tulis
    mencari.on('keyup', (e) => {
        check.datanya('GET', {
            mencari: mencari.val(),
            gender: gender.val(),
        });
    });
    // Ketika select gender dopilih
    gender.on('change', (e) => {
        check.datanya('GET', {
            mencari: mencari.val(),
            gender: gender.val(),
        });
    });
    btn_tambah.on('click', (e) => {
        fNya.slideToggle('slow');
        fw[0].reset();
        sTambah.show();
        sEdit.hide();
        $('.p-password').text('');
        $('.re-hilang').show();
    });
    btn_batal.on('click', (e) => {
        fNya.slideUp('slow');
        fw[0].reset();
        sTambah.hide();
        sEdit.hide();
    });
    btn_sTambah.on('click', (e) => {
        cud.tambahData('POST', fw.serialize());
    });
    btn_sEdit.on('click', (e) => {
        cud.editData('POST', fw.serialize());
    });
});
var hapusData = (value) => {
    if (confirm('Apakah anda yakin?') == true) {
        cud.hapusData({
            id: value
        });
    }
}
var reloadWe = () => {
    check.datanya('GET', {
        mencari: mencari.val(),
        gender: gender.val(),
    });
}
var formTambahHilang = () => {
    fNya.slideUp('slow');
    fw[0].reset();
    sTambah.hide();
    sEdit.hide();
}
var detailData = (value) => {
    modalNya.modal('show');
    var tagNya = {
        nama: '.p-nama',
        email: '.p-email',
        gender: '.p-gender',
        type_name: '.p-type-name',
        tanggal_lahir: '.p-tanggal-lahir'
    }
    check.detailNya({
        id: value
    }, tagNya);
}
var editData = (value) => {
    fNya.slideDown('slow');
    sTambah.hide();
    sEdit.show();
    var tagNya = {
        id: '[name="id"]',
        nama: '[name="nama"]',
        email: '[name="email"]',
        gender: '[name="gender"]',
        type_id: '[name="type_id"]',
        tanggal_lahir: '[name="tanggal_lahir"]'
    }
    check.ambilDatanya({
        id: value
    }, tagNya);
    $('.p-password').text('Jika password tidak dirubah maka kosongkan');
    $('.re-hilang').hide();
}