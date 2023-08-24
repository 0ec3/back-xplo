
<?php		
	$sticky = get_option( 'sticky_posts' );
	if ( ( isset($sticky[0]) ) && (!get_query_var('paged')) ) {	
?>

<?php		

	$custom_query_args = array( 
	    'post__in' => get_option( 'sticky_posts' ),
	    'posts_per_page' => get_theme_mod('featured-num', '4'),
	    'ignore_sticky_posts' => 1
	);  

	global $wp_query;

	$merged_query_args = array_merge( $wp_query->query, $custom_query_args );

	query_posts( $merged_query_args );		

	if ( $wp_query->have_posts() && (!get_query_var('paged')) ) {	

?>

<div id="featured-content">

	<ul class="bxslider">	

	<?php
		// The Loop
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
	?>	

	<li class="featured-slide hentry">

		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			
			<div class="thumbnail-wrap">
				<?php 
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('featured_thumb');  
				} else {
					echo '<img src="' . get_template_directory_uri() . '/assets/img/no-featured.png" alt="" />';
				}
				?>
			</div><!-- .thumbnail-wrap -->
			<div class="gradient">
			</div>
		</a>

		<div class="entry-header clear">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div><!-- .entry-header -->

		<div class="entry-category">
			<?php revenueplus_first_category(); ?>
		</div>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<span class="read-more"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue Reading &raquo;', 'revenueplus'); ?></a></span>
		</div><!-- .entry-summary -->

	</li><!-- .featured-slide .hentry -->

	<?php
		endwhile;
	?>

	</ul><!-- .bxslider -->

	</div><!-- #featured-content -->

	<?php
		} elseif  ( !$the_query->have_posts() && (!get_query_var('paged')) ) { // else has no featured posts
	?>


	<?php
		} //end if has featured posts
		wp_reset_postdata();	
		wp_reset_query();			
	?>

	<?php if(get_theme_mod('home-featured-ad')) : ?>
		<div class="home-featured-ad">
			<?php echo get_theme_mod('home-featured-ad'); ?>
		</div><!-- .single-bottom-ad -->
	<?php endif; ?>

<?php } ?>			