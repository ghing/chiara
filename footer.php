      
      </div> 
      <!-- /#content -->
      <div id="footer" class="grid_12">
      </div>
      <!-- /#footer -->
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function($) {      
      $('.entry-main-image a').colorbox({height: '100%', opacity: 1, title: function() {
        return $(this).nextAll('.wp-caption-text').text(); 
      }});
      $('a.attachment-src-url').colorbox({height: '100%', opacity: 1, title: function() {
        return $(this).nextAll('.wp-caption-text').text(); 
      }});
    });
    </script>
    <?php
            /* Always have wp_footer() just before the closing </body>
             * tag of your theme, or you will break many plugins, which
             * generally use this hook to reference JavaScript files.
             */

            wp_footer();
    ?>
  </body>
</html>
