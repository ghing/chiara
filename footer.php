      
      </div> 
      <!-- /#content -->
      <div id="footer">
      </div>
      <!-- /#footer -->
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
      console.log('got here');
      $('.entry-main-image a').colorbox({height: '100%', opacity: 1});
      $('a.attachment-src-url').colorbox({height: '100%', opacity: 1});
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
