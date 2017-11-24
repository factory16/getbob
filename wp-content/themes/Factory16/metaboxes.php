<?php 
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//                METABOXES FOR PAGES
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////

add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
function cmb2_sample_metaboxes() {
	$prefix = '';

/////////////// CONTACTS PAGE Metaboxes ///////////////
    $cmb_contacts = new_cmb2_box( array(
		'id'            => 'contacts',
		'title'         => 'Данные для страницы КОНТАКТЫ',
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_on' => array( 'key' => 'page-template', 'value' => 'contacts.php' )
	) );

	// Left Image Contacts Template
	$cmb_contacts->add_field( array(
		'name'    => 'Изображение с адресом',
		'id'      => 'contacts_left_image',
		'type'    => 'file',
		'query_args' => array('type' => 'image'),
		'preview_size' => 'medium'
	) );

	// Right Image Contacts Template
	$cmb_contacts->add_field( array(
		'name'    => 'Изображение карты',
		'id'      => 'contacts_right_image',
		'type'    => 'file',
		'query_args' => array('type' => 'image'),
		'preview_size' => 'medium'
	) );

    // Map Link Contacts Template
	$cmb_contacts->add_field( array(
		'name' => 'Ссылка на карту',
		'id'   => 'contacts_map_url',
		'type' => 'text_url'
	) );

    // Contacts Info Contacts Template
	$cmb_contacts->add_field( array(
		'name' => 'Контактные данные',
		'id' => 'contacts_text',
		'type' => 'wysiwyg',
		'options' => array(
			'wpautop' => true,
		    'media_buttons' => false,
		    'textarea_rows' => get_option('default_post_edit_rows', 6),
	   		'teeny' => true
	    )
	) );

    // Description Text Contacts Template
	$cmb_contacts->add_field( array(
		'name' => 'Текстовый блок слева',
		'id' => 'contacts_description_text',
		'type' => 'wysiwyg',
		'options' => array(
			'wpautop' => true,
		    'media_buttons' => false,
		    'textarea_rows' => get_option('default_post_edit_rows', 6),
	   		'teeny' => true
	    )
	) );


/////////////// OG Metaboxes ///////////////
/*
	$cmb_og = new_cmb2_box( array(
		'id'            => 'opengraph',
		'title'         => 'Данные для Open Graph',
		'object_types'  => array( 'post', 'page' ),
		'context'       => 'normal',
		'priority'      => 'high'
	) );

	// OG Title
	$cmb_og->add_field( array(
		'name' => 'OG title',
		'id' => 'og_title',
		'type' => 'text',
	) );

	// OG Description
	$cmb_og->add_field( array(
		'name' => 'OG description',
		'id' => 'og_description',
		'type' => 'textarea',
	) );

	// OG Image
	$cmb_og->add_field( array(
		'name' => 'OG image',
		'id' => 'og_image',
		'type'    => 'file',
		'query_args' => array('type' => 'image'),
		'preview_size' => 'small'
	) );
*/

/////////////// JOB PAGE Metaboxes ///////////////

	$cmb_job = new_cmb2_box( array(
		'id'            => 'job',
		'title'         => 'Данные для страницы МЫ ИЩЕМ',
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_on' => array( 'key' => 'page-template', 'value' => 'job.php' )
	) );

    // Basic Text JOB Template
	$cmb_job->add_field( array(
		'name' => 'Текст  в верхней области',
		'id' => 'job_text',
		'type' => 'wysiwyg',
		'options' => array(
			'wpautop' => true,
		    'media_buttons' => false,
		    'textarea_rows' => get_option('default_post_edit_rows', 6),
	   		'teeny' => true
	    )
	) );

	// Basic Image JOB Template
	$cmb_job->add_field( array(
		'name'    => 'Изображение в верхней области',
		'id'      => 'job_image',
		'type'    => 'file',
		'query_args' => array('type' => 'image'),
		'preview_size' => 'medium'
	) );

/////////////// CASE POST Metaboxes ///////////////

	$cmb_case = new_cmb2_box( array(
		'id'            => 'case',
		'title'         => 'Данные для текущего КЕЙСА',
		'object_types'  => array( 'post', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high'
	) );
    
    // Client CASE Template
    $cmb_case->add_field( array(
    	'name'    => 'Клиент',
    	'id'      => 'case_client',
    	'type'    => 'text_medium'
    ) );  
    
    // Client Logo CASE Template
	$cmb_case->add_field( array(
		'name'    => 'Логотип',
		'id'      => 'case_logo',
		'type'    => 'file',
		'query_args' => array('type' => 'image'),
		'preview_size' => 'small'
	) );
    
    // Date From CASE Template
    $cmb_case->add_field( array(
    	'name' => 'Дата с:',
    	'id'   => 'case_from',
    	'type' => 'text_date',
    	'date_format' => 'd.m.Y'
    ) );  
    
    // Date Til CASE Template
    $cmb_case->add_field( array(
    	'name' => 'Дата по:',
    	'id'   => 'case_til',
    	'type' => 'text_date',
    	'date_format' => 'd.m.Y'
    ) );
    
    // Link Case Template
	$cmb_case->add_field( array(
		'name' => 'Ссылка на проект',
		'id'   => 'case_url',
		'type' => 'text_url'
	) );
	
	// Services Case Template
	$group_field_id_case = $cmb_case->add_field( array(
    	'id'          => 'services_case',
    	'type'        => 'group',
    	'options'     => array(
    		'group_title'   => 'Название услуги',
    		'add_button'    => 'Добавить услугу',
    		'remove_button' => 'Удалить услугу',
    		'sortable'      => true
    	),
    ) );
    $cmb_case->add_group_field( $group_field_id_case, array(
    	'name' => 'Название',
    	'id'   => 'case_title_case',
    	'type' => 'text'
    ) );
        
    // Basic Text CASE Template
	$cmb_case->add_field( array(
		'name' => 'Текст  в верхней области',
		'id' => 'case_text',
		'type' => 'wysiwyg',
		'options' => array(
			'wpautop' => true,
		    'media_buttons' => false,
		    'textarea_rows' => get_option('default_post_edit_rows', 6),
	   		'teeny' => true
	    )
	) );
	
	// Base Image for Works Template
	$cmb_case->add_field( array(
		'name'    => 'Большое изображение для страницы ВСЕ РАБОТЫ',
		'id'      => 'case_works_image',
		'type'    => 'file',
		'query_args' => array('type' => 'image'),
		'preview_size' => 'medium'
	) );

/////////////// SERVICES PAGE Metaboxes ///////////////

	$cmb_services = new_cmb2_box( array(
		'id'            => 'services',
		'title'         => 'Данные для страницы УСЛУГИ',
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_on' => array( 'key' => 'page-template', 'value' => 'services.php' )
	) );

    // Basic Text Services Template
	$cmb_services->add_field( array(
		'name' => 'Текст  в верхней области',
		'id' => 'services_text',
		'type' => 'wysiwyg',
		'options' => array(
			'wpautop' => true,
		    'media_buttons' => false,
		    'textarea_rows' => get_option('default_post_edit_rows', 6),
	   		'teeny' => true
	    )
	) );

	// Basic Image Services Template
	$cmb_services->add_field( array(
		'name'    => 'Изображение в верхней области',
		'id'      => 'services_image',
		'type'    => 'file',
		'query_args' => array('type' => 'image'),
		'preview_size' => 'medium'
	) );
	
	// Service Description Services Template
	$group_field_id_services = $cmb_services->add_field( array(
    	'id'          => 'services_descriptions',
    	'type'        => 'group',
    	'options'     => array(
    		'group_title'   => 'Описание услуги',
    		'add_button'    => 'Добавить услугу',
    		'remove_button' => 'Удалить услугу',
    		'sortable'      => true
    	),
    ) );
    $cmb_services->add_group_field( $group_field_id_services, array(
    	'name' => 'Название',
    	'id'   => 'service_title_services',
    	'type' => 'text'
    ) );
    $cmb_services->add_group_field( $group_field_id_services, array(
    	'name' => 'Описание',
    	'id'   => 'service_description_services',
    	'type' => 'wysiwyg',
		'options' => array(
			'wpautop' => true,
		    'media_buttons' => false,
		    'textarea_rows' => get_option('default_post_edit_rows', 6),
	   		'teeny' => true
	    )
    ) );

/////////////// MAIN PAGE Metaboxes - social links 
    $cmb_socials = new_cmb2_box( array(
		'id'            => 'socials',
		'title'         => 'Социальные сети и e-mail',
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_on' => array( 'key' => 'page-template', 'value' => 'main.php' )
	) );
	
	// E-mail Link
	$cmb_socials->add_field( array(
		'name' => 'E-mail',
		'id'   => 'socials_email',
		'type' => 'text_medium'
	) );
	
	// Facebook Link
	$cmb_socials->add_field( array(
		'name' => 'Facebook',
		'id'   => 'socials_facebook',
		'type' => 'text_url'
	) );
	
	// Instagram Link
	$cmb_socials->add_field( array(
		'name' => 'Instagram',
		'id'   => 'socials_instagram',
		'type' => 'text_url'
	) );
	
	// Vimeo Link
	$cmb_socials->add_field( array(
		'name' => 'Vimeo',
		'id'   => 'socials_vimeo',
		'type' => 'text_url'
	) );
	
	// LinkedIn Link
	$cmb_socials->add_field( array(
		'name' => 'LinkedIn',
		'id'   => 'socials_linkedin',
		'type' => 'text_url'
	) );


/////////////// ABOUT PAGE Metaboxes ///////////////

	$cmb_about = new_cmb2_box( array(
		'id'            => 'about',
		'title'         => 'Данные для страницы О НАС',
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_on' => array( 'key' => 'page-template', 'value' => 'about.php' )
	) );

    // Basic Text About Template
	$cmb_about->add_field( array(
		'name' => 'Текст  в верхней области',
		'id' => 'about_text',
		'type' => 'wysiwyg',
		'options' => array(
			'wpautop' => true,
		    'media_buttons' => false,
		    'textarea_rows' => get_option('default_post_edit_rows', 6),
	   		'teeny' => true
	    )
	) );

	// Basic Image Services Template
	$cmb_about->add_field( array(
		'name'    => 'Изображение в верхней области',
		'id'      => 'about_image',
		'type'    => 'file',
		'query_args' => array('type' => 'image'),
		'preview_size' => 'medium'
	) );
}

function get_wysiwyg_output( $meta_key, $post_id = 0 ) {
	global $wp_embed;

	$post_id = $post_id ? $post_id : get_the_id();

	$content = get_post_meta( $post_id, $meta_key, 1 );
	$content = $wp_embed->autoembed( $content );
	$content = $wp_embed->run_shortcode( $content );
	$content = wpautop( $content );
	$content = do_shortcode( $content );

	return $content;
}

////////////////////////////////////////
// YOAST SEO SETTINGS FROM METABOXES
////////////////////////////////////////
/*
add_action( 'wpseo_opengraph', 'change_yoast_seo_og_meta' );
function change_yoast_seo_og_meta() {
	add_filter( 'wpseo_opengraph_title', 'change_title' );
	add_filter( 'wpseo_opengraph_desc', 'change_desc' );
	add_action( 'wpseo_add_opengraph_images', 'add_images' );
}
function change_title( $title ) { return get_post_meta( get_the_ID(), 'og_title', 1 ); }
function change_desc( $desc ) { return get_post_meta( get_the_ID(), 'og_description', 1 ); }
function add_images( $object ) { $object->add_image( get_post_meta( get_the_ID(), 'og_image', 1 ) ); }*/