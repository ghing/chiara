<?php

add_theme_support('post-thumbnails', array('post', 'page', 'chiara_object', 'chiara_project'));
add_image_size('chiara-thumbnail-220', 220, 220, false);
add_image_size('chiara-700', 700);

add_action( 'init', 'chiara_create_post_types' );

function chiara_create_post_types() {
  register_post_type( 'chiara_project',
      array(
            'labels' => array(
                    'name' => __( 'Projects' ),
                     'singular_name' => __( 'Project' )
             ),
       'public' => true,
       'has_archive' => true,
       'rewrite' => array('slug' => 'projects'),
       'supports' => array('title', 'editor', 'comments', 'trackbacks', 'revisions', 'author', 'thumbnail', 'custom-fields', 'page-attributes')
       )
  );
  register_post_type( 'chiara_object',
      array(
            'labels' => array(
                    'name' => __( 'Objects' ),
                     'singular_name' => __( 'Object' )
             ),
       'public' => true,
       'has_archive' => true,
       'rewrite' => array('slug' => 'objects'),
       'supports' => array('title', 'editor', 'comments', 'trackbacks', 'revisions', 'author', 'thumbnail', 'custom-fields', 'page-attributes')
       )
  );
}

function chiara_register_scripts() {
  if ( !is_admin() ) {
    // register your script location, dependencies and version
    wp_register_script('colorbox',
      get_bloginfo('template_directory') . '/js/jquery.colorbox-min.js',
      array('jquery'),
      '1.3.17' );
  }
}

function chiara_enqueue_scripts() {
  wp_enqueue_script('colorbox');
}

add_action('wp_head', 'chiara_add_stylesheets');

function chiara_stylesheet_url($stylesheet) {
  return sprintf("<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"%s/%s\" />", get_bloginfo('template_url'), $stylesheet);
}

function chiara_add_stylesheets() {
  printf("%s\n", chiara_stylesheet_url('css/reset.css'));
  printf("%s\n", chiara_stylesheet_url('css/960.css'));
  printf("%s\n", chiara_stylesheet_url('css/colorbox.css'));
}

function chiara_the_post_thumbnail_title() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo $thumbnail_image[0]->post_title;
  }
}

function chiara_the_post_thumbnail_description() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo $thumbnail_image[0]->post_content;
  }
}

function chiara_split_name() {
    foreach (preg_split("/\s+/", get_bloginfo( 'name' )) as $name_part) {
        printf("<span>%s</span>", $name_part);
    }
}

?>
