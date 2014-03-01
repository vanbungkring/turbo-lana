<?php
/* @var $this PurchaseBillboardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Purchase Billboards',
);

$this->menu=array(
	array('label'=>'Create PurchaseBillboard', 'url'=>array('create')),
	array('label'=>'Manage PurchaseBillboard', 'url'=>array('admin')),
);
?>

<h1>Purchase Billboards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
