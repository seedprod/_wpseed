<?php
echo "<input id='$id' class='".(empty($class) ? 'regular-text' : $class)."' name='{$setting_id}[$id]' type='text' value='".(empty($options[$id]) ? $default_value : $options[$id])."' />";
echo "<input id='{$id}_upload_image_button' class='button-secondary upload-button' type='button' value='". __('Media Image Library', 'ultimate-coming-soon-page')."' />";

wp_enqueue_script('wpseed-upload-js', _WPSEED_PLUGIN_URL.'framework/field-types/js/upload.js', array('jquery', 'thickbox', 'media-upload'));