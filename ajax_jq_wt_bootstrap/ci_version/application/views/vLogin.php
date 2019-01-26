<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=$judul?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?=site_url()?>">CI Tutorial</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Tabel
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?=site_url('awal/datanya/')?>">Tabel Tp</a></li>
										<li><a href="<?=site_url('awal/datanya2/')?>">Tabel rowspan Tp</a></li>
									</ul>
								</li>
								<li><a href="<?=site_url('crud/')?>">Crud</a></li>
								<?php if (is_null($this->session->test)): ?>
								<li class="active"><a href="<?=site_url('login/')?>">Login Ajax</a></li>
								<?php endif ?>
							</ul>
							<?php if (@$this->session->test): ?>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="javascript:void(0)"><span class="glyphicon glyphicon-user"></span> <?= substr(ucwords($this->session->test->nama), 0,7) ?></a></li>
								<li><a href="<?=site_url('logout')?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
							</ul>
							<?php endif ?>
						</div>
					</div>
				</nav>
			</header>
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
		</body>
	</html>