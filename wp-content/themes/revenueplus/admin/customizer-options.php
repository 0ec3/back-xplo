<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#2baae1';
	$secondary_color = '#ff6644';

	$ad_position_choices = array(
		'1','2', '3','4','5','6','7','8','9','10'													
	);

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// More Examples
	$section = 'general';

	// Arrays 

	$layout_choices = array(
		'choice-1' => 'Responsive Layout',
		'choice-2' => 'Fixed Layout'
	);

	$loop_style_choices = array(
		'choice-1' => 'List Layout',
		'choice-2' => 'Blog Layout',
		'choice-3' => 'Grid Layout'
	);	

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Theme Settings', 'revenueplus' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'revenueplus' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri().'/assets/img/logo.png'
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( 'Favicon', 'revenueplus' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	

	$options['primary-font'] = array(
		'id' => 'primary-font',
		'label'   => __( 'Body Font', 'revenueplus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Roboto'
	);

	$options['secondary-font'] = array(
		'id' => 'secondary-font',
		'label'   => __( 'Heading Font', 'revenueplus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Roboto'
	);	

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( 'Site Layout', 'revenueplus' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);

	$options['sticky-nav-on'] = array(
		'id' => 'sticky-nav-on',
		'label'   => __( 'Sticky header navigation', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);			

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( 'Display header search form', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( 'Display footer widgets', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['site-comment-on'] = array(
		'id' => 'site-comment-on',
		'label'   => __( 'Display comment form on all single posts', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['back-top-on'] = array(
		'id' => 'back-top-on',
		'label'   => __( 'Display "back to top" icon link on the site bottom', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['tag-widget-limit'] = array(
		'id' => 'tag-widget-limit',
		'label'   => __( 'Max number of tags to show on tag cloud', 'revenueplus' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '30',
	);	

	$options['footer-credit'] = array(
		'id' => 'footer-credit',
		'label'   => __( 'Customize Site Footer Text/Link', 'revenueplus' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '&copy; ' . date("o") . ' <a href="' . home_url() .'">' . get_bloginfo('name') . '</a> - Theme by <a href="https://www.freshthemes.com" target="_blank">FreshThemes</a>'
	);			

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'revenueplus' ),
	//	'section' => $section,
	//	'type'    => 'range',
	//	'input_attrs' => array(
	//      'min'   => 0,
	//        'max'   => 10,
	//        'step'  => 1,
	//       'style' => 'color: #0a0',
	//	)
	//);

	/* Color */
	$section = 'color';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Color Settings', 'revenueplus' ),
		'priority' => '10'
	);	

	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => __( 'Theme Primary Color', 'revenueplus' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color // hex
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => __( 'Theme Secondary Color', 'revenueplus' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color // hex
	);	
	/* Home */

	$section = 'home';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Homepage Settings', 'revenueplus' ),
		'priority' => '10'
	);

	$options['featured-content-on'] = array(
		'id' => 'featured-content-on',
		'label'   => __( 'Display featured content on homepage', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['featured-num'] = array(
		'id' => 'featured-num',
		'label'   => __( 'Number of featured posts to show', 'revenueplus' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '4',		
	);

	/* Archive */

	$section = 'archive';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Archive Settings', 'revenueplus' ),
		'priority' => '10'
	);

	/*
	$options['loop-style'] = array(
		'id' => 'loop-style',
		'label'   => __( 'Latest Posts Style', 'revenueplus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $loop_style_choices,
		'default' => 'choice-1'
	);	
	*/
	$options['entry-excerpt-length'] = array(
		'id' => 'entry-excerpt-length',
		'label'   => __( 'Number of words to show on excerpt', 'revenueplus' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '30',		
	);

	$options['loop-category-on'] = array(
		'id' => 'loop-category-on',
		'label'   => __( 'Display post category on posts loop', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['loop-author-on'] = array(
		'id' => 'loop-author-on',
		'label'   => __( 'Display author name on posts loop', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['loop-date-on'] = array(
		'id' => 'loop-date-on',
		'label'   => __( 'Display post date on posts loop', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);		

	$options['loop-comment-on'] = array(
		'id' => 'loop-comment-on',
		'label'   => __( 'Display comments link on posts loop', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	/* Single */

	$section = 'single';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Single Post Settings', 'revenueplus' ),
		'priority' => '10'
	);

	$options['single-line-height'] = array(
		'id' => 'single-line-height',
		'label'   => __( 'Line height of post content (em)', 'revenueplus' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '1.8',
	);	

	$options['single-font-size'] = array(
		'id' => 'single-font-size',
		'label'   => __( 'Font size of post content (em)', 'revenueplus' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '1',
	);	

	$options['single-p-spacing'] = array(
		'id' => 'single-p-spacing',
		'label'   => __( 'Paragraph spacing of post content (px)', 'revenueplus' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '25',
	);				

	$options['single-breadcrumbs-on'] = array(
		'id' => 'single-breadcrumbs-on',
		'label'   => __( 'Display breadcrumbs on single posts', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-author-on'] = array(
		'id' => 'single-author-on',
		'label'   => __( 'Display author name on single posts', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['single-date-on'] = array(
		'id' => 'single-date-on',
		'label'   => __( 'Display post date on single posts', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);		

	$options['single-comment-on'] = array(
		'id' => 'single-comment-on',
		'label'   => __( 'Display comments link on single posts', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['single-share-on'] = array(
		'id' => 'single-share-on',
		'label'   => __( 'Display share icons on single posts', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( 'Display featured image on single posts', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['author-box-on'] = array(
		'id' => 'author-box-on',
		'label'   => __( 'Display author box on single posts', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	
	$options['related-posts-on'] = array(
		'id' => 'related-posts-on',
		'label'   => __( 'Display related posts on single posts', 'revenueplus' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	/* Single */

	$section = 'ads';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'AD Settings', 'revenueplus' ),
		'priority' => '10'
	);

	$options['home-header-ad'] = array(
		'id' => 'home-header-ad',
		'label'   => __( 'Home Header Ad', 'revenueplus' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => ''
	);	

	$options['home-featured-ad'] = array(
		'id' => 'home-featured-ad',
		'label'   => __( 'Ad below home featured content', 'revenueplus' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => ''
	);		

	$options['content-ad-position'] = array(
		'id' => 'content-ad-position',
		'label'   => __( 'Display list ad #1 after post #', 'revenueplus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $ad_position_choices,		
		'default' => '1',
	);

	$options['content-ad-1'] = array(
		'id' => 'content-ad-1',
		'label'   => __( 'Post List Ad #1', 'revenueplus' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => ''
	);	

	$options['content-ad-position2'] = array(
		'id' => 'content-ad-position2',
		'label'   => __( 'Display list ad #2 after post #', 'revenueplus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $ad_position_choices,		
		'default' => '3',
	);

	$options['content-ad-2'] = array(
		'id' => 'content-ad-2',
		'label'   => __( 'Post List Ad #2', 'revenueplus' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => ''
	);	

	$options['content-ad-position3'] = array(
		'id' => 'content-ad-position3',
		'label'   => __( 'Display list ad #3 after post #', 'revenueplus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $ad_position_choices,		
		'default' => '7',
	);	
	
	$options['content-ad-3'] = array(
		'id' => 'content-ad-3',
		'label'   => __( 'Post List Ad #3', 'revenueplus' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => ''
	);

	$options['single-top-ad'] = array(
		'id' => 'single-top-ad',
		'label'   => __( 'Single Post Top Ad', 'revenueplus' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => ''
	);	

	$options['single-bottom-ad'] = array(
		'id' => 'single-bottom-ad',
		'label'   => __( 'Single Post Bottom Ad', 'revenueplus' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => ''
	);	

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_demo_options' );