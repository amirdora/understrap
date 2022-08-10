<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
		'/theme-settings.php',                  // Initialize theme default settings.
		'/setup.php',                           // Theme setup and custom theme supports.
		'/widgets.php',                         // Register widget area.
		'/enqueue.php',                         // Enqueue scripts and styles.
		'/template-tags.php',                   // Custom template tags for this theme.
		'/pagination.php',                      // Custom pagination for this theme.
		'/hooks.php',                           // Custom hooks.
		'/extras.php',                          // Custom functions that act independently of the theme templates.
		'/customizer.php',                      // Customizer additions.
		'/custom-comments.php',                 // Custom Comments file.
		'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
		'/editor.php',                          // Load Editor functions.
		'/block-editor.php',                    // Load Block Editor functions.
		'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ($understrap_includes as $file) {
	require_once get_theme_file_path($understrap_inc_dir . $file);
}

add_action('widgets_init', 'my_register_sidebars');
function my_register_sidebars()
{
	/* Register the sidebar. */
	register_sidebar(
			array(
					'id' => 'footer-top-left',
					'name' => __('Footer Top Left'),
					'description' => __('A short description of the sidebar.'),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
			)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
	register_sidebar(
			array(
					'id' => 'footer-top-right',
					'name' => __('Footer Top Right'),
					'description' => __('A short description of the sidebar.'),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
			)
	);

	register_sidebar(
			array(
					'id' => 'footer-bottom-left',
					'name' => __('Footer Bottom Left'),
					'description' => __('A short description of the sidebar.'),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
			)
	);

	register_sidebar(
			array(
					'id' => 'footer-bottom-right',
					'name' => __('Footer Bottom Right'),
					'description' => __('A short description of the sidebar.'),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
			)
	);
}

//Custom Post Type Product
function my_custom_post_product()
{
	$labels = array(
			'name' => __('Products'),
			'singular_name' => __('Product'),
			'add_new' => __('Add New'),
			'add_new_item' => __('Add New Product'),
			'edit_item' => __('Edit Product'),
			'new_item' => __('New Product'),
			'all_items' => __('All Products'),
			'view_item' => __('View Product'),
			'search_items' => __('Search Products'),
			'not_found' => __('No products found'),
			'not_found_in_trash' => __('No products found in the Trash'),
			'menu_name' => 'Products'
	);
	$args = array(
			'labels' => $labels,
			'description' => 'Holds our products and product specific data',
			'public' => true,
			'menu_position' => 5,
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			'has_archive' => true,
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'can_export' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'query_var' => true,
			'show_in_rest' => true,
	);
	register_post_type('product', $args);
}

add_action('init', 'my_custom_post_product');

//Adding Product taxonomy Category;
function my_taxonomies_product_cat()
{
	$labels = array(
			'name' => _x('Product Categories', 'taxonomy general name'),
			'singular_name' => _x('Product Category', 'taxonomy singular name'),
			'search_items' => __('Search Product Categories'),
			'all_items' => __('All Product Categories'),
			'parent_item' => __('Parent Product Category'),
			'parent_item_colon' => __('Parent Product Category:'),
			'edit_item' => __('Edit Product Category'),
			'update_item' => __('Update Product Category'),
			'add_new_item' => __('Add New Product Category'),
			'new_item_name' => __('New Product Category'),
			'menu_name' => __('Product Categories'),
	);
	$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'product-cat' ),

	);
	register_taxonomy('product_category', 'product', $args);
}
add_action('init', 'my_taxonomies_product_cat', 0);

//Custom post of type Webinar
function my_custom_post_webinar()
{
	$labels = array(
			'name' => __('Webinar'),
			'singular_name' => __('Webinar'),
			'add_new' => __('Add New'),
			'add_new_item' => __('Add New Webinar'),
			'edit_item' => __('Edit Webinar'),
			'new_item' => __('New Webinar'),
			'all_items' => __('All Webinars'),
			'view_item' => __('View Webinar'),
			'search_items' => __('Search Webinars'),
			'not_found' => __('No webinar found'),
			'not_found_in_trash' => __('No webinar found in the Trash'),
			'menu_name' => 'Webinar'
	);
	$args = array(
			'labels' => $labels,
			'description' => 'Holds our webinar data',
			'public' => true,
			'menu_position' => 5,
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			'has_archive' => true,
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'can_export' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'query_var' => true,
			'show_in_rest' => true,
	);
	register_post_type('webinar', $args);
}

add_action('init', 'my_custom_post_webinar');

//Custom post of type Training
function my_custom_post_training_course()
{
	$labels = array(
			'name' => __('Training Course'),
			'singular_name' => __('Training Course'),
			'add_new' => __('Add New'),
			'add_new_item' => __('Add New Training Course'),
			'edit_item' => __('Edit Training Course'),
			'new_item' => __('New Training Course'),
			'all_items' => __('All Training Courses'),
			'view_item' => __('View Training Course'),
			'search_items' => __('Search Training Courses'),
			'not_found' => __('No course found'),
			'not_found_in_trash' => __('No course found in the Trash'),
			'menu_name' => 'Training Course'
	);
	$args = array(
			'labels' => $labels,
			'description' => 'Holds our training specific data',
			'public' => true,
			'menu_position' => 5,
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			'taxonomies' => array('training_course_category'),
			'has_archive' => true,
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'can_export' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'query_var' => true,
			'show_in_rest' => true,
	);
	register_post_type('training_course', $args);
}

