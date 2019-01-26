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
var listDatanya = () => {
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
            jd.text(e.jumlah + ' Dari ' + e.jumlah_total + ' data user');
            datanya.html(ls);
        }
    })
}
// ready function
$(() => {
    listDatanya();
    mencari.on('keyup', (e) => {
        listDatanya();
    });
    gender.on('change', (e) => {
        listDatanya();
    });
})