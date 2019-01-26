// url si controller
var url = window.location.href;
// Untuk menghapus address /datanya/
var urlNya = url.substring(0, url.lastIndexOf('/datanya/'));
// pencarian dengan text
var mencari = $('[name="mencari"]');
// pencarian dengan kelamin
var gender = $('[name="gender"]');
// Jumlah data
var jd = $('.jumlah-datanya');
// datanya
var datanya = $('.datanya');
// untuk request datanya lewat
var btn_aksinya = $('.btn-aksinya');
var aksinya = $('.aksinya');
var angka = 5;
var listDatanya = (limit) => {
    var ls = '<tr>' + '<td colspan="5" class="text-center">Tunggu Sebentar</td>' + '</tr>';
    jd.text('Tunggu yah....');
    datanya.html(ls);
    $.ajax({
        url: urlNya + '/listData/',
        dataType: "JSON",
        type: "GET",
        data: {
            mencari: mencari.val(),
            gender: gender.val(),
            limit: limit,
        },
        success: (e) => {
            ls = '';
            if (e.status == 'ada') {
                var a = 1;
                for (var i = 0; i < e.data.length; i++) {
                    ls += '<tr>' + '<td>' + (a++) + '</td>' + '<td>' + (e.data[i].nama) + '</td>' + '<td>' + (e.data[i].email) + '</td>' + '<td>' + (e.data[i].type_name) + '</td>' + '<td>' + (e.data[i].gender) + '</td>' + '</tr>';
                }
            } else {
                ls = '<tr>' + '<td colspan="5" class="text-center">Tidak ada data</td>' + '</tr>'
            }
            console.log(e.limit);
            if (e.limit < e.jumlah_total) {
                angka = parseInt(angka) + parseInt(limit);
                aksinya.show();
            }else{
                aksinya.hide();
            }
            jd.text(e.jumlah + ' Dari ' + e.jumlah_total + ' data user');
            datanya.html(ls);
        }
    })
}
// ready function
$(() => {
    listDatanya(angka);
    mencari.on('keyup', (e) => {
        listDatanya(5);
    });
    gender.on('change', (e) => {
        listDatanya(5);
    });
    btn_aksinya.on('click', (e) => {
        listDatanya(angka);
    })
})