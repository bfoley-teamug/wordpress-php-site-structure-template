<?php
	get_header();
?>

<h1>Welcome!</h1>

<h2>
  <?php the_archive_title(); ?>


  <?php
	 while(have_posts()) {
		   the_post();
  ?>
</h2>
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
				in
				<?php echo get_the_category_list(', '); ?>
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

<?php
	get_footer();
 ?>
