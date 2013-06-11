<?php get_header();  ?>

<?php get_sidebar(); ?>
	
	<div id="content">
	
		<?php 
			if ( is_search() ) :	?>			
			<div id="identification">
				<h3>You're looking for <strong><?php the_search_query() ?>, eh?</strong></h3>
				<?php get_search_form(); ?>				
			</div>	
		<?php endif;
		if ( is_tag() ) :	?>			
				<h1 class='tagtitle'><?php single_tag_title(); ?></h1> 
				<p class="taxonomy">Also worth checking out &raquo; <?php wp_tag_cloud('separator= '); ?></p>	
		<?php endif; 
		if ( is_category() ) :	?>			
			<h1 class='cattitle'><?php single_cat_title(); ?></h1> 				
		<?php endif; ?>
		
		
		<div id="inner">
		
			<?php if (is_home() || is_front_page()) : ?>	
				<section class="introBlock">
					<?php echo intro_block();  ?>
					<?php echo jquery_catfilter_list(); ?>
				</section>		
			<?php endif; ?>	
	
			<ul id="grid-content">
				<?php query_posts(array( 'posts_per_page' => 50));
				while ( have_posts() ) : the_post(); ?>

					<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
						
						<?php 							
						$color = show_cat_colors();
						if ( has_post_thumbnail() ) { ?>						
							<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_post_thumbnail('grid-thumb'); ?></a>							
							
						<?php } else { ?>	    
						<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php bloginfo('template_url'); ?>/img/placeholder.jpg" /></a>	
						<?php } ?>	   
					
						<div class="module">
							<h2><a style="background:<?php echo $color; ?>" href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<?php echo show_tools_icons(); ?>
						</div>
						
					</li>			<?php endwhile; ?>
			</ul> <!-- #grid-content -->
	
		</div> <!-- #inner -->
		
	</div> <!-- #content  -->

<script type="text/javascript">	
	jQuery(document).ready(function() {	
	jQuery('#grid-content').filterable();
	//.masonry({
     // itemSelector: '.project',
     // isFitWidth: true
   // });
      
});
</script>
<style type="text/css">
#grid-content li:hover {
    opacity: 1 !important;
}
</style>
<?php get_footer();?>