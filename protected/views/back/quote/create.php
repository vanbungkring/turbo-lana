<?php
/* @var $this QuoteController */
/* @var $model Quote */

$this->breadcrumbs=array(
	'Quotes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Quote', 'url'=>array('index')),
	array('label'=>'Manage Quote', 'url'=>array('admin')),
);
?>

<h1>Create Quote</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>