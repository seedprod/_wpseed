<?php
/**
 * A place to put helper functions
 */

function _wpseed_get_options(){
	$settings = array();
	var_dump($_wpseed);
	foreach ($_wpseed->options as $v) {
		switch ($v['type']) {
			case 'setting':
				var_dump($v['id']);
				$settings = $settings + get_option($v['id']);
				break;
		}
	}
	return $settings;
}
