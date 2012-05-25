<?php
/*
Template Name: All Work
*/

/**
 * Listing of all Projects and Objects 
 *
 * @package WordPress
 * @subpackage Chiara 
 * @since Chiara 1.0
 */

get_header(); 
?>
<?php 
// This is the main loop that will show the Page content, in case
// the user wants to have page content above the archive listing.
// See the loop below for the code that shows the actual content
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
<?php the_content(); ?>
<?php endwhile; endif; ?>
<?php
$num_posts = 0;
$args = array(
  'numberposts' => -1,
  'post_type' => array('chiara_project', 'chiara_object')
);
$archive_posts = get_posts( $args );
foreach ( $archive_posts as $post ) : setup_postdata($post); ?>
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
<?php endforeach; ?>

<?php get_footer(); ?>
