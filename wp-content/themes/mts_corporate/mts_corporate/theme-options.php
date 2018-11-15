<?php

defined('ABSPATH') or die;

/*
 *
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 *
 */
require_once( dirname( __FILE__ ) . '/options/options.php' );
/*
 *
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){

	//$sections = array();
	$sections[] = array(
				'title' => __('A Section added by hook', 'mythemeshop'),
				'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'mythemeshop'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);

	return $sections;

}//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');


/*
 *
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){

	//$args['dev_mode'] = false;

	return $args;

}//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');

/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = false;
//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;

//Add HTML before the form
//$args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'mythemeshop');

//Setup custom links in the footer for share icons
$args['share_icons']['twitter'] = array(
										'link' => 'http://twitter.com/mythemeshopteam',
										'title' => 'Follow Us on Twitter',
										'img' => 'fa fa-twitter-square'
										);
$args['share_icons']['facebook'] = array(
										'link' => 'http://www.facebook.com/mythemeshop',
										'title' => 'Like us on Facebook',
										'img' => 'fa fa-facebook-square'
										);

//Choose to disable the import/export feature
//$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = MTS_THEME_NAME;

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Theme Options', 'mythemeshop');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('Theme Options', 'mythemeshop');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'theme_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 62;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-1',
							'title' => __('Support', 'mythemeshop'),
							'content' => __('<p>If you are facing any problem with our theme or theme option panel, head over to our <a href="http://mythemeshop.com/support">Knowledge Base</a></p>', 'mythemeshop')
							);
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-3',
							'title' => __('Credit', 'mythemeshop'),
							'content' => __('<p>Options Panel created using the <a href="http://leemason.github.com/NHP-Theme-Options-Framework/" target="_blank">NHP Theme Options Framework</a> Version 1.0.5</p>', 'mythemeshop')
							);
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-2',
							'title' => __('Earn Money', 'mythemeshop'),
							'content' => __('<p>Earn 70% commision on every sale by refering your friends and readers. Join our <a href="http://mythemeshop.com/affiliate-program/">Affiliate Program</a>.</p>', 'mythemeshop')
							);

//Set the Help Sidebar for the options page - no sidebar by default
//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'mythemeshop');

$mts_patterns = array(
	'nobg' => array('img' => NHP_OPTIONS_URL.'img/patterns/nobg.png'),
	'pattern0' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern0.png'),
	'pattern1' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern1.png'),
	'pattern2' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern2.png'),
	'pattern3' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern3.png'),
	'pattern4' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern4.png'),
	'pattern5' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern5.png'),
	'pattern6' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern6.png'),
	'pattern7' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern7.png'),
	'pattern8' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern8.png'),
	'pattern9' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern9.png'),
	'pattern10' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern10.png'),
	'pattern11' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern11.png'),
	'pattern12' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern12.png'),
	'pattern13' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern13.png'),
	'pattern14' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern14.png'),
	'pattern15' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern15.png'),
	'pattern16' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern16.png'),
	'pattern17' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern17.png'),
	'pattern18' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern18.png'),
	'pattern19' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern19.png'),
	'pattern20' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern20.png'),
	'pattern21' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern21.png'),
	'pattern22' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern22.png'),
	'pattern23' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern23.png'),
	'pattern24' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern24.png'),
	'pattern25' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern25.png'),
	'pattern26' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern26.png'),
	'pattern27' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern27.png'),
	'pattern28' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern28.png'),
	'pattern29' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern29.png'),
	'pattern30' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern30.png'),
	'pattern31' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern31.png'),
	'pattern32' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern32.png'),
	'pattern33' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern33.png'),
	'pattern34' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern34.png'),
	'pattern35' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern35.png'),
	'pattern36' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern36.png'),
	'pattern37' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern37.png'),
	'hbg' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg.png'),
	'hbg2' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg2.png'),
	'hbg3' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg3.png'),
	'hbg4' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg4.png'),
	'hbg5' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg5.png'),
	'hbg6' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg6.png'),
	'hbg7' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg7.png'),
	'hbg8' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg8.png'),
	'hbg9' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg9.png'),
	'hbg10' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg10.png'),
	'hbg11' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg11.png'),
	'hbg12' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg12.png'),
	'hbg13' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg13.png'),
	'hbg14' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg14.png'),
	'hbg15' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg15.png'),
	'hbg16' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg16.png'),
	'hbg17' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg17.png'),
	'hbg18' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg18.png'),
	'hbg19' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg19.png'),
	'hbg20' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg20.png'),
	'hbg21' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg21.png'),
	'hbg22' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg22.png'),
	'hbg23' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg23.png'),
	'hbg24' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg24.png'),
	'hbg25' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg25.png')
);

$sections = array();

// General Settings
$sections[] = array(
				'icon' => 'fa fa-cogs',
				'title' => __('General Settings', 'mythemeshop'),
				'desc' => __('<p class="description">This tab contains common setting options which will be applied to the whole theme.</p>', 'mythemeshop'),
				'fields' => array(

					array(
						'id' => 'mts_logo',
						'type' => 'upload',
						'title' => __('Logo Image', 'mythemeshop'),
						'sub_desc' => __('Upload your logo using the Upload Button or insert image URL.', 'mythemeshop')
						),
					array(
						'id' => 'mts_favicon',
						'type' => 'upload',
						'title' => __('Favicon', 'mythemeshop'),
						'sub_desc' => __('Upload a <strong>16 x 16 px</strong> image that will represent your website\'s favicon. You can refer to this link for more information on how to make it: <a href="http://www.favicon.cc/" target="blank" rel="nofollow">http://www.favicon.cc/</a>', 'mythemeshop')
						),
					array(
						'id' => 'mts_twitter_username',
						'type' => 'text',
						'title' => __('Twitter Username', 'mythemeshop'),
						'sub_desc' => __('Enter your Username here.', 'mythemeshop'),
						),
					array(
						'id' => 'mts_feedburner',
						'type' => 'text',
						'title' => __('FeedBurner URL', 'mythemeshop'),
						'sub_desc' => __('Enter your FeedBurner\'s URL here, ex: <strong>http://feeds.feedburner.com/mythemeshop</strong> and your main feed (http://example.com/feed) will get redirected to the FeedBurner ID entered here.)', 'mythemeshop'),
						'validate' => 'url'
						),
					array(
						'id' => 'mts_header_code',
						'type' => 'textarea',
						'title' => __('Header Code', 'mythemeshop'),
						'sub_desc' => __('Enter the code which you need to place <strong>before closing </head> tag</strong>. (ex: Google Webmaster Tools verification, Bing Webmaster Center, BuySellAds Script, Alexa verification etc.)', 'mythemeshop')
						),
					array(
						'id' => 'mts_analytics_code',
						'type' => 'textarea',
						'title' => __('Footer Code', 'mythemeshop'),
						'sub_desc' => __('Enter the codes which you need to place in your footer. <strong>(ex: Google Analytics, Clicky, STATCOUNTER, Woopra, Histats, etc.)</strong>.', 'mythemeshop')
						),
					array(
						'id' => 'mts_copyrights',
						'type' => 'textarea',
						'title' => __('Copyrights Text', 'mythemeshop'),
						'sub_desc' => __('You can change or remove our link from footer and use your own custom text. (Link back is always appreciated)', 'mythemeshop'),
						'std' => 'Theme by <a href="http://mythemeshop.com/" rel="nofollow">MyThemeShop</a>'
						),
                    array(
                        'id' => 'mts_ajax_search',
                        'type' => 'button_set',
                        'title' => __('AJAX Quick search', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Enable or disable search results appearing instantly below the search form', 'mythemeshop'),
						'std' => '0'
                        ),
					array(
						'id' => 'mts_responsive',
						'type' => 'button_set',
						'title' => __('Responsiveness', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('MyThemeShop themes are responsive, which means they adapt to tablet and mobile devices, ensuring that your content is always displayed beautifully no matter what device visitors are using. Enable or disable responsiveness using this option.', 'mythemeshop'),
						'std' => '1'
						),
					array(
						'id' => 'mts_prefetching',
						'type' => 'button_set',
						'title' => __('Prefetching', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Enable or disable prefetching. If user is on homepage, then single page will load faster and if user is on single page, homepage will load faster in modern browsers.', 'mythemeshop'),
						'std' => '0'
						),

					)

				);


// Styling Options
$sections[] = array(
				'icon' => 'fa fa-adjust',
				'title' => __('Styling Options', 'mythemeshop'),
				'desc' => __('<p class="description">Control the visual appearance of your theme, such as colors, layout and patterns, from here.</p>', 'mythemeshop'),
				'fields' => array(
					array(
						'id' => 'mts_color_scheme',
						'type' => 'color',
						'title' => __('Color Scheme', 'mythemeshop'),
						'sub_desc' => __('The theme comes with unlimited color schemes for your theme\'s styling.', 'mythemeshop'),
						'std' => '#3498db'
						),
					array(
						'id' => 'mts_header_bg',
						'type' => 'color',
						'title' => __('Header Background', 'mythemeshop'),
						'sub_desc' => __('Choose background color for header.', 'mythemeshop'),
						'std' => '#ffffff'
						),
					array(
						'id' => 'mts_footer_bg',
						'type' => 'color',
						'title' => __('Footer Background', 'mythemeshop'),
						'sub_desc' => __('Choose background color for footer.', 'mythemeshop'),
						'std' => '#ffffff'
						),
					array(
						'id' => 'mts_custom_css',
						'type' => 'textarea',
						'title' => __('Custom CSS', 'mythemeshop'),
						'sub_desc' => __('You can enter custom CSS code here to further customize your theme. This will override the default CSS used on your site.', 'mythemeshop')
						),
					array(
						'id' => 'mts_lightbox',
						'type' => 'button_set',
						'title' => __('Lightbox', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'mythemeshop'),
						'std' => '0'
						),


					)
				);
// Header
$sections[] = array(
				'icon' => 'fa fa-credit-card',
				'title' => __('Header', 'mythemeshop'),
				'desc' => __('<p class="description">From here, you can control the elements of header section.</p>', 'mythemeshop'),
				'fields' => array(
					array(
						'id' => 'mts_sticky_nav',
						'type' => 'button_set',
						'title' => __('Floating Navigation Menu', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button to enable <strong>Floating Navigation Menu</strong>.', 'mythemeshop'),
						'std' => '0'
						),
					array(
						'id' => 'mts_social_icon_head',
						'type' => 'button_set_hide_below',
						'title' => __('Social Icons', 'mythemeshop'),
						'sub_desc' => __('You can control social icon links from <strong>Blog Settings > Social Buttons</strong> Tab.', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'std' => '1',
						'args' => array('hide' => '2')
						),	
						array(
						'id' => 'mts_social_icon_foot',
						'type' => 'button_set',
						'title' => __('Social Icons (Footer)', 'mythemeshop'),
						'sub_desc' => __('Show Social Icons in Footer', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'std' => '1'
						),
						array(
                     	'id' => 'mts_header_social',
                     	'title' => __('Header Social Icons', 'mythemeshop'), 
                     	'sub_desc' => __( 'Add Social Media icons in header.', 'mythemeshop' ),
                     	'type' => 'group',
                     	'groupname' => __('Header Icons', 'mythemeshop'), // Group name
                     	'subfields' => 
                            array(
                                array(
                                    'id' => 'mts_header_icon_title',
            						'type' => 'text',
            						'title' => __('Title', 'mythemeshop'), 
            						),
								array(
                                    'id' => 'mts_header_icon',
            						'type' => 'icon_select',
            						'title' => __('Icon', 'mythemeshop')
            						),
								array(
                                    'id' => 'mts_header_icon_link',
            						'type' => 'text',
            						'title' => __('URL', 'mythemeshop'), 
            						),
			                	),
                        'std' => array(
            					'facebook' => array(
            						'group_title' => 'Facebook',
            						'group_sort' => '1',
            						'mts_header_icon_title' => 'Facebook',
            						'mts_header_icon' => 'facebook',
            						'mts_header_icon_link' => '#',
            					),
            					'twitter' => array(
            						'group_title' => 'Twitter',
            						'group_sort' => '2',
            						'mts_header_icon_title' => 'Twitter',
            						'mts_header_icon' => 'twitter',
            						'mts_header_icon_link' => '#',
            					),
            					'gplus' => array(
            						'group_title' => 'Google Plus',
            						'group_sort' => '3',
            						'mts_header_icon_title' => 'Google Plus',
            						'mts_header_icon' => 'google-plus',
            						'mts_header_icon_link' => '#',
            					),
            					'youtube' => array(
            						'group_title' => 'YouTube',
            						'group_sort' => '4',
            						'mts_header_icon_title' => 'YouTube',
            						'mts_header_icon' => 'youtube-play',
            						'mts_header_icon_link' => '#',
            					)
            				)
                        ),
					array(
						'id' => 'mts_header_contact',
						'type' => 'button_set_hide_below',
						'title' => __('Contact Info', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Check this box to show contact number and email address on top bar (<strong>Theme Options >> Homepage >> Contact</strong>)', 'mythemeshop'),
						'std' => '1',
						),
					array(
						'id' => 'mts_header_section2',
						'type' => 'button_set',
						'title' => __('Show Logo', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button to Show or Hide <strong>Logo</strong> completely.', 'mythemeshop'),
						'std' => '1'
						),
                    array(
						'id' => 'mts_show_primary_nav',
						'type' => 'button_set',
						'title' => __('Show Primary Menu', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button to enable <strong>Primary Navigation Menu</strong>.', 'mythemeshop'),
						'std' => '1'
						),
					)
				);
// Homepage Layout
$sections[] = array(
                'icon' => 'fa fa-home',
                'title' => __('Home Layout', 'mythemeshop'),
                'desc' => __('<p class="description">From here, you can control the elements of the homepage.</p>', 'mythemeshop'),
                'fields' => array(
                     array(
                        'id'      => 'mts_homepage_layout',
                        'type'    => 'layout',
                        'title'   => 'Homepage Layout Manager',
                        'sub_desc'    => 'Organize how you want the layout to appear on the homepage',
                        'options' => array(
                            'enabled'  => array(
                            	'intro'       => __('Intro', 'mythemeshop'),
                                'overview'       => __('Overview', 'mythemeshop'),
                                'appfeatures'       => __('App Features/Services', 'mythemeshop'),
                                'appscreenshots'     => __('App Screenshots', 'mythemeshop'),
                                'testimonials' => __('Testimonial', 'mythemeshop'),
                                'buttons'     => __('Buttons', 'mythemeshop'),
                                'features'      => __('Features', 'mythemeshop'),
                                //'services'      => __('Services', 'mythemeshop'),
                                'ourwork'      => __('Our Work', 'mythemeshop'),
                                'team'      => __('Team', 'mythemeshop'),
                                'experience'      => __('Experience', 'mythemeshop'),
                                'pricing'      => __('Pricing', 'mythemeshop'),
                                'widget'      => __('Widget Area', 'mythemeshop'),
                                'statistics'      => __('Statistics', 'mythemeshop'),
                                'contact'      => __('Contact', 'mythemeshop'),
                                ),
                            'disabled' => array(
                                )
                            )
                        ),
                    )
                );

//intro
$sections[] = array(
                'title' => __('Intro', 'mythemeshop'),
                'desc' => __('<p class="description">Intro section shows text, image, and call to action buttons</p>', 'mythemeshop'),
                'fields' => array(
					array(
                    'id' => 'mts_slider_title',
                    'type' => 'text',
                    'title' => __('Title', 'mythemeshop'),
                    'sub_desc' => __('Enter overview section title.', 'mythemeshop')
                    ),
                array(
                    'id' => 'mts_slider_desc',
                    'type' => 'textarea',
                    'title' => __('Description', 'mythemeshop'),
                    'sub_desc' => __('Image Description', 'mythemeshop'),
                    ),
                array(
                    'id' => 'mts_slider_bg_image',
                    'type' => 'upload',
                    'title' => __('Background Image', 'mythemeshop'),
                    'sub_desc' => __('You can enter image for overview section here.')
                    ),
                array(
                    'id' => 'mts_slider_url',
                    'type' => 'text',
                    'title' => __('URL', 'mythemeshop'),
                    'sub_desc' => __('Image URL', 'mythemeshop'),
                    ),
                array(
                    'id'        => 'mts_intro_button',
                    'type'      => 'group',
                    'title'     => __('Button', 'mythemeshop'),
                    'sub_desc'  => __('With this option you can set up intro section buttons.', 'mythemeshop'),
                    'groupname' => __('Button', 'mythemeshop'), // Group name
                    'subfields' =>
                        array(
                            array(
                                'id' => 'mts_intro_button_label',
        						'type' => 'textarea',
        						'title' => __('Label', 'mythemeshop'),
        						'sub_desc' => __('Button label', 'mythemeshop'),
                                ),
                            array(
								'id' => 'mts_button_color',
								'type' => 'color',
								'title' => __('Background Color', 'mythemeshop'),
								'sub_desc' => __('Pick a background color for the button.', 'mythemeshop'),
								'std' => '#3498DB'
								),
                            array(
								'id' => 'mts_button_text_color',
								'type' => 'color',
								'title' => __('Button Text Color', 'mythemeshop'),
								'sub_desc' => __('Pick a text color for the button.', 'mythemeshop'),
								'std' => '#ffffff'
								),
                            array(
        						'id' => 'mts_intro_button_icon_select',
        						'type' => 'icon_select',
        						'title' => __('Select Icon', 'mythemeshop'),
        						'sub_desc' => __('Select an icon from the vector icon set.', 'mythemeshop')
        						),
                            array(
								'id' => 'mts_intro_button_url',
								'type' => 'text',
								'title' => __('URL', 'mythemeshop'),
								'sub_desc' => __('Enter button URL.', 'mythemeshop')
								),
                        ),
                    ),

                )
            );

// Overview
$sections[] = array(
                'title' => __('Overview', 'mythemeshop'),
                'desc' => __('<p class="description">Present items with images and text.</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_overview_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter overview section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_overview_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for overview section here.')
                        ),

                    array(
                        'id' => 'mts_overview_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the overview section background color.', 'mythemeshop'),
                        'std' => '#ffffff'
                        ),
                    array(
                        'id' => 'mts_overview_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for features section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_overview_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for overview section here.')
                        ),

                    array(
                        'id'        => 'mts_overview',
                        'type'      => 'group',
                        'title'     => __('Image', 'mythemeshop'),
                        'sub_desc'  => __('With this option you can set up images for overview section slider.', 'mythemeshop'),
                        'groupname' => __('Image', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(
                                array(
                                    'id' => 'mts_overview_group_title',
                                    'type' => 'text',
                                    'title' => __('Title', 'mythemeshop'),
                                    'sub_desc' => __('Image Title', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_overview_group_image',
                                    'type' => 'upload',
                                    'title' => __('Image', 'mythemeshop'),
                                    'sub_desc' => __('Overview image', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_overview_group_desc',
                                    'type' => 'textarea',
                                    'title' => __('Description', 'mythemeshop'),
                                    'sub_desc' => __('Image Description', 'mythemeshop'),
                                    ),

                   		 	),
                        ),
                )
            );

// App Features
$sections[] = array(
                'title' => __('App Features/Services', 'mythemeshop'),
                'desc' => __('<p class="description">Grid-like list for features or services, with vector icons</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_app_feature_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter app feature section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_app_feature_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for app feature section here.')
                        ),
                    array(
                        'id' => 'mts_app_feature_bg_color',
                        'type' => 'color',
                        'title' => __('Section Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the app feature section background color.', 'mythemeshop'),
                        'std' => '#ffffff'
                        ),
                    array(
                        'id' => 'mts_app_single_feature_bg_color',
                        'type' => 'color',
                        'title' => __('Feature Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the app feature background color.', 'mythemeshop'),
                        'std' => '#f8f8f8'
                        ),
                    array(
                        'id' => 'mts_app_feature_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for app features section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_app_feature_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for app feature section here.')
                        ),
                    array(
                        'id'        => 'mts_app_feature',
                        'type'      => 'group',
                        'title'     => __('App Features', 'mythemeshop'),
                        'sub_desc'  => __('With this option you can set up app feature.', 'mythemeshop'),
                        'groupname' => __('Features', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(
                                array(
                                    'id' => 'mts_group_app_feature_title',
                                    'type' => 'text',
                                    'title' => __('Title', 'mythemeshop'),
                                    'sub_desc' => __('Feature title', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_group_app_feature_desc',
                                    'type' => 'textarea',
                                    'title' => __('Description', 'mythemeshop'),
                                    'sub_desc' => __('Feature description', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_group_app_feature_icon_select',
                                    'type' => 'icon_select',
                                    'allow_empty' => false,
                                    'title' => __('Select Icon', 'mythemeshop'),
                                    'sub_desc' => __('Select an icon from the vector icon set.', 'mythemeshop')
                                    ),
                            ),
                        ),
                )
            );

// App Screenshots
$sections[] = array(
                'title' => __('App Screenshots', 'mythemeshop'),
                'desc' => __('<p class="description">Control Screenshots section from here. <strong>Note:</strong> Make sure lightbox is enabled in Styling Tab.</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_screenshot_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter screenshot section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_screenshot_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for screenshot section here.')
                        ),

                    array(
                        'id' => 'mts_screenshot_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the screenshot section background color.', 'mythemeshop'),
                        'std' => '#ffffff'
                        ),
                    array(
                        'id' => 'mts_screenshot_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for screenshots section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_screenshot_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for screenshot section here.')
                        ),
                    array(
                        'id'        => 'mts_screenshots',
                        'type'      => 'group',
                        'title'     => __('Screenshots', 'mythemeshop'),
                        'groupname' => __('Screenshot', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(
                                array(
                                    'id' => 'mts_screenshot_group_title',
                                    'type' => 'text',
                                    'title' => __('Title', 'mythemeshop'),
                                    'sub_desc' => __('Image Title (Optional)', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_screenshot_group_image',
                                    'type' => 'upload',
                                    'title' => __('Image', 'mythemeshop'),
                                    'sub_desc' => __('Screenshot image', 'mythemeshop'),
                                    ),
                            ),
                        ),
                )
            );

// Testimonials
$sections[] = array(
                'title' => __('Testimonials', 'mythemeshop'),
                'desc' => __('<p class="description">Add testimonials written by your clients</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_testimonials_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter testimonials section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_testimonials_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for testimonials section here.')
                        ),

                    array(
                        'id' => 'mts_testimonials_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the testimonials section background color.', 'mythemeshop'),
                        'std' => '#f8f8f8'
                        ),
                    array(
                        'id' => 'mts_testimonials_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for testimonials section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_testimonials_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for testimonials section here.')
                        ),
                    array(
                        'id'        => 'mts_testimonial',
                        'type'      => 'group',
                        'title'     => __('Testimonials', 'mythemeshop'),
                        'groupname' => __('Testimonial', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(
                                array(
                                    'id' => 'mts_test_group_name',
                                    'type' => 'text',
                                    'title' => __('Name', 'mythemeshop'),
                                    'sub_desc' => __('Name', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_test_group_desc',
                                    'type' => 'textarea',
                                    'title' => __('Testimonial', 'mythemeshop'),
                                    'sub_desc' => __('Testimonial', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_test_group_image',
                                    'type' => 'upload',
                                    'title' => __('Image', 'mythemeshop'),
                                    'sub_desc' => __('Testimonial image', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_test_group_source',
                                    'type' => 'text',
                                    'title' => __('Source', 'mythemeshop'),
                                    'sub_desc' => __('Source', 'mythemeshop'),
                                    'std' => 'via'
                                    ),
                            ),
                        ),
                )
            );



// Buttons
$sections[] = array(
                'title' => __('Buttons', 'mythemeshop'),
                'desc' => __('<p class="description">Add call to action buttons</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_buttons_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter buttons section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_buttons_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for buttons section here.')
                        ),

                    array(
                        'id' => 'mts_buttons_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the buttons section background color.', 'mythemeshop'),
                        'std' => '#ffffff'
                        ),
                    array(
                        'id' => 'mts_buttons_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for buttons section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_buttons_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for buttons section here.')
                        ),
                    array(
                        'id'        => 'mts_buttons',
                        'type'      => 'group',
                        'title'     => __('Buttons', 'mythemeshop'),
                        'groupname' => __('Button', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(

                                array(
                                    'id' => 'mts_button_group_label',
                                    'type' => 'textarea',
                                    'title' => __('Label', 'mythemeshop'),
                                    'sub_desc' => __('add label here', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_button_group_url',
                                    'type' => 'text',
                                    'title' => __('URL', 'mythemeshop'),
                                    'sub_desc' => __('add button URL here', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_button_group_icon',
                                    'type' => 'icon_select',
                                    'title' => __('Select Icon (Optional)', 'mythemeshop'),
                                    'sub_desc' => __('Select an icon from the vector icon set.', 'mythemeshop')
                                    ),
                            ),
                        ),
                )
            );

// Features
$sections[] = array(
                'title' => __('Features', 'mythemeshop'),
                'desc' => __('<p class="description">List features with vector icons.</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_feature_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter features section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_feature_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for features section here.')
                        ),

                    array(
                        'id' => 'mts_feature_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the feature section background color.', 'mythemeshop'),
                        'std' => '#ffffff'
                        ),
                    array(
                        'id' => 'mts_feature_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for features section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_feature_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for features section here.')
                        ),
                    array(
                        'id'        => 'mts_features',
                        'type'      => 'group',
                        'title'     => __('Features', 'mythemeshop'),
                        'groupname' => __('Feature', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(
                                array(
                                    'id' => 'mts_feature_group_title',
                                    'type' => 'text',
                                    'title' => __('Title', 'mythemeshop'),
                                    'sub_desc' => __('Title', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_feature_group_icon',
                                    'type' => 'icon_select',
                                    'allow_empty' => false,
                                    'title' => __('Select Icon (Optional)', 'mythemeshop'),
                                    'sub_desc' => __('Select an icon from the vector icon set.', 'mythemeshop')
                                    ),
                                array(
                                    'id' => 'mts_feature_group_desc',
                                    'type' => 'textarea',
                                    'title' => __('Description', 'mythemeshop'),
                                    'sub_desc' => __('Description', 'mythemeshop'),
                                    ),
                            ),
                        ),
                )
            );

$sections[] = array(
                'title' => __('Our Work', 'mythemeshop'),
                'desc' => __('<p class="description">Show off your previous works</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_work_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter our work section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_work_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for our work section here.')
                        ),

                    array(
                        'id' => 'mts_work_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the our work section background color.', 'mythemeshop'),
                        'std' => '#f8f8f8'
                        ),
                    array(
                        'id' => 'mts_work_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for our work section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_work_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for our work section here.')
                        ),
                    array(
						'id' => 'mts_work_count_home',
						'type' => 'text',
						'title' => __('No. of Projects - Homepage', 'mythemeshop'),
						'sub_desc' => __('Enter the total number of projects you want to show on homepage.', 'mythemeshop'),
						'validate' => 'numeric',
						'std' => '4',
						'class' => 'small-text',
						'args' => array('type' => 'number')
						),
                    array(
						'id' => 'mts_work_count',
						'type' => 'text',
						'title' => __('No. of Projects - Archive', 'mythemeshop'),
						'sub_desc' => __('Enter the total number of projects you want to show on portfolio page.', 'mythemeshop'),
						'validate' => 'numeric',
						'std' => '4',
						'class' => 'small-text',
						'args' => array('type' => 'number')
						),
                    array(
                        'id' => 'mts_work_btn_lbl',
                        'type' => 'text',
                        'title' => __('Button Label', 'mythemeshop'),
                        'sub_desc' => __('Enter label for button', 'mythemeshop'),
                        'std' => __('View Portfolio','mythemeshop')
                        ),
                	)
            );

// Team
$sections[] = array(
                'title' => __('Team', 'mythemeshop'),
                'desc' => __('<p class="description">Introduce your team members</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_team_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter team section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_team_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for team section here.')
                        ),

                    array(
                        'id' => 'mts_team_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the team section background color.', 'mythemeshop'),
                        'std' => '#F4F3F3'
                        ),
                    array(
                        'id' => 'mts_team_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for team section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_team_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for team section here.')
                        ),
                    array(
                        'id'        => 'mts_team',
                        'type'      => 'group',
                        'title'     => __('Team', 'mythemeshop'),
                        'groupname' => __('Member', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(
                                array(
                                    'id' => 'mts_team_group_title',
                                    'type' => 'text',
                                    'title' => __('Title', 'mythemeshop'),
                                    'sub_desc' => __('Title', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_team_group_image',
                                    'type' => 'upload',
                                    'title' => __('Image', 'mythemeshop'),
                                    'sub_desc' => __('image', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_team_group_position',
                                    'type' => 'text',
                                    'title' => __('Position (Optional)', 'mythemeshop'),
                                    'sub_desc' => __('Position', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_team_group_desc',
                                    'type' => 'textarea',
                                    'title' => __('Description', 'mythemeshop'),
                                    'sub_desc' => __('Description', 'mythemeshop'),
                                    ),
                            ),
                        ),
                )
            );

// Experience
$sections[] = array(
                'title' => __('Experience', 'mythemeshop'),
                'desc' => __('<p class="description">Animated counters with circular graph</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_exp_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter experience section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_exp_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for experience section here.')
                        ),

                    array(
                        'id' => 'mts_exp_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the experience section background color.', 'mythemeshop'),
                        'std' => '#ffffff'
                        ),
                    array(
                        'id' => 'mts_exp_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for experience section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_exp_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for experience section here.')
                        ),
                    array(
                        'id'        => 'mts_exp',
                        'type'      => 'group',
                        'title'     => __('Experience', 'mythemeshop'),
                        'groupname' => __('Experience', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(
                                array(
                                    'id' => 'mts_exp_group_prcentage',
                                    'type' => 'text',
                                    'title' => __('Percentage', 'mythemeshop'),
                                    'sub_desc' => __('Percentage', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_exp_group_title',
                                    'type' => 'text',
                                    'title' => __('Title', 'mythemeshop'),
                                    'sub_desc' => __('Title', 'mythemeshop'),
                                    ),
                            ),
                        ),
                )
            );

// Pricing
$sections[] = array(
                'title' => __('Pricing', 'mythemeshop'),
                'desc' => __('<p class="description">Display price tables</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_pricing_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter pricing section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_pricing_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for pricing section here.')
                        ),

                    array(
                        'id' => 'mts_pricing_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the pricing section background color.', 'mythemeshop'),
                        'std' => '#f8f8f8'
                        ),
                    array(
                        'id' => 'mts_pricing_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for pricing section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_pricing_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for pricing section here.')
                        ),
                     array(
                        'id'        => 'mts_price',
                        'type'      => 'group',
                        'title'     => __('Pricing', 'mythemeshop'),
                        'groupname' => __('Pricing', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(
                                array(
                                    'id' => 'mts_price_group_title',
                                    'type' => 'text',
                                    'title' => __('Title', 'mythemeshop'),
                                    'sub_desc' => __('Title', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_price_group_price',
                                    'type' => 'text',
                                    'title' => __('Price', 'mythemeshop'),
                                    'sub_desc' => __('Enter Price', 'mythemeshop'),
                                    ),
                                 array(
                                    'id' => 'mts_price_group_price_desc',
                                    'type' => 'text',
                                    'title' => __('Price', 'mythemeshop'),
                                    'sub_desc' => __('Price Description', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_price_group_btn_lbl',
                                    'type' => 'text',
                                    'title' => __('Button Label', 'mythemeshop'),
                                    'sub_desc' => __('Button Label', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_price_group_btn_url',
                                    'type' => 'text',
                                    'title' => __('Button URL', 'mythemeshop'),
                                    'sub_desc' => __('Button URL', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_price_group_features',
                                    'type' => 'textarea',
                                    'title' => __('Features', 'mythemeshop'),
                                    'sub_desc' => __('Features Description', 'mythemeshop'),
                                    ),
                            ),
                        ),
                )
            );

// Subscription
$sections[] = array(
                'title' => __('Widget Area', 'mythemeshop'),
                'desc' => __('<p class="description">Include custom widgets</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_sub_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter widget area section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_sub_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for widget area section here.')
                        ),

                    array(
                        'id' => 'mts_sub_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the widget area section background color.', 'mythemeshop'),
                        'std' => '#ffffff'
                        ),
                    array(
                        'id' => 'mts_sub_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for widget area section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_sub_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can select image for widget area section here.')
                        ),
                    array(
                        'id' => 'mts_wp_subscribe_css',
                        'type' => 'button_set',
                        'title' => __('Add styling for <a href="https://wordpress.org/plugins/wp-subscribe/" target="_blank">WP Subscribe widget</a>', 'mythemeshop'), 
                        'options' => array('0' => 'Off','1' => 'On'),
                        'sub_desc' => __('This will override color options selected in WP Subscribe Pro.', 'mythemeshop'),
                        'std' => '1'
                        ),

                )
            );

// Statistics
$sections[] = array(
                'title' => __('Statistics', 'mythemeshop'),
                'desc' => __('<p class="description">Animated counters</p>', 'mythemeshop'),
                'fields' => array(
                        array(
                        'id' => 'mts_stats_title',
                        'type' => 'text',
                        'title' => __('Title', 'mythemeshop'),
                        'sub_desc' => __('Enter statistics section title.', 'mythemeshop')
                        ),
                    array(
                        'id' => 'mts_stats_desc',
                        'type' => 'textarea',
                        'title' => __('Description', 'mythemeshop'),
                        'sub_desc' => __('You can enter description for statistics section here.')
                        ),

                    array(
                        'id' => 'mts_stats_bg_color',
                        'type' => 'color',
                        'title' => __('Background Color', 'mythemeshop'),
                        'sub_desc' => __('Pick a color for the statistics section background color.', 'mythemeshop'),
                        'std' => '#ffffff'
                        ),
                    array(
                        'id' => 'mts_stats_bg_pattern',
                        'type' => 'radio_img',
                        'title' => __('Background Pattern', 'mythemeshop'),
                        'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for statistics section\'s background.', 'mythemeshop'),
                        'options' => $mts_patterns,
                        'std' => 'nobg'
                        ),
                    array(
                        'id' => 'mts_stats_bg_image',
                        'type' => 'upload',
                        'title' => __('Background Image', 'mythemeshop'),
                        'sub_desc' => __('You can enter image for statistics section here.')
                        ),
                     array(
                        'id'        => 'mts_stats',
                        'type'      => 'group',
                        'title'     => __('Statistic', 'mythemeshop'),
                        'groupname' => __('Statistic', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(
                                array(
                                    'id' => 'mts_stat_group_number',
                                    'type' => 'text',
                                    'title' => __('Number', 'mythemeshop'),
                                    'sub_desc' => __('Number', 'mythemeshop'),
                                    ),
                                array(
                                    'id' => 'mts_stat_group_title',
                                    'type' => 'text',
                                    'title' => __('Title', 'mythemeshop'),
                                    'sub_desc' => __('Title', 'mythemeshop'),
                                    ),
                            ),
                        ),
                )
            );

// Contact
$sections[] = array(
				'icon' => 'fa fa-phone',
				'title' => __('Contact', 'mythemeshop'),
				'desc' => __('<p class="description">From here, you can control the appearance of contact section on your home page.</p>', 'mythemeshop'),
				'fields' => array(
					array(
						'id' => 'mts_contact_title',
						'type' => 'text',
						'title' => __('Title', 'mythemeshop'),
						'sub_desc' => __('Enter contact section title.', 'mythemeshop')
						),
					array(
						'id' => 'mts_contact_desc',
						'type' => 'textarea',
						'title' => __('Description', 'mythemeshop'),
						'sub_desc' => __('Enter contact section desc.', 'mythemeshop')
						),
					array(
						'id' => 'mts_contact_company_address',
						'type' => 'textarea',
						'title' => __('Company Address', 'mythemeshop'),
						'sub_desc' => __('Enter contact section company address.', 'mythemeshop')
						),
					array(
						'id' => 'mts_contact_phone',
						'type' => 'text',
						'title' => __('Phone Number', 'mythemeshop'),
						'sub_desc' => __('Enter contact section phone number.', 'mythemeshop')
						),
					array(
						'id' => 'mts_contact_email',
						'type' => 'text',
						'title' => __('Email', 'mythemeshop'),
						'sub_desc' => __('Enter contact section email address.', 'mythemeshop')
						),
					array(
						'id' => 'mts_show_contact_map',
						'type' => 'button_set_hide_below',
						'title' => __('Show Map', 'mythemeshop'),
						'options' => array('0' => 'Off', '1' => 'On'),
						'sub_desc' => __('Enable this option to display google map on contact page.', 'mythemeshop'),
						'std' => '1',
						'args' => array( 'hide' => 2 )
						),
					array(
						'id' => 'mts_maps_api_key',
						'type' => 'text',
						'title' => __('Google Maps API Key', 'mythemeshop'),
						'sub_desc' => __('Enter your API key, which is now required by Google Maps. Create a new key <a href="https://console.developers.google.com/flows/enableapi?apiid=maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">here</a>.', 'mythemeshop')
					),
					array(
						'id' => 'mts_contact_location',
						'type' => 'text',
						'title' => __('Location', 'mythemeshop'),
						'sub_desc' => __('Enter google map location.', 'mythemeshop')
					),
					array(
						'id' => 'mts_show_contact_form',
						'type' => 'button_set',
						'title' => __('Show Contact Form', 'mythemeshop'),
						'options' => array('0' => 'Off', '1' => 'On'),
						'sub_desc' => __('Enable this option to display contact form on contact page.', 'mythemeshop'),
						'std' => '1',
						),
					array(
						'id' => 'mts_contact_text_color',
						'type' => 'color',
						'title' => __('Text Color', 'mythemeshop'),
						'sub_desc' => __('Pick a color for the contact section text color.', 'mythemeshop'),
						'std' => '#333333'
						),
					array(
						'id' => 'mts_contact_bg_color',
						'type' => 'color',
						'title' => __('Background Color', 'mythemeshop'),
						'sub_desc' => __('Pick a color for the contact section background color.', 'mythemeshop'),
						'std' => '#ffffff'
						),
					array(
						'id' => 'mts_contact_bg_pattern',
						'type' => 'radio_img',
						'title' => __('Background Pattern', 'mythemeshop'),
						'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for contact section\'s background.', 'mythemeshop'),
						'options' => $mts_patterns,
						'std' => 'nobg'
						),
					array(
						'id' => 'mts_contact_bg_pattern_upload',
						'type' => 'upload',
						'title' => __('Custom Background Image', 'mythemeshop'),
						'sub_desc' => __('Upload your own custom background image or pattern.', 'mythemeshop')
						),
				)
			);

$sections[] = array(
                'icon' => 'fa fa-bar-chart-o',
                'title' => __('Blog Layout', 'mythemeshop'),
                'desc' => __('<p class="description">Control blog settings from here.</p>', 'mythemeshop'),
                'fields' => array(
                	array(
						'id' => 'mts_blog_title',
						'type' => 'text',
						'title' => __('Blog Title', 'mythemeshop'),
						'sub_desc' => __('Enter your blog Title.', 'mythemeshop'),
						'std' => __('Our Blog','mythemeshop')
					),
                	array(
						'id' => 'mts_blog_tagline',
						'type' => 'text',
						'title' => __('Blog Tagline', 'mythemeshop'),
						'sub_desc' => __('Enter your blog tagline.', 'mythemeshop'),
						'std' => __('What we post and publish is awesome!','mythemeshop')
					),
                    array(
                        'id' => 'mts_layout',
                        'type' => 'radio_img',
                        'title' => __('Layout Style', 'mythemeshop'), 
                        'sub_desc' => __('Choose the <strong>default sidebar position</strong> for your blog.', 'mythemeshop'),
                        'options' => array(
                                'cslayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/cs.png'),
                                'sclayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/sc.png')
                            ),
                        'std' => 'cslayout'
                        ),
                    array(
                        'id' => 'mts_full_posts',
                        'type' => 'button_set',
                        'title' => __('Posts on blog pages', 'mythemeshop'), 
                        'options' => array('0' => 'Excerpts','1' => 'Full posts'),
                        'sub_desc' => __('Show post excerpts or full posts on the blog and other archive pages.', 'mythemeshop'),
                        'std' => '0',
                        'class' => 'green'
                        ),
					array(
						'id' => 'mts_bg_color',
						'type' => 'color',
						'title' => __('Background Color', 'mythemeshop'),
						'sub_desc' => __('Pick a color for the blog background color.', 'mythemeshop'),
						'std' => '#ffffff'
						),
					array(
						'id' => 'mts_bg_pattern',
						'type' => 'radio_img',
						'title' => __('Background Pattern', 'mythemeshop'),
						'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for your blog\'s background.', 'mythemeshop'),
						'options' => $mts_patterns,
						'std' => 'nobg'
						),
					array(
						'id' => 'mts_bg_pattern_upload',
						'type' => 'upload',
						'title' => __('Custom Background Image', 'mythemeshop'),
						'sub_desc' => __('Upload your own custom background image or pattern.', 'mythemeshop')
						),
                    array(
	                    'id'       => 'mts_home_headline_meta_info',
	                    'type'     => 'layout',
	                    'title'    => __('Meta Info to Show', 'mythemeshop'),
	                    'sub_desc' => __('Organize how you want the post meta info to appear', 'mythemeshop'),
	                    'options'  => array(
	                        'enabled'  => array(
	                        	'date'     => __('Date','mythemeshop'),
	                            'author'   => __('Author Name','mythemeshop'),
	                        ),
	                        'disabled' => array(
	                        	'category' => __('Categories','mythemeshop'),
	                            'comment'  => __('Comment Count','mythemeshop')
	                        )
	                    )
	                ),
                    array(
                        'id' => 'mts_pagenavigation_type',
                        'type' => 'radio',
                        'title' => __('Pagination Type', 'mythemeshop'),
                        'sub_desc' => __('Select pagination type.', 'mythemeshop'),
                        'options' => array(
                                        '0'=> __('Default (Next / Previous)','mythemeshop'), 
                                        '1' => __('Numbered (1 2 3 4...)','mythemeshop'), 
                                        '2' => 'AJAX (Load More Button)', 
                                        '3' => 'AJAX (Auto Infinite Scroll)'),
                        'std' => '1'
                        ),
                    )
                );
$sections[] = array(
				'icon' => 'fa fa-file-text',
				'title' => __('Single Posts', 'mythemeshop'),
				'desc' => __('<p class="description">From here, you can control the appearance and functionality of your single posts page.</p>', 'mythemeshop'),
				'fields' => array(
					array(
                        'id'       => 'mts_single_post_layout',
                        'type'     => 'layout2',
                        'title'    => __('Single Post Layout', 'mythemeshop'),
                        'sub_desc' => __('Customize the look of single posts', 'mythemeshop'),
                        'options'  => array(
                            'enabled'  => array(
                                'content'   => array(
                                	'label' 	=> __('Post Content','mythemeshop'),
                                	'subfields'	=> array(

                                	)
                                ),
                                'related'   => array(
                                	'label' 	=> __('Related Posts','mythemeshop'),
                                	'subfields'	=> array(
					        			array(
					        				'id' => 'mts_related_posts_taxonomy',
					        				'type' => 'button_set',
					        				'title' => __('Related Posts Taxonomy', 'mythemeshop') ,
					        				'options' => array(
					        					'tags' => 'Tags',
					        					'categories' => 'Categories'
					        				) ,
					        				'class' => 'green',
					        				'sub_desc' => __('Related Posts based on tags or categories.', 'mythemeshop') ,
					        				'std' => 'categories'
					        			),
					        			array(
					        				'id' => 'mts_related_postsnum',
					        				'type' => 'text',
					        				'class' => 'small-text',
					        				'title' => __('Number of related posts', 'mythemeshop') ,
					        				'sub_desc' => __('Enter the number of posts to show in the related posts section.', 'mythemeshop') ,
					        				'std' => '3',
					        				'args' => array(
					        					'type' => 'number'
					        				)
					        			),

                                	)
                                ),
                                'author'   => array(
                                	'label' 	=> __('Author Box','mythemeshop'),
                                	'subfields'	=> array(

                                	)
                                ),
                            ),
                            'disabled' => array(
                            	'tags'   => array(
                                	'label' 	=> __('Tags','mythemeshop'),
                                	'subfields'	=> array(
                                	)
                                ),
                            )
                        )
                    ),
					array(
	                    'id'       => 'mts_single_headline_meta_info',
	                    'type'     => 'layout',
	                    'title'    => __('Meta Info to Show', 'mythemeshop'),
	                    'sub_desc' => __('Organize how you want the post meta info to appear', 'mythemeshop'),
	                    'options'  => array(
	                        'enabled'  => array(
	                            'author'   => __('Author Name','mythemeshop'),
	                            'date'     => __('Date','mythemeshop'),
	                            'category' => __('Categories','mythemeshop'),
	                            'comment'  => __('Comment Count','mythemeshop')
	                        ),
	                        'disabled' => array(
	                        )
	                    )
	                ),
					array(
						'id' => 'mts_breadcrumb',
						'type' => 'button_set',
						'title' => __('Breadcrumbs', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Breadcrumbs are a great way to make your site more user-friendly. You can enable them by checking this box.', 'mythemeshop'),
						'std' => '1'
						),
					array(
						'id' => 'mts_author_comment',
						'type' => 'button_set',
						'title' => __('Highlight Author Comment', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button to highlight author comments.', 'mythemeshop'),
						'std' => '1'
						),
					array(
						'id' => 'mts_comment_date',
						'type' => 'button_set',
						'title' => __('Date in Comments', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button to show the date for comments.', 'mythemeshop'),
						'std' => '1'
						),
					)
				);
$sections[] = array(
				'icon' => 'fa fa-group',
				'title' => __('Social Buttons', 'mythemeshop'),
				'desc' => __('<p class="description">Enable or disable social sharing buttons on single posts using these buttons.</p>', 'mythemeshop'),
				'fields' => array(
					array(
						'id' => 'mts_social_button_position',
						'type' => 'button_set',
						'title' => __('Social Sharing Buttons Position', 'mythemeshop'),
						'options' => array('top' => __('Above Content','mythemeshop'), 'bottom' => __('Below Content','mythemeshop'), 'floating' => __('Floating','mythemeshop')),
						'sub_desc' => __('Choose position for Social Sharing Buttons.', 'mythemeshop'),
						'std' => 'floating',
						'class' => 'green'
					),
					array(
                        'id'       => 'mts_social_buttons',
                        'type'     => 'layout',
                        'title'    => __('Social Media Buttons', 'mythemeshop'),
                        'sub_desc' => __('Organize how you want the social sharing buttons to appear on single posts', 'mythemeshop'),
                        'options'  => array(
                            'enabled'  => array(
                                'twitter'   => __('Twitter','mythemeshop'),
                                'gplus'     => __('Google Plus','mythemeshop'),
                                'facebook'  => __('Facebook Like','mythemeshop'),
                                'pinterest' => __('Pinterest','mythemeshop'),
                            ),
                            'disabled' => array(
                            	'linkedin'  => __('LinkedIn','mythemeshop'),
                                'stumble'   => __('StumbleUpon','mythemeshop'),
                            )
                        )
                    ),
				)
			);
$sections[] = array(
				'icon' => 'fa fa-bar-chart-o',
				'title' => __('Ad Management', 'mythemeshop'),
				'desc' => __('<p class="description">Now, ad management is easy with our options panel. You can control everything from here, without using separate plugins.</p>', 'mythemeshop'),
				'fields' => array(
					array(
						'id' => 'mts_posttop_adcode',
						'type' => 'textarea',
						'title' => __('Below Post Title', 'mythemeshop'),
						'sub_desc' => __('Paste your Adsense, BSA or other ad code here to show ads below your article title on single posts.', 'mythemeshop')
						),
					array(
						'id' => 'mts_posttop_adcode_time',
						'type' => 'text',
						'title' => __('Show After X Days', 'mythemeshop'),
						'sub_desc' => __('Enter the number of days after which you want to show the Below Post Title Ad. Enter 0 to disable this feature.', 'mythemeshop'),
						'validate' => 'numeric',
						'std' => '0',
						'class' => 'small-text',
                        'args' => array('type' => 'number')
						),
					array(
						'id' => 'mts_postend_adcode',
						'type' => 'textarea',
						'title' => __('Below Post Content', 'mythemeshop'),
						'sub_desc' => __('Paste your Adsense, BSA or other ad code here to show ads below the post content on single posts.', 'mythemeshop')
						),
					array(
						'id' => 'mts_postend_adcode_time',
						'type' => 'text',
						'title' => __('Show After X Days', 'mythemeshop'),
						'sub_desc' => __('Enter the number of days after which you want to show the Below Post Title Ad. Enter 0 to disable this feature.', 'mythemeshop'),
						'validate' => 'numeric',
						'std' => '0',
						'class' => 'small-text',
                        'args' => array('type' => 'number')
						),
					)
				);
$sections[] = array(
				'icon' => 'fa fa-columns',
				'title' => __('Sidebars', 'mythemeshop'),
				'desc' => __('<p class="description">Now you have full control over the sidebars. Here you can manage sidebars and select one for each section of your site, or select a custom sidebar on a per-post basis in the post editor.<br></p>', 'mythemeshop'),
                'fields' => array(
                    array(
                        'id'        => 'mts_custom_sidebars',
                        'type'      => 'group', //doesn't need to be called for callback fields
                        'title'     => __('Custom Sidebars', 'mythemeshop'),
                        'sub_desc'  => __('Add custom sidebars. <strong style="font-weight: 800;">You need to save the changes to use the sidebars in the dropdowns below.</strong><br />You can add content to the sidebars in Appearance &gt; Widgets.', 'mythemeshop'),
                        'groupname' => __('Sidebar', 'mythemeshop'), // Group name
                        'subfields' =>
                            array(
                                array(
                                    'id' => 'mts_custom_sidebar_name',
            						'type' => 'text',
            						'title' => __('Name', 'mythemeshop'),
            						'sub_desc' => __('Example: Homepage Sidebar', 'mythemeshop')
            						),
                                array(
                                    'id' => 'mts_custom_sidebar_id',
            						'type' => 'text',
            						'title' => __('ID', 'mythemeshop'),
            						'sub_desc' => __('Enter a unique ID for the sidebar. Use only alphanumeric characters, underscores (_) and dashes (-), eg. "sidebar-home"', 'mythemeshop'),
            						'std' => 'sidebar-'
            						),
                            ),
                        ),
                    array(
						'id' => 'mts_sidebar_for_home',
						'type' => 'sidebars_select',
						'title' => __('Blog Page', 'mythemeshop'),
						'sub_desc' => __('Select a sidebar for the Blog Page.', 'mythemeshop'),
                        'args' => array('exclude' => array('sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4', 'widget-header')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_post',
						'type' => 'sidebars_select',
						'title' => __('Single Post', 'mythemeshop'),
						'sub_desc' => __('Select a sidebar for the single posts. If a post has a custom sidebar set, it will override this.', 'mythemeshop'),
                        'args' => array('exclude' => array('sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4', 'widget-header')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_page',
						'type' => 'sidebars_select',
						'title' => __('Single Page', 'mythemeshop'),
						'sub_desc' => __('Select a sidebar for the single pages. If a page has a custom sidebar set, it will override this.', 'mythemeshop'),
                        'args' => array('exclude' => array('sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4', 'widget-header')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_archive',
						'type' => 'sidebars_select',
						'title' => __('Archive', 'mythemeshop'),
						'sub_desc' => __('Select a sidebar for the archives. Specific archive sidebars will override this setting (see below).', 'mythemeshop'),
                        'args' => array('exclude' => array('sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4', 'widget-header')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_category',
						'type' => 'sidebars_select',
						'title' => __('Category Archive', 'mythemeshop'),
						'sub_desc' => __('Select a sidebar for the category archives.', 'mythemeshop'),
                        'args' => array('exclude' => array('sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4', 'widget-header')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_tag',
						'type' => 'sidebars_select',
						'title' => __('Tag Archive', 'mythemeshop'),
						'sub_desc' => __('Select a sidebar for the tag archives.', 'mythemeshop'),
                        'args' => array('exclude' => array('sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4', 'widget-header')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_date',
						'type' => 'sidebars_select',
						'title' => __('Date Archive', 'mythemeshop'),
						'sub_desc' => __('Select a sidebar for the date archives.', 'mythemeshop'),
                        'args' => array('exclude' => array('sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4', 'widget-header')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_author',
						'type' => 'sidebars_select',
						'title' => __('Author Archive', 'mythemeshop'),
						'sub_desc' => __('Select a sidebar for the author archives.', 'mythemeshop'),
                        'args' => array('exclude' => array('sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4', 'widget-header')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_search',
						'type' => 'sidebars_select',
						'title' => __('Search', 'mythemeshop'),
						'sub_desc' => __('Select a sidebar for the search results.', 'mythemeshop'),
                        'args' => array('exclude' => array('sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4', 'widget-header')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_notfound',
						'type' => 'sidebars_select',
						'title' => __('404 Error', 'mythemeshop'),
						'sub_desc' => __('Select a sidebar for the 404 Not found pages.', 'mythemeshop'),
                        'args' => array('exclude' => array('sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4', 'widget-header')),
                        'std' => ''
						),
                    ),
				);
//$sections[] = array(
//				'icon' => NHP_OPTIONS_URL.'img/glyphicons/fontsetting.png',
//				'title' => __('Fonts', 'mythemeshop'),
//				'desc' => __('<p class="description"><div class="controls">You can find theme font options under the Appearance Section named <a href="themes.php?page=typography"><b>Theme Typography</b></a>, which will allow you to configure the typography used on your site.<br></div></p>', 'mythemeshop'),
//				);
$sections[] = array(
				'icon' => 'fa fa-list-alt',
				'title' => __('Navigation', 'mythemeshop'),
				'desc' => __('<p class="description"><div class="controls">Navigation settings can now be modified from the <a href="nav-menus.php"><b>Menus Section</b></a>.<br></div></p>', 'mythemeshop')
				);


	$tabs = array();

    $args['presets'] = array();
    include('theme-presets.php');

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 *
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 *
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){

	$error = false;
	$value =  'just testing';
	/*
	do your validation

	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;

}//function

/*--------------------------------------------------------------------
 *
 * Default Font Settings
 *
 --------------------------------------------------------------------*/
