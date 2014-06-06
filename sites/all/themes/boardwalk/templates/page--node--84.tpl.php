<div id="page"><div class="page-inner <?php echo $grid_size ?>"><div class="page-inner-inner clearfix">  

  
  
  
  
  
  
 
   

     
<!-- Main Content -->  
  <div class="main-content-wrapper clearfix"><div class="main-content-wrapper-inner">
    <section id="main-content">       	   

       
    
      <div class="main">
        <div class="main-inner  <?php print $main_content_grid_width ?>">        

     

          <?php if (!isset($node)): ?>
            <?php print render($title_prefix); ?>
              <?php if ($title): ?><h1 class="title" id="page-title"><span><?php print $title; ?></span></h1><?php endif; ?>
            <?php print render($title_suffix); ?>
          <?php endif; ?>
   
          
          
          
          
             
          <?php print render($page['content']); ?> 
          
          
          
          
          
                   


        </div> 
  
      </div>            
  
    </section>
  </div></div>
  
     
  


 
</div></div></div><!-- page -->