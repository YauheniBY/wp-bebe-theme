<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'bebe_options';  

$dir = __DIR__ . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {
	$sample_patterns_dir = opendir( $sample_patterns_path );

	if ( $sample_patterns_dir ) {

		// phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
		while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
			if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
				$name              = explode( '.', $sample_patterns_file );
				$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => false,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'Bebe Options', 'bebe' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Theme Options for Bebe', 'bebe' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => false,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => true,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => false,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);


// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '#',
	'title' => __( 'Documentation', 'bebe' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => __( 'Support', 'bebe' ),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['share_icons'][] = array(
	'url'   => '//github.com/#',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/#',
	'title' => 'Find us on LinkedIn',
	'icon'  => 'el el-linkedin',
);

// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}

	// translators:  Panel opt_name.
	$args['intro_text'] = '<p>' . sprintf( esc_html__( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $%1$s', 'your-textdomain-here' ), '<strong>' . $v . '</strong>' ) . '<p>';
} else {
	$args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'your-textdomain-here' ) . '</p>';
}

// Add content after the form.
$args['footer_text'] = '<p>' . esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'your-textdomain-here' ) . '</p>';

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

/*
 * <--- END HELP TABS
 */

/*
 * ---> START SECTIONS
 */

// -> START Basic Fields
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Header&Footer', 'bebe' ),
		'id'               => 'basic',
		'desc'             => esc_html__( 'Header & Footer fields!', 'bebe' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-home',
	)
);

// require_once Redux_Core::$dir . '../sample/sections/basic-fields/checkbox.php';
// require_once Redux_Core::$dir . '../sample/sections/basic-fields/radio.php';
// require_once Redux_Core::$dir . '../sample/sections/basic-fields/sortable.php';
// require_once Redux_Core::$dir . '../sample/sections/basic-fields/text.php';
// require_once Redux_Core::$dir . '../sample/sections/basic-fields/multi-text.php';
// require_once Redux_Core::$dir . '../sample/sections/basic-fields/password.php';
// require_once Redux_Core::$dir . '../sample/sections/basic-fields/textarea.php';


// -> START Our Custome Fields
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Logo data', 'bebe' ),
		'id'               => 'site_logos',
		'desc'             => esc_html__( 'These are logo information img and slogan!', 'bebe' ),
		'subsection'=> true,
		'customizer_width' => '700px',
		'icon'             => '',
		'fields' => array(
				array(
					'id'           => 'bebe_logo',
					'title'            => esc_html__( 'Header Logo', 'bebe' ),
					'subtitle'            => esc_html__( 'Upload your Logo for Header', 'bebe' ),
					'desc'             => esc_html__( 'Recomended size : 320*110 px', 'bebe' ),
					'default'         => '',
					'type'            => 'media',
					'url'             => true,
					),
					array(
						'id'           => 'bebe_footer_logo',
						'title'            => esc_html__( 'Footer Logo', 'bebe' ),
						'subtitle'            => esc_html__( 'Upload your Logo for Footer', 'bebe' ),
						'desc'             => esc_html__( 'Recomended size : 80*40 px', 'bebe' ),
						'default'         => '',
						'type'            => 'media',
						'url'             => true,
						),
					array(
						'id'           => 'bebes_slogan',
						'title'            => esc_html__( 'Slogan', 'bebe' ),
						'subtitle'            => esc_html__( 'Enter your Slogan', 'bebe' ),
						'desc'             => esc_html__( 'The place for a short Slogan', 'bebe' ),
						'default'         => 'Slogan text here',
						'type'            => 'text',
						'required'        => false,
						),
					),
			),
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Social links', 'bebe' ),
		'id'               => 'social_links',
		'desc'             => esc_html__( 'These are Social links information', 'bebe' ),
		'subsection'=> true,
		'customizer_width' => '700px',
		'icon'             => '',
		'fields' => array(
				array(
					'id'           => 'face',
					'title'            => esc_html__( 'Facebook', 'bebe' ),
					'subtitle'            => esc_html__( 'Link to your Facebook', 'bebe' ),
					'desc'             => esc_html__( 'Type here your profile link on Facebook', 'bebe' ),
					'default'         => '',
					'type'            => 'text',
					),
					array(
						'id'           => 'inst',
						'title'            => esc_html__( 'Instagram', 'bebe' ),
						'subtitle'            => esc_html__( 'Link to your Instagram', 'bebe' ),
						'desc'             => esc_html__( 'Type here your profile link on Instagram', 'bebe' ),
						'default'         => '',
						'type'            => 'text',
					),
					array(
						'id'           => 'pint',
						'title'            => esc_html__( 'Pinterest', 'bebe' ),
						'subtitle'            => esc_html__( 'Link to your Pinterest', 'bebe' ),
						'desc'             => esc_html__( 'Type here your profile link on Pinterest', 'bebe' ),
						'default'         => '',
						'type'            => 'text',
					),
					array(
						'id'           => 'twit',
						'title'            => esc_html__( 'Twitter', 'bebe' ),
						'subtitle'            => esc_html__( 'Link to your Twitter', 'bebe' ),
						'desc'             => esc_html__( 'Type here your profile link on Twitter', 'bebe' ),
						'default'         => '',
						'type'            => 'text',
					),
					array(
						'id'           => 'yout',
						'title'            => esc_html__( 'YouTube', 'bebe' ),
						'subtitle'            => esc_html__( 'Link to your YouTube', 'bebe' ),
						'desc'             => esc_html__( 'Type here your profile link on YouTube', 'bebe' ),
						'default'         => '',
						'type'            => 'text',
					),
				),
			),
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Home Slider', 'bebe' ),
		'id'               => 'home_slider',
		'desc'             => esc_html__( 'Upload data for your slider', 'bebe' ),
		'subsection'        => true,
		'customizer_width' => '700px',
		'icon'             => '',
		'fields' => array(
				array(
					'id'           => 'homepageslider',
					'title'            => esc_html__( 'Slides Options', 'bebe' ),
					'subtitle'            => esc_html__( 'Unlimited slides with drag and drop sortings', 'bebe' ),
					'desc'             => esc_html__( 'our description or some recomendation', 'bebe' ),
					'type'            => 'slides',
					'placeholder'         => array(
														'title'            => esc_html__( 'Title', 'bebe' ),
														'url'            => esc_html__( 'Url', 'bebe' ),
														'desc'             => esc_html__( 'Description', 'bebe' ),
													),
					),					
				),
			),
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Footer data', 'bebe' ),
		'id'               => 'footerdata',
		'desc'             => esc_html__( 'These are footer data!', 'bebe' ),
		'subsection'=> true,
		'customizer_width' => '700px',
		'icon'             => '',
		'fields' => array(
						array(
							'id'           => 'bebes_copyrights',
							'title'            => esc_html__( 'Copyrights', 'bebe' ),
							'subtitle'            => esc_html__( 'Enter your Copyrights', 'bebe' ),
							'desc'             => esc_html__( 'The place for a short Slogan', 'bebe' ),
							'default'         => 'BEBE. All rights reserved',
							'type'            => 'editor',
							),
							array(
								'id'           => 'bebephone',
								'title'            => esc_html__( 'Phone', 'bebe' ),
								'subtitle'            => esc_html__( 'Type to your Phone', 'bebe' ),
								'desc'             => esc_html__( 'Type here your phone', 'bebe' ),
								'default'         => '',
								'type'            => 'text',
							),
							array(
								'id'           => 'bebeaddress',
								'title'            => esc_html__( 'Your Address', 'bebe' ),
								'subtitle'            => esc_html__( 'Type to your address', 'bebe' ),
								'desc'             => esc_html__( 'Type here your address', 'bebe' ),
								'default'         => '',
								'type'            => 'text',
							),
							array(
								'id'           => 'bebeemail',
								'title'            => esc_html__( 'Your Email Address', 'bebe' ),
								'subtitle'            => esc_html__( 'Type to your email address', 'bebe' ),
								'desc'             => esc_html__( 'Type here your email address', 'bebe' ),
								'default'         => '',
								'type'            => 'text',								
								'validate'     => 'email',
								'msg'             => esc_html__( 'Email address not valid. Try other one', 'bebe' ),

							),
							array(
								'id'           => 'bebefooterform',
								'title'            => esc_html__( 'Your footer Forms shortcode', 'bebe' ),
								'subtitle'            => esc_html__( 'Type your footer Forms shortcode', 'bebe' ),
								'desc'             => esc_html__( 'Type here your footer Forms shortcode from Custome Form 7 or other Where should be four filds: inpet-text (Name), inpet-email (Email), textarea (Message) and input-submit(Sibmit)', 'bebe' ),
								'default'         => '',
								'type'            => 'text',								
								

							),
					),
			),
);


Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Rooms Archive', 'bebe' ),
		'id'               => 'rooms_archive',
		'desc'             => esc_html__( 'Type number posts per page on Rooms archive page', 'bebe' ),
		'subsection'        => true,
		'customizer_width' => '700px',
		'icon'             => '',
		'fields' => array(
				array(
					'id'           => 'rooms_per_page',
					'title'            => esc_html__( 'Number posts per page', 'bebe' ),
					'subtitle'            => esc_html__( 'Type number posts per page', 'bebe' ),
					'desc'             => esc_html__( 'Max number posts per page', 'bebe' ),
					'type'            => 'text',
					'validate' => 'numeric',
					),
					array(
						'id'           => 'width_css',
						'title'            => esc_html__( 'Width', 'bebe' ),
						'subtitle'            => esc_html__( '.....', 'bebe' ),
						'desc'             => esc_html__( '.............', 'bebe' ),
						'type'            => 'text',
						),
					array(
						'id'           => 'buttons',
						'title'            => esc_html__( 'Sidebar direction', 'bebe' ),
						'subtitle'            => esc_html__( '.....', 'bebe' ),
						'desc'             => esc_html__( '.............', 'bebe' ),
						'type'            => 'button_set',
						'options'=> array(
							'1'=> 'left sidebar',
							'2'=> 'no sidebar',
							'3'=> 'right sidebar',
						),
						'default' => 2,
						),					
				),
			),
);