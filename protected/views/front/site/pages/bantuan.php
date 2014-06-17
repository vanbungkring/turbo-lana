<?php $this->
renderPartial('/shared/partial/navbar'); ?>
<div class="container kivi city">
	<div class="row text-center" style="border-bottom: 1px solid #e2e2e2;">
		<h1>Ada Yang Bisa Kami Bantu?</h1>
		<p>Jika anda butuh bantuan dengan platform Kiviads, Anda berada di halaman yang tepat!</p>
	</div>
	<div class="row">
		<div class="col-md-6" style="border-right: 1px solid #e2e2e2; min-height: 450px;">
			<h4>Butuh Response Yang Cepat?</h4>
			<p>Gunakan media di bawah ini untuk bertanya dan mendapatkan jawaban secara cepat.</p>
			<div class="row">
				<div class="col-md-6 text-center" style="border-right: 1px solid #e2e2e2;">
					<a href="www.twitter.com/kivibyte">
						<i class="fa fa-twitter-square" style="font-size: 70px;"></i>
						<p>Tweet @Kivibyte</p>
					</a>
				</div>
				<div class="col-md-6 text-center">
					<a href="tel:+622171292973">
						<i class="fa fa-phone-square" style="font-size: 70px;"></i>
						<p>Hubungi 021-71292973</p>
					</a>
				</div>
				<div class="col-md-12">
					<!-- KONTAK -->
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'contact-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true,
							),
						)); 
					$contact = new ContactForm();
					?>
					<h3>KIVIBYTE DIGITAL MEDIA</h3>
					<br>
					<form role="form" action="#" method="post" enctype="plain"> 
						<div class="form-group">
							<label for="name1">Nama</label>
							<input type="name" name="Name" class="form-control" id="name1" placeholder="Nama Anda">
						</div>
						<div class="form-group">
							<label for="email1">Email</label>
							<input type="email" name="Mail" class="form-control" id="email1" placeholder="Email Anda">
						</div>
						<div class="form-group">
							<label>Pesan Anda</label>
							<textarea class="form-control" name="Message" rows="3"></textarea>
						</div>
						<?php if(CCaptcha::checkRequirements()): ?>
						<div class="form-group">
							<?php echo $form->labelEx($contact,'verifyCode'); ?>
							<div>
								<?php $this->widget('CCaptcha'); ?>
								<?php echo $form->textField($contact,'verifyCode'); ?>
							</div>
							<div class="hint">Harap masukkan huruf di atas untuk membuktikan anda bukan robot.
								<br/>Besar kecil huruf tidak sensitif.</div>
								<?php echo $form->error($contact,'verifyCode'); ?>
							</div>
						<?php endif; ?>
						<br>
						<button type="submit" class="btn btn-large btn-success">Kirim</button>
					</form>
					<?php $this->endWidget(); ?>
					<!-- KONTAK END -->
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h4>Jawaban Untuk Pertanyaan Yang Sering Ditanyakan</h4>
			<ul>
				<li><a href="#">Apa itu Kiviads?</a></li>
				<li><a href="#">Apa keunggulan Kiviads?</a></li>
				<li><a href="#">Kenapa menggunakan Kiviads?</a></li>
				<li><a href="#">Bagaiman cara menggunakan Kiviads?</a></li>
				<li><a href="#">Apa manfaat Kiviads bagi PENGIKLAN dan AGENSI?</a></li>
				<li><a href="#">Apa manfaat Kiviads bagi PEMILIK BILLBOARD?</a></li>
				<li><a href="#">Fakta penting untuk PENGIKLAN / AGENSI</a></li>
				<li><a href="#">Fakta penting untuk PEMILIK BILLBOARD</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- end container -->
<?php $this->
renderPartial('/shared/partial/footer');?>