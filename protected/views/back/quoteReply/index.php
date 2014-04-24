<?php
/* @var $this QuoteReplyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Quote Replies',
);

$this->menu=array(
	array('label'=>'Create QuoteReply', 'url'=>array('create')),
	array('label'=>'Manage QuoteReply', 'url'=>array('admin')),
);
?>

<h1>Quote Replies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'ajaxUpdate'=>true,
)); ?>
