<aside id="rightSidebar" class="rightSidebar">
<?php
// gather child theme variables
$theme_vars = my_theme_variables();
?>
	<h2>Follow Us</h2>
	<ul class="sociallinks">
	<li><a href=""><?php echo get_svg('socialmedia-insta'); ?></a></li>
				<li><a href=""><?php echo get_svg('socialmedia-twitter'); ?></a></li>
				<li><a href=""><?php echo get_svg('socialmedia-facebook'); ?></a></li>
	</ul>
<h2>A/B Calendar</h2>
<?php echo do_shortcode( '[calendar id="2064"]' ); ?>	
<h2>Important Dates</h2>
<section class="impDates">
<?php echo do_shortcode( '[calendar id="2066"]' ); ?>	

</section>

</aside>