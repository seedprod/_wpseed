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
$_wpseed->menus[] = array("type" => "add_options_page",
	            "page_name" => __("WPSeed", '_wpseed'),
	            "menu_slug" => "wpseed"
                );

/**
 * Tabs are optional
 */
$_wpseed->options[] = array("type" => "tab",
	            "id" => "wpseed_tab_1",
				"label" => __("Settings", '_wpseed'),	
				"menu_slug" => "wpseed"
				);
                       
/**
 * Create unique id and copy menu slug 
 * from menu config. Create 'validate_function' if using custom validation.
 */
$_wpseed->options[] = array( "type" => "setting",
                "id" => "wpseed_settings_1",
				"menu_slug" => "wpseed"
				);
				
/**
 * Create unique id, label, create 'desc_callback' if you need custom description, attach
 * to a menu_slug from menu config.
 */
$_wpseed->options[] = array( "type" => "section",
                "id" => "wpseed_section_1",
				"label" => __("Settings", '_wpseed'),	
				"menu_slug" => "wpseed"
				);

/**
 * Choose type, id, label, attach to a section and setting id.
 * Create 'callback' function if you are creating a custom field.
 * Optional desc, default_value, class, option_values, validate
 * Types upload, textbox, select, textarea, radio, checkbox, color
 */


$_wpseed->options[] = array( "type" => "checkbox",
                "id" => "comingsoon_enabled",
				"label" => __("Enable", '_wpseed'),
				"desc" => sprintf(__("Enable if you want to display a coming soon page to visitors. Users who are logged in will not see the coming soon page, this means you.  <a href='%s/?cs_preview=true'>Preview</a>", '_wpseed'),home_url()),
                "option_values" => array('1'=>__('Yes', '_wpseed')),
				);

