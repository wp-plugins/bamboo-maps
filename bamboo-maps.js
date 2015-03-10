/******************************************************************/

	jQuery(document).ready(function(){

		jQuery('.bamboo_map').each(function(){
			bambooInitMap(jQuery(this));
		});

	});

/******************************************************************/

	function bambooInitMap(el) {

		var id = el.attr('id');
		var latitude = 53.594199;
		var longitude = -2.29522;
		var zoom = 15;

		var link = jQuery(el).html();
		var startPos = link.indexOf('/@')+2;
		var endPos = link.indexOf('z');
		var query = link.substr(startPos, endPos-startPos);
		var params = query.split(",");
		latitude = params[0];
		longitude = params[1];
		zoom = parseInt(params[2]);

		var options = {
			'center': new google.maps.LatLng(latitude, longitude),
			'zoom': zoom,
			'mapTypeId': google.maps.MapTypeId.ROADMAP,
			'scrollwheel':false,
			'streetViewControl': true
		};
		var div = document.getElementById(id);
		new google.maps.Map(div, options);

	}

/******************************************************************/
