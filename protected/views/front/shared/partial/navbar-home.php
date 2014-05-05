	<!-- Fixed navbar -->
	<body>
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">

			<div class="container">

				<div class="navbar-header">
					<a class="navbar-brand" href="<?= Yii::app()->getBaseUrl() ?>/"><img src="<?= Yii::app()->getBaseUrl(true) ?>/images/logo.png" alt="Jakarta" class="img-responsive"></a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
					<!-- <li><a href="<?php echo Yii::app()->createUrl('user/Dashboard'); ?>">Dashboard</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('user/MyBookmark'); ?>">My Bookmark</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('rfp/list'); ?>" class="smothScroll">RFP</a></li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">

					<?php 
					if(!Yii::app()->user->isGuest) {
					echo  '<li class="dropdown">'
						echo  '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>'
						echo  '<ul class="dropdown-menu">'
						echo  '<li><a href="#">Action</a></li>'
						echo  '<li><a href="#">Another action</a></li>'
						echo  '<li><a href="#">Something else here</a></li>'
						echo  '<li class="divider"></li>'
						echo  '<li class="nav-header">Nav header</li>'
						echo  '<li><a href="#">Separated link</a></li>'
						echo  '<li><a href="#">One more separated link</a></li>'
						echo  '</ul>'
						echo  '</li>'

					}
				else{
					echo  '<li><a href="'.Yii::app()->createUrl('site/login').'">Login / Register</a></li>';
					echo  '<li><a href="'.Yii::app()->createUrl('site/login').'">Login / Register</a></li>';
					echo  '<li><a href="'.Yii::app()->createUrl('site/login').'">Login / Register</a></li>';
				}
			?>
		</ul>
	</div><!--/.nav-collapse -->
</div>
</div>

