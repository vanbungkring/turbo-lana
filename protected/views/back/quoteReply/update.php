<?php
/* @var $this QuoteReplyController */
/* @var $model QuoteReply */

$this->breadcrumbs=array(
	'Quote Replies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuoteReply', 'url'=>array('index')),
	array('label'=>'Create QuoteReply', 'url'=>array('create')),
	array('label'=>'View QuoteReply', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QuoteReply', 'url'=>array('admin')),
);
?>

<h1>Update QuoteReply <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>