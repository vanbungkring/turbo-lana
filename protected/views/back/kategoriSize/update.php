<?php
/* @var $this KategoriSizeController */
/* @var $model KategoriSize */

$this->breadcrumbs=array(
	'Kategori Sizes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KategoriSize', 'url'=>array('index')),
	array('label'=>'Create KategoriSize', 'url'=>array('create')),
	array('label'=>'View KategoriSize', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KategoriSize', 'url'=>array('admin')),
);
?>

<h1>Update KategoriSize <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>