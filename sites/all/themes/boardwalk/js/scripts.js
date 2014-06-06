(function ($) {
	
    $(document).ready(function(){		
	
	  jQuery('.region-main-menu .content').meanmenu({
	   meanScreenWidth: "767",
	   meanRevealPosition: "center"
	  });
		
		$('.node-content-wrapper').equalHeightColumns({	});
		$('.postscript-wrapper .block-inner').equalHeightColumns({	});
		
		// Front Page Articles 
	  
	  var $boardwalk_front_articles = $('.view-taxonomy-term .view-content');
	  
	  $boardwalk_front_articles.imagesLoaded( function(){
		$boardwalk_front_articles.isotope({
		  // options
		  itemSelector : '.views-row',
		  layoutMode : 'fitRows'
		});		
	  });
      		
      //click mouseover
      check=true;
      var mobileMenu = $(".user-block"); 
     $(".user-title").click(function() {
         mobileMenu.fadeToggle(300);
         if(check){
            check=false;
            $(this).next().removeClass('notshowed');
            $(this).next().addClass('showed');
        }
        else{
            check=true;
            $(this).next().removeClass('showed');
            $(this).next().addClass('notshowed');
        }
      });
      
      $( ".user-block" ).mouseover(function() {
        $(this).removeClass('notshowed');
        $(this).addClass('showed');
        //$( this ).addClass('showed')
        }).mouseout(function() {
            if(check){
            }
            else{
                check=true;
            }
        $( this ).removeClass('showed');
        $(this).addClass('notshowed');
        }); 
    
    
    
     /*$("body.click").mouseover(function() {
        if(mobileMenu.is(':visible') && !mobileMenu.is(':hover')){
          mobileMenu.fadeOut();
        }         
      }); */
      
      /*$(function(){
        $('.lightboxGallery').each(function(){
            $('.lightbox', this).lightBox();
        });
    });*/
    
           
      $(".fancybox").fancybox({
            beforeShow: function () {
 
                var content_pur = $(this.element).next(".purchase-con").html();
                if (content_pur == null){
                    content_pur = "";
                }
                if (this.title) {
                    this.title += '<br />';
                    this.title += content_pur;
                }
            },
            afterShow: function() {
                // Render tweet button
                twttr.widgets.load();
            },
            helpers : {
                title : {
                    type: 'inside'
                }
            }, 
            openEffect : 'elastic',
			openSpeed  : 150,

            closeEffect : 'elastic',
            closeSpeed  : 150, 
        });
        
      
        $(".fancybox1").fancybox({
            beforeShow: function () {
                var content_pur = $(this.element).parent( ".field-content" ).parent( ".views-field-field-image" ).next().html();
                if (this.title) {
                    this.title = content_pur;
                }
            },
            afterShow: function() {
               
            },
            helpers : {
                title : {
                    type: 'inside'
                }
            }, 
            openEffect : 'elastic',
			openSpeed  : 150,

            closeEffect : 'elastic',
            closeSpeed  : 150, 
        });
  
  
    
    
    
    
          		
		 
            
	}); 
		
})(jQuery);  