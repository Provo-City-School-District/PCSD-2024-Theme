<?php
get_header();
?>
<main id="mainContent" class="sidebar">
	<?php custom_breadcrumbs(); ?>
	<div id="currentPage">
		<h1>District News</h1>
		<div class="postList">
			<div class="grid3">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				// excluding ID 1012. which is the Board Schedule.
				$the_query = new WP_Query(array('posts_per_page' => 18, 'category_name'  => array('news', 'sup-with-the-sup'), 'cat' => '-1012', 'post_type'  => array('post', 'podcast'), 'paged'  => $paged));
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<article class="post">
							<a href="<?php the_permalink(); ?>">
								<div class="featured-image">

									<?php
									if (get_field('featured_image', $post_id)) {
									?>
										<img src="<?php echo get_field('featured_image'); ?>" alt="" class="" />
									<?php
									} elseif (has_post_thumbnail()) {
										the_post_thumbnail();
									} else { ?>
										<img src="https://provo.edu/wp-content/uploads/2018/03/provo-school-district-logo.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" width="217" height="175">
									<?php } ?>

								</div>
								<h2><?php the_title(); ?></h2>
							</a>
							<header class="postmeta">
								<ul>
									<li><img src="//globalassets.provo.edu/image/icons/calendar-ltblue.svg" alt="" /><?php the_time(' F jS, Y') ?></li>
								</ul>
							</header>
							<?php
							echo get_excerpt();
							?>
						</article>

					<?php endwhile; ?>
					<nav class="archiveNav">
						<?php echo paginate_links(array('total' => $the_query->max_num_pages)); ?>
					</nav>
				<?php else :
					echo '<p>No Content Found</p>';
				endif;
				?>
			</div>
		</div>
	</div>
	<?php
	get_sidebar('categories');
	?>
</main>
<?php
get_footer();
?>