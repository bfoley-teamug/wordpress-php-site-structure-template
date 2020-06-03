<?php

//event custom post type
function my_post_types() {
  register_post_type('event', array(
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array(
      'slug' => 'all-events'
    ),
    'has_archive' => true,
     'public' => true,
     'labels' => array(
       'name' => 'Events',
       'add_new_item' => 'Add New Event',
       'edit_item' => 'Edit Event',
       'all_items' => 'All Events',
       'singular_name' => 'Event'
     ),
     'menu_icon' => 'dashicons-calendar',
  ));

  //new custom post type
  register_post_type('custom_post', array(
    'supports' => array('title', 'editor'),
    'rewrite' => array(
      'slug' => 'custom_posts'
    ),
    'has_archive' => true,
     'public' => true,
     'labels' => array(
       'name' => 'Custom Post',
       'add_new_item' => 'Add New Custom Post',
       'edit_item' => 'Edit Custom Post',
       'all_items' => 'All Custom Posts',
       'singular_name' => 'Custom Post'
     ),
     'menu_icon' => 'dashicons-admin-site', 
  ));
}

add_action('init', 'my_post_types');
