<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Chiara 
 * @since Chiara 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php
      wp_title( '|', true, 'right' );

      // Add the blog name.
      bloginfo( 'name' );
    ?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php
          wp_enqueue_script('colorbox',
            get_bloginfo('template_directory') . '/js/jquery.colorbox-min.js',
            array('jquery'),
            '1.3.17' );
          wp_enqueue_script('typeface',
            get_bloginfo('template_directory') . '/js/typeface.js');
            
          /* We add some JavaScript to pages with the comment form
           * to support sites with threaded comments (when in use).
           */
          if ( is_singular() && get_option( 'thread_comments' ) )
                  wp_enqueue_script( 'comment-reply' );

          /* Always have wp_head() just before the closing </head>
           * tag of your theme, or you will break many plugins, which
           * generally use this hook to add elements to <head> such
           * as styles, scripts, and meta tags.
           */
          wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
    <div class="container_12">
        <div id="header">
            <h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        </div>
        <!-- /#header -->
        <div id="content">
