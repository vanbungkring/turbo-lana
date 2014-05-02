<?php
/* @var $this Quote3Controller */
/* @var $model Quote3 */

$this->breadcrumbs=array(
	'Quote3s'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Quote3', 'url'=>array('index')),
	array('label'=>'Create Quote3', 'url'=>array('create')),
	array('label'=>'Update Quote3', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Quote3', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Quote3', 'url'=>array('admin')),
);
?>

<h1>View Quote3 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idMember',
		'name',
		'tanggalMulai',
		'tanggalBerakhir',
		'budget',
		'deskripsi',
		'catatan',
		'description',
		'time',
	),
)); ?>
