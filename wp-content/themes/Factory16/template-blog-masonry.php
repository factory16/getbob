<?php
/* Template Name: Blog - masonry & grid */

/**
 * Blog masonry template
 *
 * @package vogue
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// add content controller
add_action( 'presscore_before_main_container', 'presscore_page_content_controller', 15 );

get_header();

if ( presscore_is_content_visible() ): ?>

			<!-- Content -->
			<div id="content" class="content" role="main">

				<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post(); // main loop

					echo '  <div class="case-filter">
					            <a class="logo-full" href="' . get_home_url() . '">
	                                <img class="mob-logo" src="/wp-content/uploads/2017/10/main.png" alt="">
	                            </a>
					            <div class="close-filter"></div>
                                <div class="cats-filter">
                                    <form action="">';
                                        
                    $categories = get_categories( array(
                        'orderby' => 'date',
                        'order'   => 'DESC'
                    ) );
 
	    			$counter = 0;
	    			$cats = array();
                    foreach( $categories as $category ) {
                        $children = get_categories( array( 
                            'child_of'      => $category->term_id,
                            'taxonomy'      => 'category',
                            'hide_empty'    => true,
                            'fields'        => 'ids',
                        ) );
                        
                        if ($children) {
                            array_push($cats, $category->term_id);
                            $counter += 1;
                            if ($counter === 1) $checked = 'checked';
                            else $checked = '';
                            echo '<p><input id="' . $category->slug . '" type="radio" name="category" value="' . $category->term_id . '"' . $checked . '>
                                    <label for="' . $category->slug . '">' . $category->name . '</label></p>';
                        }
                    }
                        
                    echo '          </form>
                                </div>
                                <div class="subcats-filter">';
                    
                    $counter = 0;                
                    foreach( $cats as $cat ) {
                        $subcats = get_categories( array( 
                            'child_of'      => $cat,
                            'taxonomy'      => 'category',
                            'hide_empty'    => true,
                            'fields'        => 'all',
                        ) );
                        $slug = (int) $cat;
	                    $maincat = &get_category($slug);
	                    $counter += 1;
                        if ($counter === 1) $checked = 'show-form';
                        else $checked = '';
                        echo '<form id="' . $maincat->slug . '" action="" class="' . $checked . '">';
                        echo '<p><input id="all-' . $maincat->slug . '" type="radio" name="subcategory" value="' . $maincat->term_id . '" checked>
                                    <label for="all-' . $maincat->slug . '">все</label></p>';
                        
                        foreach( $subcats as $subcat ) {
                            echo '<p><input id="' . $subcat->slug . '" type="radio" name="subcategory" value="' . $subcat->term_id . '">
                                    <label for="' . $subcat->slug . '">' . $subcat->name . '</label></p>';
                        }
                        
                        echo '</form>';
                    }            
                                    
                    echo '      </div>
						    </div>';
					echo '<div class="underlie"></div>';
					echo '<div class="articles"><div class="open-filter"></div>';

					//////////////////////
					// Custom loop //
					//////////////////////

                    $page_query = get_posts( array('numberposts' => 200) );
                    $i = 0;
                    if ( $page_query ) {
                        foreach ( $page_query as $post ) :
                            $i++;
                            setup_postdata( $post );
                            
                            presscore_get_template_part( 'theme', 'blog/masonry/blog-masonry-post' );
                            
                        endforeach;
                        
                        for ($k = 0; $k < 16 - $i; $k++) {
                            echo '<article class="blank">
                                <a class="post-link" href="#">
                                    <div class="post-holder"></div>
                                </a>
                              </article>';
                        }
                        wp_reset_postdata();
                    
                    }
				
					echo '</div>';

					do_action( 'presscore_after_loop' );

				endwhile; endif; ?>
	
			</div><!-- #content -->

		<?php
		do_action('presscore_after_content');

endif; // if content visible

get_footer(); ?>