<?php
/* @var $this Quote3Controller */
/* @var $model Quote3 */

$this->breadcrumbs=array(
	'Quote3s'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Quote3', 'url'=>array('index')),
	array('label'=>'Create Quote3', 'url'=>array('create')),
	array('label'=>'View Quote3', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Quote3', 'url'=>array('admin')),
);
?>

<h1>Update Quote3 <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>