<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <title><?php print $head_title ?></title>
  <?php print $head ?>
  <?php print $styles ?>
  <?php print $scripts ?>
  <?php if ($ie6) { ?>
  <!--[if IE 6]>
  <style type="text/css">
  
  </style>
  <![endif]-->
  <?php } ?>
</head>

<body class="<?php print $body_classes ?>">
<!-- container -->
<div class="container">

	<!-- wrapper -->
	<div class="wrapper">

		
		<!-- header -->
		<div class="header">
			
			<div class="top-nav">
        <a class="logo" href="<?php print base_path() ?>" title="<?php print $site_name ?>"><!--img src="<?php print base_path() . path_to_theme(); ?>/logo.png" alt="<?php print $site_name ?>" title="<?php print $site_name ?>" /--><?php print $site_name ?></a>
        <?php print quadro_primary_links($primary_links) ?>
			</div>

			<div class="page-title">
        <?php if ($secondary_title){?><h1><?php print $secondary_title ?></h1><?php } ?>
        <?php if ($secondary_links){?><?php print quadro_primary_links($secondary_links) ?><?php } ?>
			</div>
		
		</div>
		<!-- // header -->
		
		<!-- sub-header -->
		<div class="sub-header">

			<!-- content -->
			<div class="content-top"></div>
			<div class="content clearfix">
				
        <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <?php if ($tabs): print ''. $tabs .'</div>'; endif; ?>
        <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
        <?php if ($show_messages && $messages): print $messages; endif; ?>
        <?php print $help; ?>

				<!-- left content -->
				<div class="left-content<?php if ($right) { print ' has-sidebar'; } ?>">
          <?php print $content ?>
				</div>
				<!-- // left content -->
			
			
				<!-- Sidebar -->
        <?php if ($right): ?>
          <div class="sidebar">
            <?php print $right ?>
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

      <?php print $footer_message . $footer ?>

		</div>
		<!-- // footer -->
	
	</div>
	<!-- // wrapper -->
	
</div>
<!-- // container -->
<?php print $closure ?>
</body>
</html>

