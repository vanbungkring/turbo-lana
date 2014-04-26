<?php
/* @var $this DeliveriOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Deliveri Orders',
);

$this->menu=array(
	array('label'=>'Create DeliveriOrder', 'url'=>array('create')),
	array('label'=>'Manage DeliveriOrder', 'url'=>array('admin')),
);
?>

<h1>Deliveri Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
