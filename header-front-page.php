<?php
/**
 * The Header for the front page of our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Chiara 
 * @since Chiara 1.0
 */

?>
<!DOCTYPE html>
<!-- Front page! -->
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
          //wp_enqueue_script('jquery');	
	  wp_register_script('jquery-chiara',
	  	get_template_directory_uri() . '/js/jquery.chiara.js',
		array('jquery'));
	  wp_enqueue_script('jquery-chiara');

          /* Always have wp_head() just before the closing </head>
           * tag of your theme, or you will break many plugins, which
           * generally use this hook to add elements to <head> such
           * as styles, scripts, and meta tags.
           */
          wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
	<div id="content">
