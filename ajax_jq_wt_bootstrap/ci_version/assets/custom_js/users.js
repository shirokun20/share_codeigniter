// Modifikasi koding ala Shirokun 29
class Users {
    // Yang Akan dipanggil Pertama :-D
    constructor(tagnya, url, jml) {
        // vareasi
        this.tagnya = tagnya;
        this.jml = jml;
        // Url yang ada di new User
        this.url = url;
    }

    // Ajax Datanya
    datanya(method, value = null) {
        var ls = '<tr>' + '<td colspan="6" class="text-center">Tunggu Sebentar</td>' + '</tr>';
        this.jml.text('Tunggu yah....');
        this.tagnya.html(ls);
        $.ajax({
            url: this.url + '/listData/',
            dataType: "JSON",
            type: method,
            data: value,
            success: (e) => {
                ls = '';
                if (e.status == 'ada') {
                    var a = 1;
                    // List datanya
                    for (var i = 0; i < e.data.length; i++) {
           				ls += '<tr>';
           				ls += '<td>'+(a++)+'</td>';
           				ls += '<td>'+(e.data[i].nama)+'</td>';
           				ls += '<td>'+(e.data[i].email)+'</td>';
           				ls += '<td>'+(e.data[i].type_name)+'</td>';
           				ls += '<td>'+(e.data[i].gender)+'</td>';
           				ls += '<td>';
           				ls += '<div class="btn-group">';
           				ls += '<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">';
           				ls += 'Klik';
           				ls += '</button>';
           				ls += '<ul class="dropdown-menu pull-right" role="menu">';
           				ls += '<li><a href="javascript:void(0)" onclick="editData('+"'"+(e.data[i].id)+"'"+')">Edit</a></li>';
           				ls += '<li class="divider"></li>';
           				ls += '<li><a href="javascript:void(0)" onclick="detailData('+"'"+(e.data[i].id)+"'"+')">Detail</a></li>';
           				ls += '<li class="divider"></li>';
           				ls += '<li><a href="javascript:void(0)" onclick="hapusData('+"'"+(e.data[i].id)+"'"+')">Hapus</a></li>';
           				ls += '</ul>';
           				ls += '</div>';
           				ls += '</td>';
           				ls += '</tr>';             
                    }
                } else {
                    ls = '<tr>' + '<td colspan="6" class="text-center">Tidak ada data</td>' + '</tr>'
                }
                this.jml.text(e.jumlah + ' Dari ' + e.jumlah_total + ' data user');
                this.tagnya.html(ls);
            }
        });
    }


    detailNya(value, tag)
    {
    	$.ajax({
    		url: this.url + '/ambilData/',
    		data: value,
    		dataType: "JSON",
    		type: "GET",
    		success: (e) => {
    			if (e.status) {
    				$(tag.nama).text('Tidak ditemukan');
	    			$(tag.email).text('Tidak ditemukan');
	    			$(tag.gender).text('Tidak ditemukan');
	    			$(tag.type_name).text('Tidak ditemukan');
	    			$(tag.tanggal_lahir).text('Tidak ditemukan');
    			}else{
    				$(tag.nama).text(e.nama);
	    			$(tag.email).text(e.email);
	    			$(tag.gender).text(e.genderWe);
	    			$(tag.type_name).text(e.type_name);
	    			$(tag.tanggal_lahir).text(e.tanggal_lahir);
    			}
    		}
    	})
    }

    ambilDatanya(value, tag)
    {
      $.ajax({
        url: this.url + '/ambilData/',
        data: value,
        dataType: "JSON",
        type: "GET",
        success: (e) => {
          if (e.status) {
            $(tag.id).val('');
            $(tag.nama).val('');
            $(tag.email).val('');
            $(tag.gender).val('');
            $(tag.type_id).val('');
            $(tag.tanggal_lahir).val('');
          }else{
            $(tag.id).val(e.id);
            $(tag.nama).val(e.nama);
            $(tag.email).val(e.email);
            $(tag.gender).val(e.gender);
            $(tag.type_id).val(e.type_id);
            $(tag.tanggal_lahir).val(e.tanggal_lahir2);
          }
        }
      })
    }
}