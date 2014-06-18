	<!-- Fixed navbar -->
	<body>
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">

			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php Yii::app()->getBaseUrl() ?>/"><img src="<?= Yii::app()->getBaseUrl(true) ?>/images/logo.png" alt="Kiviads"></a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo Yii::app()->createUrl('/about'); ?>">Tentang Kami</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('/advertiser'); ?>">Pengiklan</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('/media-owner'); ?>">Pemilik Media</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php 
						if(!Yii::app()->user->isGuest) {?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, <?php echo $this->memberModel->namaDepan; ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo Yii::app()->createUrl('user/dashboard'); ?>">Dashboard</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('user/MyBookmark'); ?>">My Bookmark</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('quote3/campaign'); ?>">My Campaign</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('quote3/'); ?>">Quote</a></li>
							</ul>
							<!-- <li><a href="#">Notification</a></li> -->
							<li>
								<a href="<?php echo Yii::app()->createUrl('site/Logout'); ?>">
									<div class="btn btn-outline btn-danger btn-sm"><i class="fa fa-sign-out fa-fw"></i>Keluar</div>
								</a>
							</li>
						</li>

						<?php 
					}

					else{
						echo  '<li><a href="'.Yii::app()->createUrl('site/login').'">Masuk</a></li>';
						echo  '<li><a href="'.Yii::app()->createUrl('site/Registrasi').'">Daftar</a></li>';
						echo  '<li><a href="'.Yii::app()->createUrl('bantuan').'">Bantuan</a></li>';
					}

					?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>

