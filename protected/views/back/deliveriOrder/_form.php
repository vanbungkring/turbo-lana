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
					<?php echo $form->dropDownList($model,'idMember',CHtml::listData(Member::model()->findAll(),'id','namaDepan')); ?>
				</div>
				<div class="row">
					<span id="nama_member"></span>
				</div>
				<div class="row">
					<span id="perushaan"></span>
				</div><!-- 
				<div class="row">
					<span id="kota_perusahaan"></span>
				</div> -->
				<div class="row">
					<span id="notelpon"></span>
				</div>
		</div>
		<div class="col-md-4">
			<?php echo $form->dropDownList($model,'idPO',CHtml::listData(PO::model()->findAll(),'id','id')); ?>
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
			</tr>
		</thead>
		
		<tbody id='listItembody'>
		</tbody>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
<script type = "text/template" id="trnew">
	<tr>
		<td>
			1<input type="hidden" value="1" name="DeliveriOrder[formDetail][{idBanner}][qty]"/>
			<input type="hidden" value="{idBanner}" name="DeliveriOrder[formDetail][{idBanner}][idBanner]"/>
		</td>
		<td><input type="hidden" value="{namaBanner}" >{namaBanner}</td>
		<td><input type="hidden" value="{keteranganBanner}" >{keteranganBanner}</td>
	</tr>
</script>
<?php
$js = '
function getMember(){
	var url  = "'.Yii::app()->controller->createUrl('detailMember').'";
	var data = { id : $("#DeliveriOrder_idMember").val() }; 
	$.post(url,data,function(ret){
		if(ret.status == 1){
			$("#nama_member").text(ret.data.namaDepan+" "+ret.data.namaBelakang);
			$("#perushaan").text(ret.data.namaPerusahaan);
			$("#notelpon").text(ret.data.nomerTelpon);
		}
		else{
			alert(ret.message);
		}

	},"json");
}
function getPO(){
	var url  = "'.Yii::app()->controller->createUrl('detailPO').'";
	var data = { id : $("#DeliveriOrder_idPO").val() }; 
	$.post(url,data,function(ret){
		if(ret.status == 1){
			for(var i=0;i<ret.banners.length;i++) {
				var newtr = $("#trnew").text();
				var newtr = newtr.replace(/{namaBanner}/g,ret.banners[i].nama); 
				var newtr = newtr.replace(/{keteranganBanner}/g,ret.banners[i].keterangan); 

				var newtr = newtr.replace(/{idBanner}/g,ret.banners[i].id); 

				$("#listItembody").append(newtr);
			}
			
		}
		else{
			alert(ret.message);
		}

	},"json");
}
$("#DeliveriOrder_idMember").change(function(){
	getMember();
});
$("#DeliveriOrder_idPO").change(function(){
	getPO();
});
function hitung(){
	var tot = 0;
	var hitung  = true;
	$(".harga_input").each(function(){
		var val = $(this).val();
		if(!$.isNumeric( val )){
			hitung = false;
		}
		else{
			tot = parseFloat(tot) + parseFloat(val);
		}
		console.log(tot);
	});
	console.log("hitung"+hitung);
	if(hitung){
		$("#idSubTotal").text(tot.toFixed(2));
	}
}
$( document ).on( "change", ".selectDurasi", function() {
	var id = $(this).attr("data-id");
	var harga = $(this).find("option:selected").attr("data-harga");
	console.log(harga);
	if(harga == "null"){
		harga = 0;
	}
	$("#harga_"+id).val(harga);

	hitung();
});

$( document ).on( "keyup", ".harga_input", function() {
	hitung();
});

getMember();
getPO();
';
Yii::app()->clientScript->registerScript('script-ajax',$js,  CClientScript::POS_END);