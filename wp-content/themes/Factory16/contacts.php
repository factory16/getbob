<?php
/**
 * Template Name: Contacts Page
 */
 
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<div class="contacts">
    <div class="row">
        <div class="column col-sm-7">
            <div class="content-inner">
                <div style="background-image:url(<?php echo get_post_meta( get_the_ID(), 'contacts_left_image', 1 ); ?>)" class="full-col-image">
                </div>
            </div>
        </div>
        <div class="column col-sm-5 map">
            <div class="content-inner">
    		    <a href="<?php echo get_post_meta( get_the_ID(), 'contacts_map_url', 1); ?>" target="_blank">
    			    <div style="background-image:url(<?php echo get_post_meta( get_the_ID(), 'contacts_right_image', 1 ); ?>); background-size: 1300px;" class="full-col-image">
                    </div>
                </a>
    	    </div>
    	</div>
    
        <div class="column col-sm-7 left-padding-s right-padding-s bg-grey pads-small">
            <div class="content-inner basic-padding-sides">
                <hr class="no-title filler-animation">
                <div class="upper-text shift-up">
                    <?php echo get_wysiwyg_output('contacts_description_text', get_the_ID()); ?>
                </div>
            </div>
        </div>
        <div class="column col-sm-5 left-padding-s right-padding-s bg-white pads-small">
            <div class="content-inner basic-padding-sides">
                <h1 class="block-title filler-animation"><?php echo get_the_title(); ?></h1>
    		    <div class="basic-text shift-up">
                    <?php echo get_wysiwyg_output('contacts_text', get_the_ID()); ?>
                </div>
    		</div>
    	</div>
    </div>
</div>

<?php get_footer(); ?>