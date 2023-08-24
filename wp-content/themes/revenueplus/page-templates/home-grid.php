<?php
/*
 * Template Name: Home Grid Layout
 *
 * The template for displaying all posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package revenueplus
 */

get_header(); ?>
			
	<div id="primary" class="content-area">

		<?php get_template_part('template-parts/content', 'featured'); ?>

		<div id="main" class="site-main clear">

			<div id="recent-content" class="content-grid">

				<?php

					$temp = $wp_query;
					$wp_query= null;
					$wp_query = new WP_Query();
					$wp_query->query('paged='.$paged);

					if ( have_posts() ) :

					$i = 1;

					while ($wp_query->have_posts()) : $wp_query->the_post();
					
						get_template_part('template-parts/content', 'grid');
					
						$i++;

					endwhile;

					else :

					get_template_part( 'template-parts/content', 'none' );

				?>

			<?php endif; ?>

			</div><!-- #recent-content -->
			
		</div><!-- #main -->
		<?php

			global $wp_version;

			if ( $wp_version >= 4.1 ) :

				the_posts_pagination( array( 'prev_text' => _x( 'Previous', 'previous post', 'revenueplus' ) ) );
			
			endif;

		?>

		<?php $wp_query = null; $wp_query = $temp;?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
