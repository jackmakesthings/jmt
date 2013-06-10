<?php get_header();  ?>

<?php get_sidebar(); ?>
	
	<!-- CONTENT CONTAINER -->
	<div id="content">		

		
		<!-- TAG CONDITIONAL -->
		<?php if ( is_search() ) :	?>			
			<div id="identification">
				<h3>Results for "<b><?php the_search_query() ?></b>"</h3>
				<?php get_search_form(); ?>				
			</div>				
		<?php endif; ?>
		
		<!-- TAG CONDITIONAL TITLE -->
		<?php if ( is_tag() ) :	?>			
			<div id="identification">
				<h1>Posts Tagged with "<b><?php single_tag_title(); ?></b>"</h1> 
				<p class="taxonomy">More Tags &raquo; <?php wp_tag_cloud('separator= '); ?></p>					
			</div>				
		<?php endif; ?>
		<!-- TAG PAGE CONDITIONAL -->		
		
		<!-- CATEGORY CONDITIONAL TITLE -->
		<?php if ( is_category() ) :	?>			
			<!-- div id="identification" p class="taxonomy" More Categories &raquo; ?php wp_list_categories('style=none&seperator= '); ? /p /div -->
			<h1><?php single_cat_title(); ?></h1> 				
		<?php endif; ?>
		<!-- CATEGORY PAGE CONDITIONAL TITLE -->

			
		<!-- INNER WRAPPER -->
		<div id="inner">	


		<!-- GRID CONTENT UL - EACH LI IS A GRID CONTAINER -->
		<ul>


		<!-- OPEN THE GRID LOOP QUERY -->	
		<?php while ( have_posts() ) : the_post(); ?>
					
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
			<?php the_content(); ?>				
			</article>
			
			
		<?php endwhile; ?>		
		<!-- /END GRID LOOP QUERY -->
				
		
		</ul>
		<!-- /END GRID LIST -->
			
		
		</div>
		<!-- /INNER WRAPPER -->
		
	</div>
	<!-- /CONTENT CONTAINER -->
<?php get_footer();?>