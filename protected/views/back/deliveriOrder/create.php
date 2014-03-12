<?php
/* @var $this DeliveriOrderController */
/* @var $model DeliveriOrder */

$this->breadcrumbs=array(
	'Deliveri Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DeliveriOrder', 'url'=>array('index')),
	array('label'=>'Manage DeliveriOrder', 'url'=>array('admin')),
);
?>

<h1>Create DeliveriOrder</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>