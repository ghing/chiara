<?php

add_theme_support('post-thumbnails', array('post', 'page', 'chiara_object', 'chiara_project'));
add_image_size('chiara-thumbnail-220', 220, 220, false);
add_image_size('chiara-thumbnail-220-square', 220, 220, true);
add_image_size('chiara-700', 700);
set_post_thumbnail_size( 220, 220, true );

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
       'supports' => array('title', 'editor', 'comments', 'trackbacks', 'revisions', 'author', 'thumbnail', 'custom-fields', 'page-attributes'),
       'taxonomies' => array('category', 'post_tag')
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
       'supports' => array('title', 'editor', 'comments', 'trackbacks', 'revisions', 'author', 'thumbnail', 'custom-fields', 'page-attributes'),
       'taxonomies' => array('category', 'post_tag')
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

function chiara_the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo $thumbnail_image[0]->post_excerpt;
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

function chiara_register_menus() {
  register_nav_menus(
    array( 'header-menu-1' => __( 'Header Menu 1' ),
           'header-menu-2' => __( 'Header Menu 2' ))
  );
}
add_action( 'init', 'chiara_register_menus' );

function chiara_initialize_default_menus() {
	global $chiara_primary_menu_id;
	global $chiara_secondary_menu_id;
	
	$name = 'Primary Navigation';
	if (!$menu = get_term_by( 'name', $name, 'nav_menu' )) {
		// Menu does not exist.  Create it.
	  	$chiara_primary_menu_id = wp_create_nav_menu($name);
	  	$menu = get_term_by( 'name', $name, 'nav_menu' );
	  	wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-title' =>  __('Projects'),
	      	'menu-item-classes' => 'home',
	      	'menu-item-url' => home_url( '/projects' ),
	      	'menu-item-status' => 'publish'));
	    wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-title' =>  __('Objects'),
	      	'menu-item-classes' => 'home',
	      	'menu-item-url' => home_url( '/objects' ),
	      	'menu-item-status' => 'publish'));	    	
	}
	else {
		// Menu already exists, just get the id.
		$chiara_primary_menu_id = $menu->term_id;
	}	
    
    $name = 'Secondary Navigation';
	if (!$menu = get_term_by( 'name', $name, 'nav_menu' )) {
		// Menu does not exist.  Create it.
	  	$chiara_secondary_menu_id = wp_create_nav_menu($name);
	  	$menu = get_term_by( 'name', $name, 'nav_menu' );
	  	wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-title' =>  __('Bio'),
	      	'menu-item-classes' => 'home',
	      	'menu-item-url' => home_url( '/bio' ),
	      	'menu-item-status' => 'publish'));	
		wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-title' =>  __('Contact'),
	      	'menu-item-classes' => 'home',
	      	'menu-item-url' => home_url( '/contact' ),
	      	'menu-item-status' => 'publish'));
	  	wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-title' =>  __('CV'),
	      	'menu-item-classes' => 'home',
	      	'menu-item-url' => home_url( '/cv' ),
	      	'menu-item-status' => 'publish'));		
	}
	else {
		// Menu already exists, just get the id.
		$chiara_secondary_menu_id = $menu->term_id;
	}		
}
add_action( 'init', 'chiara_initialize_default_menus' );

function chiara_primary_menu_id() {
		global $chiara_primary_menu_id;
		return $chiara_primary_menu_id;
}

function chiara_secondary_menu_id() {
		global $chiara_secondary_menu_id;
		return $chiara_secondary_menu_id;
}

function chiara_primary_menu_slug() {
	global $chiara_primary_menu_id;
	$menu = get_term_by( 'id', $chiara_primary_menu_id, 'nav_menu' );
	return $menu->slug;
}

function chiara_secondary_menu_slug() {
	global $chiara_secondary_menu_id;
	$menu = get_term_by( 'id', $chiara_secondary_menu_id, 'nav_menu' );
	return $menu->slug;
}

add_filter('nav_menu_css_class' , 'chiara_special_nav_class' , 10 , 2);
/**
 * Assign special CSS classes to the navigation menu items
 *
 * The menu acts as a sort of breadcrumb.  If page is an archive or single
 * page for one of our custom types or if it is an archive or single page for
 * a category, give the menu item a special class so it can be highlighted.
 */
