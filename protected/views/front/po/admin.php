  <?php $this->renderPartial('/shared/partial/navbar'); ?>
<div class="container kivi">

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Banner</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="<?php echo Yii::app()->controller->createUrl('create'); ?>" >Create PO</a>
					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'po-grid',
						'dataProvider'=>$model->search(),
						
						"itemsCssClass" => 'table',
                        'cssFile'=>false,

						'columns'=>array(
							'id',
						//	'idMember',
						//	'time',
							'namaFile',
							array(
								'class'=>'CButtonColumn',
							),
						),
					)); ?>
            </div>
        </div>
    </div>
</div>
</div>