<?php
/**
 * Side header.
 *
 * @package the7
 * @since 3.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<div <?php presscore_header_class( 'masthead side-header' ); ?> role="banner">

	<header class="header-bar">

		<?php presscore_get_template_part( 'theme', 'header/branding' ); ?>
		
		<div class="header-bottom">
		    <p class="page-title">/ <?php
		        if (is_category()) { 
		            
		            $categories = get_categories( array(
                        'orderby' => 'date',
                        'order'   => 'DESC'
                    ) );
                    
	    			foreach( $categories as $category ) {
                        $children = get_categories( array( 
                            'child_of'      => $category->term_id,
                            'taxonomy'      => 'category',
                            'hide_empty'    => true,
                            'fields'        => 'all',
                        ) );
                        
                        if ($children) {
                            if (is_category($category->slug))
                                echo '<a href="/works">работы</a> / ' . single_cat_title( '', false );
                        }
                        else {
                            if (is_category($category->slug)) {
                                echo '<a href="/works">работы</a> / ';
                                $curr_cat = get_category_parents( $category, true, ' / ' );
                                $curr_cat = explode('</a>', $curr_cat, 2);
                                echo $curr_cat[0] . '</a> / ' . single_cat_title( '', false );
                            }
                        }
	    			}
		        }
		        if (is_single()) { echo '<a href="/works">работы</a> / '; echo get_the_title(); }
		        if (is_page()) echo get_the_title();
		    ?></p>
    		<div class="burger-holder">
    		    <button class="burger-menu"></button>
    		</div>
		</div>
		<?php 
		    if (is_page()) { 
	            $curr_page = get_the_id();
	            if ($curr_page == '2' || $curr_page == '81' || $curr_page == '36') echo '<div class="down-scroller">
		                            <div class="circle"></div>
		                            <div class="bg"></div>
		                        </div>';
		    }
            if (is_single()) echo '<div class="down-scroller">
		                            <div class="circle"></div>
		                            <div class="bg"></div>
    		                       </div>';
		 ?>
	</header>
	
	<div id="menu-show" class="hide">
	    
	    <a class="logo-full" href="<?php echo get_home_url(); ?>">
	        <img src="/wp-content/uploads/2017/10/gb.png" alt="">
	    </a>

		<?php do_action( 'presscore_before_primary_menu' );
        
        $menu_location = ( isset( $menu_location ) ? $menu_location : 'primary' );
        
        echo '<ul id="' . esc_attr( "{$menu_location}-menu" ) . '" class="' . implode( ' ', presscore_get_primary_menu_class( 'main-nav' ) ) . '" role="menu">';
        
        	presscore_primary_nav_menu( $menu_location );
        
        echo '</ul>';
        
        do_action( 'presscore_after_primary_menu' ); 
        ?>
		<div class="close-holder">
		    <button class="close-menu"></button>
		</div>

    </div>

</div>


<div class="mobile-header-bar">
    <div class='mobile-navigation'>
        <div class="burger-holder">
            <button class="burger-menu"></button>
        </div>
    </div>
    <div class='mobile-branding'>
        <?php presscore_get_template_part( 'theme', 'header/branding' ); ?>
    </div>
</div>
	