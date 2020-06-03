<?php

  get_header();

	while(have_posts()) {
		the_post();  ?>

<h2><?php the_title(); ?></h2>
    <p><?php echo get_the_category_list(', '); ?></p>
    <p><a href="<?php echo get_post_type_archive_link('event'); ?>">Events Home</a>
    on
    <?php the_time('n.j.y'); ?></p>

		<?php the_content(); ?>

        <div>


            <?php echo '<ul>';

                $relatedCustomPost = get_field('related_custom_post');
            if ($relatedCustomPost) {
                foreach($relatedCustomPost as $customPost) {
                    ?>

            <li>
                <a href="<?php echo get_the_permalink($customPost); ?>"><?php echo get_the_title($customPost); ?></a>
            </li>

                    <?php
                }
            }
                echo '</ul>';
             ?>

        </div>

<?php
	}

  get_footer();

 ?>
