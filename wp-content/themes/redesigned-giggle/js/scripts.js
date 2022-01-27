(function($) {
	
	// $ Works! You can test it with next line if you like
    $(document).ready(function($) {
	    $('.close-notice-bar').bind('click', function () {
            $('.notice-bar').addClass('closed').slideUp(200);
        });
    });

})( jQuery );