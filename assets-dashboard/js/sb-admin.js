$(function() {

  $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
$(function() {
  $(window).bind("load resize", function() {
    width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
    if (width < 768) {
      $('div.sidebar-collapse').addClass('collapse')
    } else {
      $('div.sidebar-collapse').removeClass('collapse')
    }
  })
  $( ".hasDatepicker_start" ).datepicker({
    minDate: 0,
    dateFormat: 'dd-mm-yy',
    changeMonth: false,
    numberOfMonths: 1,
    onClose: function( selectedDate ) {
      $( ".hasDatepicker_end" ).datepicker( "option", "minDate", selectedDate);
      $(".hasDatepicker_end").datepicker("show");
    }
  });
  $( ".hasDatepicker_end" ).datepicker({
    defaultDate: "+1w",
    dateFormat: 'dd-mm-yy',
    changeMonth: false,
    numberOfMonths: 1,
    onClose: function( selectedDate ) {

    }
  });
})
