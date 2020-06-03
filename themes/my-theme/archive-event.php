<?php
	get_header();
?>

<h1>All Events</h1>

<h2>See all our great events here subtitle</h2>

<h3>
  <?php the_archive_title(); ?>


  <?php
	 while(have_posts()) {
		   the_post();
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
	echo paginate_links();
?>

<hr />

<p><a href="<?php echo site_url('/past-events') ?>">Past Events Archive</a></p>

<?php
	get_footer();
 ?>
