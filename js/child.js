(function($) {
	jQuery(document).ready(function(){
      
   $('.fl-callout').each(function() {
	    var callout_link = $(this).find('.fl-heading a').first().attr('href');
		$(this).prepend('<a class="link"></a>');
	    $(this).find('.link').attr('href',callout_link);
	}); 
  
  });
})(jQuery);