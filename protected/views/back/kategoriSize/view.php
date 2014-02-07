<?php
/* @var $this KategoriSizeController */
/* @var $model KategoriSize */

$this->breadcrumbs=array(
	'Kategori Sizes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KategoriSize', 'url'=>array('index')),
	array('label'=>'Create KategoriSize', 'url'=>array('create')),
	array('label'=>'Update KategoriSize', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KategoriSize', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KategoriSize', 'url'=>array('admin')),
);
?>

<h1>View KategoriSize #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		array(
			'value'=>'<img src="'.$model->getUrl().'" />',
			'type'=>'raw',
		),
	),
)); ?>
