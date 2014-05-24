		<div id="container" class="container">
			<div id="masthead" class="row">
				<header class="col-md-6">
					<?php if ($site_name): ?>
					<h1 id="title">
						<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
							<?php print $site_name; ?>
						</a>
					</h1>
					<?php endif; ?>
				</header>

				<nav id="nav-column-1" class="col-md-6">
					<?php if ($main_menu): ?>
					<?php print theme('links__system_main_menu', array('links' => $main_menu)); ?>
					<?php endif; ?>
				</nav>
			</div>

			<div id="content">
				<div id="column-1" class="col-md-8">
				<?php if ($messages): ?>
					<section id="success">
					<?php print $messages; ?>
					</section>
				<?php endif; ?>
				<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
				<a id="main-content"></a>
				<?php print render($title_prefix); ?>
				<?php if ($title): ?><h2 class="title" id="page-title"><?php print $title; ?></h2><?php endif; ?>
				<?php print render($title_suffix); ?>
				<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
				<?php print render($page['help']); ?>
				<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
				<?php print render($page['content']); ?>
				<?php //print $feed_icons; ?>
				</div>

				<div id="column-2" class="col-md-4">
				<?php if ($page['sidebar_first']): ?>
					<?php print render($page['sidebar_first']); ?>
				<?php endif; ?>

				<?php if ($page['sidebar_second']): ?>
					<?php print render($page['sidebar_second']); ?>
				<?php endif; ?>
				</div>

			</div>
		</div>
		<div id="footer">
			<div class="container">
				<footer class="row">
					<nav id="footer-column-1" class="col-md-6">
						<?php print theme('ext_link_top_nav'); ?>
						
						<p>
							&copy <?php echo date('Y'); ?> Eponymous 4
						</p>
					</nav>
					
					<section id="footer-column-3" class="col-md-6">
						<?php
						print theme('links', array(
							'links' => menu_navigation_links('menu-footer-menu---information'),
							'heading' => array(
								'text' => 'More Information',
								'level' => 'h3'
							),
							));
						?>
					</section>
				</footer>
			</div>
