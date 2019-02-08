<div class="container">
	<h3 class="text-center"><?=$judul?></h3>
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 col-xs-12">
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-danger" style="display: none;">
						<div class="pesan"></div>
					</div>
					<div class="alert alert-success" style="display: none;">
						<div class="pesan"></div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Masuk ke aplikasi</div>
				<form class="form-wajib">
					<div class="panel-body">
						<div class="form-group">
							<label>Email</label>
							<div>
								<input type="email" name="email" class="form-control" placeholder="Masukan email">
							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div>
								<input type="password" name="password" class="form-control" placeholder="Masukan password">
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="">
							<div class="row">
								<div class="col-lg-9 col-xs-6" style="font-size: 15px;margin-top: 7px;">
									Copyright &copy; 2018-2020. <a href="javascript:void(0)">Shiro IT</a>.
								</div>
								<div class="col-lg-3 col-xs-6">
									<button class="btn btn-success btn-block btn-masuk">Masuk</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>
</div>
<script src="<?=base_url('assets/custom_js/login_class.js')?>"></script>
<script src="<?=base_url('assets/custom_js/login.js')?>"></script>