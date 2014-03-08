<?php
/* @var $this PurchaseBillboardController */
/* @var $model PurchaseBillboard */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'purchase-billboard-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="row">
			<div class="col-md-8">
				<div class="row">
					No.
				</div>
				<div class="row">
					<?php echo $form->dropDownList($model,'idOwner',$idOwners); ?>
				</div>
				<div class="row">
					<span id="nama_perusahaan"></span>
				</div>
				<div class="row">
					<span id="alamat_perusahaan"></span>
			</div><!-- 
			<div class="row">
				<span id="kota_perusahaan"></span>
			</div> -->
			<div class="row">
				<span id="no_telp_perusahaan"></span>
			</div>
		</div>
		<div class="col-md-4">
			<?php echo $form->dropDownList($model,'idPO',$idPOs); ?>
		</div>
	</div>

	<div class="row" style="display:hidden">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>
					Quantity
				</th>
				<th>
					Unit Banner
				</th>
				<th>
					Diskripsi
				</th>
				<th>
					Durasi
				</th>
				<th>
					Harga
				</th>
			</tr>
		</thead>
		
		<tbody id='listItembody'>
		</tbody>
		
		<tfoot>
			<tr>
				<td colspan=4>Subtotal</td>
				<td>$180</td>
			</tr>
			<tr>
				<td colspan=4>Pajak</td>
				<td>$180</td>
			</tr>
			<tr>
				<td colspan=4>Discount</td>
				<td>$180</td>
			</tr>
		</tfoot>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$js = '
function getPerusahaan(){
	var url  = "'.Yii::app()->controller->createUrl('detailPerusahaan').'";
	var data = { id : $("#PurchaseBillboard_idOwner").val() }; 
	$.post(url,data,function(ret){
		if(ret.status == 1){
			$("#nama_perusahaan").text(ret.data.nama);
			$("#alamat_perusahaan").text(ret.data.alamat);
			$("#kota_perusahaan").text(ret.data.kota);
			$("#no_telp_perusahaan").text(ret.data.noTelpon);
		}
		else{
			alert(ret.message);
		}

	},"json");
}
function getPO(){
	var url  = "'.Yii::app()->controller->createUrl('detailPO').'";
	var data = { id : $("#PurchaseBillboard_idPO").val() }; 
	$.post(url,data,function(ret){
		if(ret.status == 1){
			var newtr = "<tr>";
			for(var i=0;i<ret.banners.length;i++) {
				newtr += "<td>"+ret.banners[i].nama+"</td>";
				newtr += "<td>"+ret.banners[i].keterangan+"</td>";
				newtr += "<td>"+ret.banners[i].hargaPerBulan+"</td>";
				newtr += "<td>"+ret.banners[i].hargaPerBulan+"</td>";
				newtr += "<td>"+ret.banners[i].hargaPerBulan+"</td>";
			}
			newtr += "</tr>";
			$("#listItembody").append(newtr);
		}
		else{
			alert(ret.message);
		}

	},"json");
}
$("#PurchaseBillboard_idOwner").change(function(){
	getPerusahaan();
});
$("#PurchaseBillboard_idPO").change(function(){
	getPO();
});
getPerusahaan();
getPO();
';
Yii::app()->clientScript->registerScript('script-ajax',$js,  CClientScript::POS_END);