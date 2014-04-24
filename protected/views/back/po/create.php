<?php
/* @var $this PoController */
/* @var $model PO */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PO', 'url'=>array('index')),
	array('label'=>'Manage PO', 'url'=>array('admin')),
);
?>

<h1>Create PO</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'idQuotes'=>$idQuotes)); ?>