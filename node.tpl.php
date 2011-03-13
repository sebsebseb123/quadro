			<!-- content -->
			
        <?php if ($title){?><h2 class="title"><?php print $title ?></h2><?php } ?>				
        <?php print $content ?>

        <?php if ($taxonomy): ?>
          <div class="meta">
            <div class="terms"><?php print $terms ?></div>
          </div>
        <?php endif;?>
    
        <?php if ($links): ?>
          <div class="links"><?php print $links; ?></div>
        <?php endif; ?>
			<!-- // content -->

