<div class="container">

	<!-- wrapper -->
	<div class="wrapper">

		<!-- header -->
		<div class="header">

			<!-- top-nav -->
			<div class="top-nav">
				<a class="logo" href="<?php print base_path() ?>" title="<?php print $site_name ?>">
					<?php print $site_name ?>
				</a> <!-- /.logo -->
				<?php //print quadro_primary_links($main_menu) ?>

				<!-- main-meun -->
				<?php if ($main_menu): ?>
				<div id="main-menu" class="navigation">
				  <?php print theme('links__system_main_menu', array(
					'links' => $main_menu,
					'attributes' => array(
					  'id' => 'main-menu-links',
					  'class' => array('nav', 'clearfix'),
					),
					'heading' => array(
					  'text' => t('Main menu'),
					  'level' => 'h2',
					  'class' => array('element-invisible'),
					),
				  )); ?>
				</div>
				<?php endif; ?> <!-- /#main-menu -->

				<!-- secondary-menu -->
				<?php if ($secondary_menu): ?>
				<div id="secondary-menu" class="navigation">
				  <?php print theme('links__system_secondary_menu', array(
					'links' => $secondary_menu,
					'attributes' => array(
					  'id' => 'secondary-menu-links',
					  'class' => array('nav', 'clearfix'),
					),
					'heading' => array(
					  'text' => t('Secondary menu'),
					  'level' => 'h2',
					  'class' => array('element-invisible'),
					),
				  )); ?>
				</div>
				<?php endif; ?> <!-- /#secondary-menu -->

			</div> <!-- /.top-nav -->

			<!-- page-title -->
			<div id="page-title-wrapper">
				<?php print render($title_prefix); ?>
				<?php if ($title): ?>
				<h1 class="title" id="page-title">
					<?php print $title; ?>
				</h1>
				<?php endif; ?>
				<?php print render($title_suffix); ?>

			</div> <!-- /.page-title -->

			<!-- header-region -->
			<?php if ($page['header']): ?>
			<div class="header-region">
				<?php print render($page['header']) ?>
			</div>
			<?php endif; ?> <!-- /.header-region -->

		</div> <!-- /.header -->

		<!-- sub-header -->
		<div class="sub-header">

			<!-- content-top -->
			<div class="content-top"></div> <!-- /.content-top -->

			<!-- content -->
			<div class="content clearfix">

				<!-- tabs -->
				<?php if ($tabs): ?>
				<div class="tabs">
					<?php print render($tabs); ?>
				</div>
				<?php endif; ?> <!-- /.tabs -->

				<!-- action-links -->
				<?php if ($action_links): ?>
				<ul class="action-links">
					<?php print render($action_links); ?>
				</ul>
				<?php endif; ?> <!-- /.action-links -->

				<!-- messages -->
				<?php if ($messages): ?>
				<div id="messages"><div class="section clearfix">
				  <?php print $messages; ?>
				</div></div> <!-- /.section, /#messages -->
				<?php endif; ?> <!-- /#messages -->

				<?php print render($page['help']); ?>

				<!-- left-content -->
				<div class="left-content<?php if ($page['right']) { print ' has-sidebar'; } ?>">
					<?php print render($page['content']) ?>
				</div> <!-- /.left-content -->


				<!-- sidebar -->
				<?php if ($page['right']): ?>
				<div class="sidebar">
					<?php print $page['right'] ?>
				</div>
				<?php endif; ?> <!-- /.sidebar -->

			</div> <!-- /.content -->

			<!-- clear -->
			<div class="clear"></div> <!-- /.clear -->

			<!-- content-btm -->
			<div class="content-btm"></div> <!-- /.content-btm -->

		</div> <!-- // sub-header -->

		<!-- footer -->
		<div class="footer">
		<?php print render($page['footer']) ?>
		</div> <!-- /.footer -->

	</div> <!-- /.wrapper -->

</div> <!-- /.container -->
