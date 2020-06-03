<?php


//JS for WP
function jsforwp_enqueue_scripts() {

   // Change 'dependency-handle-1' to 'jquery'
   // Explore these other dependcy options https://goo.gl/vob23L
   // Change 'dependency-handle-2' to another dependcy
    wp_enqueue_script(
      'jsforwp-jquery-theme-js',
      get_stylesheet_directory_uri() . '/assets/js/jquery.theme.js',
      [
        'jquery',
        'jquery-masonry'
      ],
      time(),
      true
    );

}
add_action( 'wp_enqueue_scripts', 'jsforwp_enqueue_scripts' );
//


  function mysite_files() {
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('my_styles', get_stylesheet_uri());
  }

  add_action('wp_enqueue_scripts', 'mysite_files');


function hey_adjust_queries($query) {

    if(!is_admin() AND is_post_type_archive('custom_post') AND $query->is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }


    if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric',
            )
        ));
    }
}

add_action('pre_get_posts', 'hey_adjust_queries');


  function features() {
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerMenuLocation', 'Footer Menu Location');
    add_theme_support('title-tag');
  }

  add_action('after_setup_theme', 'features');


  add_shortcode('shortcode_example', 'shortcode_example');


  function shortcode_example($atts, $content) {
   return '<span style="color: red;">' . $content . '</span>';
  }
