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
			<div class="col-md-4">
				<?php echo $form->dropDownList($model,'idPurchaseBillboard',$idPurchaseBillboards); ?>
			</div>
		</div>
		<div class="row">
			Nama Advetiser : <span id="nama_member"></span>
			<?php echo $form->hiddenField($model,'idMember'); ?>
		</div>
		<div class="row">
			Nama Perusahaan : <span id="company_name_member"></span>
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
				<td><span id="idSubTotal">0</span></td>
			</tr>
			<tr>
				<td colspan=4>Pajak</td>
				<td><span id="">0</span></td>
			</tr>
			<tr>
				<td colspan=3>Discount</td>
				<td><input type="text">(presentasi %)</td>
				<td><span id="">0</span></td>
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
		<td>
			1<input type="hidden" value="1" name="Invoice[formDetail][{idBanner}][qty]"/>
			<input type="hidden" value="{idBanner}" name="Invoice[formDetail][{idBanner}][idBanner]"/>
		</td>
		<td><input type="hidden" value="{namaBanner}" readonly=readonly>{namaBanner}</td>
		<td><input type="hidden" value="{keteranganBanner}" readonly=readonly>{keteranganBanner}</td>
		<td>
			<select class="form-control selectDurasi" data-id="{idBanner}" disabled=disabled>
				<option value="hargaPerBulan" data-harga="{hargaPerBulan}"  {selected_hargaPerBulan}>1 Bulan</option>
				<option value="hargaPer3Bulan" data-harga="{hargaPer3Bulan}" {selected_hargaPer3Bulan} >3 Bulan</option>
				<option value="hargaPer6Bulan" data-harga="{hargaPer6Bulan}"  {selected_hargaPer6Bulan}>6 Bulan</option>
				<option value="hargaPerTahun" data-harga="{hargaPerTahun}"  {selected_hargaPerTahun}>1 Tahun</option>
			</select>
			<input type="hidden" value="{idBanner}" name="Invoice[formDetail][{idBanner}][durasi]" />
		</td>
		<td><input type="text" readonly=readonly class="harga_input form-control" value="{harga}" id="harga_{idBanner}" name="Invoice[formDetail][{idBanner}][harga]"></td>
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
function getPB(){
	var url  = "'.Yii::app()->controller->createUrl('detailPB').'";
	var data = { id : $("#Invoice_idPurchaseBillboard").val() }; 
	$.post(url,data,function(ret){
		if(ret.status == 1){
			for(var i=0;i<ret.detail.length;i++) {
				var newtr = $("#trnew").text();
				var newtr = newtr.replace(/{namaBanner}/g,ret.detail[i].banner.nama); 
				var newtr = newtr.replace(/{keteranganBanner}/g,ret.detail[i].banner.keterangan); 

				var newtr = newtr.replace(/{hargaPerBulan}/g,ret.detail[i].banner.hargaPerBulan); 
				var newtr = newtr.replace(/{hargaPer3Bulan}/g,ret.detail[i].banner.hargaPer3Bulan); 
				var newtr = newtr.replace(/{hargaPer6Bulan}/g,ret.detail[i].banner.hargaPer6Bulan); 
				var newtr = newtr.replace(/{hargaPerTahun}/g,ret.detail[i].banner.hargaPerTahun); 

				var newtr = newtr.replace(/{idBanner}/g,ret.detail[i].id); 
				var newtr = newtr.replace(/{harga}/g,ret.detail[i].harga);

				var newtr = newtr.replace("{selected_"+ret.detail[i].durasi+"}","selected=selected");

				var newtr = newtr.replace("{selected_hargaPerBulan}","");
				var newtr = newtr.replace("{selected_hargaPer3Bulan}","");
				var newtr = newtr.replace("{selected_hargaPer6Bulan}","");
				var newtr = newtr.replace("{selected_hargaPerTahun}","");

				$("#listItembody").append(newtr);
			}
			hitung();

			$("#nama_member").text(ret.member.namaDepan+" "+ret.member.namaBelakang);
			$("#company_name_member").text(ret.member.namaPerusahaan);
			$("#Invoice_idMember").val(ret.member.id);
		}
		else{
			alert(ret.message);
		}

	},"json");
}
$("#PurchaseBillboard_idOwner").change(function(){
	getPerusahaan();
});
$("#Invoice_idPurchaseBillboard").change(function(){
	getPB();
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

// getPerusahaan();
getPB();
';
Yii::app()->clientScript->registerScript('script-ajax',$js,  CClientScript::POS_END);