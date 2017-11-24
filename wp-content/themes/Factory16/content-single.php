<?php
/**
 * Single post content template.
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

$config = presscore_config();

$post_classes = array();
if ( $config->get_bool( 'post.fancy_date.enabled' ) ) {
	$post_classes[] = presscore_blog_fancy_date_class();
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>

	<?php
	do_action( 'presscore_before_post_content' );

	// Post content.
	echo '<div class="entry-content case">';
	echo '<div class="row bg-grey">
            <div class="column col-sm-6 left-padding-m">
                <div class="content-inner basic-padding shift-up">
                
                    <div class="row bg-grey info pads-top">
                        <div class="column col-sm-6">
                            <div class="content-inner shift-up">
                                <div class="basic-text">
                                    <p>клиент: ' . get_post_meta( get_the_ID(), 'case_client', 1 ) . '</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="column col-sm-6">
                            <div class="content-inner shift-up">
                                <div class="basic-text">';
    
    if (!empty( get_post_meta( get_the_ID(), 'case_til', 1 ) ))
        echo '
                                    <p>дата: ' . get_post_meta( get_the_ID(), 'case_from', 1 ) .'-' . get_post_meta( get_the_ID(), 'case_til', 1 ) . '</p>';
    else echo '
                                    <p>дата: ' . get_post_meta( get_the_ID(), 'case_from', 1 ) . '</p>';
                                    
    if ( has_post_thumbnail() && !$hide_thumbnail ) {
		$thumb_id = get_post_thumbnail_id();
		$thumb_meta = wp_get_attachment_image_src( $thumb_id, 'full' );
		$url = wp_make_link_relative($thumb_meta[0]);
    	$url = substr($url, 1);
    	$image = wp_get_image_editor( $url );
        if ( ! is_wp_error( $image ) ) {
            $image->resize( '800' , '800', true );
        	$saved = $image->save();
        }
	}
	
    echo '                      </div>
                            </div>
                    	</div>
                    </div>
                    
                    <h1 class="block-title header filler-animation">' .  get_the_title() . '</h1>
                    
                    <img src="/' . $saved['path'] . '" alt="">
                    
                    <div class="basic-text">' . get_wysiwyg_output('case_text', get_the_ID()) . '
                    </div>';
        
    $url_test = get_post_meta( get_the_ID(), 'case_url', 1 );           
    if (!empty( $url_test )) {
        if(filter_var($url_test, FILTER_VALIDATE_URL)) {
            echo '<a class="site-link" href="' . $url_test . '"><p>переход на сайт</p></a>';    
        }
    }
                    
    echo '      </div>
            </div>
            <div class="column col-sm-6 pic-col">
                <div class="content-inner">';
    
	if ( has_post_thumbnail() && !$hide_thumbnail )
        echo '<img src="/' . $saved['path'] . '" alt="">';
    echo '      </div>
                <div class="row">
                    <div class="column col-sm-12 right-padding-m">
                        <div class="content-inner basic-padding shift-up services-case">
                            <h1 class="block-title filler-animation">Услуги</h1>
                            <div class="basic-text">';
                        
    $entries = get_post_meta( get_the_ID(), 'services_case', true );

    foreach ( (array) $entries as $key => $entry ) {

    	if ( isset( $entry['case_title_case'] ) ) {
    	    echo '<p>' . esc_html( $entry['case_title_case'] ) . '</p>';
    	}
    }
    echo '                  </div>
                        </div>
                    </div>
                </div>
        	</div>
        </div>';
	
	the_content();

    echo ' <div class="row pads-big-top bg-white vertical">
                <div class="column col-sm-12 left-padding-m">
                    <div class="content-inner basic-padding-sides shift-up services-case">
                        <h2 class="block-title filler-animation">Другие работы</h2>
                    </div>
                </div>
        	</div>';
        	
	echo '  <div class="row">
                <div class="column col-sm-12">';
                
    $cats = get_the_category();
    $type_ids = $client_ids = [];
    foreach( $cats as $cat ) {
        if ($cat->category_parent) {
            if ($cat->category_parent == '17') array_push($type_ids, $cat->cat_ID);
            if ($cat->category_parent == '14') array_push($client_ids, $cat->cat_ID);
        }
    }
    
    $counter = 0;
    $basepost = $post->ID;
    $res = [];
    foreach( $client_ids as $client_id ) {
        $args = array(
            'category__in' => array($client_id),
            'post__not_in' => array($basepost),
            'posts_per_page'=>2,
            'caller_get_posts'=>1,
            'orderby'=>'rand'
        );
        $client_query = new WP_Query($args);
        if ($client_query->have_posts()) {
            while ($client_query->have_posts()) {
                $client_query->the_post();
                $counter += 1;
                array_push($res, get_the_ID());
                if ($counter >= 2) break;
            }
        }
    }
    
    if ($counter < 2) {
        foreach( $type_ids as $type_id ) {
            if ($counter == 0)
                $args = array(
                    'category__in' => array($type_id),
                    'post__not_in' => array($basepost),
                    'posts_per_page'=>2,
                    'caller_get_posts'=>1,
                    'orderby'=>'rand'
                );
            else
                $args = array(
                    'category__in' => array($type_id),
                    'post__not_in' => array($basepost, $res[0]),
                    'posts_per_page'=>2,
                    'caller_get_posts'=>1,
                    'orderby'=>'rand'
                );
            $type_query = new WP_Query($args);
            if ($type_query->have_posts()) {
                while ($type_query->have_posts()) {
                    $type_query->the_post();
                    $counter += 1;
                    array_push($res, get_the_ID());
                    if ($counter >= 2) break;
                }
            }
        }
    }
    
    if ($counter < 2) {
        if ($counter == 0)
            $args = array(
                'post__not_in' => array($basepost),
                'posts_per_page'=>2,
                'caller_get_posts'=>1,
                'orderby'=>'rand'
            );
        else
            $args = array(
                'post__not_in' => array($basepost, $res[0]),
                'posts_per_page'=>2,
                'caller_get_posts'=>1,
                'orderby'=>'rand'
            );
        $rand_query = new WP_Query($args);
        if ($rand_query->have_posts()) {
            while ($rand_query->have_posts()) {
                $rand_query->the_post();
                $counter += 1;
                array_push($res, get_the_ID());
                if ($counter >= 2) break;
            }
        }
    }
    $post = $basepost;
    wp_reset_query();
    
    echo '          <div class="related_articles">';
    
    foreach( $res as $res_item ) {

        if ( has_post_thumbnail() && !$hide_thumbnail ) {
        	$url = get_post_meta( $res_item, 'case_works_image', 1 );
        	$url = wp_parse_url($url);
        	$url = substr( $url['path'], 1 );
        	$image = wp_get_image_editor( $url );
            if ( ! is_wp_error( $image ) ) {
                $image->resize( '600' , '300', true );
            	$saved = $image->save();
            }
        }

        $logo = get_post_meta( $res_item, 'case_logo', 1 );
        if (!empty( $logo )) {
        	$url_logo = $logo;
        	$url_logo = wp_parse_url($url_logo);
        	$url_logo = substr( $url_logo['path'], 1 );
        	$image_logo = wp_get_image_editor( $url_logo );
            if ( ! is_wp_error( $image ) ) {
                $image_logo->resize( '200', NULL, true );
            	$saved_logo = $image_logo->save();
            }
        }
        
        do_action( 'presscore_before_post' );

	    echo '<article>
	            <a class="post-link" href="' . get_the_permalink($res_item) . '" style="background-image: url(/' . $saved['path'] . ')">
                    <div class="post-holder">
                        <img class="logo" src="/' . $saved_logo['path'] . '" alt="">
    			        <p class="post-title">' . get_the_title($res_item) . '</p>
		            </div>
                </a>
            </article>';

        do_action( 'presscore_after_post' );
    }
                    
    echo '          </div>
                </div>
        	</div>';
    
	echo '</div>';
	do_action( 'presscore_after_post_content' );
	?>

</article>