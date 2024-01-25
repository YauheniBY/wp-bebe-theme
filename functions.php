<?php
/**
 * bebe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bebe
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


function bebe_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on bebe, use a find and replace
		* to change 'bebe' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bebe', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'bebe' ),
			'menu-footer' => esc_html__( 'Footer menu', 'bebe' ),
		)
	);

	
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bebe_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_image_size( 'bebe-post-front', 235, 183, true );
	add_image_size( 'bebe-post-single', 370, 280, true );
	add_image_size( 'bebe-gallery-one', 222, 341, true );
	add_image_size( 'bebe-gallery-two', 222, 164, true );
	add_image_size( 'bebe-gallery-three', 456, 164, true );
	add_image_size( 'bebe-teachers-photo', 281, 163, true );
	add_image_size( 'bebe-rooms', 212, 168, true );
	add_image_size( 'bebe-rooms-slider', 463, 355, true );
}
add_action( 'after_setup_theme', 'bebe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bebe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bebe_content_width', 640 );
}
add_action( 'after_setup_theme', 'bebe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bebe_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bebe' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bebe' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)

	);

	register_sidebar(		
		array(
			'name'          => esc_html__( 'Blog sidebar', 'bebe' ),
			'id'            => 'blogsidebar',
			'description'   => esc_html__( 'Add widgets blog sidebar here.', 'bebe' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)

	);
}
add_action( 'widgets_init', 'bebe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bebe_scripts() {
	wp_enqueue_style( 'bebe-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bebe-general',  get_template_directory_uri() . '/layouts/general.css', array(), '1.0' );
	wp_enqueue_style( 'wpredux_css',  get_template_directory_uri() . '/layouts/wpredux.css', array(), '1.0' );
	wp_style_add_data( 'bebe-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bebe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bebe-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/libs/jquery.flexslider-min.js', array(), '1.0', true );
	wp_enqueue_script( 'scrollable', get_template_directory_uri() . '/js/libs/scrollable.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bebe_scripts' );

/**
 * Enqueue scripts and styles for admin.
 */

function bebe_add_scripts($hook) {
	if('post.php' == $hook || 'post-new.php' == $hook ){
		wp_enqueue_script( 'bebe_metaboxes', get_template_directory_uri() . '/js/admin/metaboxes.js', array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox'));
		wp_enqueue_script( 'bebe_metabox-gallery', get_template_directory_uri() . '/js/admin/metabox-gallery.js', array('jquery'));
	}	
	wp_enqueue_style( 'bebe-admin',  get_template_directory_uri() . '/layouts/admin.css', array(), '1.0' );
}

add_action( 'admin_enqueue_scripts', 'bebe_add_scripts',10 );



//Contact form remove span function

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = str_replace('<br />','', $content);
	
	return $content;
});


