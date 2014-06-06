<div id="page"><div class="page-inner <?php echo $grid_size ?>"><div class="page-inner-inner clearfix">  

  <div class="header-wrapper clearfix"><div class="header-wrapper-inner <?php echo $grid_full_width ?>">
    
    <header>
      <div style="margin-left: -20px;margin-right: -20px;">
        <div class="grid_4">
				<?php if ($logo): ?>
          <div class="site-logo">
            <a href="<?php print check_url($front_page); ?>"><img src="<?php print $logo ?>" alt="<?php print $site_name; ?>" /></a>
          </div>
        <?php endif; ?>	      
        
				<?php if ($site_name): ?>
            <?php if ($is_front) { ?>
              <h1 class="site-name"><a href="<?php print check_url($front_page); ?>"><?php print $site_name; ?></a></h1>
            <?php } else { ?>
              <h2 class="site-name"><a href="<?php print check_url($front_page); ?>"><?php print $site_name; ?></a></h2>
            <?php } ?>
        <?php endif; ?>
        
        <?php if ($site_slogan): ?>
            <h3 class="site-slogan"><?php print $site_slogan; ?></h3>            
        <?php endif; ?>    
       </div>
       <div class="grid_8">
                     

    <section class="social" style="float: left;">
      <ul>
          <?php if ($facebook): ?><li><a class="facebook" href="<?php print $facebook ?>"></a></li><?php endif; ?>
          <?php if ($twitter): ?><li><a class="twitter" href="<?php print $twitter ?>"></a></li><?php endif; ?>
          <?php if ($google): ?><li><a class="google" href="<?php print $google ?>"></a></li><?php endif; ?>
          <?php if ($linkedin): ?><li><a class="linkedin" href="<?php print $linkedin ?>"></a></li><?php endif; ?>
          <!--</a><?php if ($youtube): ?><li><a class="youtube" href="<?php print $youtube ?>"></a></li><?php endif; ?>
          <?php if ($flickr): ?><li><a class="flickr" href="<?php print $flickr ?>"></a></li><?php endif; ?>
          <?php if ($instagram): ?><li><a class="instagram" href="<?php print $instagram ?>"></a></li><?php endif; ?>
          <li><a class="rss" href="<?php print $base_path ?>/rss.xml"></a></li>-->
        </ul>    
      </section>
     
    <nav id="user-menu" class="clearfix" style="float: left;">
		  <?php print render($page['user_menu']); ?>     
    </nav>
     <div id="local-weather"  style="float: left;">
      <?php print render($page['header']); ?>
     </div>
     <div class="search-box" style="float: left;">
            <?php print render($page['search_box']); ?>
     </div> 
       </div> 
      </div> 
      
    </header>    
      
  </div></div>
  
  <?php if ($page['main_menu']): ?>    
    <div class="main-menu-wrapper clearfix"><div class="main-menu-wrapper-inner <?php echo $grid_full_width ?> clearfix">  
      <nav id="main-menu"><div class="main-menu-inner clearfix">
        <?php print render($page['main_menu']); ?>      
      </div></nav>
    </div></div> 
  <?php endif; ?> 
  
  <?php if ($page['main_menu_second_level']): ?>    
    <div class="main-menu-second-level-wrapper"><div class="main-menu-second-level-wrapper-inner <?php echo $grid_full_width ?> clearfix">  
      <nav id="main-menu-second-level" class="clearfix">
        <?php print render($page['main_menu_second_level']); ?>      
      </nav>
    </div></div> 
  <?php endif; ?> 
 
  <!-- region Ads1 -->  
<?php if ($page['ads_top']): ?>    
    <div class="ads-top-wrapper"><div class="ads-top-wrapper-inner <?php echo $grid_full_width ?> clearfix">  
      <div id="ads-top" class="clearfix">
        <?php print render($page['ads_top']); ?>      
      </div>
    </div></div> 
  <?php endif; ?>   
  
  <?php if ($page['slideshow'] || $page['slideshow_sidebar']): ?>    
    <div class="slideshow-wrapper clearfix"><div class="slideshow-wrapper-inner <?php echo $grid_full_width ?> clearfix">  
      <div id="slideshow" class="grid_8 alpha">
        <?php print render($page['slideshow']); ?>      
      </div>
      <div id="slideshow-sidebar" class="grid_4 omega">
        <?php print render($page['slideshow_sidebar']); ?>      
      </div>
    </div></div> 
  <?php endif; ?>  
   
  <!-- region Ads2 -->  
