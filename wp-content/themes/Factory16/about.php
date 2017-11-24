<?php
/**
 * Template Name: About Page
 */
 
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

<div class="about">
    <div class="row">
        <div class="column col-sm-12" style="float: none">
            <div class="content-inner">
                <div style="background-image:url(<?php echo get_post_meta( get_the_ID(), 'about_image', 1 ); ?>)" class="full-col-image">
                </div>
            </div>
        </div>
    </div>
    
    <div class="row bg-none about-top">
        <div class="column col-sm-6 left-padding-m">
            <div class="content-inner basic-padding shift-up">
                <h1 class="block-title header filler-animation"><?php echo get_the_title(); ?></h1>
                <div class="basic-text">
                    <?php echo get_wysiwyg_output('about_text', get_the_ID()); ?>
                </div>
            </div>
        </div>
        <div class="column col-sm-6 right-padding-m">
            <div class="content-inner" style="text-align: right">
			    <img src="/wp-content/uploads/2017/10/line-about.png" alt="">
    	    </div>
    	</div>
    </div>
    
    <?php the_content(); ?>
    
</div>

<?php get_footer(); ?>