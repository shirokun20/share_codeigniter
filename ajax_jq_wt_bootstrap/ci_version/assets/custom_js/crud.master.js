// url si controller
var url = window.location.href;
// pencarian dengan text
var mencari = $('[name="mencari"]');
// pencarian dengan kelamin
var gender = $('[name="gender2"]');
// Jumlah data
var jd = '.jumlah-datanya';
// datanya
var datanya = '.datanya';
// Mengambil data di class Users
var check = new UserClass(1000);
// alert Object
var alertObject = {
    alert: '.alert',
    success: '.alert-success',
    danger: '.alert-danger',
    pesan: '.pesan'
}
//
var alertNya = new AlertClass(alertObject, 1500);
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
var crud = new Crud(url);
$(() => {
    // Agar ketika di submit/enter tidak reload
    fw.on('submit', (e) => {
        return false;
    });
    // List Datanya
    listDataNya();
    // Button Reload
    btn_reload.on('click', (e) => {
        listDataNya();
    });
    // Mencari data
    mencari.on('keyup', (e) => {
        listDataNya();
    });
    // Ketika select gender dopilih
    gender.on('change', (e) => {
        listDataNya();
    });
    // Button Klik Tambah
    btn_tambah.on('click', (e) => {
        fNya.slideToggle('slow');
        fw[0].reset();
        sTambah.show();
        sEdit.hide();
        $('.p-password').text('');
        $('.re-hilang').show();
    });
    // Button batal
    btn_batal.on('click', (e) => {
        fNya.slideUp('slow');
        fw[0].reset();
        sTambah.hide();
        sEdit.hide();
    });
    // Button simpan tambah
    btn_sTambah.on('click', (e) => {
        alertNya.alertBefore((e) => {
            crud.tambah('POST', fw.serialize(), (res) => {
                var aksi = '';
                if (res.status == 'berhasil') {
                    aksi = {
                        rld: (e) => {
                            reloadWe();
                        },
                        fw: (e) => {
                            formHilang();
                        },
                    };
                } else {
                    aksi = {
                        rld: (e) => {
                            reloadWe();
                        },
                    };
                }
                alertNya.alertAfter(res, aksi);
            });
        });
    });
    // Button Simpan Edit
    btn_sEdit.on('click', (e) => {
        alertNya.alertBefore((e) => {
            crud.edit('POST', fw.serialize(), (res) => {
                var aksi = '';
                if (res.status == 'berhasil') {
                    aksi = {
                        rld: (e) => {
                            reloadWe();
                        },
                        fw: (e) => {
                            formHilang();
                        },
                    };
                } else {
                    aksi = {
                        rld: (e) => {
                            reloadWe();
                        },
                    };
                }
                alertNya.alertAfter(res, aksi);
            });
        });
    });
});
// FOrm ReloadWE
var reloadWe = () => {
    listDataNya();
}
// Form Hilang
var formHilang = () => {
    fNya.slideUp('slow');
    fw[0].reset();
    sTambah.hide();
    sEdit.hide();
}
// Function List data
var listDataNya = (e) => {
    var req = {
        method: "GET",
        data: {
            mencari: mencari.val(),
            gender: gender.val(),
        }
    }
    crud.mengambilData(req, (e) => {
        check.listDatanya({
            list: datanya,
            jml: jd,
        }, e);
    });
}
// Function Detail Data
var detailData = (value) => {
    modalNya.modal('show');
    var tagNya = {
        nama: '.p-nama',
        email: '.p-email',
        gender: '.p-gender',
        type_name: '.p-type-name',
        tanggal_lahir: '.p-tanggal-lahir'
    }
    var req = {
        method: "GET",
        data: {
            id: value,
        }
    }
    crud.mengambil(req, (e) => {
        check.detailNya(tagNya, e);
    });
}
// Function Edit Data
var editData = (value) => {
    fNya.slideToggle('slow');
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
    var req = {
        method: "GET",
        data: {
            id: value,
        }
    }
    crud.mengambil(req, (e) => {
        check.editForm(tagNya, e);
    });
    $('.p-password').text('Jika password tidak dirubah maka kosongkan');
    $('.re-hilang').hide();
}
var hapusData = (value) => {
    if (confirm('Apakah anda yakin?') == true) {
        alertNya.alertBefore((e) => {
            crud.hapus('POST', {
                id: value
            }, (res) => {
                var aksi = {
                    rld: (e) => {
                        reloadWe();
                    },
                    fw: (e) => {
                        formHilang();
                    },
                };
                alertNya.alertAfter(res, aksi);
            });
        });
    }
}