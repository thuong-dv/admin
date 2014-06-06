(function ($) {

    $(document).ready(function(){															 
			
    }); 

 	Drupal.behaviors.bonesSuperfish = {
	
	  attach: function(context, settings) {
			  
	  $('#main-menu ul.menu', context).superfish({
		  delay: 400,											    
		  animation: {height:'show' },
		  speed: 500,
		  easing: 'easeOutBounce', 
		  autoArrows: false,
		  dropShadows: false /* Needed for IE */
	  });
		  
	  }
	}		
				
})(jQuery);  