<?php
	get_header();
?>

<h2>Welcome to the Blog</h2>


<?php
	while(have_posts()) {
		the_post();
?> 
	<div>

		<h2><a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
		</h2>
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
