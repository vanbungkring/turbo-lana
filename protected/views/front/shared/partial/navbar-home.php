	<!-- Fixed navbar -->
	<body>
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">

			<div class="container">

				<div class="navbar-header">
					<a class="navbar-brand" href="#"><b>Kiviads</b></a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
					<li><a href="#desc" class="smothscroll">Dashboard</a></li>
					<li><a href="#desc" class="smothscroll">My Bookmark</a></li>
					<li><a href="#showcase" class="smothScroll">RFP</a></li>
				</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php 
						if(!Yii::app()->user->isGuest) {
							echo  '<li><a href="'.Yii::app()->createUrl('site/logout').'">Logout</a></li>';
						}
						?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>

