<?php get_header();  ?>

<?php get_sidebar(); ?>
	
						
<!-- CONTENT CONTAINER -->
<div id="content" class="no-grid">
		
	<!-- INNER WRAPPER -->
	<div id="inner" class="entry-container">
									
			
			<!-- 404  -->
			<?php if ( ! have_posts() ) : ?>
				<div id="entry">	
					<h1><?php _e( 'Not Found', 'fromscratchtwo' ); ?></h1>
					<div class="the_content">	
						<p><?php _e( 'Whoops! Sorry, you have ended up in the wrong place. My bad.', 'fromscratchtwo'); ?>
					</div>
				</div>
			<?php endif; ?>
			
			
			<!-- THE POST LOOP -->
			<?php while ( have_posts() ) : the_post(); 
		  $color = show_cat_colors(); 
		  $cpclasses = get_post_custom_values('cpclass', $post->ID);
			if ($cpclasses != '') $cpclass = $cpclasses[0];
			else $cpclass = ''; 
			?>
		  	<div id="entry" <?php post_class("$cpclass"); ?>>	
		  <h1 style="background-color:<?php echo $color; ?>"><?php the_title(); ?></h1>
<div id="post-<?php the_ID(); ?>" class="show">		  

<?php the_content(); ?>	
		</div>		
		<div class="tell"><?php the_excerpt(); ?>
		<?php edit_post_link('edit', '<p>', '</p>'); ?>
</div>

		<?php echo '<ul class="right sorting" id="sortTools">';
		echo filter_tools();
		echo '</ul>'; ?>
			</div>	
		<!-- /#ENTRY COLUMN -->	
				
				<!-- SECONDARY SIDEBAR COLUMN -->		
<aside id="proj-meta-area">
<ul id="single-aside" class="aside">
	<li>
	<div id="block1" class="aside-block">
		<span class="meta">
			<?php the_date('M Y'); 				
		  $mykey_values = get_post_custom_values('link');
		  if ($mykey_values && (!mykey_values == '')) {
				  echo " &middot; ";
				  the_category(', ');
				  echo '</span>';
				  echo " &middot; ";
				  echo '<span class="meta">' . show_tools_icons() . '</span>';
				  echo "<h3>Links</h3>";
				  foreach ( $mykey_values as $value ) {
					echo '<span class="meta"><a class="projectLink" target="_blank" href="http://' . $value . '">' . $value . '</a></span>';
				  }
			  } 
			else {
				echo "</\span>  &middot; <span class='meta'>";
				the_category(', ');
				echo " </\span>  &middot; ";
				// echo '<span class="meta">' . show_tools_icons() . '</span>';
				} 
				?>
	</div>
	</li>
	
	<li>
	<div id="block2" class="aside-block">
<?php //	Also in <?php the_category(); ?>
	</div>
	</li>
	
	<li>
	<div id="block3" class="aside-block">
<?php // I'm not sure what goes here. ?>
	</div>
	</li>
	
</ul> <!-- single-aside -->
<?php echo posts_nav(); ?>
</aside>
<?php endwhile; ?>

<?php get_footer(); ?>