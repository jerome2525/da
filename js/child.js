(function($) {
	jQuery(document).ready(function(){
      
	   	$('.fl-callout').each(function() {
		    var callout_link = $(this).find('.fl-heading a').first().attr('href');
			$(this).prepend('<a class="link"></a>');
		    $(this).find('.link').attr('href',callout_link);
		}); 

		$('.post-module-slider .fl-post-feed').slick({
		  dots: true,
		  infinite: false,
		  speed: 300,
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});
  
  	});
})(jQuery);