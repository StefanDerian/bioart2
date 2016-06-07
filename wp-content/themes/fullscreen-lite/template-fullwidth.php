<?php
/*
Template Name: Full Width Template
*/
?>

<?php get_header(); ?>

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

<div class="page-content fullwidth-temp">
	<div class="container post-wrap">
		<div class="row-fluid">
			<div id="content" class="span12">
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="skepost">
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages :','fullscreen-lite').'</strong>','after' => '</p>', __('number','fullscreen-lite'),));	?>
						<?php edit_post_link(__('Edit','fullscreen-lite'), '', ''); ?>
					</div>
					<!-- skepost -->
				</div>
				<!-- post -->
				<?php endwhile; ?>
				<?php else :  ?>
					<div class="post">
						<h2><?php _e('Not Found','fullscreen-lite'); ?></h2>
					</div>
				<?php endif; ?>
			</div>
			<!-- content --> 
		</div>
	</div>
</div>
<?php get_footer(); ?>