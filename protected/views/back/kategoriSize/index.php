<?php
/* @var $this KategoriSizeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kategori Sizes',
);

$this->menu=array(
	array('label'=>'Create KategoriSize', 'url'=>array('create')),
	array('label'=>'Manage KategoriSize', 'url'=>array('admin')),
);
?>

<h1>Kategori Sizes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
