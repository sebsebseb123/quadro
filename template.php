<?php

//function quadro_primary_links($links, $attributes = array('class' => 'nav')) {
//  global $language;
//  $output = '';
//
//  if (count($links) > 0) {
//    $output = '<ul' . drupal_attributes($attributes) . '>';
//
//    $num_links = count($links);
//    $i = 1;
//
//    foreach ($links as $key => $link) {
//      $class = "page_item page-item".str_replace("menu", "", $key);
//      
//      // Add first, last and active classes to the list of links to help out themers.
//      if ($i == 1) {
//        $class .= ' first';
//      }
//      if ($i == $num_links) {
//        $class .= ' last';
//      }
//      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
//           && (empty($link['language']) || $link['language']->language == $language->language)) {
//        $class .= ' current_page_item';
//      }
//      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';
//
//      if (isset($link['href'])) {
//        // Pass in $link as $options, they share the same keys.
//        $output .= l($link['title'], $link['href'], $link);
//      }
//      else if (!empty($link['title'])) {
//        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
//        if (empty($link['html'])) {
//          $link['title'] = check_plain($link['title']);
//        }
//        $span_attributes = '';
//        if (isset($link['attributes'])) {
//          $span_attributes = drupal_attributes($link['attributes']);
//        }
//        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
//      }
//
//      $i++;
//      $output .= "</li>\n";
//    }
//
//    $output .= '</ul>';
//  }
//
//  return $output;
//}

/**
 * We're here in theme_form_element to change the order of some labels.
 */
function quadro_form_element($variables) {
  $element = &$variables['element'];
  // This is also used in the installer, pre-database setup.
  $t = get_t();

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  // Add element #id for #type 'item'.
  if (isset($element['#markup']) && !empty($element['#id'])) {
    $attributes['id'] = $element['#id'];
  }
  // Add element's #type and #name as class to aid with JS/CSS selectors.
  $attributes['class'] = array('form-item');
  if (!empty($element['#type'])) {
    $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
  }
  if (!empty($element['#name'])) {
    $attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
  }
  // Add a class for disabled elements to facilitate cross-browser styling.
  if (!empty($element['#attributes']['disabled'])) {
    $attributes['class'][] = 'form-disabled';
  }
  $output = '<div' . drupal_attributes($attributes) . '>' . "\n";

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

  switch ($element['#title_display']) {
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

  if (!empty($element['#description'])) {
    $output .= '<div class="description">' . $element['#description'] . "</div>\n";
  }

  $output .= "</div>\n";

  return $output;
}