add_action('init', 'my_custom_post_training_course');

//Adding Training taxonomy Category;
function my_taxonomies_course_cat()
{
	$labels = array(
			'name' => _x('Course Categories', 'taxonomy general name'),
			'singular_name' => _x('Course Category', 'taxonomy singular name'),
			'search_items' => __('Search Course Categories'),
			'all_items' => __('All Course Categories'),
			'parent_item' => __('Parent Course Category'),
			'parent_item_colon' => __('Parent Course Category:'),
			'edit_item' => __('Edit Course Category'),
			'update_item' => __('Update Course Category'),
			'add_new_item' => __('Add New Course Category'),
			'new_item_name' => __('New Course Category'),
			'menu_name' => __('Course Categories'),
	);
	$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'course-category' ),

	);
	register_taxonomy('training_course_category', 'training_course', $args);
}
add_action('init', 'my_taxonomies_course_cat', 0);

//Add meta box for product
//add_action( 'add_meta_boxes', 'product_url_box' );
function product_url_box()
{
	add_meta_box(
			'product_url_box',
			'Product Url',
			'product_url_box_content',
			'product',
			'side',
			'high'
	);
}

//Content of Meta box
function product_url_box_content($post)
{
	wp_nonce_field(plugin_basename(__FILE__), 'product_url_box_content_nonce');
	$value = get_post_meta($post->ID, '_product_url', true);
	if ($value == null)
		$value = "Enter product url";
	?>
	<label for="product_url_field"></label>
	<input type="text" id="product_url_field" name="product_url_field" placeholder="Enter product url" style="width: 100%; height: 50px; font-size: 14px
" value=<?php echo $value ?>/>
	<?php
}

function product_url_meta_save($post_id)
{
	if (array_key_exists('product_url_field', $_POST)) {
		update_post_meta(
				$post_id,
				'_product_url',
				$_POST['product_url_field']
		);
	}
}

//add_action( 'save_post', 'product_url_meta_save' );

//Saving Url Meta data
add_action('save_post', 'product_url_box_save');
function product_url_box_save($post_id)
{

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (!wp_verify_nonce($_POST['product_url_box_content_nonce'], plugin_basename(__FILE__)))
		return;

	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}
	$product_url = $_POST['product_url_field'];
	update_post_meta($post_id, '_product_url', $product_url);
}

//Product Url Meta shortcode
//you can put this code in functions.php or you can build a plugin for it
function metadata_in_content($attr)
{
//this is the function that will be triggerd when the code finds the proper shortcode in the content; $attr is the parameter passed throw the shortcode (leave null for now)
	global $wpdb, $wp_query;
	global $post;
	//we need global $wpdb to query the database and to get the curent post info
	if (is_object($wp_query->post)) {
		$post_id = $wp_query->post->post_id;// here we save the post id
		$metadata = get_post_meta($post_id, "_product_url", true); // here we get the needed meta, make sure you place the correct $key here, also if you don't want to get an array as response pass $single as "true"
		//return $metadata; // this finally replaces the shortcode with it's value
		return '<a href=' . $post_id . '></a>';
	}
}

//add_shortcode('product_url_code', 'metadata_in_content');
//the above code hooks the metadata_in_content function to the [insert_metadata] shortcode

//the above code hooks the metadata_in_content function to the [grid_meta key="_product_url"] shortcode
//add_shortcode('grid_meta', 'print_grid_meta');
function print_grid_meta($atts)
{

	global $post;
	$meta = get_post_meta($post->ID);

	extract(shortcode_atts(array('key' => ''), $atts));

	if ($key && array_key_exists($key, $meta)) {

		//return $meta[$key][0];
		return '<a href=' . $meta[$key][0] . '></a>';

	}
}

function my_shortcode($atts)
{
	$atts = shortcode_atts(array(
			'str' => ''
	), $atts);


	switch ($atts['str']) {
		case 'first':
			$modified = get_post_meta(get_the_ID(), '_product_url', true);
			break;
		default:
			$modified = '';
	}

	if (!empty($modified)) {
		$second_shortcode_with_value = do_shortcode("[some_shortcode value='$modified']");
	} else {
		$second_shortcode_with_value = do_shortcode('[some_shortcode]');
	}

	return $second_shortcode_with_value;
}

add_shortcode('product_url_codes', 'my_shortcode');
//[product_url_code str="first"]


//Adding Product taxonomy Category;
/*function my_taxonomies_product() {
	$labels = array(
		'name'              => _x( 'Product Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Product Categories' ),
		'all_items'         => __( 'All Product Categories' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Edit Product Category' ),
		'update_item'       => __( 'Update Product Category' ),
		'add_new_item'      => __( 'Add New Product Category' ),
		'new_item_name'     => __( 'New Product Category' ),
		'menu_name'         => __( 'Product Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'product_category', 'product', $args );
}
add_action( 'init', 'my_taxonomies_product', 0 );
*/
//button click to show more texts on webinar grid
function theme_js_script()
{
	wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/theme_script.js');
}

add_action('wp_enqueue_scripts', 'theme_js_script');
