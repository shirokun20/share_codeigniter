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
		<div class="col-lg-8 col-xs-12 formNya">
			<div class="panel panel-default">
				<form class="form-wajib">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-8">
								<div class="form-group">
									<label>No Hp</label>
									<div>
										<input type="text" name="phone_number" class="form-control" placeholder="Masukan Nomor Hp">
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Device ID</label>
									<div>
										<input type="text" name="device_id" class="form-control" placeholder="Masukan Device ID">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>Pesan</label>
									<div>
										<textarea class="form-control" name="message" placeholder="Masukan Pesan"></textarea>
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
									<div class="col-lg-12 sKirim">
										<button class="btn btn-primary btn-block btn-sKirim">Kirim</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-4 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<p>Disini saya menggunakan <b>sms gateway me</b>. bila ingin mencobanya silahkan klik <i>button</i> dibawah ini<br>
					   <a href="https://smsgateway.me" target="_blank" class="btn btn-danger btn-block">Disini</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url('assets/custom_js/api.sms.js')?>"></script>
<script src="<?=base_url('assets/custom_js/api.js')?>"></script>
