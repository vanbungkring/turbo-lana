<?php
/* @var $this QuoteController */
/* @var $model Quote */

$this->breadcrumbs=array(
	'Quotes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Quote', 'url'=>array('index')),
	array('label'=>'Create Quote', 'url'=>array('create')),
	array('label'=>'View Quote', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Quote', 'url'=>array('admin')),
);
?>

<h1>Update Quote <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>