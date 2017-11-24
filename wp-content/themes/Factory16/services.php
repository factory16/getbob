<?php
/**
 * Template Name: Services Page
 */
 
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>
<div class="services">
    <div class="row bg-grey">
        <div class="column col-sm-6 left-padding-m pads-big">
            <div class="content-inner basic-padding-sides">
                <h1 class="block-title header filler-animation"><?php echo get_the_title(); ?></h1>
                <div class="basic-text shift-up">
                    <?php echo get_wysiwyg_output('services_text', get_the_ID()); ?>
                </div>
            </div>
        </div>
        <div class="column col-sm-6 pads-big">
            <div class="content-inner" style="text-align: center">
			    <img src="<?php echo get_post_meta( get_the_ID(), 'services_image', 1 ); ?>" style="max-width: 500px" alt="">
    	    </div>
    	</div>
    </div>
    
    <div class="row bg-white vertical">
        <div class="column col-sm-6 left-padding-m pads-big">
            <div class="content-inner basic-padding-sides">
                <ul class="titles shift-up">
                    <?php 
                    
                    $entries = get_post_meta( get_the_ID(), 'services_descriptions', true );

                    foreach ( (array) $entries as $key => $entry ) {

                    	if ( isset( $entry['service_title_services'] ) ) {     $title = esc_html( $entry['service_title_services'] );
                    	}
                        if ($key == 0)
                            echo '<li id="key-' . $key . '" class="active">' . $title . '</li>';
                        else
                            echo '<li id="key-' . $key . '">' . $title . '</li>';
                    }?>
                </ul>
            </div>
        </div>
        <div class="column col-sm-6 pads-big">
            <div class="content-inner basic-padding-sides">
                <div class="descriptions">
                    <?php 
                    foreach ( (array) $entries as $key => $entry ) {
                        
                        if ( isset( $entry['service_title_services'] ) ) {     $title = esc_html( $entry['service_title_services'] );
                    	}
                    	
                    	if ( isset( $entry['service_description_services'] ) ) {
                    		$desc = wpautop( $entry['service_description_services'] );
                    	}
                    	
                        if ($key == 0)
                            echo '<div id="key-' . $key . '-son" class="active shift-up"> 
                                <h2 class="block-title filler-animation" data-text="'. $title .'">' . $title . '</h2>
                                <div class="basic-text">' . $desc . '</div>
                            </div>';
                        else
                            echo '<div id="key-' . $key . '-son" class="shifter"> 
                                <h2 class="block-title filler-animation" data-text="'. $title .'">' . $title . '</h2>
                                <div class="basic-text">' . $desc . '</div>
                            </div>';
                    }?>
                </div>
            </div>
    	</div>
    </div>
    
</div>

<?php get_footer(); ?>