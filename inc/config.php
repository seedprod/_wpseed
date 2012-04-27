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

$_wpseed->menus[] = array(
                        "type" => "add_options_page",
                        "page_name" => __("Coming Soon", 'ultimate-coming-soon-page'),
                        "menu_name" => __("Coming Soon", 'ultimate-coming-soon-page'),
                        "capability" => "manage_options",
                        "menu_slug" => "seedprod_coming_soon",
                        "callback" => array($_wpseed,'option_page'),
                        "icon_url" => plugins_url('framework/seedprod-icon-16x16.png',dirname(__FILE__)),
                    );

$_wpseed->options[] = array( "type" => "tab",
                "id" => "seedprod_section_coming_soon_tab",
				"label" => __("Settings", 'ultimate-coming-soon-page'),	
				"menu_slug" => "seedprod_coming_soon");
                       
/**
 *  Do not replace validate_function. Create unique id and copy menu slug 
 * from menu config. Create 'validate_function' if using custom validation.
 */
$_wpseed->options[] = array( "type" => "setting",
                "id" => "seedprod_comingsoon_options",
				"menu_slug" => "seedprod_coming_soon"
				);
				

/**
 * Create unique id,label, create 'desc_callback' if you need custom description, attach
 * to a menu_slug from menu config.
 */
$_wpseed->options[] = array( "type" => "section",
                "id" => "seedprod_section_coming_soon",
				"label" => __("Settings", 'ultimate-coming-soon-page'),	
				"menu_slug" => "seedprod_coming_soon");


/**
 * Choose type, id, label, attache to a section and setting id.
 * Create 'callback' function if you are creating a custom field.
 * Optional desc, default value, class, option_values, pattern
 * Types image,textbox,select,textarea,radio,checkbox,color,custom
 */
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "seedprod_api_key",
				"label" => __("SeedProd API Key", 'ultimate-coming-soon-page'),
				"desc" => __("Enter your SeedProd API Key to receive automatic updates. The plugin will function with or without the API key.", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);
