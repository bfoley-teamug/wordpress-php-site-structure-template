<?php
	get_header();
?>

<h1>Past Events</h1>

<h2>These are all our past events</h2>

<h3>
  <?php the_archive_title(); ?>


  <?php

  $today = date('Ymd');
  $pastEvents = new WP_Query(array(
      'paged' => get_query_var('paged', 1),
      'post_type' => 'event',
      'meta_key' => 'event_date',
      'orderby' => 'meta_value_num',
      'order' => 'ASC',
      'meta_query' => array(
          array(
              'key' => 'event_date',
              'compare' => '<',
              'value' => $today,
              'type' => 'numeric',
          )
      )
  ));



	 while($pastEvents->have_posts()) {
		 $pastEvents->the_post();
  ?>
</h3>
<h4><?php the_archive_description(); ?> </h4>
	<div>

		<h3><a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
		</h3>
			<p>Posted by
				<?php the_author_posts_link(); ?>
				on
				<?php the_time('M j, Y'); ?>

			</p>

			<div>
				<?php the_excerpt(); ?>
				<p><a href="<?php the_permalink(); ?>">Read More</a></p>
			</div>

	</div>
<?php
	}
	echo paginate_links(array(

        'total'=>$pastEvents->max_num_pages

    ));
?>

<?php
	get_footer();
 ?>
