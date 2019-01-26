
		// url
		var url = window.location.href;
		// urlNya
		var urlNya = url.substring(0, url.lastIndexOf('/datanya2/'));
		// pencarian dengan text
		var mencari = $('[name="mencari"]');
		// pencarian dengan kelamin
		var gender = $('[name="gender"]');
		// Class Dari User
		class User {
			// Yang Akan dipanggil Pertama :-D
			constructor(tagnya, url) {
			  // vareasi
		      this.tagnya = $(tagnya);
		      // Url yang ada di new User
		      this.url = url;
		  	}

		  	datanya(method, value = null) {
		  		// Before Mencari
			    var ls = '<tr>';
			    	ls += '<td colspan="5" class="text-center">';
			    	ls += 'Tunggu Sebentar';
			    	ls += '</td>';
			    	ls += '</tr>';
			    // Tag yang awalnya di buat pertama :-D
			    this.tagnya.html(ls);
			    $.ajax({
			    	url: this.url + '/listDat2',
			    	data: value,
			    	dataType: "JSON",
			    	type: method,
			    	success: (e) => {
			    		ls = '';
			    		if (e.status == 'ada') {
			    			// Ketika ada datanya
			    			for (var a = 0; a < e.data.length; a++) {
			    				// Jumlah dari detai
			    				var c = e.data[a].detail;
								// di pecah lagi hehe :-D
								var j = 1;
								var waw = '';
								if (c.length >= 1) {
									waw = 'yes';
								}else{
									waw = 'no';
								}
								for (var b = 0; b < c.length; b++) {
				    				ls += '<tr>';
									ls += '<td>'+(j++)+'</td>';
									ls += '<td>'+(c[b].nama)+'</td>';
									ls += '<td>'+(c[b].email)+'</td>';
									ls += '<td>'+(c[b].type_name)+'</td>';
									ls += '<td>'+(c[b].gender)+'</td>';
									// Ini Koding yang menyebalkan
									if (waw ==  'yes') {
										ls += '<td rowspan="'+c.length+'" style="vertical-align : middle;text-align:center;">'+(e.data[a].bulan)+'/'+(e.data[a].tahun)+'</td>';
										waw = 'no';
									}

				    				ls += '</tr>';
								}
			    			}
			    		}else{
			    			// Ketika datanya tidak ada
			    			ls = '<tr>';
					    	ls += '<td colspan="5" class="text-center">';
					    	ls += 'Belum Ada';
					    	ls += '</td>';
					    	ls += '</tr>';
			    		}
			    		this.tagnya.html(ls);
			    	}
			    });
			    // console.log(value);
			}
		}
		// ini yang akan dipanggil terlebih dahulu 
		let u = new User(".datanya", urlNya);
		u.datanya('GET');
		// Ketika mencari di tulis
		mencari.on('keyup', (e) => {
			u.datanya('GET', {
				mencari: mencari.val(),
				gender: gender.val(),
			});
		});
		// Ketika Gender di pilih
		gender.on('change', (e) => {
			u.datanya('GET', {
				mencari: mencari.val(),
				gender: gender.val(),
			});
		});
	