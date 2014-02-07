<?php
/* @var $this KategoriBannerController */
/* @var $model KategoriBanner */

$this->breadcrumbs=array(
	'Kategori Banners'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KategoriBanner', 'url'=>array('index')),
	array('label'=>'Create KategoriBanner', 'url'=>array('create')),
	array('label'=>'Update KategoriBanner', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KategoriBanner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KategoriBanner', 'url'=>array('admin')),
);
?>

<h1>View KategoriBanner #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'keterangan',
	),
)); ?>
