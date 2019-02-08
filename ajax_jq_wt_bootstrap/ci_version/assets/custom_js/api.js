// url  Apinya
var url = window.location.href;
// alert Object
var alertObject = {
    alert: '.alert',
    success: '.alert-success',
    danger: '.alert-danger',
    pesan: '.pesan',
    fw: '.form-wajib'
}
var objectForm = {
    phone_number: '[name="phone_number"]',
    device_id: '[name="device_id"]',
    message: '[name="message"]',
}
// Memanggil Api nya
var api = new Api(alertObject, url, 3000);
// fw
var fw = $('.form-wajib');
// btn kirirm
var btnKirim = $('.btn-sKirim');
// ready function 
$(() => {
    fw.on('submit', (e) => {
        return false;
    });
    btnKirim.on('click', (e) => {
        mengirimPesan();
    });
});
var mengirimPesan = (e) => {
    if ($(objectForm.phone_number).val() == '') {
        $(objectForm.phone_number).focus();
    } else if ($(objectForm.device_id).val() == '') {
        $(objectForm.device_id).focus();
    } else if ($(objectForm.message).val() == '') {
        $(objectForm.message).focus();
    } else {
        var data = {
            phone_number: $(objectForm.phone_number).val(),
            device_id: $(objectForm.device_id).val(),
            message: $(objectForm.message).val(),
        }
        api.mengirimSms('POST', data);
    }
}