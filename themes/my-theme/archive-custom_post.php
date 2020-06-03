<?php
	get_header();
?>

<h1>All Custom Posts</h1>

<h2>See All of Our Great Custom Posts Here</h2>

<h3>
  <?php the_archive_title(); ?>
</h3>
<ul>
  <?php
	 while(have_posts()) {
		   the_post();
  ?>

<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

<?php
	}
	echo paginate_links();
?>
</ul>
<hr />
 
<?php
	get_footer();
 ?>
