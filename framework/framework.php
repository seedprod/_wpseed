<?php
/**
 * _wpseed Framework
 *
 * @package WordPress
 * @subpackage _wpseed
 * @since 0.1.0
 */

class _WPSEED
{
    public $plugin_version = _WPSEED_VERSION;
    public $plugin_name = _WPSEED_PLUGIN_NAME;
    
    /**
     * Holds defined menus
     */
    public $pages = array( );
    
    /**
     *  Holds defined tabs, sections and fields
     */
    public $options = array( );
    
    /**
     * Load Hooks
     */
    function __construct( )
    {
        add_action( 'init', array( &$this, 'init' ) );
        //add_action( 'init', array( &$this, 'get_options' ) );
        add_action( 'admin_init', array( &$this, 'upgrade' ), 0 );
        add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts'  ) );
        add_action( 'admin_menu', array( &$this, 'create_menus'  ) );
        add_action( 'admin_init', array( &$this, 'reset_defaults' ) );
        add_action( 'admin_init', array( &$this, 'create_settings' ) );
        add_filter( 'plugin_action_links', array( &$this, 'plugin_action_links' ), 10, 2 );
    }
    
    /**
     * Load Text Domain
     */
    function init( )
    {
        load_plugin_textdomain( _WPSEED_TEXTDOMAIN, _WPSEED_PLUGIN_PATH . '/languages/' );
    }
    
    /**
     * Upgrade setting pages. This allows you to run an upgrade script when the version changes.
     *
     */
    function upgrade( )
    {
        // get current version
        $_wpseed_current_version = get_option( '_wpseed_version' );
        if ( empty( $_wpseed_current_version ) ) {
            update_option( '_wpseed_version', _WPSEED_VERSION );
            $_wpseed_current_version = _WPSEED_VERSION;
        }
        
        // Sample script to update field if it's changed to a different tab.
        // if ( version_compare( _WPSEED_VERSION,$_wpseed_current_version ) === 1) {
        //     $old_fields = array();
        //     $old_fields = get_option('wpseed_options_1');
        //     $old_fields = $old_fields + get_option('wpseed_options_1');
        
        //     $new_fields = array();
        //     foreach ($this->options as $k) {
        //         switch ($k['type']) {
        //             case 'setting':
        //             case 'section':
        //             case 'tab':
        //                 break;
        //             default:
        //                 if(isset($old_fields[$k['id']])){
        //                     $new_fields[$k['setting_id']][$k['id']] = $old_fields[$k['id']];
        //                 }
        
        
        //         }
        //     }
        //     var_dump($old_fields);
        //     var_dump($new_fields);
        
        // }
    }
    
    /**
     * Reset the settings page. Reset works per settings id.
     *
     */
    function reset_defaults( )
    {
        if ( isset( $_POST[ 'reset' ] ) ) {
            $option_page = $_POST[ 'option_page' ];
            check_admin_referer( $option_page . '-options' );
            $defaults = array( );
            foreach ( $this->options as $k ) {
                switch ( $k[ 'type' ] ) {
                    case 'menu':
                    case 'setting':
                    case 'section':
                    case 'tab':
                        break;
                    default:
                        if ( $k[ 'setting_id' ] === $_POST[ 'option_page' ] ) {
                            if ( isset( $k[ 'default_value' ] ) ) {
                                $defaults[ $k[ 'id' ] ] = $k[ 'default_value' ];
                            }
                        }
                }
            }
            
            $_POST[ $_POST[ 'option_page' ] ] = $defaults;
            add_settings_error( 'general', '_wpseed-settings-reset', __( "Settings reset." ), 'updated' );
        }
        
    }
    
    /**
     * Properly enqueue styles and scripts for our theme options page.
     *
     * This function is attached to the admin_enqueue_scripts action hook.
     *
     * @since  0.1.0
     * @param string $hook_suffix The name of the current page we are on.
     */
    function admin_enqueue_scripts( $hook_suffix )
    {
        if ( !in_array( $hook_suffix, $this->pages ) )
            return;
        
        wp_enqueue_script( 'dashboard' );
        wp_enqueue_script( '_wpseed-framework-js', _WPSEED_PLUGIN_URL . 'framework/settings-scripts.js', array( 'jquery' ), $this->plugin_version );
        wp_enqueue_style( 'thickbox' );
        wp_enqueue_style( 'media-upload' );
        wp_enqueue_style( 'farbtastic' );
        wp_enqueue_style( '_wpseed-framework-css', _WPSEED_PLUGIN_URL . 'framework/settings-style.css', false, $this->plugin_version );
    }

