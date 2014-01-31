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

//google maps render
	$('#map-wrapper').gmap3({
		map:{
			options:{
				center:[48.8620722, 2.352047],
				zoom: 5,
				mapTypeId:google.maps.MapTypeId.ROADMAP,
				mapTypeControl: false,
				navigationControl: false,
				scrollwheel: true,
				streetViewControl: false
			}
		},
		trafficlayer:{
		},
		marker:{
			values:[
			{
				latLng:[48.8620722, 2.352047],
				data:"Paris !"},
				{
					address:"86000 Poitiers, France",
					data:"Poitiers : great city !"
				},
				{
					address:"66000 Perpignan, France",
					data:"Perpignan ! GO USAP !",
					options:{icon: "http://maps.google.com/mapfiles/marker_green.png"
				}
			}
			],
			options:{
				draggable: false
			},
			events:{
				mouseover: function(marker, event, context){
					var map = $(this).gmap3("get"),
					infowindow = $(this).gmap3({get:{name:"infowindow"}});
					if (infowindow){
						infowindow.open(map, marker);
						infowindow.setContent(context.data);
					} else {
						$(this).gmap3({
							infowindow:{
								anchor:marker, 
								options:{content: context.data}
							}
						});
					}
				},
				mouseout: function(){
					var infowindow = $(this).gmap3({get:{name:"infowindow"}});
					if (infowindow){
						infowindow.close();
					}
				}
			}
		}
	});