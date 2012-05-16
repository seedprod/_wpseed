<?php
/**
 * Config
 *
 * @package WordPress
 * @subpackage _wpseed
 * @since 0.1.0
 */

/**
 * Config
 */

/**
 * Create new menus
 * Required: type => "add_options_page|"
 */
$_wpseed->options[] = array("type" =>  "menu",
				"menu_type" => "add_options_page",
	            "page_name" => __("WPSeed", '_wpseed'),
	            "menu_slug" => "wpseed",
	            "layout" => "2-col"
                );

/**
 * Tabs are optional
 */
$_wpseed->options[] = array("type" => "tab",
	            "id" => "wpseed_tab_1",
				"label" => __("Settings", '_wpseed'),	
				);
                       
/**
 * Settings for tab
 * Create 'validate_function' if using custom validation function.
 */
$_wpseed->options[] = array( "type" => "setting",
                "id" => "wpseed_settings_1",
				);
				
/**
 * Create unique id, label, create 'desc_callback' if you need custom description.
 */
$_wpseed->options[] = array( "type" => "section",
                "id" => "wpseed_section_1",
				"label" => __("Section 1", '_wpseed'),	
				);

/**
 * Choose type, id, label, attach to a section and setting id.
 * Create 'callback' function if you are creating a custom field.
 * Optional desc, default_value, class, option_values, validate
 * Types upload, textbox, select, textarea, radio, checkbox, color
 */


$_wpseed->options[] = array( "type" => "checkbox",
                "id" => "checkbox_field_type",
				"label" => __("Checkbox", '_wpseed'),
				"desc" => __("This is a checkbox field type.","_wpseed"),
                "option_values" => array('0'=>__('Yes', '_wpseed'),'2'=>__('No', '_wpseed')),
				);

$_wpseed->options[] = array( "type" => "upload",
                "id" => "upload_field_type",
				"label" => __("Upload", '_wpseed'),
				"desc" => __("Upload field type.", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "textbox_field_type",
				"label" => __("Textbox", '_wpseed'),
				"desc" => __("Textbox field type.", '_wpseed'),
				"validate" => "required",
				);

$_wpseed->options[] = array( "type" => "wpeditor",
                "id" => "wpeditor_field_type",
				"label" => __("WPEditor", '_wpseed'),
				"desc" => __("WPEditor field type", '_wpseed'),
				"class" => "large-text",
				);


$_wpseed->options[] = array( "type" => "textarea",
                "id" => "textarea_field_type",
				"label" => __("Textarea", '_wpseed'),
				"desc" => __("Textarea field type.", '_wpseed'),
				"class" => "large-text",
				);	

// Section 2
$_wpseed->options[] = array( "type" => "section",
                "id" => "wpseed_section_2",
				"label" => __("Section 2", '_wpseed'),	
				);
				
$_wpseed->options[] = array( "type" => "color",
                "id" => "color_field_type",
				"label" => __("Color", '_wpseed'),
				"default_value" => "#ffffff",
				"validate" => 'color',
				"desc" => __("Color field type and color validation", '_wpseed'),
				);
				
$_wpseed->options[] = array( "type" => "upload",
                "id" => "upload_field_type_2",
				"label" => __("Upload", '_wpseed'),
				"desc" => __('Upload field type.', '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "radio",
                "id" => "radio_field_type",
				"label" => __("Radio", '_wpseed'),
				"option_values" => array('black'=>__('Black', '_wpseed'),'gray'=>__('Gray', '_wpseed'),'white'=>__('White', '_wpseed')),
				"desc" => __("", '_wpseed'),
				"default_value" => "gray",
				);

$_wpseed->options[] = array( "type" => "select",
                "id" => "select_field_type",
				"label" => __("Select", '_wpseed'),
				"default_value" => "bottom-center",
				"option_values" => array("bottom-left"=>"Bottom Left","bottom-center"=>"Bottom Center","bottom-right"=>"Bottom Right"),
				);
				
	
/**
 * Tab 2
 * 
 */					
$_wpseed->options[] = array( "type" => "tab",
                "id" => "wpseed_tab_2",
				"label" => __("Social Profiles", '_wpseed'),
				);	
			
/**
 * Settings 2
 * 
 */			
$_wpseed->options[] = array( "type" => "setting",
                "id" => "wpseed_settings_2",
				);
			
/**
 * Section 4
 * 
 */
$_wpseed->options[] = array( "type" => "section",
                "id" => "wpseed_section_4",
				"label" => __("Section 4", '_wpseed'),	
				"desc_callback" => '_wpseed_section_example_callback',
				);

/**
 * Fields for section 4
 * 
 */				
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "textbox_field_type_2",
				"label" => __("Textbox", '_wpseed'),
				"desc" => __("Textbox field type.", '_wpseed'),
				);
				
$_wpseed->options[] = array( "type" => "radio",
                "id" => "select_field_type_2",
				"label" => __("Radio", '_wpseed'),
				"option_values" => array('0'=>__('Small', '_wpseed'),'1'=>__('Big', '_wpseed')),
				"default_value" => "1",
				);



function _wpseed_section_example_callback(){
	echo '<p>This is a sample section description callback.</p>';
}