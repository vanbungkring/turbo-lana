<?php
/* @var $this PoController */
/* @var $model PO */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PO', 'url'=>array('index')),
	array('label'=>'Create PO', 'url'=>array('create')),
	array('label'=>'View PO', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PO', 'url'=>array('admin')),
);
?>

<h1>Update PO <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>