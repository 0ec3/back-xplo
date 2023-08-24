<span class="entry-share clear">
 
	<a class="twitter social-twitter" href="https://twitter.com/intent/tweet?text=<?php echo urlencode( esc_attr( get_the_title( get_the_ID() ) ) ); ?>&amp;url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-twitter-white.png'; ?>" alt="Twitter"><span><?php esc_html_e('Tweet on Twitter', 'revenueplus'); ?></span></a>

	<a class="facebook social-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-facebook-white.png'; ?>" alt="Facebook"><span><?php esc_html_e('Share on Facebook', 'revenueplus'); ?></span></a>

	<a class="linkedin social-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&title=<?php echo get_the_title(); ?>&summary=<?php echo get_the_excerpt(); ?>&source=" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-linkedin-white.png'; ?>" alt="LinkedIn"><span>LinkedIn</span></a>
	
	<a class="pinterest social-pinterest" href="https://reddit.com/submit?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&amp;media=<?php echo urlencode( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/img/reddit-logo-white-xploitlab.png'; ?>" alt="Reddit"><span>Reddit</span></a>

	<a class="pinterest social-pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&amp;media=<?php echo urlencode( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-pinterest-white.png'; ?>" alt="Pinterest"><span>Pinterest</span></a>

</span><!-- .entry-share -->