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

get_header(); 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'featured_image' ); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
