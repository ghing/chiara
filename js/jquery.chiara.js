/**
 * A jQuery plugin to resize the front page image to match the window.
 */
(function( $ ){
    
    var methods = {
        init: function () {
	},

        setFrontPageImageDimensions: function () {
	    
	    return this.each(function() {
	        var $this = $(this);
		var windowWidth = $(window).width();
		var windowHeight = $(window).height();

                // TODO: Right now this just assumes images
		// that are wider than they are tall.  This 
		// function should eventually handle images
		// with the other dimensions as well.
		// -geoff@terrorware.com 2011-11-20

	        // Calculate the image aspect ratio
		var aspectRatio = $this.width() / $this.height();
		console.debug(aspectRatio);

		// Calculate the new image dimensions
		var newWidth = windowWidth;
		var newHeight = Math.ceil(newWidth / aspectRatio); 

		// Update the image dimensions
		$this.width(windowWidth).height(newHeight);
	    });

	}
    };


    $.fn.chiara = function( method ) {
        // Method calling logic
        if ( methods[method] ) {
	    return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
	} else if ( typeof method === 'object' || ! method ) {
	    return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  method + ' does not exist on jQuery.chiara' );
        }    

    };

})( jQuery );