function bebetheme_metaboxes($meta_boxes) {

	$meta_boxes = array();



	wp_reset_postdata();

	$prefix = "bebe_";


	$meta_boxes[] = array(
		'id'         => 'homepage_metabox',
		'title'      => 'Homepage Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('About Photo','bebe'),
				'desc' => __('Upload a photo. Recommended size: 280-194px','bebe'),
				'id'   => $prefix . 'about_photo',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => __('About title','bebe'),
				'desc' => __('The title','bebe'),
				'id'   => $prefix . 'about_title',
				'std'  => 'About Us',
				'type' => 'text',
			),
			array(
				'name' => __('Description About Box','bebe'),
				'desc' => __('Type the description','bebe'),
				'id'   => $prefix . 'about_desc',
				'std'  => '',
				'type' => 'wysiwyg',
			),
			array(
				'name' => __('About Link','bebe'),
				'desc' => __('The Link','bebe'),
				'id'   => $prefix . 'about_link',
				'std'  => '',
				'type' => 'text',
			),


			array(
				'name' => __('Info Title 1','bebe'),
				'desc' => __('Type here the Info Title 1','bebe'),
				'id'   => $prefix . 'info_title_1',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Description 1','bebe'),
				'desc' => __('Type here the Info Description 1','bebe'),
				'id'   => $prefix . 'info_description_1',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Title 2','bebe'),
				'desc' => __('Type here the Info Title 2','bebe'),
				'id'   => $prefix . 'info_title_2',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Description 2','bebe'),
				'desc' => __('Type here the Info Description 2','bebe'),
				'id'   => $prefix . 'info_description_2',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Title 3','bebe'),
				'desc' => __('Type here the Info Title 3','bebe'),
				'id'   => $prefix . 'info_title_3',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Description 3','bebe'),
				'desc' => __('Type here the Info Description 3','bebe'),
				'id'   => $prefix . 'info_description_3',
				'std'  => '',
				'type' => 'text',
			),
		)
	);


	$meta_boxes[] = array(
		'id'         => 'about_metabox',
		'title'      => 'About Data',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('Teacher Block title','bebe'),
				'desc' => __('Specify the Teacher Block Title','bebe'),
				'id'   => $prefix . 'about_teachers',
				'std'  => '',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'teachers_metabox',
		'title'      => 'Teachers Social Links',
		'pages'      => array( 'teachers', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Facebook Link','bebe'),
				'desc' => __('Add the link','bebe'),
				'id'   => $prefix . 'fb_link',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Twitter Link','bebe'),
				'desc' => __('Add the link','bebe'),
				'id'   => $prefix . 'twi_link',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Pinterest Link','bebe'),
				'desc' => __('Add the link','bebe'),
				'id'   => $prefix . 'pin_link',
				'std'  => '',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'contact_metabox',
		'title'      => esc_html__('Contact Info','bebe'),
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-contacts.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => esc_html__('Address Label','bebe'),
				'desc' => esc_html__('Add the info','bebe'),
				'id'   => $prefix . 'address_label',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => esc_html__('Address','bebe'),
				'desc' => esc_html__('Add the info','bebe'),
				'id'   => $prefix . 'address',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Phone Label','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'phone_label',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Phone','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'phone',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Email Label','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'email_label',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Email','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'email',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Contact Form ShortCode here','bebe'),
				'desc' => __('You can use any Contact Form ShortCode here (we recomend use Contact Form 7)','bebe'),
				'id'   => $prefix . 'contactform_shortcode',
				'std'  => '',
				'type' => 'textarea_code',
			),
			
		)
	);

	return $meta_boxes;
}

add_action( 'init', 'bebetheme_metaboxes' );


