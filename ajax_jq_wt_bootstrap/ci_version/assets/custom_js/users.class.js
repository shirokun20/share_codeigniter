// Created By Shirokun 20
class UserClass {
	// Set otomatos
	constructor(durasi) {
        // durasi si tineOutnya
		this.durasi = durasi;
    }
    // List Data
    listDatanya(req, hasil) {
        var ls = '<tr>' + '<td colspan="6" class="text-center">Tunggu Sebentar</td>' + '</tr>';
        var tagList = $(req.list);
        var jml = $(req.jml);
        tagList.html(ls);
        jml.text('Tuggu Sebentar');
        setTimeout((e) => {
            ls = '';
            if (hasil.status == 'ada') {
                var a = 1;
                // List datanya
                for (var i = 0; i < hasil.data.length; i++) {
                    ls += '<tr>';
                    ls += '<td>' + (a++) + '</td>';
                    ls += '<td>' + (hasil.data[i].nama) + '</td>';
                    ls += '<td>' + (hasil.data[i].email) + '</td>';
                    ls += '<td>' + (hasil.data[i].type_name) + '</td>';
                    ls += '<td>' + (hasil.data[i].gender) + '</td>';
                    ls += '<td>';
                    ls += '<div class="btn-group">';
                    ls += '<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">';
                    ls += 'Klik';
                    ls += '</button>';
                    ls += '<ul class="dropdown-menu pull-right" role="menu">';
                    ls += '<li><a href="javascript:void(0)" onclick="editData(' + "'" + (hasil.data[i].id) + "'" + ')">Edit</a></li>';
                    ls += '<li class="divider"></li>';
                    ls += '<li><a href="javascript:void(0)" onclick="detailData(' + "'" + (hasil.data[i].id) + "'" + ')">Detail</a></li>';
                    ls += '<li class="divider"></li>';
                    ls += '<li><a href="javascript:void(0)" onclick="hapusData(' + "'" + (hasil.data[i].id) + "'" + ')">Hapus</a></li>';
                    ls += '</ul>';
                    ls += '</div>';
                    ls += '</td>';
                    ls += '</tr>';
                }
            } else {
                ls = '<tr>' + '<td colspan="6" class="text-center">Tidak ada data</td>' + '</tr>'
            }
            tagList.html(ls);
            jml.text(hasil.jumlah + ' Dari ' + hasil.jumlah_total + ' data user');
        }, this.durasi);
    }
    // DEtail Data
    detailNya(tag, hasil) {
        if (hasil.status) {
            $(tag.nama).text('Tidak ditemukan');
            $(tag.email).text('Tidak ditemukan');
            $(tag.gender).text('Tidak ditemukan');
            $(tag.type_name).text('Tidak ditemukan');
            $(tag.tanggal_lahir).text('Tidak ditemukan');
        } else {
            $(tag.nama).text(hasil.nama);
            $(tag.email).text(hasil.email);
            $(tag.gender).text(hasil.genderWe);
            $(tag.type_name).text(hasil.type_name);
            $(tag.tanggal_lahir).text(hasil.tanggal_lahir);
        }
    }
    // Edit Form
    editForm(tag, hasil) {
        if (hasil.status) {
            $(tag.id).val('');
            $(tag.nama).val('');
            $(tag.email).val('');
            $(tag.gender).val('');
            $(tag.type_id).val('');
            $(tag.tanggal_lahir).val('');
        } else {
            $(tag.id).val(hasil.id);
            $(tag.nama).val(hasil.nama);
            $(tag.email).val(hasil.email);
            $(tag.gender).val(hasil.gender);
            $(tag.type_id).val(hasil.type_id);
            $(tag.tanggal_lahir).val(hasil.tanggal_lahir2);
        }
    }
}