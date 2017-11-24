<?php
/**
 * Blog post template for masonry layout.
 */

// File Security Check.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_class = array( 'post' );

if ( has_post_thumbnail() && !$hide_thumbnail ) {
	$url = get_post_meta( get_the_ID(), 'case_works_image', 1 );
	$url = wp_parse_url($url);
	$url = substr( $url['path'], 1 );
	$image = wp_get_image_editor( $url );
    if ( ! is_wp_error( $image ) ) {
        $image->resize( '1180' , '800', true );
    	$saved = $image->save();
    }
}

$logo = get_post_meta( get_the_ID(), 'case_logo', 1 );
if (!empty( $logo )) {
	$url_logo = $logo;
	$url_logo = wp_parse_url($url_logo);
	$url_logo = substr( $url_logo['path'], 1 );
	$image_logo = wp_get_image_editor( $url_logo );
    if ( ! is_wp_error( $image ) ) {
        $image_logo->resize( '100' , NULL, true );
    	$saved_logo = $image_logo->save();
    }
}
?>

<?php do_action( 'presscore_before_post' ); ?>

	<article>

        <a class="post-link" href="<?php the_permalink(); ?>" data-img="/<?php echo $saved['path']; ?>" style="background-image: url(/<?php echo $saved['path']; ?>)">
            <div class="post-holder">
                <img class="logo" src="/<?php echo $saved_logo['path']; ?>">
    			<p class="post-title"><?php the_title(); ?></p>
		    </div>
        </a>
        
	</article>

<?php do_action( 'presscore_after_post' ); ?>