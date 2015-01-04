<?php
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );
 
        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"), false);
				wp_enqueue_script('jquery');
			}
		}
		core_mods();
	}
	function my_scripts_method() {
	   
	   wp_register_script('caroufredsel_slides',
		   get_template_directory_uri() . '/_/js/jquery.carouFredSel-5.5.5-packed.js',
		   array('jquery'),
		   '5.5.5' );
	   // enqueue the script
	   wp_enqueue_script('caroufredsel_slides');
	   
	}
	add_action('wp_enqueue_scripts', 'my_scripts_method');

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','html5reset' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    	register_sidebar(array(
    		'name' => __('Режим работы'),
    		'id'   => 'working_hours',
    		'description'   => __( 'Здесь записываем режим работы и телефон, которые отображаются на главной странице' ),
    		'before_widget' => '<div class="working_hours">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	if (function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary Menu' ),
				'secondary-menu' => __( 'Secondary Menu' ),
				'tertiary-menu' => __( 'Tertiary Menu' )
			)
		);
	}
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 138, 9999 );
	}
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'slides_thumb', 920, 214, true );
		add_image_size( 'news_thumb', 300, 125, true );
		add_image_size( 'categories_thumb', 207, 128, true );
		add_image_size( 'horis_thumb', 410, 9999 );
		add_image_size( 'double_prod_thumb', 270, 9999 );
	}
	
	// custom taxonomy pagination fixer
	$option_posts_per_page = get_option( 'posts_per_page' );
	add_action( 'init', 'my_modify_posts_per_page', 0);
	function my_modify_posts_per_page() {
		add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
	}
	function my_option_posts_per_page( $value ) {
		global $option_posts_per_page;
		if ( is_tax( 'product_type') ) {
			return 2;
		} else {
			return $option_posts_per_page;
		}
	}

	function deleteOldFile($file) {
		$mdate = date("Ymd", filemtime($file));
		$date  = date("Ymd");
		if ($mdate < $date) {
			unlink($file);
		}
	}
?>