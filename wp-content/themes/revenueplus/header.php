<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package revenueplus
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if (get_theme_mod('favicon', '') != null) { ?>
<link rel="icon" type="image/png" href="<?php echo esc_url( get_theme_mod('favicon', '') ); ?>" />
<?php } ?>
<?php wp_head(); ?>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4750804758511997"
     crossorigin="anonymous"></script>
     
     
     
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KLS7KXV');</script>
<!-- End Google Tag Manager -->


<!-- Google tag (gtag.js) 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5XLEC1KCT9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5XLEC1KCT9');
</script>
-->

<?php
  
	// Primary Font
	$setting = 'primary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.primary'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Secondary Font
	$setting2 = 'secondary-font';
	$mod2 = get_theme_mod( $setting2, customizer_library_get_default( $setting2 ) );
	$stack2 = customizer_library_get_font_stack( $mod2 );

	if ( $mod2 != customizer_library_get_default( $setting2 ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.secondary'
			),
			'declarations' => array(
				'font-family' => $stack2
			)
		) );

	}

	// Theme Color
	$primary_color = get_theme_mod('primary-color', '#2baae1');
	$secondary_color = get_theme_mod('secondary-color', '#ff6644');	

?>
<style type="text/css" media="all">
	body,
	input,
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="search"],
	input[type="password"],
	textarea,
	table,
	.sidebar .widget_ad .widget-title,
	.site-footer .widget_ad .widget-title {
		font-family: "<?php echo $mod; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	#secondary-menu li a,
	.footer-nav li a,
	.pagination .page-numbers,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.comment-form label,
	label,
	h1,h2,h3,h4,h5,h6 {
		font-family: "<?php echo $mod2; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	a:hover,
	.site-header .search-icon:hover span,
	.sf-menu li a:hover,
	.sf-menu li li a:hover,
	.sf-menu li.sfHover a,
	.sf-menu li.current-menu-item a,
	.sf-menu li.current-menu-item a:hover,
	.breadcrumbs .breadcrumbs-nav a:hover,
	.read-more a,
	.read-more a:visited,
	.entry-title a:hover,
	article.hentry .edit-link a,
	.author-box a,
	.page-content a,
	.entry-content a,
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.sidebar .widget ul li a:hover,
	.sidebar .widget_tabs ul.horizontal li a:hover,
	.sidebar .widget_tabs ul.horizontal li a:hover .fa,	
	#post-nav a:hover h4 {
		color: <?php echo $primary_color; ?>;
	}
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.entry-category a,
	.pagination .prev:hover,
	.pagination .next:hover,
	#back-top a span {
		background-color: <?php echo $primary_color; ?>;
	}
	.sidebar .widget-title a:hover,
	.read-more a:hover,
	.author-box a:hover,
	.page-content a:hover,
	.entry-content a:hover,
	.widget_tag_cloud .tagcloud a:hover:before,
	.entry-tags .tag-links a:hover:before,
	.content-loop .entry-title a:hover,
	.content-list .entry-title a:hover,
	.content-grid .entry-title a:hover,
	article.hentry .edit-link a:hover,
	.site-footer .widget ul li a:hover,
	.comment-content a:hover,
	.sidebar .widget_tabs ul.horizontal li.active a,
	.sidebar .widget_tabs ul.horizontal li.active a .fa {
		color: <?php echo $secondary_color; ?>;
	}	
	#back-top a:hover span,
	.bx-wrapper .bx-pager.bx-default-pager a:hover,
	.bx-wrapper .bx-pager.bx-default-pager a.active,
	.bx-wrapper .bx-pager.bx-default-pager a:focus,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.sidebar .widget ul li:before,
	.widget_newsletter input[type="submit"],
	.widget_newsletter input[type="button"],
	.widget_newsletter button {
		background-color: <?php echo $secondary_color; ?>;
	}
	.slicknav_nav,
	.header-search,
	.sf-menu li a:before {
		border-color: <?php echo $secondary_color; ?>;
	}
	#primary .entry-content p {
		font-size: <?php echo get_theme_mod('single-font-size', '1'); ?>em;
		line-height: <?php echo get_theme_mod('single-line-height', '1.8'); ?>em;
		margin-bottom: <?php echo get_theme_mod('single-p-spacing', '25'); ?>px;
	}
	.entry-content h1,
	.entry-content h2,
	.entry-content h3,
	.entry-content h4,
	.entry-content h5,
	.entry-content h6 {
		margin-bottom: <?php echo get_theme_mod('single-p-spacing', '25'); ?>px;
	}
</style>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KLS7KXV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header id="masthead" class="site-header clear">

		<div class="container">

		<div class="site-branding">

			<?php if (get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png') != null) { ?>
			
			<div id="logo">
				<span class="helper"></span>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png'); ?>" alt=""/>
				</a>
			</div><!-- #logo -->

			<?php } else { ?>

			<div class="site-title">
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			</div><!-- .site-title -->

			<?php } ?>

		</div><!-- .site-branding -->		

		<nav id="primary-nav" class="primary-navigation">

			<?php 
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
				} else {
			?>

				<ul id="primary-menu" class="sf-menu">
					<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for location: Primary Menu', 'revenueplus'); ?></a></li>
				</ul><!-- .sf-menu -->

			<?php } ?>

		</nav><!-- #primary-nav -->

		<div id="slick-mobile-menu"></div>

		<?php if ( get_theme_mod('header-search-on', true) ) : ?>
			
			<span class="search-icon">
				<span class="genericon genericon-search"></span>
				<span class="genericon genericon-close"></span>			
			</span>

			<div class="header-search">
				<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" name="s" class="search-input" placeholder="Search for..." autocomplete="off">
					<button type="submit" class="search-submit"><?php echo __('Search', 'revenueplus'); ?></button>		
				</form>
			</div><!-- .header-search -->

		<?php endif; ?>						

		</div><!-- .container -->

	</header><!-- #masthead -->	

	<div class="header-space"></div><br>
	
	<!-- iklan adsense xploitlab.com | <br> diatas aslinya tidak ada -->
    <div class="container clear">	    	
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4750804758511997"
     crossorigin="anonymous"></script>
<!-- Iklan Persegi Panjang Bawah Menu - XploitLab -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4750804758511997"
     data-ad-slot="4386673310"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
	<!-- iklan adsense xploitlab.com -->

<div id="content" class="site-content container clear">
