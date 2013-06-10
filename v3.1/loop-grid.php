<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	
	<?php 							
	$color = show_cat_colors();
	if ( has_post_thumbnail() ) { ?>						
		<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_post_thumbnail('grid-thumb'); ?></a>							
		
	<?php } else { ?>	    
	<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php bloginfo('template_url'); ?>/img/placeholder.jpg" /></a>	
	<?php } ?>	
	<!-- /THUMBNAIL -->	   
	<div class="module">
		
		<h2>
			<a style="background:<?php echo $color; ?>" href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="bookmark">
				<span style="color:<?php echo $color; ?>">[</span>
				<?php the_title(); ?>
				<span class="two" style="color:<?php echo $color; ?>">]</span></a>
		</h2>

		<?php echo show_tools_icons(); ?>
	</div>
	<!-- /MODULE -->
	
											
</li>