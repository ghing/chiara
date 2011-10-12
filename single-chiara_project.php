<?php
/**
 * Template page for a single project post.
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
<div class="entry-main-image attachment-<?php echo get_post_thumbnail_id(); ?>">
  <a href="<?php echo $original_image_url[0]; ?>" title="<?php chiara_the_post_thumbnail_title(); ?>"><?php the_post_thumbnail('object'); ?></a>
  <div class="attachment-title"><?php chiara_the_post_thumbnail_title(); ?></div>
  <div class="attachment-description"><?php chiara_the_post_thumbnail_description(); ?></div>
</div>
<?php endif; ?>
<?php get_template_part( 'attachment_thumbnails' ); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
