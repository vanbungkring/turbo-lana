<?php
/* @var $this PoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pos',
);

$this->menu=array(
	array('label'=>'Create PO', 'url'=>array('create')),
	array('label'=>'Manage PO', 'url'=>array('admin')),
);
?>

<h1>Pos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
