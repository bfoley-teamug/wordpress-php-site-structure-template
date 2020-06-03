<?php

  get_header();

	while(have_posts()) {
		the_post();  ?>

<h2><?php the_title(); ?></h2>
    <p><?php echo get_the_category_list(', '); ?></p>
    <p><a href="<?php echo get_post_type_archive_link('custom_post'); ?>">All Custom Posts</a>
    on
    <?php the_time('n.j.y'); ?></p>

		<?php the_content(); ?>


        <hr />

        <div><p>Hello!</p></div>

        <hr />

        <?php
            $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
                'posts_per_page' => 3,
                'post_type' => 'event',
                'meta_key' => 'event_date',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric',
                    ),
                    array(
                        'key' => 'related_custom_post',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    )
                )
            ));

            while($homepageEvents->have_posts()) {
                $homepageEvents->the_post();
        ?>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>


        <h5> <?php
            $eventDate = new DateTime(get_field('event_date'));
            echo $eventDate->format('F j, Y')
        ?></h5>

        <p><?php
            if(has_excerpt()) {
                echo get_the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 20);
            }
         ?>
         <a href="<?php the_permalink(); ?>">Read More</a></p>
        <?php
                }
       ?>

       <hr />

<?php
	}

  get_footer();

 ?>
