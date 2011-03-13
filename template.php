<?php

function quadro_preprocess_page(&$vars) {
/*   Disable default CSS files  */
  $css = $vars['css'];
/*   unset($css['all']['module']['modules/system/system.css']); */
  unset($css['all']['module']['modules/node/node.css']);
/*   unset($css['all']['module']['modules/system/defaults.css']); */
  $vars['styles'] = drupal_get_css($css);

  $vars['ie6'] = FALSE;
  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') !== false)){
    $vars['ie6'] = TRUE;
  }

  $vars['secondary_title'] = FALSE;
  if (isset($vars['node']->field_secondary_title[0]['content'])){
    $vars['secondary_title'] = $vars['node']->field_secondary_title[0]['content'];
  }
  else if (!isset($vars['node']) && (isset($vars['title']) && $vars['title'])){
    $vars['secondary_title'] = $vars['title'];
    unset($vars['title']);
  }
/*
  else if (isset($vars['node']->title) && $vars['node']->title){
    $vars['secondary_title'] = $vars['node']->title;
    unset($vars['node']->title);
dsm(__line__);
dsm($vars);
  }
  else if (isset($vars['title']) && $vars['title']){
    $vars['secondary_title'] = $vars['title'];
    unset($vars['title']);
  }
*/
}


function quadro_preprocess_node(&$vars) {
  if (isset($vars['field_secondary_title'][0]['content']) && isset($vars['title'])){
    unset($vars['title']);
  }
}

function quadro_primary_links($links, $attributes = array('class' => 'nav')) {
  global $language;
  $output = '';

  if (count($links) > 0) {
    $output = '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = "page_item page-item".str_replace("menu", "", $key);
      
      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
           && (empty($link['language']) || $link['language']->language == $language->language)) {
        $class .= ' current_page_item';
      }
      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

function quadro_form_element($element, $value) {
  // This is also used in the installer, pre-database setup.
  $t = get_t();

  $output = '<div class="form-item"';
  if (!empty($element['#id'])) {
    $output .= ' id="'. $element['#id'] .'-wrapper"';
  }
  $output .= ">\n";
  $required = !empty($element['#required']) ? '<span class="form-required" title="'. $t('This field is required.') .'">*</span>' : '';

  if (!empty($element['#title'])) {
    $title = $element['#title'];
    if (!empty($element['#id'])) {
      $output .= ' <label for="'. $element['#id'] .'">'. $t('!title: !required', array('!title' => filter_xss_admin($title), '!required' => $required)) ."</label>\n";
    }
    else {
      $output .= ' <label>'. $t('!title: !required', array('!title' => filter_xss_admin($title), '!required' => $required)) ."</label>\n";
    }
  }

  if (!empty($element['#description'])) {
    $output .= ' <div class="description">'. $element['#description'] ."</div>\n";
  }

  $output .= " $value\n";

  $output .= "</div>\n";

  return $output;
}

function quadro_button($element) {
  // Make sure not to overwrite classes.
  if (isset($element['#attributes']['class'])) {
    $element['#attributes']['class'] = 'submit form-'. $element['#button_type'] .' '. $element['#attributes']['class'];
  }
  else {
    $element['#attributes']['class'] = 'submit form-'. $element['#button_type'];
  }

  return '<input type="'.$element['#button_type'].'" '. (empty($element['#name']) ? '' : 'name="'. $element['#name'] .'" ') .'id="'. $element['#id'] .'" value="'. check_plain($element['#value']) .'" '. drupal_attributes($element['#attributes']) ." />\n";
}

function quadro_captcha($element) {
  if (!empty($element['#description']) && isset($element['captcha_widgets'])) {
    $fieldset = array(
      '#type' => 'fieldset',
      '#title' => t('Stop Spam'),
      '#description' => 'Answering this question prevents automated spam by confirming you are a human visitor.',
      '#children' => $element['#children'],
      '#attributes' => array('class' => 'captcha'),
    );
    return theme('fieldset', $fieldset);
  }
  else {
    return '<div class="captcha">'. $element['#children'] .'</div>';
  }
}

