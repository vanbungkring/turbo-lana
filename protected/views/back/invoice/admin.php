<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Invoice</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Invoice
                    <div class="floating-bar">
                    <a class="btn btn-primary" href="<?php echo Yii::app()->controller->createUrl('create'); ?>">Tambah</a>
                </div>
            </div>
            <div class="panel-body">
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'banner-grid',
			        "itemsCssClass" => 'table',
			        'dataProvider'=>$model->search(),
			        'cssFile'=>false,
					'columns'=>array(
						'id',
						'idPurchaseBillboard',
						'idMember',
						'tanggal',
						'time',
						array(
							'class'=>'CButtonColumn',
						),
					),
				)); ?>
			</div>
        </div>
    </div>
</div>