$_wpseed->options[] = array( "type" => "upload",
                "id" => "comingsoon_image",
				"label" => __("Image", '_wpseed'),
				"desc" => __("Upload a logo or teaser image (or) enter the url to your image.", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_headline",
				"label" => __("Headline", '_wpseed'),
				"desc" => __("Write a headline for your coming soon page. Tip: Avoid using 'Coming Soon'.", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "wpeditor",
                "id" => "comingsoon_description",
				"label" => __("Description", '_wpseed'),
				"desc" => __("Tell the visitor what to expect from your site.", '_wpseed'),
				"class" => "large-text",
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "action_button_text",
				"label" => __("Sign Up Button Text", '_wpseed'),
				"default_value" => __("Notify Me", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_mailchimp_api_key",
				"label" => __("MailChimp API Key", '_wpseed'),
				"desc" => __("Enter your API Key. <a href='http://admin.mailchimp.com/account/api-key-popup'>Get your API key</a>", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_feedburner_address",
				"label" => __("FeedBurn Address", '_wpseed'),
				"desc" => __("Enter the part after http://feeds2.feedburner.com/", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "textarea",
                "id" => "comingsoon_customhtml",
				"label" => __("Custom HTML", '_wpseed'),
				"desc" => __("Enter any custom html or javascript that you want outputted. Supports WordPress Shortcodes.", '_wpseed'),
				"class" => "large-text",
				);	

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "exclude_pattern",
				"label" => __("Exclude URL Pattern", '_wpseed'),
				"desc" => __("Optional: Advanced users can enter a regex pattern to exclude certain urls from showing the 'Coming Soon' template. For example enter 'blog' will exclude the url: http://example.org/blog/.", '_wpseed'),
				"class" => "large-text",
				);

$_wpseed->options[] = array( "type" => "textarea",
                "id" => "analytics_code",
                "label" => __( "Google Analytics Code" , 'seedprod'),
                "class" => "large-text",
                "desc" => __( "Paste in your <a href='http://www.google.com/analytics/'>Google Analytics</a> code." , 'seedprod'),
                );

$_wpseed->options[] = array( "type" => "section",
                "id" => "wpseed_section_2",
				"label" => __("Style", '_wpseed'),	
				"menu_slug" => "wpseed");
				
$_wpseed->options[] = array( "type" => "color",
                "id" => "comingsoon_custom_bg_color",
				"label" => __("Background Color", '_wpseed'),
				"default_value" => "#ffffff",
				"validate" => 'color',
				);
				
$_wpseed->options[] = array( "type" => "upload",
                "id" => "comingsoon_custom_bg_image",
				"label" => __("Background Image", '_wpseed'),
				"desc" => __('Upload an optional background image (or) enter the url to your image. This will override the color above if set.', '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "radio",
                "id" => "comingsoon_font_color",
				"label" => __("Font Color", '_wpseed'),
				"option_values" => array('black'=>__('Black', '_wpseed'),'gray'=>__('Gray', '_wpseed'),'white'=>__('White', '_wpseed')),
				"desc" => __("", '_wpseed'),
				"default_value" => "black",
				);
				
$_wpseed->options[] = array( "type" => "color",
                "id" => "action_button_color",
				"label" => __("Sign Up Button Color", '_wpseed'),
				"default_value" => "#fff",
				);
				
$_wpseed->options[] = array( "type" => "select",
                "id" => "comingsoon_headline_font",
				"label" => __("Headline Font", '_wpseed'),
				"option_values" => array('Arial','Times'),
				"desc" => __('View <a href="http://www.ampsoft.net/webdesign-l/WindowsMacFonts.html">System Fonts</a> - View <a href="http://www.google.com/webfonts">Google Fonts</a>', '_wpseed'),
				);
$_wpseed->options[] = array( "type" => "select",
                "id" => "comingsoon_body_font",
				"label" => __("Body Font", '_wpseed'),
				"desc" => __('View <a href="http://www.ampsoft.net/webdesign-l/WindowsMacFonts.html">System Fonts</a> - View <a href="http://www.google.com/webfonts">Google Fonts</a>', '_wpseed'),
				);
				
$_wpseed->options[] = array( "type" => "textarea",
                "id" => "comingsoon_custom_css",
				"label" => __("Custom CSS", '_wpseed'),
				"desc" => "",
				"class" => "large-text",
				"desc" => __('Need to tweaks the styles? Add your custom CSS here.', '_wpseed'),
				);
				
$_wpseed->options[] = array( "type" => "upload",
                "id" => "comingsoon_custom_footer_credit",
				"label" => __("Powered By", '_wpseed'),
				"desc" => __("Upload your custom footer credit logo. Optimal Max Height 30px", '_wpseed'),
				);
				
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_custom_footer_credit_url",
				"label" => __("Powered By URL", '_wpseed'),
				"desc" => __("Enter your URL. Example: http://seedprod.com", '_wpseed'),
				);	
							
$_wpseed->options[] = array( "type" => "section",
                "id" => "wpseed_section_3",
				"label" => __("SignUp Incentive and Twitter Button", '_wpseed'),	
				"menu_slug" => "wpseed",
				//"desc_callback" => 'section_incentive',
				);
				
$_wpseed->options[] = array( "type" => "textarea",
                "id" => "comingsoon_incentive_text",
				"label" => __("Incentive Text", '_wpseed'),
				"class" => "large-text",
				"desc" => __("Enter instructions for a download or offer users a coupon code.", '_wpseed'),
				);
				
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_incentive_link",
				"label" => __("Incentive Link", '_wpseed'),
				"desc" => __("Enter a download link or a link to another url.", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_incentive_link_text",
				"label" => __("Incentive Link Text", '_wpseed'),
				"desc" => __("Enter some text for the link. Example: Download Now", '_wpseed'),
				);
				
$_wpseed->options[] = array( "type" => "radio",
                "id" => "comingsoon_display_twitter_btn",
				"label" => __("Display Twitter Button", '_wpseed'),
				"option_values" => array('0'=>__('No', '_wpseed'),'1'=>__('Yes', '_wpseed')),
				"default_value" => "0",
				);
				
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_twitter_btn_text",
				"label" => __("Twitter Button Text", '_wpseed'),
				"desc" => __("Enter some text to entice your visitor to tweet about your site. Example: Show some love and help spread the word.", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_twitter_btn_tweet_text",
				"label" => __("Tweet Text", '_wpseed'),
				"desc" => __("This is the text that will be included in the tweet.", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_twitter_btn_tweet_via",
				"label" => __("Tweet Via", '_wpseed'),
				"desc" => __("Enter your Twitter username.", '_wpseed'),
				);
							
/**
 * New Tab
 * 
 */					
$_wpseed->options[] = array( "type" => "tab",
                "id" => "wpseed_tab_2",
				"label" => __("Social Profiles", '_wpseed'),	
				"menu_slug" => "wpseed");
			
/**
 * New Setting
 * 
 */			
$_wpseed->options[] = array( "type" => "setting",
                "id" => "wpseed_settings_2",
				"menu_slug" => "wpseed"
				);
			
/**
 * New Section
 * 
 */
$_wpseed->options[] = array( "type" => "section",
                "id" => "wpseed_section_4",
				"label" => __("Profiles", '_wpseed'),	
				"menu_slug" => "wpseed",
				"desc_callback" => 'section_social',
				);

/**
 * New Fields
 * 
 */				
$_wpseed->options[] = array( "type" => "select",
                "id" => "social_position",
				"label" => __("Icon Positions", '_wpseed'),
				"default_value" => "bottom-center",
				"option_values" => array("bottom-left"=>"Bottom Left","bottom-center"=>"Bottom Center","bottom-right"=>"Bottom Right"),
				);
				
$_wpseed->options[] = array( "type" => "radio",
                "id" => "social_icon_size",
				"label" => __("Icon Size", '_wpseed'),
				"option_values" => array('0'=>__('Small', '_wpseed'),'1'=>__('Big', '_wpseed')),
				"default_value" => "0",
				);

$_wpseed->options[] = array( "type" => "section",
                "id" => "wpseed_section_5",
				"label" => __("Profiles", '_wpseed'),	
				"menu_slug" => "seedprod_coming_soon",
				"desc_callback" => 'section_social',
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "twitter_url",
				"label" => __("Twitter Profile URL", '_wpseed'),
				"desc" => __("Example: http://twitter.com/johnturner", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "facebook_url",
				"label" => __("Facebook Profile URL", '_wpseed'),
				"desc" => __("Example: https://www.facebook.com/johndturner", '_wpseed'),

				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "google_plus_url",
				"label" => __("Google+ Profile URL", '_wpseed'),
				"desc" => __("Example: https://plus.google.com/115043334043918724013/", '_wpseed'),
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "seedprod_api_key",
				"label" => __("SeedProd API Key", '_wpseed'),
				"desc" => __("Enter your SeedProd API Key to receive automatic updates. The plugin will function with or without the API key.", '_wpseed'),
				"validate" => 'number',
				"default_value" => "5653466",
				);