// For Color Field Type

jQuery(document).ready(function($){
    // Color Picker
    $('.pickcolor').click( function(e) {
		colorPicker = jQuery(this).next('div');
		input = jQuery(this).prev('input');
		$(colorPicker).farbtastic(input);
		colorPicker.show();
		e.preventDefault();
		$(document).mousedown( function() {
    		$(colorPicker).hide();
    	});
	});
});

