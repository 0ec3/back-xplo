<?php
/**
 * Tabbed widget.
 *
 * @package    revenueplus
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class revenueplus_Tabs_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-revenueplus-tabs widget_tabs posts-thumbnail-widget',
			'description' => __( 'Display popular & recent posts, comments and tags.', 'revenueplus' )
		);

		// Create the widget.
		parent::__construct(
			'revenueplus-tabs',                  // $this->id_base
			__( '&raquo; Tabs', 'revenueplus' ), // $this->name
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
		?>
		<div class='tabs tabs_default'>
		<ul class="horizontal">
			<li class="active"><a href="#tab1" title="<?php esc_attr_e( 'Popular', 'revenueplus' ); ?>"><i class="fa fa-star"></i> <?php esc_html_e( 'Popular', 'revenueplus' ); ?></a></li>
			<li><a href="#tab2" title="<?php esc_attr_e( 'Latest', 'revenueplus' ); ?>"><i class="fa fa-clock-o"></i> <?php esc_html_e( 'Latest', 'revenueplus' ); ?></a></li>
		</ul>

			<div id='tab1' class="tab-content">
				<?php echo revenueplus_popular_posts( (int) $instance['popular_num'] ); ?>
			</div>

			<div id='tab2' class="tab-content">
				<?php echo revenueplus_latest_posts( (int) $instance['recent_num'] ); ?>
			</div>

		</div><!-- .tabs -->

		<?php
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

		$instance['popular_num']  = absint( $new_instance['popular_num'] );
		$instance['recent_num']   = absint( $new_instance['recent_num'] );	
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
			'popular_num'  => 5,
			'recent_num'   => 5,
			'comments_num' => 5,
			'show_date' => true
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'popular_num' ); ?>">
				<?php _e( 'Number of popular posts to show', 'revenueplus' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'popular_num' ); ?>" name="<?php echo $this->get_field_name( 'popular_num' ); ?>" value="<?php echo absint( $instance['popular_num'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'recent_num' ); ?>">
				<?php _e( 'Number of recent posts to show', 'revenueplus' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'recent_num' ); ?>" name="<?php echo $this->get_field_name( 'recent_num' ); ?>" value="<?php echo absint( $instance['recent_num'] ); ?>" />
		</p>

	<?php

	}

}

/**
 * Popular Posts by comment
 *
 * @since 1.0.0
 */
function revenueplus_popular_posts( $number = 5 ) {

	// Posts query arguments.
	$args = array(
		'posts_per_page' => $number,
		'orderby'        => 'comment_count',
		'post_type'      => 'post'
	);

	// The post query
	$popular = get_posts( $args );

	global $post;
	//global $instance;
	if ( $popular ) {
		echo '<ul>';

			foreach ( $popular as $post ) :
				setup_postdata( $post );

				echo '<li class="clear">';
					if ( has_post_thumbnail() ) {

						echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . '<div class="thumbnail-wrap">';
							the_post_thumbnail();  
						echo '</div>' . '</a>';
						
					} else {
						//revenueplus_custom_thumb(300,200,false);
					}
					
					echo '<div class="entry-wrap"><h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_title() . '</a></h3>'; 

					//if ( $instance['show_date'] ) :
						echo '<div class="entry-meta">' . get_the_date() . '</div>';
					//endif;
				echo '</div></li>';

			endforeach;

		echo '</ul>';
	}

	// Reset the query.
	wp_reset_postdata();

}

/**
 * Recent Posts
 *
 * @since 1.0.0
 */
function revenueplus_latest_posts( $number = 5 ) {

	// Posts query arguments.
	$args = array(
		'posts_per_page' => $number,
		'post_type'      => 'post',
		'post__not_in' => get_option( 'sticky_posts' ),
	);

	// The post query
	$recent = get_posts( $args );

	global $post;

	if ( $recent ) {
		echo '<ul>';

			foreach ( $recent as $post ) :
				setup_postdata( $post );

				echo '<li class="clear">';
					if ( has_post_thumbnail() ) {

						echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . '<div class="thumbnail-wrap">';
							the_post_thumbnail();  
						echo '</div>' . '</a>';
						
					} else {
						//revenueplus_custom_thumb(300,200,false);
					}
					
					echo '<div class="entry-wrap"><h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_title() . '</a></h3>'; 

					//if ( $instance['show_date'] ) :
						echo '<div class="entry-meta">' . get_the_date() . '</div>';
					//endif;

				echo '</div></li>';

			endforeach;

		echo '</ul>';
	}

	// Reset the query.
	wp_reset_postdata();


}