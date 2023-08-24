<?php get_header(); ?>	

	<?php if(get_theme_mod('home-header-ad')) { ?>
		<div class="home-header-ad">
			<?php echo get_theme_mod('home-header-ad'); ?>
		</div><!-- .home-header-ad -->
	<?php } ?>

	<div id="primary" class="content-area clear">	

		<?php if (get_theme_mod('featured-content-on', 'true') == true ) : ?>

			<?php get_template_part('template-parts/content', 'featured'); ?>
		
		<?php endif; ?>
		
		<main id="main" class="site-main clear">

			<div id="recent-content" class="content-<?php if(get_theme_mod('loop-style','choice-1') == 'choice-1') { echo 'list'; } elseif(get_theme_mod('loop-style','choice-1') == 'choice-2') { echo 'loop'; } else { echo 'grid'; } ?>">

				<?php

				// Define custom query args
				$custom_query_args = array( 
				    // exclude all sticky posts
				    'post__not_in' => get_option( 'sticky_posts' ) ,
				    // don't forget to paginate!
	  				'paged' => get_query_var('paged')
				);  
				// globalize $wp_query
				global $wp_query;
				// Merge custom args with default query args
				$merged_query_args = array_merge( $wp_query->query, $custom_query_args );
				// process the query
				query_posts( $merged_query_args );

				if ( $wp_query->have_posts() ) :	
							
				$i = 1;

				/* Start the Loop */
				while ( $wp_query->have_posts() ) : $wp_query->the_post();

					if (get_theme_mod('loop-style','choice-1') == 'choice-1') {

						get_template_part('template-parts/content', 'list');

					} elseif (get_theme_mod('loop-style','choice-1') == 'choice-2') {

						get_template_part('template-parts/content', 'loop');

					} else {

						get_template_part('template-parts/content', 'grid');

					}
					
					if ( $i == get_theme_mod('content-ad-position', '1')+1 ) {
						echo '<div class="content-ad">';
						echo get_theme_mod('content-ad-1');
						echo '</div>';
					}

					if ( $i == get_theme_mod('content-ad-position2', '3')+1 ) {
						echo '<div class="content-ad">';
						echo get_theme_mod('content-ad-2');
						echo '</div>';
					}	

					if ( $i == get_theme_mod('content-ad-position3', '7')+1 ) {
						echo '<div class="content-ad">';
						echo get_theme_mod('content-ad-3');
						echo '</div>';
					}	

					$i++;

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				?>

			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
