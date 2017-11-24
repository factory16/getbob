<?php
/**
 * The Header for single posts.
 *
 * @package the7
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?><!DOCTYPE html>
<!--[if lt IE 10 ]>
<html <?php language_attributes(); ?> class="old-ie no-js">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php if ( presscore_responsive() ) : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<?php endif; ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	<?php if(get_the_ID() == '23') echo '<style>@media screen and (min-width: 1199px) {html, body, .page-template-contacts #page, .page-template-contacts .wf-wrap, .page-template-contacts .wf-container-main {height: 100%;} .page-template-contacts #main {height: calc(100% - 70px);}}</style>'; ?>
	<?php if (is_front_page()): ?>
	<meta name="ad.size" content="width=1180,height=650" > 
	<meta name="authoring-tool" content="Adobe_Animate_CC">
	<script src="https://s0.2mdn.net/ads/studio/cached_libs/tweenmax_1.18.0_499ba64a23378545748ff12d372e59e9_min.js"></script>
	<script src="https://s0.2mdn.net/ads/studio/cached_libs/createjs_2015.11.26_54e1c3722102182bb133912ad4442e19_min.js"></script>
	<script src="/wp-content/themes/Factory16/js/project.js"></script>	
    <script>
	var canvas, stage, exportRoot, stg;
	function init() {
		canvas = document.getElementById("canvas");
		images = images||{};
		var loader = new createjs.LoadQueue(false);
		loader.addEventListener("fileload", handleFileLoad);
		loader.addEventListener("complete", handleComplete);
		loader.loadManifest(lib.properties.manifest);
	}
	function handleFileLoad(evt) {	
		if (evt.item.type == "image") { images[evt.item.id] = evt.result; }	
	}
	function handleComplete(evt) {
		//This function is always called, irrespective of the content. You can use the variable "stage" after it is created in token create_stage.
		var queue = evt.target;
		var ssMetadata = lib.ssMetadata;
		for(i=0; i<ssMetadata.length; i++) {
			ss[ssMetadata[i].name] = new createjs.SpriteSheet( {"images": [queue.getResult(ssMetadata[i].name)], "frames": ssMetadata[i].frames} )
		}
		exportRoot = new lib.project();
		stage = new createjs.Stage(canvas);
		stage.addChild(exportRoot);	
		stage.enableMouseOver();
		stg = stage.getChildAt(0).main_mc;

		//Registers the "tick" event listener.
		fnStartAnimation = function() {
			createjs.Ticker.setFPS(lib.properties.fps);
			createjs.Ticker.addEventListener("tick", stage);
		}	    
		fnStartAnimation();
		resizeApp();
		window.addEventListener('resize', resizeApp, false);
	}
	function resizeApp() {
    	screenW = window.innerWidth * 1;
    	screenH = window.innerHeight * 1;
	   	scrRatio = window.devicePixelRatio;
	    stage.canvas.width = canvas.width = screenW * scrRatio;
	    stage.canvas.height = canvas.height = screenH * scrRatio;
	    canvas.style.width = screenW + 'px';
 	    canvas.style.height = screenH + 'px';
  	    stg.x = (screenW / 2) * scrRatio;
	    stg.y = (screenH / 2) * scrRatio;
  	}
    </script>
<?php endif; ?>
</script>
</head>
<body <?php if (is_front_page()): { echo 'onload="init();" style="margin:0px;overflow: hidden" '; } endif; body_class();  ?>>
<?php
do_action( 'presscore_body_top' );

$config = presscore_config();
?>

<div id="page">
<?php
if ( apply_filters( 'presscore_show_header', true ) ) {
	presscore_get_template_part( 'theme', 'header/header', str_replace( '_', '-', $config->get( 'header.layout' ) ) );
	presscore_get_template_part( 'theme', 'header/mobile-header' );
}

if ( presscore_is_content_visible() && $config->get( 'template.footer.background.slideout_mode' ) ) {
	echo '<div class="page-inner">';
}
?>