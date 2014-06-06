<?php 
    global $user;
    $roles3 = isset($user->roles[3]) ? $user->roles[3] : 0;
    $roles5 = isset($user->roles[5]) ? $user->roles[5] : 0;
    $roles6 = isset($user->roles[6]) ? $user->roles[6] : 0;
     $file_o = file_create_url(trim(strip_tags($fields['uri']->content)));
     
     if (!$user->uid){
        $output = '<div class="link-purchase"><a target="_blank" href="/user/register">Subscribe for download original picture</a></div> ';
      }else{
        if($roles3 or $roles5 or $roles6){
            $output = '<div class="link-purchase"><a target="_blank" href="'.$file_o.'">Download original picture</a></div> ';            
        }else{
            $output = '<div class="link-purchase"><a target="_blank" href="/subscribe">Subscribe for download original picture</a></div> ';
        }
    }
    $file_uri = image_style_url('img780',trim(strip_tags($fields['uri']->content))); 
    $nodeid = strip_tags($fields['nid']->content);
?>





<div class="imagebox">
<a href="<?php print $file_uri;?>" class="fancybox fa-first" rel="gallery" title="<?php print strip_tags($fields['title']->content); ?>">
<?php 
    $uri = trim(strip_tags($fields['uri']->content));
    print theme_image_style(array('style_name'=>'thumbnail', 'path'=>$uri, 'height' => null,'width' => null,));
 ?>
</a>
<span class="tit"><?php print strip_tags($fields['title']->content, '<a>'); ?></span>
<span class="tit-lin"></span>

<?php print views_embed_view('photos_album', 'block_2', $nodeid);?>


</div>