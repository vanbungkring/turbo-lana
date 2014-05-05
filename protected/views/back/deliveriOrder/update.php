<?php
/* @var $this DeliveriOrderController */
/* @var $model DeliveriOrder */

$this->breadcrumbs=array(
	'Deliveri Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DeliveriOrder', 'url'=>array('index')),
	array('label'=>'Create DeliveriOrder', 'url'=>array('create')),
	array('label'=>'View DeliveriOrder', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DeliveriOrder', 'url'=>array('admin')),
);
?>

<h1>Update DeliveriOrder <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>