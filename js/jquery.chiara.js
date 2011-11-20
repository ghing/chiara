/**
 * A jQuery plugin to resize the front page image to match the window.
 */
(function( $ ){
    
    var methods = {
        init: function () {
	},

        setFrontPageImageDimensions: function () {
	    
	    return this.each(function() {
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
