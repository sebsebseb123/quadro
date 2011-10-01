<?php

$nid = $fields['nid']->content;
$node = node_load(array('nid' =>  $nid));

$title = $node->title;
$body = $node->field_body[0]['value'];
if (isset($node->field_image[0]['filepath'])) {
  $image = theme('imagecache', 'frontpage_slideshow', $node->field_image[0]['filepath']);
}
//dsm($node);

?>

<div class="slide-content">
  <div class="slide-title">
    <h2><?php print $title ?></h2>
  </div>
  <div class="image slide-image">
    <?php print $image ?>
  </div>
  <div class="slide-body">
    <?php print $body ?>
  </div>
</div>