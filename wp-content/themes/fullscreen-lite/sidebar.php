<?php
/**
 * The sidebar containing the secondary widget area, displays on posts.
 * If no active widgets in this sidebar, it will be hidden completely.
 */	
?>
<div id="sidebar_2" class="ske_widget">
	<ul class="skeside">
		<?php if( is_active_sidebar( 'blog-sidebar' ) ) { ?>	
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		<?php } else { ?>
			<div class="ske-container widget_archive">
				<h3 class="ske-title"><?php _e('Archives','fullscreen-lite'); ?></h3>
				<ul>
					<?php wp_get_archives(array( 'limit' => 5 )); ?>
				</ul>
			</div>
			<div class="ske-container widget_archive">
				<h3 class="ske-title"><?php _e('Popular Post','fullscreen-lite'); ?></h3>
				<ul>
					<?php wp_get_archives(array( 'limit' => 5 )); ?>
				</ul>
			</div>
			<div class="ske-container widget_search widget_tag_cloud">
				<?php get_search_form( ); ?>
				<br/>
				<h3 class="ske-title"><?php _e('More Links','fullscreen-lite'); ?></h3>
				<div class="menu-footer-menu-container">
					<ul id="menu-footer-menu" class="menu">
						<?php wp_tag_cloud( array('number' => 7) );  ?>
					</ul>
				</div>
			</div>
			<?php
			/**
			* Filter the arguments for the Recent Posts widget.
			*
			* @since 3.4.0
			*
			* @see WP_Query::get_posts()
			*
			* @param array $args An array of arguments used to retrieve the recent posts.
			*/
			$r = new WP_Query( apply_filters( 'widget_posts_args', array('posts_per_page'=>5, 'no_found_rows'=>true, 'post_status'=>'publish', 'ignore_sticky_posts'=>true ) ) );

			if ($r->have_posts()) :
			?>
			<div class="ske-container widget_recent_entries">
				<h3 class="ske-title"><?php _e('Top Categories','fullscreen-lite'); ?></h3>
				<ul>
					<?php while ( $r->have_posts() ) : $r->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();
			endif;
			?>
		<?php } ?>
	</ul>
</div>
<!-- #sidebar_2 .ske_widget -->
 



