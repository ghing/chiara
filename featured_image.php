<?php if ( has_post_thumbnail() ): 
  if (is_front_page()) {
    $image_link = '/projects/';
    $css_classes = '';
  }
  else {
    $original_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'original');  
    $image_link = $original_image_url[0];
    $css_classes = 'colorbox';
  }
?>
<div class="entry-main-image attachment-<?php echo get_post_thumbnail_id(); ?>">
  <a href="<?php echo $image_link; ?>" title="<?php chiara_the_post_thumbnail_title(); ?>" class="<?php echo $css_classes; ?>"><?php the_post_thumbnail('chiara-700'); ?></a>
  <?php chiara_attachment_caption(get_post_thumbnail_id()); ?>
</div>
<?php endif; ?>
