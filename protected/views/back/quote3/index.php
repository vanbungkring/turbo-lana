<?php
/* @var $this Quote3Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Quote3s',
);

$this->menu=array(
	array('label'=>'Create Quote3', 'url'=>array('create')),
	array('label'=>'Manage Quote3', 'url'=>array('admin')),
);
?>

<h1>Quote3s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
