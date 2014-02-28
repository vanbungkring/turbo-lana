<?php
/* @var $this PoController */
/* @var $model PO */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PO', 'url'=>array('index')),
	array('label'=>'Create PO', 'url'=>array('create')),
	array('label'=>'Update PO', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PO', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PO', 'url'=>array('admin')),
);
?>

<h1>View PO #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idMember',
		'time',
		'namaFile',
	),
)); ?>
