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
		
		<?php if ( is_tax() ) : ?>
			<h1><?php single_tag_title(); ?></h1>
		<?php endif; ?>
		
		
		<!-- INNER WRAPPER -->
		<div id="inner">	

		<!-- GRID CONTENT UL - EACH LI IS A GRID CONTAINER -->
		<ul id="grid-content">

		
		<!-- OPEN THE GRID LOOP QUERY -->	
		<?php while ( have_posts() ) : the_post(); ?>
					
				<!-- GRID MODULE LOOP -->	
				<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
					
					
					<?php 							
					$color = show_cat_colors();
					if ( has_post_thumbnail() ) { ?>
					
						<?php if(has_post_thumbnail()) { ?>						
						<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_post_thumbnail('grid-thumb'); ?></a>							
						<?php } ?>								  
					
					<?php } else { ?>	    
					<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php bloginfo('template_url'); ?>/img/placeholder.jpg" /></a>	
					<?php } ?>	
					<!-- /THUMBNAIL FINDER -->	   
                				
					

					
					<div class="module">
						
						<h2><a style="background:<?php echo $color; ?>" href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php echo show_tools_icons(); ?>
										    
					</div>
					<!-- /MODULE TEXT -->
					
															
				</li>
				<!-- /GRID MODULE LOOP -->	
			
			
		<?php endwhile; ?>		
		<!-- /END GRID LOOP QUERY -->
				
		
		</ul>
		<!-- /END GRID LIST -->
		
		
		<!-- PAGINATION -->
		<div id="pagination" class="taxonomy" style="display:none">
			<div class="p"><?php next_posts_link('Previous Posts'); ?></div>
			<div class="m"><?php previous_posts_link('Next Posts'); ?></div>		
		</div>	
		<!-- /PAGINATION -->
		
		
		</div>
		<!-- /INNER WRAPPER -->
		
	</div>
	<!-- /CONTENT CONTAINER -->
	
	
	


<?php get_footer();?>