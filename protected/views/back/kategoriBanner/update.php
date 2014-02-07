<?php
/* @var $this KategoriBannerController */
/* @var $model KategoriBanner */

$this->breadcrumbs=array(
	'Kategori Banners'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KategoriBanner', 'url'=>array('index')),
	array('label'=>'Create KategoriBanner', 'url'=>array('create')),
	array('label'=>'View KategoriBanner', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KategoriBanner', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Kategori Banner</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>