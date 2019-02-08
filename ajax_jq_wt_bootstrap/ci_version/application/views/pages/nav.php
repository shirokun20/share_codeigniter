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
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Api
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?=site_url('api/dgnAjax')?>">Ajax</a></li>
								</ul>
						</li>
						<?php if (is_null($this->session->test)): ?>
						<li><a href="<?=site_url('login/')?>">Login Ajax</a></li>
						<?php endif?>
					</ul>
					<?php if (@$this->session->test): ?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="javascript:void(0)"><span class="glyphicon glyphicon-user"></span> <?=substr(ucwords($this->session->test->nama), 0, 7)?></a></li>
						<li><a href="<?=site_url('logout')?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
					<?php endif?>
			</div>
		</div>
	</nav>