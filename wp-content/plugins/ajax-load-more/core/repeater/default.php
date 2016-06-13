<a style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInDown;" href=<?php the_permalink(); ?> class="blog-list wow fadeInDown animated" data-wow-delay="0.25s">
			<div class="blog-image">
							<?php if (! has_post_thumbnail() ) { echo ' <img src="http://bioartnergy.com/wp-content/themes/accesspress-parallax/images/no-image.jpg" alt="Halo dunia!">'; } ?>
   <?php if ( has_post_thumbnail() ){ the_post_thumbnail(array(150,150));
   }?>
						</div>
			<div class="blog-excerpt">
			<h3><?php echo the_title();?></h3>
			<h4 class="posted-date"><i class="fa fa-calendar"></i><?php the_time("F d, Y"); ?></h4>
				<?php the_excerpt(); ?> <br>
			<span>Read More  <i class="fa fa-angle-right"></i></span>
			</div>
</a>