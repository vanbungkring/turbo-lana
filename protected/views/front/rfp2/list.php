<?php $this->renderPartial('/shared/partial/navbar-fluid'); ?>
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
            <!--    <a href="<?php echo Yii::app()->createUrl('/rfp/'); ?>" >Create Quote</a> -->
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'banner-grid',
                        "itemsCssClass" => 'table',
                        'dataProvider'=>$dataProvider,
    //                        'filter'=>$model,
                        'cssFile'=>false,
                        'columns'=>array(
                            'tanggalAwal',
                            'tanggalAkhir',
                            'banner.nama',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}'
                            ),
                        ),
                )); ?>
            </div>
        </div>
    </div>
</div>
</div>