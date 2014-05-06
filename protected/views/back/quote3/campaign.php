<?php
/* @var $this QuotationController */

$this->breadcrumbs=array(
	'Quotation',
	);
	?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Daftar Pemilik Banner</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					Banner Quotation
						<div class="floating-bar">
				<!--	 <a class="btn btn-primary" href="<?php echo Yii::app()->controller->createUrl('create'); ?>">Tambah</a> -->
				</div>
				</div>
				<!-- /.panel-heading -->
<!-- 				<span class="label label-default">Default</span>
<span class="label label-primary">Primary</span>
<span class="label label-success">Success</span>
<span class="label label-info">Info</span>
<span class="label label-warning">Warning</span>
<span class="label label-danger">Danger</span> -->
				<div class="panel-body">
					<div class="table-responsive">

					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'quote3-grid',
						'cssFile'=>false,
						'dataProvider'=>$model->searchQuote3(),
						'itemsCssClass' => 'table table-striped table-bordered table-hover',
						'summaryText'=>false,
						
						'columns'=>array(
							'id',
							'member.namaDepan',
							'name',
							'tanggalMulai',
							'tanggalBerakhir',
							'budget',
							/*
							'deskripsi',
							'catatan',
							'time',
							*/
							array(
								'class'=>'CButtonColumn',
								'template'=>'{view}',
								'buttons'=>array(
									'view'=>array(
										'url'=>'Yii::app()->createUrl("/quote3/viewCampaign", array("id"=>$data->id))',
									),
								),
							),
						),
					)); ?>

</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
	</div>