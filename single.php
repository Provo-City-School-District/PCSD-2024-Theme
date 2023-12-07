<?php
get_header();
?>
<main id="mainContent" class="sidebar">
	<?php custom_breadcrumbs(); ?>
	<!-- Current Page Content -->
	<section id="currentPage">
		<article class="activePost">
			<?php
			// $galleryArray = get_post_gallery_ids($post->ID);
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<header class="postmeta">
						<h1><?php the_title(); ?></h1>
						<ul>
							<li id="the_post_date"><img src="//globalassets.provo.edu/image/icons/calendar-ltblue.svg" alt="" /><?php the_time(' F jS, Y') ?> /</li>
							<?php // if(!is_single(60848)){
							?> <li><img src="//globalassets.provo.edu/image/icons/person-ltblue.svg" alt="" /><?php the_author_posts_link() ?> /</li> <?php // }; 
																																						?>
							<li><img src="//globalassets.provo.edu/image/icons/hamburger-ltblue.svg" alt="" /><?php the_category(', ') ?></li>
						</ul>
					</header>
					<?php
					/*
					if (get_post_gallery_ids($post->ID)) { ?>
						<header class="featured-gallery">
							<div class="featured-for">
								<?php foreach ($galleryArray as $id) { ?>
									<img src="<?php echo wp_get_attachment_url($id); ?>" alt="" />
								<?php } ?>
							</div>
							<div class="featured-nav">
								<?php foreach ($galleryArray as $id) { ?>
									<img src="<?php echo wp_get_attachment_url($id); ?>" alt="" />
								<?php } ?>
							</div>
						</header>
					<?php } else { ?>
						<header class="featured-image-full">
							<?php the_post_thumbnail(); ?>
						</header>
					<?php }	
					*/ ?>

					<?php the_content();
					// print_r(get_fields());
					?>
					<footer class="post_sig">
						<!-- post_sig -->
						<?php
						//fetch post author display name
						$authorname = get_the_author_meta('display_name', false);
						//set variable base
						$avatar = '';
						$authortitle = '';

						//check the author to decide title and avatar
						//I wanted to link this directly to the directory, but the profiles built into wordpress use the Gravatar system which requires registering on a external site. Because of this I decided to just program the information in for the common posters for now. I plan to find a more automated way to do this in the future.
						if ($authorname == 'Alexander Glaves') {
							$avatar = 'https://provo.edu/wp-content/uploads/2021/05/alexander-glaves-1.jpg';
							$authortitle = 'Social Media/Marketing Specialist';
						} elseif ($authorname == 'Caleb Price') {
							$avatar = 'https://provo.edu/wp-content/uploads/2020/01/price-caleb.jpg';
							$authortitle = 'Director of Communications';
						} elseif ($authorname == 'Shauna Sprunger') {
							$avatar = 'https://provo.edu/wp-content/uploads/2020/01/sprunger-shauna.jpg';
							$authortitle = 'Coordinator of Communications';
						} elseif ($authorname == 'Spencer Tuinei') {
							$avatar = 'https://provo.edu/wp-content/uploads/2022/01/spencer-tuinei.png';
							$authortitle = 'Communication Specialist';
						} elseif ($authorname == 'Keith Rittel') {
							$avatar = 'https://provo.edu/wp-content/uploads/2017/02/rittel-keith-1.jpg';
							$authortitle = 'Superintendent';
						} elseif ($authorname == 'Provo City School District') {
							$avatar = 'https://globalassets.provo.edu/image/logos/pcsd-logo-website-header-x2.png';
							//unset($authortitle);
						} else {
							$avatar = 'https://secure.gravatar.com/avatar/d8bb45e8c362b840cef4c235944c56ab?s=96&d=mm&r=g';
						}
						//output the actual signature on the post
						?>
						<img src="<?php echo $avatar; ?>" alt="<?php echo $authorname; ?>" class="staff-member-photo" />
						<ul>

							<?php if ($authortitle) { ?>
								<li class="title"> <?php echo $authortitle; ?> </li>
							<?php } ?>
							<li class="name"><?php echo $authorname; ?></li>
						</ul>
					</footer>

			<?php endwhile;
			else :
				echo '<p>No Content Found</p>';
			endif;
			echo do_shortcode('[social_warfare]');
			//social_warfare();
			?>
			<div class="bottom"></div>
			<section class="postList">
				<div class="grid3">
					<?php
					$currentID = get_the_ID();
					wp_reset_query();
					wp_reset_postdata();
					//Removes news category from get_the_category
					$categoryID = get_the_category($post->ID);
					foreach ($categoryID as $category) {
						if ($category->term_id == 192) {
							continue;
						}
						$postcategories = '"' . $category->name . '"' . ',';
					}

					//use $postcategories for category_name if you want to display category related posts only. Use actual category name if you want to only use that category
					$my_query = new WP_Query(array('showposts' => 3, 'post_status' => 'publish', 'category_name'  => 'News', 'post__not_in' => array($currentID)));
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<article class="post">
							<div class="featured-image">
								<?php

								if (get_field('featured_image', $post_id)) {
								?>
									<a href="<?php the_permalink(); ?>"><img src="<?php echo get_field('featured_image'); ?>" alt="" class="" /></a>
								<?php
								} elseif (has_post_thumbnail()) {
								?>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
								<?php
								}
								?>
							</div>
							<header class="postmeta">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<ul>
									<li><img src="//globalassets.provo.edu/image/icons/calendar-ltblue.svg" alt="" /><?php the_time(' F jS, Y') ?></li>
								</ul>
							</header>
							<?php echo get_excerpt(); ?>
						</article>
					<?php endwhile; ?>
				</div>
			</section>
		</article>


	</section>
	<!-- Current Page Content End -->
	<?php get_sidebar('categories'); ?>
</main>
<?php
get_footer();
?>