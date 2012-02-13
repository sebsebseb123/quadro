
			<!-- content -->
			
        <?php if ($title){?><h2 class="title"><?php print $title ?></h2><?php } ?>				
        <?php print render($content) ?>

        <?php if ($content['links']): ?>
          <div class="links"><?php print render($content['links']) ?></div>
        <?php endif; ?>
			<!-- // content -->

