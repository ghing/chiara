<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Chiara 
 * @since Chiara 1.0
 */

get_header(); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
<h2 class="entry-title"><?php the_title(); ?></h2>
<?php the_content(); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
<?php get_footer(); ?>
