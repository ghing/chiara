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
      printf("<div class=\"attachment-%d\">", $attachment->ID);
      printf("<a href=\"%s\" class=\"attachment-src-url\" title=\"%s\">%s</a>",
              $image_attributes[0], $attachment->post_title, 
              wp_get_attachment_image($attachment->ID, 'object-thumbnail'));
      echo '<div class="attachment-title">' . $attachment->post_title . '</div>';
      echo '<div class="attachment-description">' . $attachment->post_content . '</div>';
      echo("</div>");
    }
  }
}
?>