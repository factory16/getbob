<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $equal_height
 * @var $content_placement
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 */
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( shortcode_atts( array(
      'twocols_head_h2' => '', 'twocols_color_bg' => 'white', 'twocols_top' => 'pads-big-top', 'twocols_bottom' => 'pads-big-bottom'
   ), $atts ) );
   
if (${twocols_top} == 'pads-big-top') $vert = 'vertical';


$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_inner',
	'vc_row-fluid'
);

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = esc_attr( trim( $css_class ) ) . '"';

$output .= '<div class="inner row left-padding-m right-padding-m bg-' . ${twocols_color_bg} . ' element ' . ${twocols_top} . ' ' . ${twocols_bottom} . ' ' . $vert . '">';// . implode( ' ', $wrapper_attributes ) . '>';

if (!empty(${twocols_head_h2})) {
        $output .= '<div class="column col-sm-12">
                        <div class="content-inner basic-padding-sides">
                            <h2 class="block-title filler-animation">' . ${twocols_head_h2} . 
                            '</h2>
                        </div>
                    </div>';
    }

$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= $after_output;

echo $output;
