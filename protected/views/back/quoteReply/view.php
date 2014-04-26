<?php
/* @var $this QuoteReplyController */
/* @var $model QuoteReply */

$this->breadcrumbs=array(
	'Quote Replies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QuoteReply', 'url'=>array('index')),
	array('label'=>'Create QuoteReply', 'url'=>array('create')),
	array('label'=>'Update QuoteReply', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QuoteReply', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuoteReply', 'url'=>array('admin')),
);
?>

<h1>View QuoteReply #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idQuote',
		'type',
		'reply',
		'time',
		'idMember',
		'idAdmin',
	),
)); ?>
