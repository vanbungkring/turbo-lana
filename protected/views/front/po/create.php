<?php
/* @var $this PoController */
/* @var $model PO */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PO', 'url'=>array('index')),
	array('label'=>'Manage PO', 'url'=>array('admin')),
);
?>

<div class="container kivi">
	<div class="row">
		<h1>Create PO</h1>
	</div>
	<div class="row banner-detail">
		<div class="col-md-12 no-padding">
			<section id="banner-detail-info-list" class="banner-info-body">
				<header class="banner-info-header">Deskripsi & Spesifikasi Banner</header>
				<p class="content-description">
				<?php $this->renderPartial('_form', array('model'=>$model,'idQuotes'=>$idQuotes)); ?>
			</section>
		</div>
	</div>
</div>