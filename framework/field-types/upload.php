<?php
echo "<input id='$id' class='".(empty($class) ? 'regular-text' : $class)."' name='{$setting_id}[$id]' type='text' value='".esc_attr($options[$id])."' />";
echo "<input id='{$id}_upload_image_button' class='button-secondary upload-button' type='button' value='". __('Media Image Library', '_wpseed')."' />";

wp_enqueue_script('wpseed-upload-js', _WPSEED_PLUGIN_URL.'framework/field-types/js/upload.js', array('jquery', 'thickbox', 'media-upload'));