<?php

   
					$print_meta = get_option("category_3");
					if (isset($print_meta['category_color'])){
					  $printColor = '#';
					  $printColor .= $print_meta['category_color'];
					}
					else { $printColor ='#dd2'; }
					
					$web_meta = get_option("category_5");
					if (isset($web_meta['category_color'])){
					  $webColor = '#' . $web_meta['category_color'];
					}
					else { $webColor ='#0cd'; }
					
?>
<style type="text/css">
.term-illustrator h1, .term-vector h1, .term-photoshop h1, .term-raster h1, .term-indesign h1  { background-color:<?php echo $printColor; ?>!important; }
.illustrator a.illustrator, .indesign a.indesign, .photoshop a.photoshop, .raster a.raster { color:<?php echo $printColor; ?> !important }

.css a.css, .html a.html, .javascript a.javascript, .php a.php, .wordpress a.wordpress { color: <?php echo $webColor; ?> !important; }
</style>