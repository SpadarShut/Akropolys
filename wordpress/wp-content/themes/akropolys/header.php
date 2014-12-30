<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
		
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/_/img/apple-touch-icon.png">
	
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/akropolys.css">
		
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php wp_head(); ?>
	
</head>

<body>

<div class="wrapper">

    <div class="header group">

        <a class="logo" href="<?php bloginfo('url'); ?>" title="Перейти на главную"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="Akropolys - изделия из гипса"></a>

		<div class="hdr-contacts">
		Velcom: <b>+375 (29) 321-00-85</b><br>
        e-mail: <b><a href="mailto:info@akropolys.by">info@akropolys.by</a></b>
		</div>
		
        <div class="desc">Гипсовая лепнина, фасадные обрамления, роспись стен, керамика, литьё из металла</div>

		
		<?php wp_nav_menu( array( 'theme_location' => 'tertiary-menu', 'menu_class' => 'menu-horisontal') ); ?>
	
	
    </div><!-- /.header -->