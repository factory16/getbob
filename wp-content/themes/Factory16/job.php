<?php
/**
 * Template Name: Job Page
 */
 
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>
<div class="job">
    <div class="row bg-grey">
        <div class="column col-sm-6 left-padding-m pads-big">
            <div class="content-inner basic-padding-sides">
                <h1 class="block-title header filler-animation"><?php echo get_the_title(); ?></h1>
                <div class="basic-text shift-up">
                    <?php echo get_wysiwyg_output('job_text', get_the_ID()); ?>
                </div>
            </div>
        </div>
        <div class="column col-sm-6 pads-big">
            <div class="content-inner" style="text-align: center">
			    <img src="<?php echo get_post_meta( get_the_ID(), 'job_image', 1 ); ?>" style="max-width: 500px" alt="">
    	    </div>
    	</div>
    </div>
    
    <?php the_content(); ?>
    
</div>

<?php get_footer(); ?>