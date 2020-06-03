
			<?php
				get_header();
			?>


			<h1>I Am The h1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!</h1>

			<div class="row">
				<div class="col">
					<?php
						while(have_posts()) {
							the_post();  ?>

					<h2><a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
					</h2>

							<?php the_content(); ?>

				</div>

				<div class="col">
				</div>

			</div>

			<div class="row">
				<div class="col">
					<h2>Events</h2>
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
					<div>
						<p>
							<a href="<?php echo get_post_type_archive_link('event') ?>"?
								<button type="button" class="btn btn-primary">See All Events</button>
							</a>
						</p>
				 	</div>
				</div>
				<div class="col">

					<h2>Blog Roll</h2>
						<?php
							$homepagePosts = new WP_Query(array(
								'posts_per_page' => 2,
							));

							while($homepagePosts->have_posts()) {

								$homepagePosts->the_post(); ?>
								<div>
									<h4><?php the_title(); ?></h4>
									<p><strong><?php the_time('M d'); ?></strong></p>
									<p><?php
										if(has_excerpt()) {
											echo get_the_excerpt();
										} else {
											echo wp_trim_words(get_the_content(), 20);
										}
									 ?></p>
									<p><a href="<?php the_permalink(); ?>">Read More</a></p>
									<hr />
									<p><strong><a href="<?php echo site_url('/blog'); ?>">See All Posts ></a> </strong></p>
								</div>
						<?php
							}

							wp_reset_postdata();

						 ?>
				</div>
			</div>

		<hr />


<?php
	}

	get_footer();

 ?>
