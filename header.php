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

// Set up some CSS classes depending on what kind of page this is.
$header_class = "grid_9";
$content_class = "grid_9";
// QUESTION: Should the front page image fill the entire 12 columns?
/*
if (is_front_page()) {
  $header_class = "grid_12";
  $content_class = "grid_12";
}
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
            <div id="left-sidebar-wrapper" class="grid_2">
	           <?php 
                   // This may be an about section some day. 
                   /*
	           $secondary_menu_id = '';	            	
	
	           if ( !has_nav_menu ('header-menu-2') ) {
	               $secondary_menu_id = chiara_secondary_menu_id();
	           }            
	           wp_nav_menu( array( 
	            	'theme_location' => 'header-menu-2',
	            	'menu' => $secondary_menu_id,
	                'container_class' => 'menu-secondary-navigation-container grid_3' ) );
                    */
	           ?>            
            </div>
            <?php if (!is_front_page()): ?>
            <h1 class="<?php echo $header_class; ?>"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php 
            $primary_menu_id = '';
            // If the user hasn't assigned a menu to the menu region,
            // use the defaults.
            if ( !has_nav_menu ('header-menu-1') ) {
                $primary_menu_id = chiara_primary_menu_id();
            }            
            wp_nav_menu( array( 
                'theme_location' => 'header-menu-1',
                'menu' => $primary_menu_id,
                'container_class' => 'menu-primary-navigation-container grid_9',
                'menu_class' => 'menu horizontal'));
            ?>
            <?php endif; ?>
        </div>
        <!-- /#header -->
        <div id="content" class="<?php echo $content_class; ?>">
