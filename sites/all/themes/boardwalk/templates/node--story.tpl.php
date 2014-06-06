<?php $alter = array('max_length' => 64, 'ellipsis' => ' ..'); ?>
<?php if($view_mode == 'teaser'){ ?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> <?php print $zebra; ?> "<?php print $attributes; ?>> 
  
  <?php if (isset($content['field_image'])): ?>
    <div class="field-image">
      <?php print render($content['field_image']); ?>
    </div>
  <?php endif; ?>
  
  <?php if (isset($content['field_video'])): ?>
    <div class="field-video">
      <?php print render($content['field_video']); ?>
    </div>
  <?php endif; ?>      
  
  <div class="node-content-wrapper">    
  
    <?php print render($title_prefix); ?>
          
      <?php if (!$page): ?>
        <h2 class="title"<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print views_trim_text($alter, $title); ?></a> <span class="links"><a class="read-more" href="<?php print $node_url; ?>">Read more</a></span></h2>
      <?php endif; ?>
  
  
      <?php if ($page): ?>
        <h1 class="title"<?php print $title_attributes; ?>><?php print $title; ?></h1>
      <?php endif; ?>
         
    <?php print render($title_suffix); ?>    
    
    <?php if ($display_submitted): ?>
      <div class="submitted">
          <span class="date"><?php print $date; ?></span>
          <?php print $name; ?>
      </div>
    <?php endif; ?>                        
  
    <div class="content"<?php print $content_attributes; ?>>
	  <?php
      // We hide the comments and links now so that we can render them later.
	    hide($content['field_image']);
	    hide($content['field_video']);
      hide($content['comments']);
      hide($content['links']);
	    hide($content['field_tags']);
	    hide($content['field_section']);
      print render($content);
      ?>
    </div>
 
     
    <?php hide($content['links']) ?>
    
	 <?php if (!empty($content['field_section'])): ?>  
    <nav class="taxonomy"><div class="taxonomy-inner clearfix">
      <?php print render($content['field_section']); ?>
    </div></nav>  
   <?php endif; ?>    
  
   <?php if (!empty($content['field_tags'])): ?>  
    <nav class="taxonomy"><div class="taxonomy-inner clearfix">
      <?php print render($content['field_tags']); ?>
    </div></nav>  
  <?php endif; ?>  
    
  </div>

</article>

<?php print render($content['comments']); ?> 





<?php }else{ ?>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> <?php print $zebra; ?> "<?php print $attributes; ?>> 
  <?php global $user;
    $roles3 = isset($user->roles[3]) ? $user->roles[3] : 0;
    $roles5 = isset($user->roles[5]) ? $user->roles[5] : 0;
    $roles6 = isset($user->roles[6]) ? $user->roles[6] : 0;
  ?>
  
     
  
  <div class="node-content-wrapper">    
  
      
      <?php if (!$page): ?>
        <h2 class="title"<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
  
      <?php if ($page): ?>
        <h1 class="title"<?php print $title_attributes; ?>><?php print $title; ?></h1>
      <?php endif; ?>
         
    <?php print render($title_suffix); ?>   
     
    <?php 
        $block = module_invoke('easy_social', 'block_view', 'easy_social_block_1'); 
        print render($block);
        //print render($content);
    ?>  
 
    <?php if (isset($content['links'])): ?>  
      <div class="social-addtoany social-addtoany-top"><?php print render($content['links']); ?></div>
    <?php endif; ?>
    
    
    <?php if (isset($content['field_image'])): ?>
    <div class="field-image">
      <?php //print render($content['field_image']); ?>
      <?php  
      /*
      if (!$user->uid){
        print theme_image_style( array(
        'style_name'  => 'img780',
        'path'        => $field_image[0]['uri'],
        'height'      => null,
        'width'       => null,
        ));
$output = '<div class="link-purchase"><a target="_blank" href="/user/register">Subscribe for download original picture</a></div> ';
print $output;
      }else{
        
        if($user->roles[3] or $user->roles[5] or $user->roles[6]){
            print theme_image_style( array(
            'style_name'  => 'img_purchase',
            'path'        => $field_image[0]['uri'],
            'height'      => null,
            'width'       => null,
            ));
            $file_uri = file_create_url($field_image[0]['uri']);
$output = '<div class="link-purchase"><a target="_blank" href="'.$file_uri.'">Download original picture</a></div> ';
print $output;
            
        }else{
            print theme_image_style( array(
            'style_name'  => 'img780',
            'path'        => $field_image[0]['uri'],
            'height'      => null,
            'width'       => null,
            ));
$output = '<div class="link-purchase"><a target="_blank" href="/subscribe">Subscribe for download original picture</a></div> ';
print $output;
        }
      }*/
      
      if (!$user->uid){
        print theme_image_style( array(
        'style_name'  => 'img780',
        'path'        => $field_image[0]['uri'],
        'height'      => null,
        'width'       => null,
        ));
      }else{
        
        if($roles3 or $roles5 or $roles6){
            print theme_image_style( array(
            'style_name'  => 'img_purchase',
            'path'        => $field_image[0]['uri'],
            'height'      => null,
            'width'       => null,
            ));
            
        }else{
            print theme_image_style( array(
            'style_name'  => 'img780',
            'path'        => $field_image[0]['uri'],
            'height'      => null,
            'width'       => null,
            ));
        }
      }
      
      
      
      ?>
     
    </div>
  <?php endif; ?>
  
  
  
    
    
    <?php if ($display_submitted): 
    $account1 = isset($uid) ? user_load($uid) : '';
    
    if(isset($account1->field_first_name['und'][0]['value']) || $account1->field_last_name['und'][0]['value']){
        $name_first = trim(strip_tags($account1->field_first_name['und'][0]['value']));
        $name_first = str_replace(" ","",$name_first);
        $name_last =trim(strip_tags($account1->field_last_name['und'][0]['value']));
        $name_last = str_replace(" ","",$name_last);
        $full_name = $name_first.' '.$name_last;
    }else{
          $full_name = $name;
    }
    $full_name = trim(strip_tags($full_name));
    $full_name_photo = isset($content['field_photos_by']) ? render($content['field_photos_by']) : '';
    
    
    
        
    ?>
        
      <div class="submitted-author">
           <span class="field_post_by">
            <?php if (isset($content['field_post_by'])): ?>Post by
            <?php print render($content['field_post_by']); ?>
            <?php endif; ?> 
          </span>
          <span class="full-name_photo"><?php if($full_name_photo): ?>
            Photos by<?php print $full_name_photo; ?>
          <?php endif; ?></span>
          
          
      </div>
    <?php endif; ?> 
    
    <?php if (isset($content['body'])): ?>
    <div class="field-body">
      <?php print render($content['body']); ?>
    </div>
  <?php endif; ?>   
  
  
    
  <?php if (isset($content['field_video'])): ?>
    <div class="field-video">
      <?php print render($content['field_video']); ?>
    </div>
  <?php endif; ?> 
  
  
  
  
                      
  
    <div class="content"<?php print $content_attributes; ?>>
	  <?php
      // We hide the comments and links now so that we can render them later.
      //hide (not display content in render content)
	    hide($content['field_image']);
	    hide($content['field_video']);
        hide($content['comments']);
        hide($content['links']);
	    hide($content['field_tags']);
	    hide($content['field_section']);
        hide($content['body']);
        hide($content['field_images']);
        hide($content['field_image_gallery']);
        hide($content['field_post_by']);
      print render($content);
      ?>
    </div>
    
    <?php if (isset($content['links'])): ?>  
      <div class="social-addtoany social-addtoany-bot"><?php print render($content['links']); ?></div>
    <?php endif; ?>
    
    
	 <?php if (!empty($content['field_section'])): ?>  
    <nav class="taxonomy"><div class="taxonomy-inner clearfix">
      <?php print render($content['field_section']); ?>
    </div></nav>  
   <?php endif; ?>    
  
   <?php if (!empty($content['field_tags'])): ?>  
    <nav class="taxonomy"><div class="taxonomy-inner clearfix">
      <?php print render($content['field_tags']); ?>
    </div></nav>  
  <?php endif; ?>  
  <?php print render($title_prefix); ?>
  
      <?php $block = module_invoke('subscriptions_ui', 'block_view', '0'); 
      print render($block);
      ?>  
    
  </div>

</article>

<?php print render($content['comments']); ?> 

<?php } ?>