    /**
     * Get all option settings
     *
     * @since 0.1.0
     */
    function get_options( )
    {
        $settings = array( );
        foreach ( $this->options as $k ) {
            switch ( $k[ 'type' ] ) {
                case 'setting':
                    $settings = $settings + get_option( $k[ 'id' ] ); 
                    break;
            }
        }

        return $settings;
    }

    
    /**
     * Creates WordPress Menu pages from an array in the config file.
     *
     * This function is attached to the admin_menu action hook.
     *
     * @since 0.1.0
     */
    function create_menus( )
    {
        foreach ( $this->options as $k => $v ) {
            if ( $v[ 'type' ] == 'menu' ) {
                if ( empty( $v[ 'menu_name' ] ) ) {
                    $v[ 'menu_name' ] = $v[ 'page_name' ];
                }
                if ( empty( $v[ 'capability' ] ) ) {
                    $v[ 'capability' ] = 'manage_options';
                }
                if ( empty( $v[ 'callback' ] ) ) {
                    $v[ 'callback' ] = array(
                        &$this,
                        'option_page' 
                    );
                }
                if ( empty( $v[ 'icon_url' ] ) ) {
                    $v[ 'icon_url' ] = _WPSEED_PLUGIN_URL . 'framework/settings-menu-icon-16x16.png';
                }
                if ( empty( $v[ 'menu_slug' ] ) ) {
                    $v[ 'menu_slug' ]                 = sanitize_title( $v[ 'page_name' ] );
                    $this->options[ $k ][ 'menu_slug' ] = $v[ 'menu_slug' ];
                }
                if ( $v[ 'menu_type' ] == 'add_submenu_page' ) {
                    $this->pages[ ] = call_user_func_array( $v[ 'menu_type' ], array(
                        $v[ 'parent_slug' ],
                        $v[ 'page_name' ],
                        $v[ 'menu_name' ],
                        $v[ 'capability' ],
                        $v[ 'menu_slug' ],
                        $v[ 'callback' ] 
                    ) );
                } else {
                    $this->pages[ ] = call_user_func_array( $v[ 'menu_type' ], array(
                        $v[ 'page_name' ],
                        $v[ 'menu_name' ],
                        $v[ 'capability' ],
                        $v[ 'menu_slug' ],
                        $v[ 'callback' ],
                        $v[ 'icon_url' ] 
                    ) );
                }
            }
        }
    }
    
    /**
     * Display settings link on plugin page
     */
    function plugin_action_links( $links, $file )
    {
        $plugin_file = _WPSEED_FILE;
        
        if ( $file == $plugin_file ) {
            $settings_link = '<a href="options-general.php?page=' . $this->options[ 0 ][ 'menu_slug' ] . '">Settings</a>';
            array_unshift( $links, $settings_link );
        }
        return $links;
    }
    
    
    /**
     * Allow Tabs on the Settings Page
     *
     */
    function plugin_options_tabs( )
    {
        $page        = $_REQUEST[ 'page' ];
        $uses_tabs   = false;
        $current_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : false;
        
        //Check if this config uses tabs
        foreach ( $this->options as $v ) {
            if ( $v[ 'type' ] == 'tab' ) {
                $uses_tabs = true;
            }
        }
        
        // If uses tabs then generate the tabs
        if ( $uses_tabs ) {
            echo '<h2 class="nav-tab-wrapper" style="padding-left:20px">';
            $c = 1;
            foreach ( $this->options as $v ) {
                if ( isset( $v[ 'menu_slug' ] ) ) {
                    if ( $v[ 'menu_slug' ] == $page && $v[ 'type' ] == 'tab' ) {
                        $active = '';
                        if ( $current_tab ) {
                            $active = $current_tab == $v[ 'id' ] ? 'nav-tab-active' : '';
                        } elseif ( $c == 1 ) {
                            $active = 'nav-tab-active';
                        }
                        echo '<a class="nav-tab ' . $active . '" href="?page=' . $v[ 'menu_slug' ] . '&tab=' . $v[ 'id' ] . '">' . $v[ 'label' ] . '</a>';
                        $c++;
                    }
                }
            }
            echo '</h2>';
        }
    }
    
    /**
     * Get the layout for the page. classic|2-col
     *
     */
    function get_page_layout( )
    {
        $layout = 'classic';
        foreach ( $this->options as $v ) {
            switch ( $v[ 'type' ] ) {
                case 'menu';
                    $page = $_REQUEST[ 'page' ];
                    if ( $page == $v[ 'menu_slug' ] ) {
                        if ( isset( $v[ 'layout' ] ) ) {
                            $layout = $v[ 'layout' ];
                        }
                    }
                    break;
            }
        }
        return $layout;
    }
    
