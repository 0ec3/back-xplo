<?php
/**
 * Home block one widget.
 *
 * @package    revenueplus
 * @author     Zhutibaba
 * @copyright  Copyright (c) 2020, Zhutibaba
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class revenueplus_Category_Posts_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-revenueplus-category-posts widget_posts_thumbnail',
			'description' => __( 'Display posts in selected category', 'revenueplus' )
		);

		// Create the widget.
		parent::__construct(
			'revenueplus-category-posts',          // $this->id_base
			__( '&raquo; Category Posts', 'revenueplus' ), // $this->name
			$widget_options                    // $this->widget_options
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		// Output the theme's $before_widget wrapper.
		echo $before_widget;

			// Theme prefix
			$prefix = 'revenueplus-';

			// Pull the selected category.
			$cat_id = isset( $instance['cat'] ) ? absint( $instance['cat'] ) : 0;

			// Get the category.
			$category = get_category( $cat_id );

			// Get the category archive link.
			$cat_link = get_category_link( $cat_id );

			// Limit to category based on user selected tag.
			if ( ! $cat_id == 0 ) {
				$args['cat'] = $cat_id;
			}

 ?>

			<?php
				if ( ( ! empty( $instance['title'] ) ) && ( $cat_id != 0 ) ) {
					echo '<h3 class="widget-title"><a target="_blank" href="' . esc_url( $cat_link ) . '">' . $instance['title'] . '</a></h3>';
				} elseif ( $cat_id == 0 ) {
					echo '<h3 class="widget-title"><span>' . __( 'Recent Posts', 'revenueplus' ) . '</span></h3>';
				} else {
					echo '<h3 class="widget-title"><a href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a></h3>';
				}
			?>

			<?php

				//if ( false === ( $wp_query = get_transient( 'revenueplus_category_posts_widget_' . $this->id ) ) ) {

					// Define custom query args
					$args = array( 
						'post_type'      => 'post',
						//'posts_per_page' => ( ! empty( $instance['limit'] ) ) ? absint( $instance['limit'] ) : 5,
						'posts_per_page' => $instance['limit'],
						'post__not_in' => get_option( 'sticky_posts' ),
						'cat' => $cat_id
					);  

					//global $wp_query;

					//$merged_query_args = array_merge( $wp_query->query, $args );

					//query_posts( $merged_query_args );

					// The post query
					$wp_query = new WP_Query( $args );

					// Store the transient.
				//	set_transient( 'revenueplus_category_posts_widget_' . $this->id, $wp_query );

				//}
				$i = 1;

				if ( $wp_query->have_posts() ) :

				echo '<ul>';

				while ( $wp_query->have_posts() ) : $wp_query->the_post(); 

				echo '<li class="clear">';
					if ( has_post_thumbnail() ) {

						echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . '<div class="thumbnail-wrap">';
							the_post_thumbnail();  
						echo '</div>' . '</a>';
						
					} else {
						//revenueplus_custom_thumb(300,200,false);
					}
					
					echo '<div class="entry-wrap"><h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_title() . '</a></h3>'; 

					if ( $instance['show_date'] ) :
						echo '<div class="entry-meta">' . get_the_date() . '</div>';
					endif;
				echo '</div></li>';

				$i++;
				endwhile; 

				echo '</ul>';

			?>

			<?php 
			endif;
			wp_reset_query();
			wp_reset_postdata();

		// Close the theme's widget wrapper.
		echo $after_widget;

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $new_instance;

		$instance['title'] = $new_instance['title'];
		$instance['limit'] = (int) $new_instance['limit'];
		$instance['cat']   = (int) $new_instance['cat'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;		
		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		// Default value.
		$defaults = array(
			'title' => '',
			'limit' => 5,
			'cat'   => '',
			'show_date' => true
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title', 'revenueplus' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( 'Select a category', 'revenueplus' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" style="width:100%;">
				<?php $categories = get_terms( 'category' ); ?>
				<option value="0"><?php _e( 'All categories &hellip;', 'revenueplus' ); ?></option>
				<?php foreach( $categories as $category ) { ?>
					<option value="<?php echo esc_attr( $category->term_id ); ?>" <?php selected( $instance['cat'], $category->term_id ); ?>><?php echo esc_html( $category->name ); ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>">
				<?php _e( 'Number of posts to show', 'revenueplus' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['limit'] ); ?>" />
		</p>	

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_date'] ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>">
				<?php _e( 'Display post date?', 'revenueplus' ); ?>
			</label>
		</p>										

	<?php

	}

}