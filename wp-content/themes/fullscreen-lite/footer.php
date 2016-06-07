<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
*/
?>

<div class="clearfix"></div>
</div>
<!-- #main --> 

<!-- #footer -->
<div id="footer" class="skt-section">
	<div class="container">
		<div class="row-fluid">
				<!-- Social Links Section -->
				<div class="social_icon">
					<ul class="clearfix">
						<?php if( get_theme_mod('fullscreen_lite_fbook_link', '') != '' ) { ?><li class="fb-icon"><a target="_blank" href="<?php echo esc_url( get_theme_mod('fullscreen_lite_fbook_link') ); ?>"><span class="fa fa-facebook" title="Facebook"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_twitter_link', '') != '' ){?><li class="tw-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_twitter_link') ); ?>"><span class="fa fa-twitter" title="Twitter"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_pinterest_link', '') != '' ){ ?><li class="pinterest-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_pinterest_link') ); ?>"><span class="fa fa-pinterest" title="Pinterest"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_dribbble_link', '') != '' ){ ?><li class="dribbble-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_dribbble_link') ); ?>"><span class="fa fa-dribbble" title="dribbble"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_tumblr_link', '') != ''){ ?><li class="tumblr-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_tumblr_link') ); ?>"><span class="fa fa-tumblr" title="tumblr"></span></a></li><?php } ?>
					</ul>
				</div>
				<!-- Social Links Section -->
				<div class="clearfix"></div>
		</div>
	</div>

	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">
				<div class="copyright span6 alpha omega"> <?php echo wp_kses_post( get_theme_mod('fullscreen_lite_copyright', 'Proudly Powered by WordPress') ); ?> </div>
				<div class="owner span6 alpha omega"><?php _e('Fullscreen Theme by','fullscreen-lite'); ?> <a href="<?php echo esc_url('https://sketchthemes.com/'); ?>" ><?php _e('SketchThemes','fullscreen-lite'); ?></a></div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper --> 
</div>
<!-- #footer -->

</div>
<!-- #wrapper -->
	<a href="JavaScript:void(0);" title="<?php _e('Back To Top','fullscreen-lite')?>" id="backtop"></a>
	<?php wp_footer(); ?>
</body>
</html>