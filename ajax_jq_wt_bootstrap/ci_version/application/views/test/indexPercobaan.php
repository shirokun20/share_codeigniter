<div class="container">
	<h3 class="text-center"><?=$judul?></h3>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="list-form"></div>	
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	class Custom {
		// Function Mengambil
		mengambil(url, data = null) {
			var hasil = $.ajax({
				url: url,
				data: data,
				type: "GET",
				dataType: "JSON"
			});
			return hasil;
		}
	}
</script>
<script>
	// Url 
	var url = location.href;
	// Class
	var classData = new Custom();
	// Ready Function
	var list_form = $('.list-form');
	var hasilkan = [];
	$(() => {
		mengambilData();
	});

	var mengambilData = async () => {
		var hasil = await classData.mengambil(url + '/listDataNya');
		var ls = '';
		console.log(hasil.data);
		if (hasil.data.length > 9) {
			for (var i = 0; i < hasil.data.length; i++) {
				ls += toListNya(hasil.data[i]);
			}
		}

		list_form.html(ls);
	}


	var toListNya = (data) => {
			var divNya = '';
			divNya += '<div class="row">';
				divNya += '<div class="col-lg-8 col-xs-6">';
					divNya += `<h4>Nama Siswa: ${data.nama}</h4>`;
					divNya += `<input type="hidden" name="user_id" value="${data.user_id}">`;
				divNya += '</div>';
				divNya += '<div class="col-lg-4 col-xs-6">';
					divNya += `<select class="form-control data-nya" onchange="masukData('${ data.user_id }', this.value)">`;
						divNya += '<option value="">Pilih Status</option>';
						divNya += '<option value="h">Hadir</option>';
						divNya += '<option value="i">Izin</option>';
						divNya += '<option value="s">Sakit</option>';
						divNya += '<option value="a">Alpa</option>';
					divNya += '</select>';
				divNya += '</div>';
			divNya += '</div>';
			divNya += '<hr>';
			return divNya;
	}

	var masukData = (user_id, value) => {
		if (hasilkan.length > 0) {
			for (var i = 0; i < hasilkan.length; i++) {
				if (hasilkan[i].user_id == user_id) {
					mengubahArray(hasilkan[i], user_id, value);
					break;
				}else{
					menambahArray(user_id, value);
					break;
				}
			}
		}else{
			menambahArray(user_id, value);
		}
		console.log(hasilkan);
	}


	var mengubahArray = (keyData, user_id, value) => {
		keyData.user_id = user_id;
		keyData.status = value;
	}


	var menambahArray = (user_id, value) => {
		hasilkan.push({
			user_id: user_id,
			status: value,
		});
	}
</script>
