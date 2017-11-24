<?php
/**
 * Frontend functions.
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/////////////////////
// Enqueue scripts //
/////////////////////

if ( ! function_exists( 'presscore_register_scripts' ) ) :

	/**
	 * Register theme styles and scripts.
     *
     * @since 5.4.0
	 */
    function presscore_register_scripts() {
        $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
        $template_uri = get_template_directory_uri();

        $register_styles = array(
            'dt-main'         => array(
                'src'     => "{$template_uri}/css/main{$suffix}.css",
            )
        );

        foreach ( $register_styles as $name => $props ) {
            wp_register_style( $name, $props['src'], array(), THE7_VERSION, 'all' );
        }
    }

endif;

if ( ! function_exists( 'presscore_enqueue_scripts' ) ) :

	/**
	 * Enqueue scripts and styles.
	 */
	function presscore_enqueue_scripts() {
		global $wp_styles;

		// Enqueue web fonts if needed.
		presscore_enqueue_web_fonts();
		presscore_register_scripts();

		wp_enqueue_style( 'dt-main' );

		// Get theme config.
		$config = presscore_config();

		// Loader inline css.
		wp_add_inline_style( 'dt-main', presscore_get_loader_inline_css() );

		// Queue dt-main js first.
		global $wp_scripts;

		$dt_main_key = array_search( 'dt-main', $wp_scripts->queue );
		if ( $dt_main_key !== false ) {
			unset( $wp_scripts->queue[ $dt_main_key ] );
		}

		array_unshift( $wp_scripts->queue, 'dt-main' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'presscore_enqueue_scripts', 15 );

/**
 * Enqueue dynamic stylesheets.
 *
 * @since 3.7.1
 * @see dynamic-styleheets-functions.php
 */
add_action( 'wp_enqueue_scripts', 'presscore_enqueue_dynamic_stylesheets', 20 );

if ( ! function_exists( 'presscore_enqueue_custom_css' ) ):

	/**
	 * Allow override css from theme options.
	 *
	 * @since 3.8.1
	 */
	function presscore_enqueue_custom_css() {
		wp_enqueue_style( 'style', get_stylesheet_uri(), array(), THE7_VERSION );

		// Add custom css from theme options.
		$custom_css = of_get_option( 'general-custom_css', '' );
		if ( $custom_css ) {
			wp_add_inline_style( 'style', $custom_css );
		}
	}

	//add_action( 'wp_enqueue_scripts', 'presscore_enqueue_custom_css', 30 );

endif;

if ( ! function_exists( 'presscore_print_beautiful_loading_scripts_in_footer' ) ):

	function presscore_print_beautiful_loading_scripts_in_footer() {
	
?>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(event) { 
	var $load = document.getElementById("load");
	
	var removeLoading = setTimeout(function() {
		$load.className += " loader-removed";
	}, 500);
});
</script>
<?php
	}

	add_action( 'wp_head', 'presscore_print_beautiful_loading_scripts_in_footer', 20 );

endif;

/**
 * Add new body classes.
 *
 */
