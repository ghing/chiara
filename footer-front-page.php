      
	</div> 
	<!-- /#content -->
	<script type="text/javascript">
	jQuery(document).ready(function($) {      
	    jQuery('#content img').chiara('setFrontPageImageDimensions');
	    jQuery(window).resize(function() {
	        jQuery('#content img').chiara('setFrontPageImageDimensions');
	    });
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
