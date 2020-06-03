<!DOCTYPE html>
<html  <?php language_attributes(); ?> >

  <head>
    <meta charset="<?php bloginfo('charset'); ?>" >
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
  </head>
 
<body <?php body_class(); ?> >
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <a href="<?php echo site_url() ?>"><img src="<?php echo get_theme_file_uri('images/sombrero-galaxy.jpg') ?>"></a>
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
     <a class="nav-item nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?php echo site_url('/about-me') ?>">About Me</a>
      <a class="nav-item nav-link" href="<?php echo site_url('/blog') ?>">Blog</a>
      <a class="nav-item nav-link" href="<?php echo get_post_type_archive_link('event') ?>">Events</a>
      <a class="nav-item nav-link" href="<?php echo site_url('/contact') ?>">Contact</a>
    </div>
  </div>
</nav>
<div class="container">