//Register POST TYPE
add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_post_type( 'gallery', [
		'label'  => null,
		'labels' => [
			'name'               => 'Gallery', // основное название для типа записи
			'singular_name'      => 'Gallery', // название для одной записи этого типа
			'add_new'            => 'Add new post to Gallery', // для добавления новой записи
			'add_new_item'       => 'Add new post to Gallery', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit post to Gallery', // для редактирования типа записи
			'new_item'           => 'New post to Gallery', // текст новой записи
			'view_item'          => 'See the post to Gallery', // для просмотра записи этого типа.
			'search_items'       => 'Search the post to Gallery', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in the basket', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Gallery posts', // название меню
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail','excerpt','trackbacks' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'teachers', [
		'label'  => null,
		'labels' => [
			'name'               => 'Teachers', // основное название для типа записи
			'singular_name'      => 'Teacher', // название для одной записи этого типа
			'add_new'            => 'Add new post to Teachers', // для добавления новой записи
			'add_new_item'       => 'Add new post to Teachers', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit post to Teachers', // для редактирования типа записи
			'new_item'           => 'New post to Teachers', // текст новой записи
			'view_item'          => 'See the post to Teachers', // для просмотра записи этого типа.
			'search_items'       => 'Search the post to Teachers', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in the basket', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Teachers posts', // название меню
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail','excerpt','trackbacks' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'rooms', [
		'label'  => null,
		'labels' => [
			'name'               => 'Rooms', // основное название для типа записи
			'singular_name'      => 'Room', // название для одной записи этого типа
			'add_new'            => 'Add new post to Rooms', // для добавления новой записи
			'add_new_item'       => 'Add new post to Rooms', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit post to Rooms', // для редактирования типа записи
			'new_item'           => 'New post to Rooms', // текст новой записи
			'view_item'          => 'See the post to Rooms', // для просмотра записи этого типа.
			'search_items'       => 'Search the post to Rooms', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in the basket', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Rooms posts', // название меню
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail','excerpt','trackbacks' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}

// Taxonomies


add_action( 'init', 'bebe_register_taxonomy' );
 
function bebe_register_taxonomy() {
 
	$args = array(
		'labels' => array(
			'menu_name' => 'Gallery taxonomy',
		),
		'public' => true,
		'show_in_rest' => true, // add support for Gutenberg editor
		'publicly_queryable' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => true,
		'show_ui' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'gallery-tax-slug' ),

	);
	register_taxonomy( 'gallery-category', 'gallery', $args );
}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Init tgm files
 */
require get_template_directory() . '/inc/tgm-list.php';
/**
 * Init tgm files
 */
require get_template_directory() . '/inc/redux-options.php';

/**
 * Init metaboxes options
 */
require get_template_directory() . '/inc/metaboxes.php';
require get_template_directory() . '/inc/gallery-meta.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load breadcrumbs function.
 */

	require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Schare social networks function:
 */

 function bebe_get_share($type = 'fb', $permalink = false, $title = false) {
	if (!$permalink) {
		$permalink = get_permalink();
	}
	if (!$title) {
		$title = get_the_title();
	}
	switch ($type) {
		case 'twi':
			return 'http://twitter.com/home?status=' . $title . '+-+' . $permalink;
			break;
		case 'fb':
			return 'http://www.facebook.com/sharer.php?u=' . $permalink . '&t=' . $title;
			break;
		case 'goglp':
			return 'https://plus.google.com/share?url='. urlencode($permalink);
			break;
		case 'pin':
			return 'http://pinterest.com/pin/create/button/?url=' . $permalink;
			break;
		default:
			return '';
	}
}

// awesome semantic comment

function bebe_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	
	if ( 'article' == $args['style'] ) {
		$tag = 'article';
		$add_below = 'comment';
	} else {
		$tag = 'article';
		$add_below = 'comment';
	}

	?>
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? 'children' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">

	<div class="<?php echo(( $depth > 1 ) ? 'reply' :'comment'); ?> cf">
	<?php echo(( $depth > 1 ) ? '<div class="enter"></div>' :''); ?>
		<div class="avatar">
			<figure class="gravatar"><?php echo get_avatar( $comment, 105, 'https://i.livelib.ru/auface/551253/o/fbe5/Leonid_Medvedovskij.jpg', 'Author’s gravatar' ); ?></figure>
			<h4><a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a></h4>	
		</div>
		<div class="text">
			<div class="top">
				<h4 class="date">Date: <time class="comment-meta-item" datetime="<?php comment_date() ?>T<?php comment_time() ?>" itemprop="datePublished"><?php comment_date() ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time></h4>
				<div class="comment-reply">
					<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
				
			</div>
			<div class="dotted-line"></div>			
				<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-meta-item">Your comment is awaiting moderation.</p>
				<?php endif; ?>
				<?php comment_text() ?>
				<?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
		</div>
	</div>

	
	<?php }

// end of awesome semantic comment

function bebe_comment_close() {
	echo '</article>';
}

function add_custome_css(){
	global $bebe_options;
	$custome_style = '';

	if($bebe_options['width_css']){
		$custome_style.='.class{bacground-color:'.$bebe_options['width_css'].';}';

	} else $custome_style.='.class{bacground-color:#000;}';

	
	if($bebe_options['buttons']==3){ 
		$add_to_content_box = '-reverse';
	} else {
		$add_to_content_box ='';
	}
	$custome_style .= '.content_box{display:flex; flex-wrap: nowrap; flex-direction: row'.$add_to_content_box.';}';


	
	wp_add_inline_style('wpredux_css', $custome_style);
}

add_action('wp_enqueue_scripts','add_custome_css');
	

