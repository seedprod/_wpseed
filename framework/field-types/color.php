<?php
// {$setting_id}[$id] - Contains the setting id, this is what it will be stored in the db as.
// $class - optional class value
// $id - setting id
// $options[$id] value from the db

echo "<input id='$id' type='text' name='{$setting_id}[$id]' value='" . esc_attr( $options[ $id ] ) . "' style='background-color:" . ( empty( $options[ $id ] ) ? $default_value : $options[ $id ] ) . ";' />";
echo "<input type='button' class='pickcolor button-secondary' value='Select Color'>";
echo "<div id='colorpicker' style='z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;'></div><br>";

wp_enqueue_script( '_wpseed-color-js', _WPSEED_PLUGIN_URL . 'framework/field-types/js/color.js', array(
     'farbtastic' 
) );