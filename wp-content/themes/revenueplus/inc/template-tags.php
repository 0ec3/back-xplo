<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package revenueplus
 */

/**
 * Get Post Views.
 */
if ( ! function_exists( 'revenueplus_get_post_views' ) ) :

function revenueplus_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="view-count">0</span> View';
    }
    return '<span class="view-count">' . number_format($count) . '</span> ' . __('Views', 'revenueplus');
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'revenueplus_set_post_views' ) ) :

function revenueplus_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

endif;

/**
 * Search Filter 
 */
if ( ! function_exists( 'revenueplus_search_filter' ) && ( ! is_admin() ) ) :

function revenueplus_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','revenueplus_search_filter');

endif;

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if ( ! function_exists( 'revenueplus_custom_excerpt_length' ) ) :

function revenueplus_custom_excerpt_length( $length ) {
    return get_theme_mod('entry-excerpt-length', '30');
}
add_filter( 'excerpt_length', 'revenueplus_custom_excerpt_length', 999 );

endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'revenueplus_excerpt_more' ) ) :

function revenueplus_excerpt_more( $more ) {
   return '... ';
}
add_filter( 'excerpt_more', 'revenueplus_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'revenueplus_first_category' ) ) :
function revenueplus_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'revenueplus' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
    }    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'revenueplus_categorized_blog' ) ) :

function revenueplus_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'revenueplus_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'revenueplus_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so revenueplus_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so revenueplus_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in revenueplus_categorized_blog.
 */
if ( ! function_exists( 'revenueplus_category_transient_flusher' ) ) :

function revenueplus_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'revenueplus_categories' );
}
add_action( 'edit_category', 'revenueplus_category_transient_flusher' );
add_action( 'save_post',     'revenueplus_category_transient_flusher' );

endif;

/**
 * Disable specified widgets.
 */
if ( ! function_exists( 'revenueplus_disable_specified_widgets' ) ) :

function revenueplus_disable_specified_widgets( $sidebars_widgets ) {

    if ( isset($sidebars_widgets['header-ad']) ) {
        if ( is_array($sidebars_widgets['header-ad']) ) {
               foreach($sidebars_widgets['header-ad'] as $i => $widget) {
                    if( (strpos($widget, 'freshthemes-') === false) ) {
                       unset($sidebars_widgets['header-ad'][$i]);
                    }
               }
        }     
    }

    if ( isset($sidebars_widgets['content-ad']) ) {
        if ( is_array($sidebars_widgets['content-ad']) ) {
               foreach($sidebars_widgets['content-ad'] as $i => $widget) {
                    if( (strpos($widget, 'freshthemes-') === false) ) {
                       unset($sidebars_widgets['content-ad'][$i]);
                    }
               }
        }
    }                

    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'revenueplus_disable_specified_widgets' );

endif;

/*
 * Limit Tags Count 
 */
//Register tag cloud filter callback
add_filter('widget_tag_cloud_args', 'dameiti_tag_widget_limit');
 
//Limit number of tags inside widget
function dameiti_tag_widget_limit($args){
 
//Check if taxonomy option inside widget is set to tags
if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
  $args['number'] = get_theme_mod('tag-cloud-limit','30'); //Limit number of tags
}
 
return $args;
}

/*
 * Add Extra Fields for User Profile
 */
function revenueplus_modify_contact_methods($profile_fields) {

    // Add new fields
    $profile_fields['twitter'] = 'Twitter URL';
    $profile_fields['facebook'] = 'Facebook URL';
    $profile_fields['linkedin'] = 'LinkedIn URL';
    $profile_fields['pinterest'] = 'Pinterest URL';
    $profile_fields['youtube'] = 'YouTube URL';
    $profile_fields['instagram'] = 'Instagram URL';

    return $profile_fields;
}
add_filter('user_contactmethods', 'revenueplus_modify_contact_methods');