function chiara_special_nav_class($classes, $item){
    global $post;	
    if (($post->post_type == 'chiara_project' && $item->title == "Projects") ||
($post->post_type == 'chiara_object' && $item->title == "Objects")) { 
        // If the post is one of our special post types
     	$classes[] = "active-path";
    }
    else if ($post->post_type == 'page' && $item->title == $post->post_title) {
        // If the post is a page and there's a menu item for it
    	$classes[] = "active-path";    	
    }
    else if ($item->type == 'taxonomy' && 
             (is_category($item->title) || in_category($item->title))) {
        // If the post is in a category that has a menu item.
    	$classes[] = "active-path";    	
    }
    return $classes;
}

add_action( 'add_meta_boxes', 'chiara_add_custom_box' );
function chiara_add_custom_box() {
    add_meta_box( 
        'chiara_attachment_handling',
        __( 'Chiara Attachment Handling', 'chiara_textdomain' ),
        'chiara_custom_box',
        'chiara_object' 
    );    
    add_meta_box( 
        'chiara_attachment_handling',
        __( 'Chiara Attachment Handling', 'chiara_textdomain' ),
        'chiara_custom_box',
        'chiara_project' 
    );
}

function chiara_custom_box($post) {
  // Use nonce for verification
  //wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );
  
  $auto_display_attachments = get_post_meta($post->ID, 'chiara_auto_display_attachments', true);
  $auto_display_attachment_info = get_post_meta($post->ID, 'chiara_auto_display_attachment_info', true);
  // DEBUG
  //print_r($auto_display_attachments);
  //print_r($auto_display_attachment_info);
  // /DEBUG
  
  echo '<p>';
  printf('<input type="checkbox" id="chiara-auto-display-attachments" name="chiara-auto-display-attachments"%s/>',
         $auto_display_attachments != "" ? " checked" : "");
  echo '<label for="chiara-auto-display-attachments">';
       _e("Automatically display attached images in the post's page?", 'chiara_textdomain' );
  echo '</label> ';
  echo '</p>';
  echo '<p>';
  printf('<input type="checkbox" id="chiara-auto-display-attachment-info" name="chiara-auto-display-attachment-info"%s/>',
         $auto_display_attachment_info != "" ? " checked" : "");
  echo '<label for="chiara-auto-display-attachment-info">';
       _e("Automatically display information (title, caption, description) for attached images in the post's page?", 'chiara_textdomain' );
  echo '</label> ';
  echo '</p>';
}

add_action( 'save_post', 'chiara_save_postdata' );
function chiara_save_postdata( $post_id ) {
  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times
  /*
  if ( !wp_verify_nonce( $_POST['chiara_noncename'], plugin_basename( __FILE__ ) ) )
      return;
  */
  
  // Check permissions
  if ( 'page' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // OK, we're authenticated: we need to find and save the data

  $auto_display_attachments = $_POST['chiara-auto-display-attachments'];
  $auto_display_attachment_info = $_POST['chiara-auto-display-attachment-info'];
  add_post_meta($post_id, 'chiara_auto_display_attachments', $auto_display_attachments, true) or update_post_meta($post_id, 'chiara_auto_display_attachments', $auto_display_attachments);
  add_post_meta($post_id, 'chiara_auto_display_attachment_info', $auto_display_attachment_info, true) or update_post_meta($post_id, 'chiara_auto_display_attachment_info', $auto_display_attachment_info);

  // Do something with $mydata 
  // probably using add_post_meta(), update_post_meta(), or 
  // a custom table (see Further Reading section below)
}

function chiara_auto_display_attachments() {
	global $post;	
  	return get_post_meta($post->ID, 'chiara_auto_display_attachments', true) != "";  
}

function chiara_auto_display_attachment_info() {
	global $post;
	return get_post_meta($post->ID, 'chiara_auto_display_attachment_info', true) != "";	
}

function chiara_attachment_caption($attachment_id) {
  $attachment_post = get_post($attachment_id);
  $caption = isset($attachment_post->post_title) ? $attachment_post->post_title . '. ' : '';
  $caption .= isset($attachment_post->post_excerpt) ? $attachment_post->post_excerpt . ' ' : '';
  $caption .= isset($attachment_post->post_content) ? $attachment_post->post_content : '';
  printf('<p class="wp-caption-text%s">%s</p>',
          chiara_auto_display_attachment_info() ? ' hidden' : '',
          $caption);
}

?>
