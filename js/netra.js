var allListElements = $( ".big-login" );
if($("body").hasClass($( ".big-login" ))){

  alert(123);
}


//slide
$('.carousel').carousel({
  interval: 3500
})

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

$('#more-filter').popover({
 html : true,
 content: function() {
  return $('#popover_content_wrapper').html();
}
})
$(".image-billboard").bxSlider({
  
});
$( ".hasDatepicker_start" ).datepicker({
  minDate: 0,
  changeMonth: false,
  numberOfMonths: 1,
  onClose: function( selectedDate ) {
    $( ".hasDatepicker_end" ).datepicker( "option", "minDate", selectedDate);
    $(".hasDatepicker_end").datepicker("show");
  }
});
$( ".hasDatepicker_end" ).datepicker({
  defaultDate: "+1w",
  changeMonth: false,
  numberOfMonths: 1,
  onClose: function( selectedDate ) {
    
  }
});

//$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +" - $" + $( "#slider-range" ).slider( "values", 1 ) );
$(".rate-min").val("Rp" + $( ".price-slider" ).slider( "values", 0 ));
$(".rate-max").val("Rp" + $( ".price-slider" ).slider( "values", 1 ));
