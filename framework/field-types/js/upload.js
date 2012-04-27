// For Upload Field Type

jQuery(document).ready(function($){
    // Uploader
    var uploadID = ''; /*setup the var*/
    var mediaClicked = false;

    jQuery('.upload-button').click(function() {
        mediaClicked = true;
        uploadID = jQuery(this).prev('input'); 
        formfield = jQuery('.upload').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

    window.original_send_to_editor = window.send_to_editor;

    window.send_to_editor = function(html) {
        if (mediaClicked) {
            imgurl = jQuery('img',html).attr('src');
            uploadID.val(imgurl); 
            tb_remove();
            mediaClicked = false;
        } else {
            window.original_send_to_editor(html);
        }
    };
    
});