    /**
     * Render the option pages.
     *
     * @since 0.1.0
     */
    function option_page( )
    {
        $page   = $_REQUEST[ 'page' ];
        $layout = $this->get_page_layout();
        ?>
        <div class="wrap columns-2 _wpseed">
        <?php screen_icon(); ?>
            <h2><?php echo $this->plugin_name; ?></h2>
            <?php $this->plugin_options_tabs(); ?>

            <?php if ( $layout == '2-col' ): ?>
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content" >
            <?php endif; ?>
                    <form action="options.php" method="post">
                            <?php
                            foreach ( $this->options as $v ) {
                                if ( isset( $v[ 'menu_slug' ] ) ) {
                                    if ( $v[ 'menu_slug' ] == $page ) {
                                        switch ( $v[ 'type' ] ) {
                                            case 'menu';
                                                break;
                                            case 'tab';
                                                $tab = $v;
                                                if ( empty( $default_tab ) )
                                                    $default_tab = $v[ 'id' ];
                                                break;
                                            case 'setting':
                                                
                                                $current_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : $default_tab;
                                                if ( $current_tab == $tab[ 'id' ] ) {
                                                    settings_fields( $v[ 'id' ] );
                                                }
                                                break;
                                            case 'section':
                                                $current_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : $default_tab;
                                                if ( $current_tab == $tab[ 'id' ] or $current_tab === false ) {
                                                    if ( $layout == '2-col' ) {
                                                        echo '<div class="postbox seedprod-postbox"><div class="handlediv" title="Click to toggle"><br /></div>';
                                                        $this->do_settings_sections( $v[ 'id' ] );
                                                        echo '</div>';
                                                    } else {
                                                        do_settings_sections( $v[ 'id' ] );
                                                    }
                                                }
                                                break;
                                                
                                        }
                                    }
                                }
                            }
                        ?>
                    <p>
                    <input name="submit" type="submit" value="<?php _e( 'Save Changes', '_wpseed' ); ?>" class="button-primary"/>
                    <input id="reset" name="reset" type="submit" value="<?php _e( 'Reset', '_wpseed' ); ?>" class="button-secondary"/>    
                    </p>
                    </form> 
                    <?php if ( $layout == '2-col' ): ?> 
                    </div> <!-- #post-body-content -->

                    <div id="postbox-container-1" class="postbox-container">
                            <!-- This is a sample postbox. Can be customized. -->
                            <div class="postbox support-postbox">
                                <div class="handlediv" title="Click to toggle"><br /></div>
                                <h3><span><?php echo $this->plugin_name; ?></span> 
                                    <span class="_wpseed-version"><?php echo _WPSEED_VERSION; ?></span></h3>
                                <div class="inside">
                                    <div class="_wpseed-widget">
                                        Sample Postbox
                                    </div>
                                </div>
                            </div><!-- end .postbox -->

              
                    </div> <!-- #postbox-container-1 -->
                </div> <!-- #post-body --> 
            </div> <!-- #poststuff --> 
            <?php endif; ?>
        </div> <!-- .wrap -->

        <!-- JS login to confirm setting resets. -->    
        <script>
            jQuery(document).ready(function($) {
                $('#reset').click(function(e){
                    if(!confirm('<?php _e( 'All custom settings values be deleted. Are you sure you want to reset?', '_wpseed' ); ?>')){
                        e.preventDefault();
                    }
                });
            });
        </script>
        <?php
    }
    
    /**
     * Create the settings options, sections and fields via the WordPress Settings API
     *
     * This function is attached to the admin_init action hook.
     *
     * @since 0.1.0
     */
    function create_settings( )
    {
        foreach ( $this->options as $k => $v ) {
            switch ( $v[ 'type' ] ) {
                case 'menu':
                    $menu_slug = $v[ 'menu_slug' ];
                    break;
                case 'setting':
                    if ( empty( $v[ 'validate_function' ] ) ) {
                        $v[ 'validate_function' ] = array(
                             &$this,
                            'validate_machine' 
                        );
                    }
                    register_setting( $v[ 'id' ], $v[ 'id' ], $v[ 'validate_function' ] );
                    $setting_id                         = $v[ 'id' ];
                    $this->options[ $k ][ 'menu_slug' ] = $menu_slug;
                    break;
                case 'section':
                    if ( empty( $v[ 'desc_callback' ] ) ) {
                        $v[ 'desc_callback' ] = array(
                             &$this,
                            '__return_empty_string' 
                        );
                    } else {
                        $v[ 'desc_callback' ] = $v[ 'desc_callback' ];
                    }
                    add_settings_section( $v[ 'id' ], $v[ 'label' ], $v[ 'desc_callback' ], $v[ 'id' ] );
                    $section_id                         = $v[ 'id' ];
                    $this->options[ $k ][ 'menu_slug' ] = $menu_slug;
                    break;
                case 'tab':
                    $this->options[ $k ][ 'menu_slug' ] = $menu_slug;
                    break;
                default:
                    if ( empty( $v[ 'callback' ] ) ) {
                        $v[ 'callback' ] = array(
                             &$this,
                            'field_machine' 
                        );
                    }
                    
                    add_settings_field( $v[ 'id' ], $v[ 'label' ], $v[ 'callback' ], $section_id, $section_id, array(
                         'id' => $v[ 'id' ],
                        'desc' => ( isset( $v[ 'desc' ] ) ? $v[ 'desc' ] : '' ),
                        'setting_id' => $setting_id,
                        'class' => ( isset( $v[ 'class' ] ) ? $v[ 'class' ] : '' ),
                        'type' => $v[ 'type' ],
                        'default_value' => ( isset( $v[ 'default_value' ] ) ? $v[ 'default_value' ] : '' ),
                        'option_values' => ( isset( $v[ 'option_values' ] ) ? $v[ 'option_values' ] : '' ) 
                    ) );
                    
            }
        }
    }
    
