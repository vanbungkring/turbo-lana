var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#date-start').datepicker({
	onRender: function(date) {
		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	}
}).on('changeDate', function(ev) {
	if (ev.date.valueOf() > checkout.date.valueOf()) {
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		checkout.setValue(newDate);
	}
	checkin.hide();
	$('#date-end')[0].focus();
}).data('datepicker');
var checkout = $('#date-end').datepicker({
	onRender: function(date) {
		return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
	}
}).on('changeDate', function(ev) {
	checkout.hide();
}).data('datepicker');

//slide
$( ".price-slider").slider({
	range: true,
	min: 12000000,
	max: 140000000,
	values: [ 12000000, 140000000 ],
	slide: function( event, ui ) {
		$(".rate-min").val("Rp" +ui.values[0]);
		$(".rate-max").val("Rp" +ui.values[1]);
	}
});
//$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +" - $" + $( "#slider-range" ).slider( "values", 1 ) );
$(".rate-min").val("Rp" + $( ".price-slider" ).slider( "values", 0 ));
$(".rate-max").val("Rp" + $( ".price-slider" ).slider( "values", 1 ));
