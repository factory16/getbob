<?php
/**
 * Archive pages.
 *
 * @package vogue
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

			<!-- Content -->
			<div id="content" class="content" role="main">

				<?php
				if ( have_posts() ) : 
 
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
 
	    			$cats = array();
	    			$curr_cat = $curr_subcat = '';
	    			foreach( $categories as $category ) {
                        $children = get_categories( array( 
                            'child_of'      => $category->term_id,
                            'taxonomy'      => 'category',
                            'hide_empty'    => true,
                            'fields'        => 'all',
                        ) );
                        
                        if ($children) {
                            array_push($cats, $category->term_id);
                            if (is_category($category->slug)) $curr_cat = $category->slug;
                            
                        }
                        else {
                            if (is_category($category->slug)) {
                                $curr_subcat = $category->slug;
                                $curr_cat = get_category_parents( $category, false, ' ', true );
                                $curr_cat = explode(' ', $curr_cat, 2);
                                $curr_cat = $curr_cat[0];
                            }
                        }
	    			}
	    			
                    foreach( $cats as $cat ) {
                        $cat = &get_category((int) $cat);
                        if ($cat->slug == $curr_cat) $checked = 'checked';
                            else $checked = '';
                        echo '<p><input id="' . $cat->slug . '" type="radio" name="category" value="' . $cat->term_id . '"' . $checked . '>
                                    <label for="' . $cat->slug . '">' . $cat->name . '</label></p>';
                    }
                        
                    echo '          </form>
                                </div>
                                <div class="subcats-filter">';
                    
                    foreach( $cats as $cat ) {
                        $subcats = get_categories( array( 
                            'child_of'      => $cat,
                            'taxonomy'      => 'category',
                            'hide_empty'    => true,
                            'fields'        => 'all',
                        ) );
                        $cat = &get_category((int) $cat);
	                    if ($cat->slug == $curr_cat) $checked = 'show-form';
                        else $checked = '';
                        if ($curr_subcat == '' && $cat->slug == $curr_cat) $all = 'checked';
                        else $all = '';
                        echo '<form id="' . $cat->slug . '" action="" class="' . $checked . '">';
                        echo '<p><input id="all-' . $cat->slug . '" type="radio" name="subcategory" value="' . $cat->term_id . '"' . $all . '>
                                    <label for="all-' . $cat->slug . '">все</label></p>';
                        
                        foreach( $subcats as $subcat ) {
                            if ($subcat->slug == $curr_subcat) $checked = 'checked';
                            else $checked = '';
                            echo '<p><input id="' . $subcat->slug . '" type="radio" name="subcategory" value="' . $subcat->term_id . '"' . $checked . '>
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

					while ( have_posts() ) : the_post();

							presscore_archive_post_content();
							
					endwhile;
                    
                    for ($i = 0; $i < 16 - $wp_query->post_count; $i++) {
                        echo '<article class="blank">
                                <a class="post-link" href="#">
                                    <div class="post-holder"></div>
                                </a>
                              </article>';
                    }
                    
					echo '</div>';

					do_action( 'presscore_after_loop' );

				endif; ?>
	
			</div><!-- #content -->

		<?php

get_footer(); ?>