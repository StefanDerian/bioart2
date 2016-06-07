<?php 
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<div class="main-wrapper-item">
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
	<div class="bread-title-holder">
		<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
		<div class="container">
			<div class="row-fluid">
				<div class="container_inner clearfix">
					<h1 class="title"><?php the_title(); ?></h1>
					<?php 
						if ((class_exists('fullscreen_lite_breadcrumb_class'))) {$fullscreen_lite_breadcumb->fullscreen_lite_custom_breadcrumb();}
					?>
				</div>
			</div>
		</div>
	</div>

<div class="container post-wrap">
	<div class="row-fluid">
		<div id="container" class="span8">
			<div id="content" role="main">  
					<div class="post" id="post-<?php the_ID(); ?>">
				
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
						<div class="featured-image-shadow-box">
							<?php the_post_thumbnail('full'); ?>
						</div>
						<?php } ?>

						<div class="bread-title">
							<h1 class="title">
								<?php the_title(); ?>
							</h1>
							<div class="clearfix"></div>
						</div>

						<div class="skepost-meta clearfix">
							<span class="date"><?php _e('On','fullscreen-lite');?> <?php the_time('F j, Y') ?></span><?php _e(',','fullscreen-lite');?>
							<span class="author-name"><?php _e('Posted by ','fullscreen-lite'); the_author_posts_link(); ?> </span><?php _e(',','fullscreen-lite');?>
							<?php if (has_category()) { ?><span class="category"><?php _e('In ','fullscreen-lite');?><?php the_category(','); ?></span><?php _e(',','fullscreen-lite');?><?php } ?>
							<?php the_tags('<span class="tags">By ',',','</span> ,'); ?>
							<span class="comments"><?php _e('With ','fullscreen-lite');?><?php comments_popup_link(__('No Comments ','fullscreen-lite'), __('1 Comment ','fullscreen-lite'), __('% Comments ','fullscreen-lite')) ; ?></span>
						</div>
						<!-- skepost-meta -->

						<div class="skepost clearfix">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'fullscreen-lite' ) ); ?>
							<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages :','fullscreen-lite').'</strong>','after' => '</p>', __('number','fullscreen-lite'),));	?>
							<?php edit_post_link(__('Edit','fullscreen-lite'), '', ''); ?>
						</div>
						<!-- skepost -->

						<div class="navigation"> 
							<span class="nav-previous"><?php previous_post_link( __('&larr; %link','fullscreen-lite')); ?></span>
							<span class="nav-next"><?php next_post_link( __('%link &rarr;','fullscreen-lite')); ?></span> 
						</div>
						<div class="clearfix"></div>
						<div class="comments-template">
							<?php comments_template( '', true ); ?>
						</div>
					</div>
				<!-- post -->
				<?php endwhile; ?>
				<?php else :  ?>

				<div class="post">
					<h2><?php _e('Post Does Not Exist','fullscreen-lite'); ?></h2>
				</div>
				<?php endif; ?>
			</div><!-- content --> 
		</div><!-- container --> 

		<!-- Sidebar -->
		<div id="sidebar" class="span3" role="complementary">
			<?php get_sidebar(); ?>
		</div>
		<!-- Sidebar --> 

	</div>
 </div>
</div>
<?php get_footer(); ?>