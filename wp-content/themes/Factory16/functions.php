<?php
/**
 * The7 theme.
 *
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since 1.0.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}

/**
 * Initialize theme.
 *
 * @since 1.0.0
 */
require( trailingslashit( get_template_directory() ) . 'inc/init.php' );
require( trailingslashit( get_template_directory() ) . 'metaboxes.php' );
require( trailingslashit( get_template_directory() ) . 'vc-elements.php' );


add_filter( 'sass_configuration', 'my_sass_config' );
function my_sass_config( $defaults ) {
  return array(
    'variables' => array( 'style.scss' )
  );
}

function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

add_action('admin_head', 'hide_params');
function hide_params() {
   echo '<style>.vc_column-edit, .hide_params, .vc_controls-row, .vc_welcome-header, .vc_ui-help-block, #vc_no-content-helper.vc_not-empty, .vc_controls-row .vc_column-add, .vc_column-toggle, a.set_columns { display: none !important } .wpb_vc_row_inner .vc_controls-row, .wpb_vc_row_inner .vc_controls-row .vc_column-edit {display: block !important} a.set_columns[data-cells="12_12"], a.set_columns[data-cells="13_13_13"] {display: inline-block !important} .cmb2-wrap input {margin-left: 0px !important}</style>';
}

function debug_to_console( $data ) {
if ( is_array( $data ) )
 $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
 else
 $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
echo $output;
}

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Кейсы';
    $submenu['edit.php'][5][0] = 'Кейсы';
    $submenu['edit.php'][10][0] = 'Добавить кейс';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Кейсы';
    $labels->singular_name = 'Кейсы';
    $labels->add_new = 'Добавить кейс';
    $labels->add_new_item = 'Добавить кейс';
    $labels->edit_item = 'Редактировать кейс';
    $labels->new_item = 'Кейсы';
    $labels->view_item = 'Просмотреть кейс';
    $labels->search_items = 'Искать кейсы';
    $labels->not_found = 'Кейсы не обнаружены';
    $labels->not_found_in_trash = 'Кейсы в корзине не обнаружены';
    $labels->all_items = 'Все кейсы';
    $labels->menu_name = 'Кейсы';
    $labels->name_admin_bar = 'Кейсы';
}
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

function ryanbenhase_unregister_tags() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'ryanbenhase_unregister_tags' );

/*
Based on Category Checklist Tree, by scribu
Preserves the category hierarchy on the post editing screen
Removes parent categories checkbox selection
*/
class Category_Checklist {

    function init() {
        add_filter( 'wp_terms_checklist_args', array( __CLASS__, 'checklist_args' ) );
    }

    function checklist_args( $args ) {
        add_action( 'admin_footer', array( __CLASS__, 'script' ) );

        $args['checked_ontop'] = false;

        return $args;
    }

    // Scrolls to first checked category
    function script() {
?>
<script type="text/javascript">
    jQuery(function(){
        jQuery('[id$="-all"] > ul.categorychecklist').each(function() {
            var $list = jQuery(this);
            var $firstChecked = $list.find(':checked').first();

            if ( !$firstChecked.length )
                return;

            var pos_first = $list.find(':checkbox').position().top;
            var pos_checked = $firstChecked.position().top;

            $list.closest('.tabs-panel').scrollTop(pos_checked - pos_first + 5);
        });

        jQuery("#categorychecklist>li>label input").each(function(){
            jQuery(this).remove();
        });

    });
</script>
<?php
    }
}
Category_Checklist::init();

add_action( 'get_header', 'dt_archive_footer', 10 );
function dt_archive_footer() {
	$config = Presscore_Config::get_instance();
	if( is_archive() ) { $config->set( 'footer_show', '1' ); }
}

//////
function my_admin_head() {
	$id_page = get_the_ID();
	if ($id_page == '165' || $id_page == '23' || $id_page == '131' || $id_page == '81') {
        echo '<style>#wpb_visual_composer {display: none !important}</style>';
    }
}
add_action('admin_head', 'my_admin_head');

//////
add_filter('http_request_args', 'bal_http_request_args', 100, 1);
function bal_http_request_args($r) //called on line 237
{
	$r['timeout'] = 15;
	return $r;
}
 
