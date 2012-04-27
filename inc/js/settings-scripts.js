// This is place for js you need to execute on the settings page. This file will only load on the menu pages you've define in the config file.

// Scripts for Settings Page

jQuery(document).ready(function($){
// Uploader
var uploadID = ''; /*setup the var*/

jQuery('.upload-button').click(function() {
    uploadID = jQuery(this).prev('input'); /*grab the specific input*/
    formfield = jQuery('.upload').attr('name');
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
    return false;
});

window.send_to_editor = function(html) {
    imgurl = jQuery('img',html).attr('src');
    uploadID.val(imgurl); /*assign the value to the input*/
    tb_remove();
};

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