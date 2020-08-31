<?php

require_once('includes/useful-functions.php');

add_action('after_setup_theme', 'setup_theme', 16);


function setup_theme() {

	/**
	 * Assets
	 */
	add_action('wp_enqueue_scripts', 'li_assets');
	function li_assets() {

		/*
		 * CSS
		 */
		$css =	array(
			'fonts' => '/css/fonts.css',
			'main' => '/css/main.css',
			'lib' => '/css/lib.css'
		);
		foreach ($css as $css_name => $css_path){
			//version = file last modification's timestamp
			$ver = (file_exists(get_template_directory() . $css_path)) ? filemtime(get_template_directory() . $css_path) : false;
			
			wp_enqueue_style(
				$css_name,
				get_template_directory_uri() . $css_path,
				array(),
				$ver
			);
		}

		/*
		 * JS
		 */
		$js =	array(
			'li_lib'	=> array('url' => '/js/lib.js', 'deps' => array('jquery')),
			'li_main'	=> array('url' => '/js/main.js', 'deps' => array('li_lib'))
		);

		// use jquery 3.4.0
		wp_deregister_script('jquery');
		wp_register_script('jquery', ('https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js'), false, null, false);
		wp_enqueue_script('jquery');

		foreach ($js as $js_name => $js){
			//version = file last modification's timestamp
			$ver = (file_exists(get_template_directory() . $js['url'])) ? filemtime(get_template_directory() . $js['url']) : false;
			
			wp_enqueue_script(
				$js_name,
				get_template_directory_uri() . $js['url'],
				$js['deps'],
				$ver,
				true
			);
		}

		// pass Ajax Url to main.js
        wp_localize_script('li_main', 'ajaxurl', admin_url( 'admin-ajax.php' ) );

	}



	/**
	 * Handles JavaScript detection.
	 *
	 * Adds a js class to the root <html> element when JavaScript is detected.
	 *
	 * @since Twenty Sixteen 1.0
	 */
	/*add_action( 'wp_head', 'javascript_detection', 0 );
	function javascript_detection() {
		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
	}*/


	/**
	 * I18n
	 */
	load_theme_textdomain('lundiinspi', get_template_directory() . '/lang');


	/**
	 * Menus
	 */
	add_theme_support('menus');
	register_nav_menus(array(
		'main-nav'					=> __('Menu principal', 'lundiinspi'),
		'footer-nav'				=> __('Menu pied de page', 'lundiinspi'),
	));


	/**
	 * Thumbnails
	 */
	add_theme_support('post-thumbnails');

	add_image_size('fullscreen',		1920,	1080,	true);
	add_image_size('fullscreen_mobile',		768,	1024,	true);

	add_image_size('image_4k',					2560,	0,	true);
	add_image_size('image_hd',					1920,	0,	true);
	add_image_size('image_desktop',				1440,	0,	true);
	add_image_size('image_laptop',				1024,	0,	true);
	add_image_size('image_tablet',				768,	0,	true);
	add_image_size('image_mobile',				425,	0,	true);


	/**
	 * Images
	 */
	add_filter( 'wp_check_filetype_and_ext', function($filetype_ext_data, $file, $filename, $mimes) {
		if ( substr($filename, -4) === '.svg' ) {
			$filetype_ext_data['ext'] = 'svg';
			$filetype_ext_data['type'] = 'image/svg+xml';
		}
		return $filetype_ext_data;
	}, 100, 4 );

	add_filter('upload_mimes', 'allow_svg_mime_types');
	function allow_svg_mime_types( $mimes ){

		$mimes['svg'] = 'image/svg+xml';
		return $mimes;

	}

	/**
	 * Theme setting
	 */
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> __('Options Générales', 'lundiinspi'),
			'menu_title' 	=> __('Options Générales', 'lundiinspi'),
			'menu_slug' 	=> 'general-options',
		));
	}    

    /********************************************/
    /* START Tiny MCE                           */
    /********************************************/
	// Load front css into editor
    add_editor_style('css/main.css');
    
	// add_filter('tiny_mce_before_init', 'custom_tinyMCE_menu_bar');
	// function custom_tinyMCE_menu_bar($init_array) {

    //     // Add custom buttons formats
	// 	$init_array['style_formats'] = json_encode(array(
	// 		array(
	// 			'title' => __('Bouton jaune', 'lundiinspi'),
	// 			'classes' => 'btn',
	// 			'selector' => 'a'
	// 		),
	// 		array(
	// 			'title' => __('Bouton blanc', 'lundiinspi'),
	// 			'classes' => 'btn-light',
	// 			'selector' => 'a'
	// 		),
	// 	));
		
	// 	$init_array['textcolor_map'] = json_encode(array(
	// 		'0E2B48', 'Couleur principal',
	// 		'00B0F0', 'Bleu clair',
	// 	));
        
    //     // Custom text formats
    //     $init_array['block_formats'] = 'Paragraphe=p;Titre niveau 2=h2;Titre niveau 3=h3;';

    //     // Custom text colors
	// 	// $init_array['textcolor_map'] = '[
    //     //     "E25303", "Couleur primaire",
	// 	// 	"121212", "Couleur secondaire",
    //     // ]';
    //     // $init_array['textcolor_rows'] = 1;
        

	// 	return $init_array;
    // }
    
    // Remove custom color picker
    // add_filter( 'tiny_mce_plugins', 'wpse_tiny_mce_remove_custom_colors' );
    // function wpse_tiny_mce_remove_custom_colors( $plugins ) {       
    //     foreach ( $plugins as $key => $plugin_name ) {
    //         if ( 'colorpicker' === $plugin_name ) {
    //             unset( $plugins[ $key ] );
    //             return $plugins;            
    //         }
    //     }
    //     return $plugins;            
    // }
    /********************************************/
    /* END Tiny MCE                             */
    /********************************************/


	// Move Yoast to bottom
	add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
	function yoasttobottom() {
		return 'low';
	}

	//Remove "Tools" menu for ci_editor only
	function remove_menus(){
		$author = wp_get_current_user();
		if( in_array('ci_editor', $author->roles) && !in_array('administrator', $author->roles)){
			remove_menu_page( 'tools.php' );
		}
	}
	add_action( 'admin_menu', 'remove_menus' );
	
	// Fix a SPAM issue by setting PHPMailer "Sender" and "ReturnPath" same as "From"
	add_action( 'phpmailer_init', 'phpmailer_spam_fix' );    
	function phpmailer_spam_fix( $phpmailer ) {
		$phpmailer->Sender = $phpmailer->From;
		$phpmailer->ReturnPath = $phpmailer->From;
	}

}

