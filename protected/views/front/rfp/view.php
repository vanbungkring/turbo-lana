<div class="container kivi">
	<div class="row">
        <h1>Create Quote</h1>
    </div>
    <?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'quote-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	  'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	)); ?>
    <div class="row banner-detail">
    	<div class="col-md-8 no-padding">
    		<section id="banner-detail-info-list" class="banner-info-body">
			    <header class="banner-info-header">Deskripsi & Spesifikasi Banner</header>
			    <p class="content-description">
			      <?php echo CHtml::encode(@$banner->keterangan); ?>
			    </p>
			    <div class="table-responsive">
			      <table class="table table-bordered ">
			        <tbody>

			          <tr>
			            <td class="front">Quote Name</td>
			            <td> <?php echo CHtml::encode($model->name); ?> </td>
			          </tr>
			          <tr>
			            <td class="front">Initial Date</td>
			            <td> <?php echo CHtml::encode($model->initialDate); ?>  </td>
			          </tr>
			          <tr>
			            <td class="front">Reply until</td>
			            <td> <?php echo CHtml::encode($model->replyUntil); ?>  </td>
			          </tr>
			          <tr>
			            <td class="front">Duration</td>
			            <td> <?php echo CHtml::encode($model->duration); ?> 
			            	<?php echo CHtml::encode($model->durationType); ?>   </td>
			          </tr>
			          <tr>
			            <td class="front">Available Budget</td>
			            <td> <?php echo CHtml::encode($model->budget); ?> </td>
			          </tr>
			          <tr>
			            <td class="front">Description </td>
			            <td> <?php echo CHtml::encode($model->description); ?> </td>
			          </tr>
			          <tr>
			            <td class="front">Other Observations </td>
			            <td> <?php echo CHtml::encode($model->otherObservations); ?> </td>
			          </tr>
			        </tbody>
			      </table>
			    </div>
			  </section>
    	<div>
    </div>
    <?php $this->endWidget(); ?>
</div>