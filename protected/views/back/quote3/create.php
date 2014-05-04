<?php
/* @var $this Quote3Controller */
/* @var $model Quote3 */

$this->breadcrumbs=array(
	'Quote3s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Quote3', 'url'=>array('index')),
	array('label'=>'Manage Quote3', 'url'=>array('admin')),
);
?>

<h1>Create Quote3</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>