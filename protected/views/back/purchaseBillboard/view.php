<?php
/* @var $this PurchaseBillboardController */
/* @var $model PurchaseBillboard */

$this->breadcrumbs=array(
	'Purchase Billboards'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PurchaseBillboard', 'url'=>array('index')),
	array('label'=>'Create PurchaseBillboard', 'url'=>array('create')),
	array('label'=>'Update PurchaseBillboard', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PurchaseBillboard', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PurchaseBillboard', 'url'=>array('admin')),
);
?>

<h1>View PurchaseBillboard #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idPO',
		'idOwner',
		'tanggal',
		'time',
	),
)); ?>

perusahaan
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->perusahaan,
	'attributes'=>array(
		'id',
		'nama',
		'alamat',
		'noTelpon',
		'fax',
		'kontakPerson',
		'website',
		'email',
	),
)); ?>

