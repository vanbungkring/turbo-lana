$("div.lazy").lazyload({effect:"fadeIn"});var date=new Date,d=date.getDate(),m=date.getMonth(),y=date.getFullYear();$(".availibility-calendar").fullCalendar({header:{left:"prev,next today",center:"title",right:""},editable:!0,events:[{title:"All Day Event",start:new Date(y,m,d),end:new Date(y,m,d-2)}]});$(".carousel").carousel({interval:3500});$(".price-slider").slider({range:!0,min:12e6,max:14e7,values:[12e6,14e7],slide:function(e,t){$(".rate-min").val("Rp"+t.values[0]);$(".rate-max").val("Rp"+t.values[1])}});$("#more-filter").popover({html:!0,content:function(){return $("#popover_content_wrapper").html()}});$(".image-billboard").bxSlider({});$(".hasDatepicker_start").datepicker({minDate:0,dateFormat:"dd-mm-yy",changeMonth:!1,numberOfMonths:1,onClose:function(e){$(".hasDatepicker_end").datepicker("option","minDate",e);$(".hasDatepicker_end").datepicker("show")}});$(".hasDatepicker_end").datepicker({defaultDate:"+1w",dateFormat:"dd-mm-yy",changeMonth:!1,numberOfMonths:1,onClose:function(e){}});$(".rate-min").val("Rp"+$(".price-slider").slider("values",0));$(".rate-max").val("Rp"+$(".price-slider").slider("values",1));