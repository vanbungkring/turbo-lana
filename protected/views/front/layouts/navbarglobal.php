<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
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
				<li><a href="<?php echo Yii::app()->createUrl('/user/myBookmark'); ?>" class="smothscroll">My Bookmark</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('/rfp/list'); ?>" class="smothScroll">RFP</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('/po'); ?>" class="smothScroll">PO</a></li>
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
	<?php echo $content; ?>
</body>
<?php $this->endContent(); ?>