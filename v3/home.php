<?php get_header();  ?>

<?php get_sidebar(); ?>
	
	<div id="content">

		<div id="inner">
				<div class="introBlock">
					<?php 
					// echo intro_block();
					echo '<ul class="right sorting" id="sortCats">';
					echo filter_cats();
					echo '</ul><ul class="right sorting" id="sortTools">';
					echo filter_tools();
					echo '</ul>';
					?>
				</div>		
	
			<ul id="grid-content">
				<?php query_posts(array( 'posts_per_page' => 16));
				while ( have_posts() ) : the_post(); 
					get_template_part('loop', 'grid');
				endwhile; ?>
			</ul> <!-- #grid-content -->
	
		</div> <!-- #inner -->
		
	</div> <!-- #content  -->

<?php get_footer();?>