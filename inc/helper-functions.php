<?php
/**
 * A place to put helper functions
 */

function _wpseed_get_options(){
	$settings = array();

	$settings = get_option('wpseed_settings_1') + get_option('wpseed_settings_2');

	return $settings;
}
