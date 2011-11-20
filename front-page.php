<?php
/**
 * Template page for showing a single page post as the front page.
 * 
 * The page is selected in Settings > Reading.
 *
 * @package WordPress
 * @subpackage Chiara 
 * @since Chiara 1.0
 */

get_header('front-page'); 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
<?php if ( has_post_thumbnail() ): 
$original_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'original');  
$image_link = '/projects/';
$css_classes = '';
?>
<a href="<?php echo $image_link; ?>" title="Projects" class="<?php echo $css_classes; ?>"><?php the_post_thumbnail('original'); ?></a>
<?php endif; endwhile; endif; ?>

<?php get_footer('front-page'); ?>
