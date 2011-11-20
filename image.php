<?php
/**
 * The Template for displaying image attachments. 
 *
 * @package WordPress
 * @subpackage Chiara 
 * @since Chiara 1.0
 */

get_header(); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
<h2 class="entry-title"><a href="<?php echo get_permalink($post->post_parent); ?>"><?php the_title(); ?></a></h2>

<?php echo wp_get_attachment_image($attachment->ID, 'chiara-700'); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
