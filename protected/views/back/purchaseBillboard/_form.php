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
				<td colspan=3>Discount</td>
				<td><input type="text">(presentasi %)</td>
				<td>$180</td>
			</tr>
		</tfoot>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
<script type = "text/template" id="trnew">
	<tr>
		<td>1<input type="hidden" value="1"/></td>
		<td><input type="hidden" value="{namaBanner}" >{namaBanner}</td>
		<td><input type="hidden" value="{keteranganBanner}" >{keteranganBanner}</td>
		<td>
			<select class="form-control selectDurasi" data-id="{idBanner}" >
				<option value="hargaPerBulan" data-harga="{hargaPerBulan}">1 Bulan</option>
				<option value="hargaPer3Bulan" data-harga="{hargaPer3Bulan}">3 Bulan</option>
				<option value="hargaPer6Bulan" data-harga="{hargaPer6Bulan}">6 Bulan</option>
				<option value="hargaPerTahun" data-harga="{hargaPerTahun}">1 Tahun</option>
			</select>
		</td>
		<td><input type="text" value="{harga}" id="harga_{idBanner}" ></td>
	</tr>
</script>
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
			for(var i=0;i<ret.banners.length;i++) {
				var newtr = $("#trnew").text();
				var newtr = newtr.replace(/{namaBanner}/g,ret.banners[i].nama); 
				var newtr = newtr.replace(/{keteranganBanner}/g,ret.banners[i].keterangan); 

				var newtr = newtr.replace(/{hargaPerBulan}/g,ret.banners[i].hargaPerBulan); 
				var newtr = newtr.replace(/{hargaPer3Bulan}/g,ret.banners[i].hargaPer3Bulan); 
				var newtr = newtr.replace(/{hargaPer6Bulan}/g,ret.banners[i].hargaPer6Bulan); 
				var newtr = newtr.replace(/{hargaPerTahun}/g,ret.banners[i].hargaPerTahun); 

				var newtr = newtr.replace(/{idBanner}/g,ret.banners[i].id); 
				var newtr = newtr.replace(/{harga}/g,"");

			//	newtr += "<td>1<input type=\"hidden\" value=\"1\"/></td>";
			//	newtr += "<td><input type=\"hidden\" value=\""+ret.banners[i].nama+"\" >"+ret.banners[i].nama+"</td>";
			//	newtr += "<td><input type=\"hidden\" value=\""+ret.banners[i].keterangan+"\" >"+ret.banners[i].keterangan+"</td>";
			//	newtr += "<td><select option"+ret.banners[i].hargaPerBulan+"</td>";
			//	newtr += "<td>"+ret.banners[i].hargaPerBulan+"</td>";
				$("#listItembody").append(newtr);
			}
			
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

$( document ).on( "change", ".selectDurasi", function() {
	var id = $(this).attr("data-id");
	var harga = $(this).find("option:selected").attr("data-harga");
	console.log(harga);
	if(harga == "null"){
		harga = 0;
	}
	$("#harga_"+id).val(harga);
});

getPerusahaan();
getPO();
';
Yii::app()->clientScript->registerScript('script-ajax',$js,  CClientScript::POS_END);