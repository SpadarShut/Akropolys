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

  function getKurs () {
      $kurs;
      $kurs_data = get_option('kurs');


      // only check if last update happened later than today @ 11 AM minsk time
      // and if no custom rate was set in WP settings

      $need_to_ask_bank = strtotime($kurs_data['check_date']) < strtotime('today 11:00 GMT+3') && !$kurs_data[custom_rub];
      //$need_to_ask_bank = strtotime($kurs_data['check_date']) < strtotime('now - 5sec'); // GMT, = +4 h in minsk, correct me


      if (!$kurs_data || $need_to_ask_bank) {
        updateKurs();
        $kurs_data = get_option('kurs');
      }

      if ($kurs_data[custom_rub]) {
          $kurs = $kurs_data[custom_rub];
      }
      else {
        $kurs = $kurs_data[rub];
      }

      return $kurs;
  }

  function updateKurs () {

    $data = simplexml_load_file('http://www.priorbank.by/CurratesExportXml.axd?version=2');
    //$data = simplexml_load_file('http://localhost/Akropolys/wordpress/wp-content/themes/akropolys/kurs.xml');

    // todo add waiting timeout and incorrect response error handling
    if ($data) {

      $dollar = $data->xpath('/EXCHANGE_CURRENCY/LIST_R_DATE/R_DATE/LIST_E_CHANNEL/E_CHANNEL[@Id="3"]/LIST_RATE/RATE[@ISO="USD" and @SORT="1"]/SELL/text()');

      if ($dollar && (string)$dollar[0]) {

        // Get new values
        $kurs = (string)$dollar[0];
        $kurs_date = (string)$data->xpath('/EXCHANGE_CURRENCY/LIST_R_DATE/R_DATE/DATE/text()')[0];

        // Update values preserving all missing values
        $current_kurs = get_option('kurs');

        $current_kurs['rub'] = $kurs;
        $current_kurs['kurs_date'] = $kurs_date;
        $current_kurs['check_date'] = date('r');

        update_option('kurs', $current_kurs);
      }
    }
  }

  function render_in_BYR ($inUSD) {
    $price = $inUSD;
    preg_match("/.*?(\d+[,.]\d+|\d+).*?(\s*за.*|$)/",$inUSD, $matches);
    $kurs = getKurs();

    if ($kurs) {
      $dlr = str_replace(',', '.', $matches[1]);
      $price = number_format( round( $dlr * $kurs, 50) * 50 /* round to 50 rub */, 0, ',', ' ') . ' б.&thinsp;р. '. $matches[2];
    }

    return $price;
  }

  if (is_admin()){
      include_once('kurs.php');
  }

?>