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
        <h2 class="title"<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
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
    
    <?php if (isset($content['links'])): ?>  
      <div class="clearfix"><?php print render($content['links']); ?></div>
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
    
  </div>

</article>

<?php print render($content['comments']); ?> 





<?php }else{ ?>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> <?php print $zebra; ?> "<?php print $attributes; ?>> 
  <?php global $user;?>
  <?php if (isset($content['field_image'])): ?>
    <div class="field-image">
      <?php //print render($content['field_image']); ?>
      <?php  
      
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
      }
      ?>
     
    </div>
  <?php endif; ?>
  
     
  
  <div class="node-content-wrapper">    
  
    <?php print render($title_prefix); ?>
          
      <?php if (!$page): ?>
        <h2 class="title"<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
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
    
    <?php if (isset($content['body'])): ?>
    <div class="field-video">
      <?php print render($content['body']); ?>
    </div>
  <?php endif; ?>      
    
    <?php if (isset($content['field_video'])): ?>
    <div class="field-video">
      <?php print render($content['field_video']); ?>
    </div>
  <?php endif; ?> 
  
  <?php if (isset($content['field_images'])): ?>
    <div class="images-gallery">
    
        
      <?php foreach ($field_images as $image): ?>
      <div class="image">
      <?php  
      if (!$user->uid){
                print theme_image_style( array(
                'style_name'  => 'img780',
                'path'        => $image['uri'],
                'height'      => null,
                'width'       => null,
                ));
$output = '<div class="link-purchase"><a target="_blank" href="/user/register">Subscribe for download original picture</a></div> ';
print $output;
              }else{
                if($user->roles[3] or $user->roles[5] or $user->roles[6]){
                    print theme_image_style( array(
                    'style_name'  => 'img_purchase',
                    'path'        => $image['uri'],
                    'height'      => null,
                    'width'       => null,
                    ));
$file_uri = file_create_url($image['uri']);
$output = '<div class="link-purchase"><a target="_blank" href="'.$file_uri.'">Download original picture</a></div> ';
print $output;
                }else{
                    print theme_image_style( array(
                    'style_name'  => 'img780',
                    'path'        => $image['uri'],
                    'height'      => null,
                    'width'       => null,
                    ));
$output = '<div class="link-purchase"><a target="_blank" href="/subscribe">Subscribe for download original picture</a></div> ';
print $output;
        }
      }
      ?>
      </div>
      <?php endforeach; ?>
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
      print render($content);
      ?>
    </div>
    
    <?php if (isset($content['links'])): ?>  
      <div class="clearfix"><?php print render($content['links']); ?></div>
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
    
  </div>

</article>

<?php print render($content['comments']); ?> 

<?php } ?>