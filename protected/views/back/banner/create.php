<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs=array(
	'Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Banner', 'url'=>array('index')),
	array('label'=>'Manage Banner', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create Perusahaan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>