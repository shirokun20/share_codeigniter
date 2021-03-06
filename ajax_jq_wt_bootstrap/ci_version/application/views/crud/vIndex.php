<div class="container">
	<h3 class="text-center"><?=$judul?></h3>
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-danger" style="display: none;">
				<div class="pesan"></div>
			</div>
			<div class="alert alert-success" style="display: none;">
				<div class="pesan"></div>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-9 col-xs-8">
							<input type="text" name="mencari" class="form-control" placeholder="Cari disini..">
						</div>
						<div class="col-lg-3 col-xs-4">
							<select name="gender2" class="form-control">
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
		<div class="col-xs-12 formNya" style="display: none">
			<div class="panel panel-default">
				<form class="form-wajib">
					<div class="panel-body">
						<input type="hidden" name="id">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nama</label>
									<div>
										<input type="text" name="nama" class="form-control" placeholder="Masukan nama..">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Email</label>
									<div>
										<input type="email" name="email" class="form-control" placeholder="Masukan email..">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Password</label>
									<div>
										<input type="password" name="password" class="form-control" placeholder="Masukan password..">
									</div>
									<div class="p-password"></div>
								</div>
							</div>
							<div class="col-lg-6 re-hilang">
								<div class="form-group">
									<label>Re password</label>
									<div>
										<input type="password" name="repassword" class="form-control" placeholder="Masukan re password..">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group">
									<label>Kelamin</label>
									<div>
										<select name="gender" class="form-control">
											<option value="">Pilih Jenis Kelamin</option>
											<option value="1">Laki-laki</option>
											<option value="2">Perempuan</option>
											<option value="3">Lainnya</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group">
									<label>Tipe</label>
									<div>
										<select name="type_id" class="form-control">
											<option value="">Pilih Tipe</option>
											<?php foreach ($this->mod_sb->mengambil('type')->result() as $key): ?>
											<option value="<?=$key->id?>"><?=$key->type_name?></option>
											<?php endforeach?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Tanggal lahir</label>
									<div>
										<input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukan tanggal lahir..">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-lg-6"></div>
							<div class="col-lg-6 col-xs-12">
								<div class="row">
									<div class="col-xs-6">
										<button class="btn btn-danger btn-block btn-batal">Batal</button>
									</div>
									<div class="col-xs-6 sTambah">
										<button class="btn btn-primary btn-block btn-sTambah">Simpan</button>
									</div>
									<div class="col-xs-6 sEdit" style="display: none;">
										<button class="btn btn-primary btn-block btn-sEdit">Simpan</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">List Data
					<div class="pull-right">
						<a href="javascript:void(0)"><i class="glyphicon glyphicon-plus btn-tambah"></i></a>
						&nbsp;
						<a href="javascript:void(0)"><i class="glyphicon glyphicon-refresh btn-reload"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table" cellspacing="0" style="width:100%">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="30%">Nama</th>
									<th width="30%">Email</th>
									<th width="20%">Tipe</th>
									<th width="10%">Kelamin</th>
									<th width="5%">Aksi</th>
								</tr>
							</thead>
						<tbody class="datanya"></tbody>
						<tfoot>
						<tr>
							<th colspan="6" class="text-center jumlah-datanya"></th>
						</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div>
		<div class="modal fade myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Detail User</h4>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
							<table class="table" width="100%">
								<thead>
									<tr>
										<th width="30%">Nama</th>
										<th width="5%"></th>
										<th width="65%" class="text-right p-nama"></th>
									</tr>
									<tr>
										<th width="30%">Email</th>
										<th width="5%"></th>
										<th width="65%" class="text-right p-email"></th>
									</tr>
									<tr>
										<th width="30%">Kelamin</th>
										<th width="5%"></th>
										<th width="65%" class="text-right p-gender"></th>
									</tr>
									<tr>
										<th width="30%">Tipe Pengguna</th>
										<th width="6%"></th>
										<th width="75%" class="text-right p-type-name"></th>
									</tr>
									<tr>
										<th width="30%">Tanggal Lahir</th>
										<th width="6%"></th>
										<th width="75%" class="text-right p-tanggal-lahir"></th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script src="<?=base_url('assets/custom_js/alert.class.js')?>"></script>
<script src="<?=base_url('assets/custom_js/crud.class.js')?>"></script>
<script src="<?=base_url('assets/custom_js/users.class.js')?>"></script>
<script src="<?=base_url('assets/custom_js/crud.master.js')?>"></script>
