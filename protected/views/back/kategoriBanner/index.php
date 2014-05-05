<?php
/* @var $this KategoriBannerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kategori Banners',
);

$this->menu=array(
	array('label'=>'Create KategoriBanner', 'url'=>array('create')),
	array('label'=>'Manage KategoriBanner', 'url'=>array('admin')),
);
?>

<h1>Kategori Banners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
