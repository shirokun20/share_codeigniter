<div class="container">
	<h3 class="text-center"><?=$judul?></h3>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-9 col-xs-8">
							<input type="text" name="mencari" class="form-control" placeholder="Cari disini..">
						</div>
						<div class="col-lg-3 col-xs-4">
							<select name="gender" class="form-control">
								<option value="">Pilih Jenis Kelamin</option>
								<option value="1">Laki-laki</option>
								<option value="2">Perempuan</option>
								<option value="3">Lainnya</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">List Data
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table" cellspacing="0" style="width:100%">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="35%">Nama</th>
									<th width="30%">Email</th>
									<th width="20%">Tipe</th>
									<th width="10%">Kelamin</th>
								</tr>
							</thead>
						<tbody class="datanya"></tbody>
						<tfoot>
						<tr class="aksinya">
							<th colspan="5" class="text-center"><a href="javascript:void(0)" class="btn-aksinya">Load More</a></th>
						</tr>
						<tr>
							<th colspan="5" class="text-center jumlah-datanya"></th>
						</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>