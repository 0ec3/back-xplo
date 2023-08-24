<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package revenueplus
 */

get_header(); ?>

	<div id="primary" class="content-area clear">

		<main id="main" class="site-main clear">

		<div class="breadcrumbs clear">
			<h1>
				<?php _e( 'All posts in', 'revenueplus' ); ?> <?php single_cat_title(''); ?>
			</h1>	
		</div><!-- .breadcrumbs -->

		<div id="recent-content" class="content-<?php if(get_theme_mod('loop-style','choice-1') == 'choice-1') { echo 'list'; } elseif(get_theme_mod('loop-style','choice-1') == 'choice-2') { echo 'loop'; } else { echo 'grid'; } ?>">

			<?php

			if ( have_posts() ) :	
						
				$i = 1;		
					
				/* Start the Loop */
				while ( have_posts() ) : the_post();

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
