<?php if( get_header_image() ) { ?>
<div class="skt-header-image">
	<!-- header image -->
		<div class="fullscreen-image-post">
			<img alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="ad-slider-image"  src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" />
		</div>
	<!-- end  header image  -->
</div>
<?php } else { ?>
<div class="skt-header-image">
	<!-- header image -->
		<div class="fullscreen-image-post"><img alt="<?php _e('fullscreen-default-slider-image','fullscreen-lite');?>" class="ad-slider-image"  src="<?php echo esc_url(get_template_directory_uri().'/images/static-img.jpg'); ?>" /></div>
	<!-- end  header image  -->
</div>
<?php } ?>