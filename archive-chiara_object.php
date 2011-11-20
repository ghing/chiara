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

<?php if (have_posts()) : ?>
<?php 
query_posts($query_string . "&order_by=date&order=dsc"); 
$num_posts = 0;
?>
<?php while (have_posts()) : the_post(); ?>
<?php if ($num_posts % POSTS_IN_ARCHIVE_ROW == 0): ?>
<div class="row grid_9">
<?php endif; ?>
	<div class="grid_3 small-post-container"> 
		<a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>	
		<h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
	</div>
	<!-- /.small-post-container -->
<?php if ($num_posts % POSTS_IN_ARCHIVE_ROW == POSTS_IN_ARCHIVE_ROW - 1): ?>
</div>
<!-- /.row -->
<?php endif; ?>
<?php $num_posts++; ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