if ( ! function_exists( 'presscore_body_class' ) ) :

	function presscore_body_class( $classes ) {
		$config = Presscore_Config::get_instance();
		$desc_on_hoover = ( 'under_image' != $config->get('post.preview.description.style') );
		$template = $config->get('template');
		$layout = $config->get('layout');

		///////////////////////
		// template classes //
		///////////////////////

		switch ( $template ) {
			case 'blog':
				$classes[] = 'blog';
				break;
			case 'portfolio': $classes[] = 'portfolio'; break;
			case 'team': $classes[] = 'team'; break;
			case 'testimonials': $classes[] = 'testimonials'; break;
			case 'archive': $classes[] = 'archive'; break;
			case 'search': $classes[] = 'search'; break;
			case 'albums': $classes[] = 'albums'; break;
			case 'media': $classes[] = 'media'; break;
			case 'microsite': $classes[] = 'one-page-row'; break;
		}

		/////////////////////
		// layout classes //
		/////////////////////

		switch ( $layout ) {
			case 'masonry':
				if ( $desc_on_hoover ) {
					$classes[] = 'layout-masonry-grid';

				} else {
					$classes[] = 'layout-masonry';
				}
				break;
			case 'grid':
				$classes[] = 'layout-grid';
				if ( $desc_on_hoover ) {
					$classes[] = 'grid-text-hovers';
				}
				break;
			case 'checkerboard':
			case 'list':
			case 'right_list':
				$classes[] = 'layout-list';
				break;
		}

		////////////////////
		// hover classes //
		////////////////////

		if ( in_array($layout, array('masonry', 'grid')) && !in_array($template, array('testimonials', 'team')) ) {
			$classes[] = $desc_on_hoover ? 'description-on-hover' : 'description-under-image';
		}

		//////////////////////////////////////
		// hide dividers if content is off //
		//////////////////////////////////////

		if ( in_array($config->get('template'), array('albums', 'portfolio')) && 'masonry' == $config->get('layout') ) {
			$show_dividers = $config->get('show_titles') || $config->get('show_details') || $config->get('show_excerpts') || $config->get('show_terms') || $config->get('show_links');
			if ( !$show_dividers ) {
				$classes[] = 'description-off';
			}
		}

		/////////////////////
		// single classes //
		/////////////////////

		if ( is_single() && ( post_password_required() || ( ! comments_open() && '0' == get_comments_number() ) ) ) {
			$classes[] = 'no-comments';
		}

		////////////////////////
		// header background //
		////////////////////////

		if ( presscore_mixed_header_with_top_line() ) {
			$classes[] = 'header-top-line-active';
		}

		if ( presscore_header_with_bg() && ( presscore_mixed_header_with_top_line() || ! presscore_header_layout_is_side() ) ) {

			switch ( $config->get('header_background') ) {
				case 'overlap':
					$classes['header_background'] = 'overlap';
					break;
				case 'transparent':
					$classes['header_background'] = 'transparent';

					if ( 'light' === $config->get( 'header.transparent.color_scheme' ) ) {
						$classes[] = 'light-preset-color';
					}

					break;
			}

			if (
				$config->get_bool( 'header.slideshow.header_below' ) 
				&& 'slideshow' === $config->get( 'header_title' ) 
				&& in_array( $config->get( 'header_background' ), array( 'transparent', 'normal' ) ) 
			) {
				$classes[] = 'floating-navigation-below-slider';
			}

		}

		///////////////////
		// header title //
		///////////////////

		if ( 'fancy' == $config->get( 'header_title' ) ) {
			$classes[] = 'fancy-header-on';

		} elseif ( 'slideshow' == $config->get( 'header_title' ) ) {
			$classes[] = 'slideshow-on';

			if ( '3d' == $config->get( 'slideshow_mode' ) && 'fullscreen-content' == $config->get( 'slideshow_3d_layout' ) ) {
				$classes[] = 'threed-fullscreen';

			}

			if ( dt_get_paged_var() > 1 && isset($classes['header_background']) ) {
				unset($classes['header_background']);

			}

		} elseif ( is_single() && 'disabled' == $config->get( 'header_title' ) ) {
			$classes[] = 'title-off';

		}

		/////////////////////
		// responsiveness //
		/////////////////////

		if ( !presscore_responsive() ) {
			$classes[] = 'responsive-off';
		}else{
			$classes[] = 'dt-responsive-on';
		}

		/////////////////////
		// justified grid //
		/////////////////////

		if ( $config->get( 'justified_grid' ) ) {
			$classes[] = 'justified-grid';
		}

		////////////////////
		// header layout //
		////////////////////
        $classes[] = 'header-side-left';

		if ( 'side_line' === $config->get( 'header.mixed.view' ) ) {
			$classes[] = 'header-side-line';

			switch ( $config->get( 'header.mixed.view.side_line.position' ) ) {
				case 'above':
					$classes[] = 'header-above-side-line';
					break;
				case 'under':
					$classes[] = 'header-under-side-line';
					break;
			}
		}

		//////////////////////////////
		// srcset based hd images //
		//////////////////////////////

		$classes[] = 'srcset-enabled';

		$classes[] = presscore_array_value( $config->get( 'header.mobile.floatin_navigation' ), array(
			'sticky'    => 'sticky-mobile-header',
			'menu_icon' => 'floating-mobile-menu-icon',
		) );

		////////////////////////////////////
		// Sidebar and footer on mobile //
		////////////////////////////////////
		if ( in_array( $config->get( 'header.layout' ), array( 'classic', 'inline', 'split' ) ) ) {
			$classes[] = 'top-header';
		}

		// mobile logo
		$classes[] = presscore_array_value( $config->get( 'header.mobile.logo.first_switch.layout' ), array(
			'left_right' => 'first-switch-logo-right first-switch-menu-left',
			'left_center' => 'first-switch-logo-center first-switch-menu-left',
			'right_left' => 'first-switch-logo-left first-switch-menu-right',
			'right_center' => 'first-switch-logo-center first-switch-menu-right',
		) );

		$classes[] = presscore_array_value( $config->get( 'header.mobile.logo.second_switch.layout' ), array(
			'left_right' => 'second-switch-logo-right second-switch-menu-left',
			'left_center' => 'second-switch-logo-center second-switch-menu-left',
			'right_left' => 'second-switch-logo-left second-switch-menu-right',
			'right_center' => 'second-switch-logo-center second-switch-menu-right',
		) );

		if ( presscore_lazy_loading_enabled() ) {
			$classes[] = 'layzr-loading-on';
		}

		/////////////
		// return //
		/////////////

		return array_values( array_unique( $classes ) );
	}
	add_filter( 'body_class', 'presscore_body_class' );

