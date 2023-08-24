<div class="entry-meta">

<?php if (is_single()) { ?>


	<?php if(get_theme_mod('single-author-on', true) == true) { ?>
		<span class="entry-author"><?php the_author_posts_link(); ?></span> 
	<?php } ?>

	<?php if(get_theme_mod('single-date-on', true) == true) { ?>
		<span class="entry-date"><?php echo get_the_date(); ?></span>
	<?php } ?>

	<?php if(get_theme_mod('single-comment-on', true) == true) { ?>
		<span class="entry-comment"><?php comments_popup_link( __('Leave a Comment','revenueplus'), __('1 Comment', 'revenueplus'), '% Comments', 'comments-link', __('comments off', 'revenueplus'));?></span>
	<?php } ?>


<?php } else { ?>

	<?php if(get_theme_mod('loop-author-on', true) == true) { ?>
		<span class="entry-author"><?php the_author_posts_link(); ?></span> 
	<?php } ?>
	
	<?php if(get_theme_mod('loop-date-on', true) == true) { ?>
		<span class="entry-date"><?php echo get_the_date(); ?></span>
	<?php } ?>

	<?php if(get_theme_mod('loop-comment-on', true) == true) { ?>
		<span class="entry-comment"><?php comments_popup_link( __('Leave a Comment','revenueplus'), __('1 Comment', 'revenueplus'), '% Comments', 'comments-link', __('comments off', 'revenueplus'));?></span>
	<?php } ?>

<?php } ?>

</div><!-- .entry-meta -->
