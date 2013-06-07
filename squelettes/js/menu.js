var obj = null;

function checkHover() {
	if (obj) {
		obj.find('ul').fadeOut('500');	
	} //if
} //checkHover

$(document).ready(function() {
	
	// $('#menu_deroul').fadeOut('800');


	$('#menu_deroul > li').hover(function() {
		if (obj) {
			obj.find('ul').fadeOut(600);
			obj = null;
		} //if
		
		$(this).find('ul').fadeIn(500);
	}, function() {
		obj = $(this);
		setTimeout(
			"checkHover()",
			300); // Retarder la disparition
	});
});