endif;

if ( ! function_exists( 'presscore_get_blank_image' ) ) :

	/**
	 * Get blank image.
	 *
	 */
	function presscore_get_blank_image() {
		return PRESSCORE_THEME_URI . '/images/1px.gif';
	}

endif; // presscore_get_blank_image

if ( ! function_exists( 'presscore_get_default_avatar' ) ) :

	/**
	 * Get default avatar.
	 *
	 * @return string.
	 */
	function presscore_get_default_avatar() {
		return PRESSCORE_THEME_URI . '/images/no-avatar.gif';
	}

endif; // presscore_get_default_avatar

if ( !function_exists('presscore_get_default_image') ) :

	/**
	 * Get default image.
	 *
	 * Return array( 'url', 'width', 'height' );
	 *
	 * @return array.
	 */
	function presscore_get_default_image() {
		return array( PRESSCORE_THEME_URI . '/images/noimage.jpg', 1000, 700 );
	}

endif;

if ( !function_exists('presscore_get_default_thumbnail_image') ) :

	/**
	 * Get default image.
	 *
	 * Return array( 'url', 'width', 'height' );
	 *
	 * @return array.
	 */
	function presscore_get_default_thumbnail_image() {
		return array( PRESSCORE_THEME_URI . '/images/noimage-thumbnail.jpg', 150, 150 );
	}

endif;

if ( !function_exists('presscore_get_default_small_image') ) :

	/**
	 * Get default image.
	 *
	 * Return array( 'url', 'width', 'height' );
	 *
	 * @return array.
	 */
	function presscore_get_default_small_image() {
		return array( PRESSCORE_THEME_URI . '/images/noimage-small.jpg', 119, 119 );
	}

endif;

if ( ! function_exists( 'presscore_get_widgetareas_options' ) ) :

	/**
	 * Prepare array with widgetareas options.
	 *
	 */
	function presscore_get_widgetareas_options() {
		global $wp_registered_sidebars;

		return wp_list_pluck( $wp_registered_sidebars, 'name', 'id' );
	}

endif; // presscore_get_widgetareas_options

if ( ! function_exists( 'presscore_enqueue_web_fonts' ) ) :

	/**
	 * Web fonts override.
	 *
	 */
	function presscore_enqueue_web_fonts() {
		$fonts = array();
		$options = _optionsframework_get_clean_options();
		foreach ( $options as $option ) {
			if ( 'web_fonts' !== $option['type'] ) {
			    continue;
			}

			$font_obj = new Presscore_Web_Font( of_get_option( $option['id'] ) );
            $font_obj->add_weight( '600' );
            $font_obj->add_weight( '700' );

			$fonts[] = (string) $font_obj;
		}

		$fonts_compressor = new Presscore_Web_Fonts_Compressor();
		$compressed_fonts = $fonts_compressor->compress_fonts( presscore_filter_web_fonts( $fonts ) );

		wp_enqueue_style( 'dt-web-fonts', dt_make_web_font_uri( $compressed_fonts ) );
	}

endif;

if ( ! function_exists( 'presscore_filter_web_fonts' ) ) :

	function presscore_filter_web_fonts( $fonts ) {

		$web_fonts = array();
		foreach ( $fonts as $font ) {
			if ( dt_stylesheet_maybe_web_font( $font ) ) {
				$web_fonts[] = $font;
			}
		}

		return $web_fonts;
	}

endif;

if ( ! function_exists( 'presscore_comment_id_fields_filter' ) ) :

	/**
	 * PressCore comments fields filter. Add Post Comment and clear links before hudden fields.
	 *
	 * @since presscore 0.1
	 */
	function presscore_comment_id_fields_filter( $result ) {
		$comment_buttons = presscore_get_button_html( array( 'href' => 'javascript:void(0);', 'title' => __( 'Post comment', 'the7mk2' ), 'class' => 'dt-btn dt-btn-m' ) );

		return $comment_buttons . $result;
	}

endif; // presscore_comment_id_fields_filter

add_filter( 'comment_id_fields', 'presscore_comment_id_fields_filter' );

if ( ! function_exists( 'presscore_add_compat_header' ) ) {

	add_filter( 'wp_headers', 'presscore_add_compat_header' );

	/**
	 * [presscore_add_compat_header description]
	 * 
	 * @param  array $headers
	 * @return array
	 */
	function presscore_add_compat_header( $headers ) {
		if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false) {
			$headers['X-UA-Compatible'] = 'IE=EmulateIE10';
		}
		return $headers;
	}
}
