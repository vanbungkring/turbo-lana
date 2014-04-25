<div class="search-box">
<h1>Flight search. Reinvented for humans.</h1>

<form action="<?php echo Yii::app()->createUrl('site/result'); ?>" method="GET">
	<div class="row row-search">
		<div class="col-xs-6 free-transform">
			<input type="text" class="form-control search-form " placeholder="Search Location" id="boxcari" autocomplete="off">
			<input type="hidden" id="lat" value="-6.17511" name="lat">
			<input type="hidden" id="long" value="106.86503949999997" name="long">
		</div>
		<div class="col-xs-2 free-transform">
			<input type="text" class="form-control search-form hasDatepicker_start" placeholder="Date Start" autocomplete="off">
		</div>
		<div class="col-xs-2 free-transform">
			<input type="text" class="form-control search-form hasDatepicker_end" placeholder="Date End" autocomplete="off">
		</div>

		<div class="col-xs-1 free-transform">
			<button type="submit" class="btn btn-success search-button" id="btnSearch">CARI BILLBOARD</button>
		</div>
		<div class="check"></div>
	</div>
</form>
<p>Search 12808 Media Spaces in 352 locations.</p>
</div>