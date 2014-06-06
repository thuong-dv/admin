<?php

$style = theme_get_setting('style');

switch ($style) {
	case 1:
		drupal_add_css(drupal_get_path('theme', 'boardwalk') . '/css/style1.css', array('group' => CSS_THEME, 'weight' => 100, 'type' => 'file'));
		break;
	case 2:
		drupal_add_css(drupal_get_path('theme', 'boardwalk') . '/css/style2.css', array('group' => CSS_THEME, 'weight' => 100, 'type' => 'file'));
		break;
	case 3:
		drupal_add_css(drupal_get_path('theme', 'boardwalk') . '/css/style3.css', array('group' => CSS_THEME, 'weight' => 100, 'type' => 'file'));
		break;
	case 4:
		drupal_add_css(drupal_get_path('theme', 'boardwalk') . '/css/style4.css', array('group' => CSS_THEME, 'weight' => 100, 'type' => 'file'));
		break;
	case 5:
		drupal_add_css(drupal_get_path('theme', 'boardwalk') . '/css/style5.css', array('group' => CSS_THEME, 'weight' => 100, 'type' => 'file'));
		break;
	default:
		drupal_add_css(drupal_get_path('theme', 'boardwalk') . '/css/style1.css', array('group' => CSS_THEME, 'weight' => 100, 'type' => 'file'));

}

drupal_add_css(drupal_get_path('theme', 'boardwalk') . '/css/responsive.css', array('group' => CSS_THEME, 'weight' => 101, 'type' => 'file'));


/* Span Tag on Links */

function boardwalk_link($variables) {
  return '<a href="' . check_plain(url($variables['path'], $variables['options'])) . '"' . drupal_attributes($variables['options']['attributes']) . '><span>' . ($variables['options']['html'] ? $variables['text'] : check_plain($variables['text'])) . '</span></a>';
}

/* Some text in ye old Search Form */

function boardwalk_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {

// Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";
  }
} 

/* Add Page Body Class */

function boardwalk_preprocess_html(&$vars) {
  $path = drupal_get_path_alias($_GET['q']);
  $aliases = explode('/', $path);

  foreach($aliases as $alias) {
    $vars['classes_array'][] = drupal_clean_css_identifier($alias);
  } 
  
}
function boardwalk_overlay_paths_alter(&$paths) {
  // All user pages should appear in the overlay.
  $paths['user'] = TRUE;
  $paths['user/*/edit'] = TRUE;
  $paths['user/*'] = TRUE;
 
}

function boardwalk_preprocess_page(&$vars) {
  
  if(arg(0) == 'photo' && is_numeric(arg(1))){
    $node = node_load(arg(1));
    $vars['title'] = 'Album: '.$node->title;
  }
  boardwalk_removetab('Weather', $vars);
  boardwalk_removetab('Track page visits', $vars);
  boardwalk_removetab('File browser', $vars);
}

/* *********** REMOVE TABS ************ */
function boardwalk_removetab($label, $vars) {
  $labels = array('Weather','Track page visits' , 'File browser');
 
  //foreach($labels as $label) {
  if (isset($vars['tabs']['#primary']) && is_array($vars['tabs']['#primary'])) {
    foreach ($vars['tabs']['#primary'] as $k => $primary_tab) {
      if ($primary_tab['#link']['title'] == $label) {
        unset($vars['tabs']['#primary'][$k]);
      }
    
    }
  }
 //}
  
}

function boardwalk_trim_text($alter, $value) {
  if (drupal_strlen($value) > $alter['max_length']) {
    $value = drupal_substr($value, 0, $alter['max_length']);
    // TODO: replace this with cleanstring of ctools
    if (!empty($alter['word_boundary'])) {
      $regex = "(.*)\b.+";
      if (function_exists('mb_ereg')) {
        mb_regex_encoding('UTF-8');
        $found = mb_ereg($regex, $value, $matches);
      }
      else {
        $found = preg_match("/$regex/us", $value, $matches);
      }
      if ($found) {
        $value = $matches[1];
      }
    }
    // Remove scraps of HTML entities from the end of a strings
    $value = rtrim(preg_replace('/(?:<(?!.+>)|&(?!.+;)).*$/us', '', $value));

    if (!empty($alter['ellipsis'])) {
      $value .= t('...');
    }
  }
  if (!empty($alter['html'])) {
    $value = _filter_htmlcorrector($value);
  }

  return $value;
}