if(function_exists('register_typography')) {
  register_typography(array(
  	'logo_font' => array(
      'preview_text' => 'Logo',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => '700',
      'font_size' => '28px',
      'font_color' => '#ffffff',
      'css_selectors' => '#logo a'
    ),
    'navigation_font' => array(
      'preview_text' => 'Navigation Font',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => 'normal',
      'font_size' => '13px',
      'font_color' => '#bababa',
      'css_selectors' => '.menu li, .menu li a'
    ),
    'featured_title_font' => array(
      'preview_text' => 'Featured Area Title',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_size' => '70px',
	  'font_variant' => 'normal',
      'font_color' => '#ffffff',
      'css_selectors' => 'h3.app-title'
    ),
    'featured_title_font' => array(
      'preview_text' => 'Featured Area Small Text',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_size' => '22px',
	  'font_variant' => 'normal',
      'font_color' => '#ffffff',
      'css_selectors' => 'p.app-intro'
    ),
    'home_title_font' => array(
      'preview_text' => 'Home Titles',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_size' => '25px',
	  'font_variant' => '700',
      'font_color' => '#555555',
      'css_selectors' => 'section h2'
    ),
    'home_sub_heading_font' => array(
      'preview_text' => 'Home Sub headings',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_size' => '20px',
	  'font_variant' => 'normal',
      'font_color' => '#bababa',
      'css_selectors' => 'section h4'
    ),
    'blog_title_font' => array(
      'preview_text' => 'Blog Article Title',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_size' => '20px',
	  'font_variant' => '700',
      'font_color' => '#3498db',
      'css_selectors' => '.latestPost .title a'
    ),
    'single_title_font' => array(
      'preview_text' => 'Single Article Title',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_size' => '25px',
	  'font_variant' => '700',
      'font_color' => '#3498db',
      'css_selectors' => '.single-title, .single-title a'
    ),
    'content_font' => array(
      'preview_text' => 'Content Font',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_size' => '14px',
	  'font_variant' => 'normal',
      'font_color' => '#555555',
      'css_selectors' => 'body'
    ),
    'widget_title' => array(
      'preview_text' => 'Widget Title',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => '700',
      'font_size' => '20px',
      'font_color' => '#555555',
      'css_selectors' => '.widget h3'
    ),
	'sidebar_font' => array(
      'preview_text' => 'Sidebar Font',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => 'normal',
      'font_size' => '14px',
      'font_color' => '#555555',
      'css_selectors' => '#sidebars .widget'
    ),
	'footer_font' => array(
      'preview_text' => 'Footer Font',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => 'normal',
      'font_size' => '14px',
      'font_color' => '#444444',
      'css_selectors' => '.footer-widgets'
    ),
    'h1_headline' => array(
      'preview_text' => 'Content H1',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => '700',
      'font_size' => '28px',
      'font_color' => '#555555',
      'css_selectors' => 'h1'
    ),
	'h2_headline' => array(
      'preview_text' => 'Content H2',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => '700',
      'font_size' => '24px',
      'font_color' => '#555555',
      'css_selectors' => 'h2'
    ),
	'h3_headline' => array(
      'preview_text' => 'Content H3',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => '700',
      'font_size' => '22px',
      'font_color' => '#555555',
      'css_selectors' => 'h3'
    ),
	'h4_headline' => array(
      'preview_text' => 'Content H4',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => '700',
      'font_size' => '20px',
      'font_color' => '#555555',
      'css_selectors' => 'h4'
    ),
	'h5_headline' => array(
      'preview_text' => 'Content H5',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => '700',
      'font_size' => '15px',
      'font_color' => '#555555',
      'css_selectors' => 'h5'
    ),
	'h6_headline' => array(
      'preview_text' => 'Content H6',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_variant' => '700',
      'font_size' => '16px',
      'font_color' => '#555555',
      'css_selectors' => 'h6'
    )
  ));
}

?>