<!doctype html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#" itemscope itemtype="http://schema.org/WebPage">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
<?php 
	//
	global $category, $post, $page, $paged;
	
	//...................................................................................
	wp_title( '&raquo;', true, 'right' ); 
	bloginfo( 'name' ); 
	if ( $paged >= 2 || $page >= 2 )
		echo ' &raquo; ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?>
</title>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta name="google-site-verification" content="NDA7h-XbyPN8OLP3isGQFp-x5hBWDjOSf8TuXJJa95Y" />
<meta name="author" content="Веселин Милов">
<meta name="copyright" content="2018 © Милов - С. В. ООД">
<meta name="page-topic" content="Транспортни услуги и Пътна помощ">
<meta name="publisher" content="Милов Транс - Транспортни услуги">
<meta name="dcterms.subject" content="<?php bloginfo( 'description' ); ?>" />
<meta name="dcterms.title" content="<?php echo get_the_title(); ?>" />

<!-- fb -->
<meta property="og:url" content="<?php echo get_permalink( $post->ID ); ?>">
<meta property="og:title" content="<?php echo get_the_title(); ?>">
<meta property="og:description" content="<?php bloginfo( 'description' ); ?> : <?php echo get_field('tel_1', 11 ); ?>">
 
 
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:type" content="website">
<meta property="og:image" content="/assets/img/fb-og.jpg"/>
<meta property="og:image:type" content="image/jpg">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="600">
<!-- G+ -->
<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
<meta itemprop="description" content="<?php bloginfo('description'); ?>">
<meta itemprop="image" content="/assets/img/fb-og.jpg">


<!-- Twitter Cards -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="<?php echo get_the_title(); ?>" />
<meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>" />
<meta name="twitter:url" content=  />
<!-- End of Twitter cards -->

<!-- ICO --> 
<link rel="shortcut icon" href="/assets/img/favicon.ico">

<!-- CSS -->
<style>
@import url('https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=cyrillic,cyrillic-ext,latin-ext');
@import url("/assets/css/fonts/fonts.css");
</style>
<!-- PLG -->
<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/js/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="/assets/js/owl-carousel/owl.theme.default.css"> 
<link href="/assets/css/strip-css/strip.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div id="page_wrapper" class="x"> <?php // container-fluid ?>
<header>
  <?php include('inc/header_html.php'); ?>
</header>

<?php if ( !is_page_template( 'contact.php' ) ) { ?>
<div id="slideshow_top">
  <?php include('inc/slideshow.php'); ?>
</div>
<?php } ?>