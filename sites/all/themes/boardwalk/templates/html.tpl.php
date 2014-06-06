<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" <?php print $rdf_namespaces; ?>>

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>  
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
   <!--[if lt IE 8]>
       <script src="http://dev-miltonvillager.gotpantheon.com/code/sites/all/themes/boardwalk/js/scripts.js"></script>
       <link rel="stylesheet" type="text/css" href="http://dev-miltonvillager.gotpantheon.com/code/sites/all/themes/boardwalk/css/ie8.css">
       <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
       <script defer type="text/javascript" src="http://dev-miltonvillager.gotpantheon.com/code/sites/all/themes/boardwalk/js/pngfix.js"></script>
  <![endif]-->
  <!--[if lt IE 9]>
      <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta2)/IE9.js"></script>
      <script src="/sites/all/themes/boardwalk/js/scripts.js"></script>
      <link rel="stylesheet" type="text/css" href="/sites/all/themes/boardwalk/css/ie9.css">
      
  <![endif]-->
  
  <!--[if IE 10]>
      <script src="/sites/all/themes/boardwalk/js/scripts.js"></script>
      <link rel="stylesheet" type="text/css" href="/sites/all/themes/boardwalk/css/ie10.css">
  <![endif]-->
</head>

<body class="<?php print $classes; ?>"<?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>

</html>