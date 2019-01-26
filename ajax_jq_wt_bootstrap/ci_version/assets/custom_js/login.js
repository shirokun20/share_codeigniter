// url si controller
var url = window.location.href;
// Email
var email = $('[name="email"]');
// Password
var password = $('[name="password"]');
// btn masuk
var btn_kMasuk = $('.btn-masuk');
// alert Object
var alertObject = {
    alert: '.alert',
    success: '.alert-success',
    danger: '.alert-danger',
    pesan: '.pesan'
}
// Form Wajib
var fw = $('.form-wajib');
// Login Class nya
var login_class = new Login_class(alertObject, url, 3000);
// Otomatis
$(() => {
    // formnya biar gak redirect
    fw.on('submit', (e) => {
        return false;
    });
    // Pas klik button
    btn_kMasuk.on('click', (e) => {
        login_class.masukApp('POST', {
            email: email.val(),
            password: password.val(),
        });
    })
})