$_wpseed->options[] = array( "type" => "checkbox",
                "id" => "comingsoon_enabled",
				"label" => __("Enable", 'ultimate-coming-soon-page'),
				"desc" => sprintf(__("Enable if you want to display a coming soon page to visitors. Users who are logged in will not see the coming soon page, this means you.  <a href='%s/?cs_preview=true'>Preview</a>", 'ultimate-coming-soon-page'),home_url()),
                "option_values" => array('1'=>__('Yes', 'ultimate-coming-soon-page')),
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);
$_wpseed->options[] = array( "type" => "image",
                "id" => "comingsoon_image",
				"label" => __("Image", 'ultimate-coming-soon-page'),
				"desc" => __("Upload a logo or teaser image (or) enter the url to your image.", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_headline",
				"label" => __("Headline", 'ultimate-coming-soon-page'),
				"desc" => __("Write a headline for your coming soon page. Tip: Avoid using 'Coming Soon'.", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);
$_wpseed->options[] = array( "type" => "textarea",
                "id" => "comingsoon_description",
				"label" => __("Description", 'ultimate-coming-soon-page'),
				"desc" => __("Tell the visitor what to expect from your site.", 'ultimate-coming-soon-page'),
				"class" => "large-text",
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);	
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "action_button_text",
				"label" => __("Sign Up Button Text", 'ultimate-coming-soon-page'),
				//"desc" => __("Write a headline for your coming soon page. Tip: Avoid using 'Coming Soon'.", 'ultimate-coming-soon-page'),
				"default_value" => 'Notify Me!',
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_mailchimp_api_key",
				"label" => __("MailChimp API Key", 'ultimate-coming-soon-page'),
				"desc" => __("Enter your API Key. <a href='http://admin.mailchimp.com/account/api-key-popup'>Get your API key</a>", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_feedburner_address",
				"label" => __("FeedBurn Address", 'ultimate-coming-soon-page'),
				"desc" => __("Enter the part after http://feeds2.feedburner.com/", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);
$_wpseed->options[] = array( "type" => "custom",
                "id" => "comingsoon_mailinglist",
                "label" => __("Mailing List", 'ultimate-coming-soon-page'),
                "callback" => array($_wpseed,'callback_mailinglist_field'),
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);	
$_wpseed->options[] = array( "type" => "custom",
                "id" => "comingsoon_database_field",
                "callback" => array($_wpseed,'callback_database_field'),
				"label" => __("Database Mailing List Options", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);
$_wpseed->options[] = array( "type" => "textarea",
                "id" => "comingsoon_customhtml",
				"label" => __("Custom HTML", 'ultimate-coming-soon-page'),
				"desc" => __("Enter any custom html or javascript that you want outputted. Supports WordPress Shortcodes.", 'ultimate-coming-soon-page'),
				"class" => "large-text",
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);	
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "exclude_pattern",
				"label" => __("Exclude URL Pattern", 'ultimate-coming-soon-page'),
				"desc" => __("Optional: Advanced users can enter a regex pattern to exclude certain urls from showing the 'Coming Soon' template. For example enter 'blog' will exclude the url: http://example.org/blog/.", 'ultimate-coming-soon-page'),
				"class" => "large-text",
				"section_id" => "seedprod_section_coming_soon",
				"setting_id" => "seedprod_comingsoon_options",
				);
$_wpseed->options[] = array( "type" => "textarea",
                "id" => "analytics_code",
                "label" => __( "Google Analytics Code" , 'seedprod'),
                "class" => "large-text",
                "desc" => __( "Paste in your <a href='http://www.google.com/analytics/'>Google Analytics</a> code." , 'seedprod'),
                "section_id" => "seedprod_section_coming_soon",
                "setting_id" => "seedprod_comingsoon_options",
                );
$_wpseed->options[] = array( "type" => "section",
                "id" => "seedprod_section_style",
				"label" => __("Style", 'ultimate-coming-soon-page'),	
				"menu_slug" => "seedprod_coming_soon");
				
$_wpseed->options[] = array( "type" => "color",
                "id" => "comingsoon_custom_bg_color",
				"label" => __("Background Color", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_style",
				"setting_id" => "seedprod_comingsoon_options",
				"default_value" => "#ffffff",
				);
				
$_wpseed->options[] = array( "type" => "image",
                "id" => "comingsoon_custom_bg_image",
				"label" => __("Background Image", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_style",
				"setting_id" => "seedprod_comingsoon_options",
				"desc" => __('Upload an optional background image (or) enter the url to your image. This will override the color above if set.', 'ultimate-coming-soon-page'),
				);

$_wpseed->options[] = array( "type" => "radio",
                "id" => "comingsoon_font_color",
				"label" => __("Font Color", 'ultimate-coming-soon-page'),
				"option_values" => array('black'=>__('Black', 'ultimate-coming-soon-page'),'gray'=>__('Gray', 'ultimate-coming-soon-page'),'white'=>__('White', 'ultimate-coming-soon-page')),
				"desc" => __("", 'ultimate-coming-soon-page'),
				"default_value" => "black",
				"section_id" => "seedprod_section_style",
				"setting_id" => "seedprod_comingsoon_options",
				);
				
$_wpseed->options[] = array( "type" => "color",
                "id" => "action_button_color",
				"label" => __("Sign Up Button Color", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_style",
				"setting_id" => "seedprod_comingsoon_options",
				"default_value" => "#fff",
				);
				
$_wpseed->options[] = array( "type" => "select",
                "id" => "comingsoon_headline_font",
				"label" => __("Headline Font", 'ultimate-coming-soon-page'),
				//"option_values" => $_wpseed->font_field_list(),
				"section_id" => "seedprod_section_style",
				"setting_id" => "seedprod_comingsoon_options",
				"desc" => __('View <a href="http://www.ampsoft.net/webdesign-l/WindowsMacFonts.html">System Fonts</a> - View <a href="http://www.google.com/webfonts">Google Fonts</a>', 'ultimate-coming-soon-page'),
				);
$_wpseed->options[] = array( "type" => "select",
                "id" => "comingsoon_body_font",
				"label" => __("Body Font", 'ultimate-coming-soon-page'),
				//"option_values" => $_wpseed->font_field_list(),
				"default_value" => "_impact",
				"section_id" => "seedprod_section_style",
				"setting_id" => "seedprod_comingsoon_options",
				"desc" => __('View <a href="http://www.ampsoft.net/webdesign-l/WindowsMacFonts.html">System Fonts</a> - View <a href="http://www.google.com/webfonts">Google Fonts</a>', 'ultimate-coming-soon-page'),
				);
				
$_wpseed->options[] = array( "type" => "textarea",
                "id" => "comingsoon_custom_css",
				"label" => __("Custom CSS", 'ultimate-coming-soon-page'),
				"desc" => "",
				"class" => "large-text",
				"section_id" => "seedprod_section_style",
				"setting_id" => "seedprod_comingsoon_options",
				"desc" => __('Need to tweaks the styles? Add your custom CSS here.', 'ultimate-coming-soon-page'),
				);
				
$_wpseed->options[] = array( "type" => "image",
                "id" => "comingsoon_custom_footer_credit",
				"label" => __("Powered By", 'ultimate-coming-soon-page'),
				"desc" => __("Upload your custom footer credit logo. Optimal Max Height 30px", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_style",
				"setting_id" => "seedprod_comingsoon_options",
				);
				
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_custom_footer_credit_url",
				"label" => __("Powered By URL", 'ultimate-coming-soon-page'),
				"desc" => __("Enter your URL. Example: http://seedprod.com", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_style",
				"setting_id" => "seedprod_comingsoon_options",
				);	
							
$_wpseed->options[] = array( "type" => "section",
                "id" => "seedprod_section_incentive",
				"label" => __("SignUp Incentive and Twitter Button", 'ultimate-coming-soon-page'),	
				"menu_slug" => "seedprod_coming_soon",
				"desc_callback" => 'section_incentive',
				);
				
$_wpseed->options[] = array( "type" => "textarea",
                "id" => "comingsoon_incentive_text",
				"label" => __("Incentive Text", 'ultimate-coming-soon-page'),
				"class" => "large-text",
				"section_id" => "seedprod_section_incentive",
				"setting_id" => "seedprod_comingsoon_options",
				"desc" => __("Enter instructions for a download or offer users a coupon code.", 'ultimate-coming-soon-page'),
				);
				
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_incentive_link",
				"label" => __("Incentive Link", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_incentive",
				"setting_id" => "seedprod_comingsoon_options",
				"desc" => __("Enter a download link or a link to another url.", 'ultimate-coming-soon-page'),
				);
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_incentive_link_text",
				"label" => __("Incentive Link Text", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_incentive",
				"setting_id" => "seedprod_comingsoon_options",
				"desc" => __("Enter some text for the link. Example: Download Now", 'ultimate-coming-soon-page'),
				);
				
$_wpseed->options[] = array( "type" => "radio",
                "id" => "comingsoon_display_twitter_btn",
				"label" => __("Display Twitter Button", 'ultimate-coming-soon-page'),
				"option_values" => array('0'=>__('No', 'ultimate-coming-soon-page'),'1'=>__('Yes', 'ultimate-coming-soon-page')),
				"default_value" => "0",
				"section_id" => "seedprod_section_incentive",
				"setting_id" => "seedprod_comingsoon_options",
				);
				
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_twitter_btn_text",
				"label" => __("Twitter Button Text", 'ultimate-coming-soon-page'),
				"desc" => __("Enter some text to entice your visitor to tweet about your site. Example: Show some love and help spread the word.", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_incentive",
				"setting_id" => "seedprod_comingsoon_options",
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_twitter_btn_tweet_text",
				"label" => __("Tweet Text", 'ultimate-coming-soon-page'),
				"desc" => __("This is the text that will be included in the tweet.", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_incentive",
				"setting_id" => "seedprod_comingsoon_options",
				);

$_wpseed->options[] = array( "type" => "textbox",
                "id" => "comingsoon_twitter_btn_tweet_via",
				"label" => __("Tweet Via", 'ultimate-coming-soon-page'),
				"desc" => __("Enter your Twitter username.", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_incentive",
				"setting_id" => "seedprod_comingsoon_options",
				);
				
				
				
$_wpseed->options[] = array( "type" => "tab",
                "id" => "seedprod_section_coming_soon_tab_2",
				"label" => __("Social Profiles", 'ultimate-coming-soon-page'),	
				"menu_slug" => "seedprod_coming_soon");
				
$_wpseed->options[] = array( "type" => "setting",
                "id" => "seedprod_comingsoon_options_2",
				"menu_slug" => "seedprod_coming_soon"
				);
$_wpseed->options[] = array( "type" => "section",
               "id" => "seedprod_section_social_profile_settings",
			"label" => __("Settings", 'ultimate-coming-soon-page'),	
			"menu_slug" => "seedprod_coming_soon");
			

/**
 * Create unique id,label, create 'desc_callback' if you need custom description, attach
 * to a menu_slug from menu config.
 */
$_wpseed->options[] = array( "type" => "section",
                "id" => "seedprod_section_coming_soon_2",
				"label" => __("Profiles", 'ultimate-coming-soon-page'),	
				"menu_slug" => "seedprod_coming_soon",
				"desc_callback" => 'section_social',
				);
				
$_wpseed->options[] = array( "type" => "select",
                "id" => "social_position",
				"label" => __("Icon Positions", 'ultimate-coming-soon-page'),
				"default_value" => "bottom-center",
				"option_values" => array("bottom-left"=>"Bottom Left","bottom-center"=>"Bottom Center","bottom-right"=>"Bottom Right"),
				"section_id" => "seedprod_section_social_profile_settings",
				"setting_id" => "seedprod_comingsoon_options_2",
				);
				
$_wpseed->options[] = array( "type" => "radio",
                "id" => "social_icon_size",
				"label" => __("Icon Size", 'ultimate-coming-soon-page'),
				"option_values" => array('0'=>__('Small', 'ultimate-coming-soon-page'),'1'=>__('Big', 'ultimate-coming-soon-page')),
				"default_value" => "0",
				"section_id" => "seedprod_section_social_profile_settings",
				"setting_id" => "seedprod_comingsoon_options_2",
				);


/**
 * Choose type, id, label, attach to a section and setting id.
 * Create 'callback' function if you are creating a custom field.
 * Optional desc, default value, class, option_values, pattern
 * Types image,textbox,select,textarea,radio,checkbox,color,custom
 */
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "twitter_url",
				"label" => __("Twitter Profile URL", 'ultimate-coming-soon-page'),
				"desc" => __("Example: http://twitter.com/johnturner", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_coming_soon_2",
				"setting_id" => "seedprod_comingsoon_options_2",
				);
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "facebook_url",
				"label" => __("Facebook Profile URL", 'ultimate-coming-soon-page'),
				"desc" => __("Example: https://www.facebook.com/johndturner", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_coming_soon_2",
				"setting_id" => "seedprod_comingsoon_options_2",
				);
$_wpseed->options[] = array( "type" => "textbox",
                "id" => "google_plus_url",
				"label" => __("Google+ Profile URL", 'ultimate-coming-soon-page'),
				"desc" => __("Example: https://plus.google.com/115043334043918724013/", 'ultimate-coming-soon-page'),
				"section_id" => "seedprod_section_coming_soon_2",
				"setting_id" => "seedprod_comingsoon_options_2",
				);