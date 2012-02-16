<?php
//dsm($variables);
?>

<div class="container">

	<!-- wrapper -->
	<div class="wrapper">

		
		<!-- header -->
		<div class="header">
			
			<div class="top-nav">
        <a class="logo" href="<?php print base_path() ?>" title="<?php print $site_name ?>"><!--img src="<?php print base_path() . path_to_theme(); ?>/logo.png" alt="<?php print $site_name ?>" title="<?php print $site_name ?>" /--><?php print $site_name ?></a>
        <?php print quadro_primary_links($main_menu) ?>
			</div>

			<div class="page-title">
        <?php if ($secondary_title){?><h1><?php print $secondary_title ?></h1><?php } ?>
        <?php if ($secondary_menu){?><?php print quadro_primary_links($secondary_menu) ?><?php } ?>
			</div>

			<!-- Header -->
      <?php if ($page['header']): ?>
        <div class="header-region">
          <?php print render($page['header']) ?>
        </div>
      <?php endif; ?>
			<!-- // Header -->
		
		</div>
		<!-- // header -->
		
		<!-- sub-header -->
		<div class="sub-header">

			<!-- content -->
			<div class="content-top"></div>
			<div class="content clearfix">

      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
				
        <?php if ($show_messages && $messages): print $messages; endif; ?>
        <?php print render($page['help']); ?>

				<!-- left content -->
				<div class="left-content<?php if ($page['right']) { print ' has-sidebar'; } ?>">
          <?php print render($page['content']) ?>
				</div>
				<!-- // left content -->
			
			
				<!-- Sidebar -->
        <?php if ($page['right']): ?>
          <div class="sidebar">
            <?php print render($page['right']) ?>
          </div>
        <?php endif; ?>
				<!-- // Sidebar -->
		
			</div>
				
			<div class="clear"></div>					

      <div class="content-btm"></div>
			<!-- // content -->
		
		</div>
		<!-- // sub-header -->
						
		<!-- footer -->
		<div class="footer">						

      <?php print render($page['footer']) ?>

		</div>
		<!-- // footer -->
	
	</div>
	<!-- // wrapper -->
	
</div>
<!-- // container -->
