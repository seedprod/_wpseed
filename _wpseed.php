<?php
/*
Plugin Name: _wpseed
Plugin URI: https://github.com/seedprod/_wpseed
Description: WordPress menu and setting api wrapper for plugins.
Version:  0.1.0
Author: SeedProd
Author URI: http://www.seedprod.com
License: GPLv2
Copyright 2011  John Turner (email : john@seedprod.com, twitter : @johnturner)
*/

/**
 * Init
 *
 * @package WordPress
 * @subpackage _wpseed
 * @since 0.1.0
 */

/**
 * Default Constants
 */
define( '_WPSEED_SHORTNAME', '_wpseed' ); // Used to reference namespace functions.
define( '_WPSEED_TEXTDOMAIN' , '_wpseed' ); // Your textdomain
define( '_WPSEED_PLUGIN_NAME', __('WP Seed','_wpseed') ); // Plugin Name shows up on the admin settings screen.
define( '_WPSEED_VERSION', '0.1.0' ); // Plugin Version Number. Recommend you use Semantic Versioning http://semver.org/
define( '_WPSEED_REQUIRED_WP_VERSION' , '3.0' ); // Required Version of WordPress
define( '_WPSEED_PLUGIN_PATH', plugin_dir_path(__FILE__)); // Example output: /Applications/MAMP/htdocs/wordpress/wp-content/plugins/_wpseed/
define( '_WPSEED_PLUGIN_URL', plugin_dir_url(__FILE__) ); // Example output: http://localhost:8888/wordpress/wp-content/plugins/_wpseed/

/**
 * Upon activation of the plugin, see if we are running the required version and deploy theme in defined.
 *
 * @since 0.1.0
 */
function _wpseed_activation() {
    if ( version_compare( get_bloginfo( 'version' ), _WPSEED_REQUIRED_WP_VERSION, '<' ) ) {
        deactivate_plugins( __FILE__  );
        wp_die( sprintf(__("WordPress %s and higher required. The plugin has now disabled itself. On a side note why are you running an old version :( Upgrade!",'_wpseed'), _WPSEED_REQUIRED_WP_VERSION ));
    }
}
register_activation_hook(__FILE__, '_wpseed_activation' );

/**
 * Load Required Files
 */
require_once('framework/framework.php');
require_once('inc/config.php');
require_once('inc/class-plugin.php');
require_once('inc/helper-functions.php');