add_action('http_api_curl', 'bal_http_api_curl', 100, 1);
function bal_http_api_curl($handle) //called on line 1315
{
	curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 15 );
	curl_setopt( $handle, CURLOPT_TIMEOUT, 15 );
}


add_action( 'vc_before_init', 'vc_before_init_actions' );
function vc_before_init_actions() {
    if( function_exists('vc_set_shortcodes_templates_dir') ){ 
        vc_set_shortcodes_templates_dir( get_template_directory() . '/vc_templates' );
    }
}

add_action( 'vc_after_init', 'vc_after_init_actions' );
function vc_after_init_actions() {
    // Remove Params
    if( function_exists('vc_remove_param') ){
        vc_remove_param( 'vc_row_inner', 'el_id' );
        vc_remove_param( 'vc_row_inner', 'equal_height' );
        vc_remove_param( 'vc_row_inner', 'content_placement' );
        vc_remove_param( 'vc_row_inner', 'gap' );
        vc_remove_param( 'vc_row_inner', 'disable_element' );
        vc_remove_param( 'vc_row_inner', 'el_class' );
        vc_remove_param( 'vc_row_inner', 'css' );
    }
    
    // Add Params
    $vc_row_new_params = array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Подзаголовок (h2)",
            "param_name" => "twocols_head_h2"
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Цвет фона",
            "param_name" => "twocols_color_bg",
            "value" => array( "Белый" => "white", "Серый" => "grey" ),
            "std" => "white",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ сверху",
            "param_name" => "twocols_top",
            "value" => array( "Большой с линией" => "pads-big-top", "Маленький" => "pads-small-top" ),
            "std" => "pads-big-top",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ снизу",
            "param_name" => "twocols_bottom",
            "value" => array( "Большой" => "pads-big-bottom", "Маленький" => "pads-small-bottom" ),
            "std" => "pads-big-bottom",
            "admin_label" => true
         )
    );
    vc_add_params( 'vc_row_inner', $vc_row_new_params ); 
}


///////////
// REST API
add_filter('rest_enabled', '__return_false');

// фильтры REST API
remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
remove_action( 'wp_head',                    'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect',          'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// события REST API
remove_action( 'init',          'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );

// Embeds REST API
remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

/////
function f16_all_scriptsandstyles() {
wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
wp_enqueue_script( 'jquery' );
wp_deregister_script( 'jquery-migrate' );
wp_register_script( 'jquery-migrate', includes_url( '/js/jquery/jquery-migrate.min.js' ), false, NULL, true );
wp_enqueue_script( 'jquery-migrate' );


$temp = get_the_ID();
wp_register_script ('custom-jquery', get_stylesheet_directory_uri() . '/js/custom-jquery.js', array( 'jquery' ),'1',true);
wp_enqueue_script('custom-jquery');

wp_register_script ('animateNumber', get_stylesheet_directory_uri() . '/js/jquery.animateNumber.min.js', array( 'jquery' ),'0',true);
wp_enqueue_script('animateNumber');
wp_register_script ('magnific-popup', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ),'1',true);
wp_enqueue_script('magnific-popup');
wp_register_style ('magnific-popup-style', get_stylesheet_directory_uri() . '/js/magnific-popup.css', array(),'1','all');
wp_enqueue_style( 'magnific-popup-style');
wp_register_script ('mCustomScrollbar', get_stylesheet_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ),'1',true);
wp_enqueue_script('mCustomScrollbar');
wp_register_style ('mCustomScrollbarStyle', get_stylesheet_directory_uri() . '/js/jquery.mCustomScrollbar.min.css', array(),'1','all');
wp_enqueue_style( 'mCustomScrollbarStyle');
wp_register_script ('mThumbnailScroller', get_stylesheet_directory_uri() . '/js/jquery.mThumbnailScroller.min.js', array( 'jquery' ),'1',true);
wp_enqueue_script('mThumbnailScroller');
wp_register_style ('mThumbnailScrollerStyle', get_stylesheet_directory_uri() . '/js/jquery.mThumbnailScroller.css', array(),'1','all');
wp_enqueue_style( 'mThumbnailScrollerStyle');
wp_register_script ('marquee', get_stylesheet_directory_uri() . '/js/jquery.marquee.min.js', array( 'jquery' ),'1',true);
wp_enqueue_script('marquee');
}
add_action( 'wp_enqueue_scripts', 'f16_all_scriptsandstyles' );