<?php if ($page['ads_top2']): ?>    
    <div class="ads-top-wrapper"><div class="ads-top-wrapper-inner <?php echo $grid_full_width ?> clearfix">  
      <div id="ads-top" class="clearfix">
        <?php print render($page['ads_top2']); ?>      
      </div>
    </div></div> 
  <?php endif; ?> 
     
<!-- Main Content -->  
  <div class="main-content-wrapper clearfix"><div class="main-content-wrapper-inner">
    <section id="main-content">       	   

      <?php if ($page['sidebar_first']): ?>
      <aside class="sidebar first-sidebar <?php print $sidebar_first_grid_width ?>">
          <?php print render($page['sidebar_first']); ?>
      </aside>
      <?php endif; ?>    
    
      <div class="main">
        <div class="main-inner  <?php print $main_content_grid_width ?>">        
          <?php print render($page['content_top']); ?>
          <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
          <?php print render($tabs); ?>
          <?php if (!isset($node)): ?>
            <?php print render($title_prefix); ?>
              <?php if ($title): ?><h1 class="title" id="page-title"><span><?php print $title; ?></span></h1><?php endif; ?>
            <?php print render($title_suffix); ?>
          <?php endif; ?>
          <?php print render($page['help']); ?>          
          <?php print render($page['content']); ?>          
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php print render($page['content_bottom']); ?>
        </div> 
        <?php if ($page['sidebar_second']): ?>
        <aside class="sidebar second-sidebar <?php print $sidebar_second_grid_width ?> clearfix">
            <?php print render($page['sidebar_second']); ?>                
        </aside>
        <?php endif; ?>     
      </div>            
  
    </section>
  </div></div>
  
  <?php if ($page['preface_1'] || $page['preface_2'] || $page['preface_3'] || $page['preface_4']): ?>
    <div class="preface-wrapper clearfix"><div class="preface-wrapper-inner"><div class="preface-wrapper-inner-inner">  
      <section id="preface">
        <div class="<?php echo $preface_1_grid_width ?>"><?php print render($page['preface_1']); ?></div>
        <div class="<?php echo $preface_2_grid_width ?>"><?php print render($page['preface_2']); ?></div>
        <div class="<?php echo $preface_3_grid_width ?>"><?php print render($page['preface_3']); ?></div>
        <div class="<?php echo $preface_4_grid_width ?>"><?php print render($page['preface_4']); ?></div>
      </section>
    </div></div></div>   
  <?php endif; ?>          
  
  <?php if ($page['postscript_1'] || $page['postscript_2'] || $page['postscript_3'] || $page['postscript_4']): ?>
    <div class="postscript-wrapper clearfix"><div class="postscript-wrapper-inner"><div class="postscript-wrapper-inner-inner">  
      <section id="postscript">
        <div class="<?php echo $postscript_1_grid_width ?>"><?php print render($page['postscript_1']); ?></div>
        <div class="<?php echo $postscript_2_grid_width ?>"><?php print render($page['postscript_2']); ?></div>
        <div class="<?php echo $postscript_3_grid_width ?>"><?php print render($page['postscript_3']); ?></div>
        <div class="<?php echo $postscript_4_grid_width ?>"><?php print render($page['postscript_4']); ?></div>
      </section>
    </div></div></div> 
  <?php endif; ?>   
    
<!-- All Hail the Footer -->
  <div class="footer-wrapper clearfix"><div class="footer-wrapper-inner">
    <footer id="footer" class="<?php echo $grid_full_width ?>">
			<?php if ($site_name): ?>
        <h2 class="site-name"><a href="<?php print check_url($front_page); ?>"><?php print $site_name; ?></a></h2>
      <?php endif; ?>    
      <?php print render($page['footer']) ?>
     
    </footer><!-- /footer -->
  </div></div>
 
</div></div></div><!-- page -->