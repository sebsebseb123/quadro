<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="clear-block block block-<?php print $block->module ?>">

<?php if (!empty($block->subject)): ?>
  <h3><?php print $block->subject ?></h3>
<?php endif;?>

<?php print $block->content ?>

</div>
