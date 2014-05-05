	<!-- Fixed navbar -->
	<body>
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">

			<div class="container">

				<div class="navbar-header">
					<a class="navbar-brand" href="<?= Yii::app()->getBaseUrl() ?>/"><img src="<?= Yii::app()->getBaseUrl(true) ?>/images/logo.png" alt="Kiviads"></a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="#">About</a></li>
						<li><a href="#">Advertiser</a></li>
						<li><a href="#">Billboard Owner</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php 
						if(!Yii::app()->user->isGuest) {?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ photo }} {{username}} <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo Yii::app()->createUrl('user/dashboard'); ?>">Dashboard</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('user/MyBookmark'); ?>">My Bookmark</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('rfp2/list'); ?>">Campaign</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('rfp2/list'); ?>">Quote</a></li>
							</ul>
							<li><a href="#">Notification</a></li>
							<li>
								<a href="<?php echo Yii::app()->createUrl('site/Logout'); ?>">
									<div class="btn btn-outline btn-danger btn-sm"><i class="fa fa-sign-out fa-fw"></i> LOG OUT</div>
								</a>
							</li>
						</li>

						<?php 
					}

					else{
						echo  '<li><a href="'.Yii::app()->createUrl('site/login').'">Login</a></li>';
						echo  '<li><a href="'.Yii::app()->createUrl('site/login').'">Register</a></li>';
						echo  '<li><a href="'.Yii::app()->createUrl('site/login').'">Help</a></li>';
					}

					?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>

