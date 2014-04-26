<?php
/* @var $this QuoteReplyController */
/* @var $model QuoteReply */

$this->breadcrumbs=array(
	'Quote Replies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuoteReply', 'url'=>array('index')),
	array('label'=>'Manage QuoteReply', 'url'=>array('admin')),
);
?>

<h1>Create QuoteReply</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>