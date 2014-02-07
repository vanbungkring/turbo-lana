<?php
/* @var $this KategoriSizeController */
/* @var $model KategoriSize */

$this->breadcrumbs=array(
	'Kategori Sizes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KategoriSize', 'url'=>array('index')),
	array('label'=>'Manage KategoriSize', 'url'=>array('admin')),
);
?>

<h1>Create KategoriSize</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>