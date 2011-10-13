<?php if ( has_post_thumbnail() ): 
  $original_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'original');  
?>
<div class="entry-main-image attachment-<?php echo get_post_thumbnail_id(); ?>">
  <a href="<?php echo $original_image_url[0]; ?>" title="<?php chiara_the_post_thumbnail_title(); ?>"><?php the_post_thumbnail('chiara-700'); ?></a>
  <?php chiara_attachment_caption(get_post_thumbnail_id()); ?>
</div>
<?php endif; ?>
