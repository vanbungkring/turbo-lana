<?php
/* @var $this DeliveriOrderController */
/* @var $model DeliveriOrder */

$this->breadcrumbs=array(
	'Deliveri Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DeliveriOrder', 'url'=>array('index')),
	array('label'=>'Create DeliveriOrder', 'url'=>array('create')),
	array('label'=>'Update DeliveriOrder', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DeliveriOrder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DeliveriOrder', 'url'=>array('admin')),
);
?>

<h1>View DeliveriOrder #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idPO',
		'idMember',
		'tanggal',
		'time',
	),
)); ?>