    /**
     * Create a field based on the field type passed in.
     *
     * @since 0.1.0
     */
    function field_machine( $args )
    {
        extract( $args ); //$id, $desc, $setting_id, $class, $type, $default_value, $option_values
        
        $defaults = array( );
        foreach ( $this->options as $k ) {
            switch ( $k[ 'type' ] ) {
                case 'setting':
                case 'section':
                case 'tab':
                    break;
                default:
                    if ( isset( $k[ 'default_value' ] ) ) {
                        $defaults[ $k[ 'id' ] ] = $k[ 'default_value' ];
                    }
            }
        }
        $options = get_option( $setting_id );
        
        $options = wp_parse_args( $options, $defaults );
        
        $path = _WPSEED_PLUGIN_PATH . 'framework/field-types/' . $type . '.php';
        if ( file_exists( $path ) ) {
            // Show Field
            include( $path );
            // Show description
            if ( !empty( $desc ) ) {
                echo "<small class='description'>{$desc}</small>";
            }
        }
        
    }
    
    /**
     * Validates user input before we save it via the Options API. If error add_setting_error
     *
     * @since 0.1.0
     * @param array $input Contains all the values submitted to the POST.
     * @return array $input Contains sanitized values.
     * @todo Figure out best way to validate values.
     */
    function validate_machine( $input )
    {
        foreach ( $this->options as $k ) {
            switch ( $k[ 'type' ] ) {
                case 'menu':
                case 'setting':
                case 'section':
                case 'tab';
                    break;
                default:
                    if ( !empty( $k[ 'validate' ] ) ) {
                        $validation_rules = explode( ',', $k[ 'validate' ] );
                        foreach ( $validation_rules as $v ) {
                            $path = _WPSEED_PLUGIN_PATH . 'framework/validations/' . $v . '.php';
                            if ( file_exists( $path ) ) {
                                // Defaults Values
                                $is_valid  = true;
                                $error_msg = '';
                                
                                // Test Validation
                                require_once( $path );
                                
                                // Is it valid?
                                if ( $is_valid === false ) {
                                    add_settings_error( $k[ 'id' ], 'seedprod_error', $error_msg, 'error' );
                                    // Unset invalids
                                    unset( $input[ $k[ 'id' ] ] );
                                }
                                
                            }
                        } //end foreach
                        
                    }
            }
        }
        
        return $input;
    }
    
    /**
     * Dummy function to be called by all sections from the Settings API. Define a custom function in the config.
     *
     * @since 0.1.0
     * @return string Empty
     */
    function __return_empty_string( )
    {
        echo '';
    }
    
    
    /**
     * SeedProd version of WP's do_settings_sections
     *
     * @since 0.1.0
     */
    function do_settings_sections( $page )
    {
        global $wp_settings_sections, $wp_settings_fields;
        
        if ( !isset( $wp_settings_sections ) || !isset( $wp_settings_sections[ $page ] ) )
            return;
        
        foreach ( (array) $wp_settings_sections[ $page ] as $section ) {
            echo "<h3>{$section['title']}</h3>\n";
            echo '<div class="inside">';
            call_user_func( $section[ 'callback' ], $section );
            if ( !isset( $wp_settings_fields ) || !isset( $wp_settings_fields[ $page ] ) || !isset( $wp_settings_fields[ $page ][ $section[ 'id' ] ] ) )
                continue;
            echo '<table class="form-table">';
            do_settings_fields( $page, $section[ 'id' ] );
            echo '</table>';
            echo '</div>';
        }
    }
    
}

// Instantiate class
$_wpseed = new _WPSEED();