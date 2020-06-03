<style>
.navbar {
    float: right;
}

.navbar li {
    list-style-type: none;
    display: inline-block;
    margin: 0 15px;
}

</style>


<?php

  get_header();

	while(have_posts()) {
		the_post();  ?>

<h2><?php the_title(); ?></h2>
    <!-- breadcrumb link -->
    <?php
      $parent = wp_get_post_parent_id(get_the_ID());

      if($parent) {
        ?>
          <div>
            <p>
              <a href="<?php echo get_permalink($parent); ?>">
                Click Here to Go Back to <?php echo get_the_title($parent); ?>
              </a>
            </p>
          </div>
        <?php
      }
    ?>
        <!-- end breadcrumb link -->

    <?php
      $testArr = get_pages(array('child_of' => get_the_ID()));

    if($parent or $testArr) { ?>

    <div>
        <!-- shows the parent page text -->
      <h3>Hey Parent Page <?php echo get_the_title($parent); ?></h3>
        <!-- <div>
          <a class="toggle-nav" href="#">&#9776;</a>
      </div>  -->
        <ul>
          <?php

            if($parent) {
              $findChildrenPages = $parent;
            } else {
              $findChildrenPages = get_the_ID();
            }

            wp_list_pages(array(
              'title_li' => NULL,
              'child_of' => $findChildrenPages,
              'sort_column' => 'menu_order'

            ));
          ?>
        </ul>
    </div>

  <?php } ?>


        <button id="hey"></button>

        <hr />


     <?php
        if ($post->post_parent)	{
            $ancestors = get_post_ancestors($post->ID);
            $root = count($ancestors)-1;
            $parent = $ancestors[$root];
        } else {
            $parent = $post->ID;
        }

        ?>

<!-- here it is -->
   <nav class="navbar">
    <?php
        wp_list_pages(array(
            'title_li' => NULL,
            'child_of' => $ancestors->post_parent,
            'depth' => 1
        ));
     ?>
 </nav>

        <hr />

        <hr />
        <hr />
        <h2>TEST</h2>
        <?php
          $testArr = get_pages(array('child_of' => get_the_ID()));

        if($parent or $testArr) { ?>

        <div>
            <!-- shows the parent page text -->
          <h3>Hey Parent Page <?php echo get_the_title($parent); ?></h3>
            <!-- <div>
              <a class="toggle-nav" href="#">&#9776;</a>
          </div>  -->
            <ul>
              <?php

                if($parent) {
                  $findChildrenPages = $parent;
                } else {
                  $findChildrenPages = get_the_ID();
                }

                wp_list_pages(array(
                  'title_li' => NULL,
                  'child_of' => $findChildrenPages,
                  'sort_column' => 'menu_order'

                ));
              ?>
            </ul>
        </div>

      <?php } ?>

      <?php
          if ($ancestors) {
              echo '<h2>hello!</h2>';
              wp_list_pages(array(
                'title_li' => NULL,
                'child_of' => get_the_ID(),
                'sort_column' => 'menu_order'
                ));
          }
      ?>


      <hr />
      <!-- breadcrumb link -->
      <?php
        $parent = wp_get_post_parent_id(get_the_ID());

        if($ancestors) {
          ?>
            <div>
              <p>
                <a href="<?php echo get_permalink($parent); ?>">
                  Click Here to Go Back to <?php echo get_the_title($parent); ?>
                </a>
              </p>
            </div>
          <?php
        }
      ?>
          <!-- end breadcrumb link -->


		<?php the_content(); ?>

<?php
	}

  get_footer();

 ?>
