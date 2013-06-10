<!-- Sidebar -->
	<div id="sidebar">	
		
		<!-- BEGIN LOGO -->
		<div class="logo">		

        <a id="logoLink" href="<?php bloginfo('url') ?>/" title="<?php echo bloginfo('blog_name'); ?>">
		jackmakesthings</a>
                
		</div>			
		<div class="box">
		<!-- ?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ? -->
			<ul class="widget-area">
			<?php smcf(); ?>
			<!-- a href="php bloginfo('url'); /jack-who" title="jack who?" class="bioLink">jack who?</a -->
			  <a href="<?php bloginfo('url'); ?>/downloads/jackgold-resume.pdf" title="jack who?" class="resumeLink pdfLink" rel="download">resume (PDF)</a>
			
			<?php echo cat_nav(); ?>
			<?php echo recent_nav(); 
			//dynamic_sidebar( 'primary-widget-area' );
				?>
 			</ul>
		<!-- ?php endif; ? -->
		</div>
		<!-- </Box -->
		
		<div class="close_dot"></div>
	</div>
<!-- </Sidebar -->