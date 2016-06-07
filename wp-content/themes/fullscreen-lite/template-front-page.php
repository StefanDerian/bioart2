<?php get_header(); ?>

<!-- LANDING PAGE SECTION SECTION -->              
<?php get_template_part( 'includes/front', 'first-landing-section' ); ?>

<!-- LANDING PAGE SECTION SECTION -->
<?php get_template_part( 'includes/front', 'second-landing-section' ); ?>

<!-- LANDING PAGE SECTION SECTION -->
<?php get_template_part( 'includes/front', 'third-landing-section' ); ?>

<?php if ( 'page' == get_option( 'show_on_front' ) ) {  ?>
	<!-- PAGE EDITER CONTENT -->
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<div id="front-content-box" class="skt-section">
				<div class="container">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?> 
<?php } ?>

<?php  if( get_theme_mod('fullscreen_lite_home_blog_sec', 'on') == 'on') { ?>
<div id="front-posts-box" class="landing-section skt-section">
	<div class="container">
		<div class="row-fluid">
			<div class="landing-page-title">
				<h3><?php echo get_theme_mod( 'fullscreen_lite_home_blog_title', __('Latest News', 'fullscreen-lite') ); ?></h3>
				<span class="border_center"></span>
			</div>
		</br>
		</div>
		<div class="row-fluid front-blog-wrap">
			<?php $fullscreen_lite_blogno = get_theme_mod('fullscreen_lite_home_blog_num', '-1' );
				$fullscreen_lite_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $fullscreen_lite_blogno,'ignore_sticky_posts' => true ) );
			?>
			<?php if ( $fullscreen_lite_latest_loop->have_posts() ) : ?>

			<!-- pagination here -->

				<!-- the loop -->
				<?php while ( $fullscreen_lite_latest_loop->have_posts() ) : $fullscreen_lite_latest_loop->the_post(); ?>
					
					<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
				        <div class="featured-image-shadow-box">
							<?php
									$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'fullscreen_standard_img');
							?>
							<a href="<?php the_permalink(); ?>" class="image">
								<img src="<?php echo esc_url($thumbnail[0]);?>" alt="<?php the_title(); ?>" class="featured-image alignnon"/>
							</a>
						</div>
						<?php } ?>

				        <h1 class="post-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a>
						</h1>

						<div class="skepost-meta clearfix">
						    <span class="date"><?php _e('On','fullscreen-lite');?> <?php the_time('F j, Y') ?></span><?php _e(',','fullscreen-lite');?>
				            <span class="author-name"><?php _e('Posted by ','fullscreen-lite'); the_author_posts_link(); ?> </span><?php _e(',','fullscreen-lite');?>
							<?php if (has_category()) { ?><span class="category"><?php _e('In ','fullscreen-lite');?><?php the_category(','); ?></span><?php _e(',','fullscreen-lite');?><?php } ?>
				            <?php the_tags('<span class="tags">tagged in ',',','</span> ,'); ?>
				            <span class="comments"><?php _e('With ','fullscreen-lite');?><?php comments_popup_link(__('No Comments ','fullscreen-lite'), __('1 Comment ','fullscreen-lite'), __('% Comments ','fullscreen-lite')) ; ?></span>
				        </div>

						<!-- skepost-meta -->
				        <div class="skepost clearfix">
							<?php the_excerpt(); ?> 
							<div class="continue"><a href="<?php the_permalink(); ?>"><?php _e('Read More','fullscreen-lite');?></a></div>		  
				        </div>
				        <!-- skepost -->
				</div>
				<!-- post -->

				<?php endwhile; ?>
				<!-- end of the loop -->

				<!-- pagination here -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'fullscreen-lite' ); ?></p>
			<?php endif; ?>
		</div>
 	</div>
</div>
<?php } ?>

<?php get_footer(); ?>