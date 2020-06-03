<?php

  get_header();

	while(have_posts()) {
		the_post();  ?>

<h2><?php the_title(); ?></h2>
    <p><?php echo get_the_category_list(', '); ?></p>
    <p><a href="<?php echo site_url('/blog') ?>">Blog Home</a> | Posted by <?php the_author_posts_link(); ?>
    on
    <?php the_time('n.j.y'); ?></p> 

		<?php the_content(); ?>

<?php
	}

  get_footer();

 ?>
