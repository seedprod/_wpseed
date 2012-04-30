<?php

echo"<input id='$id' type='text' name='{$setting_id}[$id]' value='".(empty($options[$id]) ? $default_value : $options[$id])."' style='background-color:".(empty($options[$id]) ? $default_value : $options[$id]).";' />";
echo"<input type='button' class='pickcolor button-secondary' value='Select Color'>";
echo"<div id='colorpicker' style='z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;'></div>";

wp_enqueue_script('wpseed-color-js', _WPSEED_PLUGIN_URL.'framework/field-types/js/color.js', array('farbtastic'));