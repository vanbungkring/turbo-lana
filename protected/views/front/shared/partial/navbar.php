	<!-- Fixed navbar -->
	<body>
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">

			<div class="container">

				<div class="navbar-header">
					<a class="navbar-brand" href="<?= Yii::app()->getBaseUrl() ?>/"><img src="<?= Yii::app()->getBaseUrl(true) ?>/images/logo.png" alt="Kiviads"></a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
					<li><a href="#desc">Dashboard</a></li>
					<li><a href="#desc">My Bookmark</a></li>
					<li><a href="#showcase" class="smothScroll">RFP</a></li>
				</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php 
						if(!Yii::app()->user->isGuest) {
							echo  '<li><a href="'.Yii::app()->createUrl('site/logout').'">Logout</a></li>';
						
						}
						else{
								echo  '<li><a href="'.Yii::app()->createUrl('site/login').'">Login / Register</a></li>';
						}
						?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>

