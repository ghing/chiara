<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Chiara 
 * @since Chiara 1.0
 */

get_header(); 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
<h2 class="entry-title"><?php the_title(); ?></h2>
<?php if ( has_post_thumbnail() ): 
  $original_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'original');  
?>
<div class="entry-main-image">
  <a href="<?php echo $original_image_url[0]; ?>" title="<?php chiara_the_post_thumbnail_title(); ?>"><?php the_post_thumbnail('object'); ?></a>
  <span class="wp-post-image-title"><?php chiara_the_post_thumbnail_title(); ?></span>
  
</div>
<?php endif; ?>
<?php
$args = array(
  'post_type' => 'attachment',
  'numberposts' => -1,
  'post_status' => null,
  'post_parent' => $post->ID
);
$attachments = get_posts($args);
if ($attachments) {
  foreach ($attachments as $attachment) {
    if ($attachment->ID != get_post_thumbnail_id()) {
      $image_attributes = wp_get_attachment_image_src($attachment->ID, 'original');
      echo '<a href="' . $image_attributes[0] . '" class="attachment-src-url">' . wp_get_attachment_image($attachment->ID, 'object-thumbnail') . '</a>';
      echo '<div class="attachment-title">' . $attachment->post_title . '</div>';
    }
  }
}
?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
