//slide
$(".carousel").carousel({interval:3500});$(".price-slider").slider({range:!0,min:12e6,max:14e7,values:[12e6,14e7],slide:function(e,t){$(".rate-min").val("Rp"+t.values[0]);$(".rate-max").val("Rp"+t.values[1])}});$("#more-filter").popover({html:!0,content:function(){return $("#popover_content_wrapper").html()}});$(".image-billboard").bxSlider({});$(".hasDatepicker_start").datepicker({defaultDate:"+1w",changeMonth:!0,numberOfMonths:1,onClose:function(e){$("#to").datepicker("option","minDate",e)}});$(".hasDatepicker_end").datepicker({defaultDate:"+1w",changeMonth:!0,numberOfMonths:1,onClose:function(e){$("#from").datepicker("option","maxDate",e)}});$(".rate-min").val("Rp"+$(".price-slider").slider("values",0));$(".rate-max").val("Rp"+$(".price-slider").slider("values",1));