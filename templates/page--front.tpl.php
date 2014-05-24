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

			<div id="content" class="row">
				<?php if ($messages): ?>
					<section id="success">
					<?php print $messages; ?>
					</section>
				<?php endif; ?>
<?php
$albums = array();
if (class_exists('OR_Albums')) {
	$album_info = new OR_Albums();
	$albums = $album_info->get_albums('eponymous-4');

	$node_ids = db_query('select * from {node} where type = :type', array(':type' => 'album'))->fetchAllAssoc('nid', PDO::FETCH_ASSOC);
	$album_aliases = array();

	foreach ($node_ids as $node_id => $node_info) {
		$node = node_load($node_id);
		if (!empty($node->field_album_alias)) {
			$album_aliases[] = $node->field_album_alias[$node->language][0]['value'];
		}
	}

}
if (!empty($album_aliases)):
?>
				<div id="featured" class="col-md-12">

					<header>
						<h2>Music</h2>
					</header>

					<section>
						<ul id="album-carousel" class="jcarousel-skin-ep4">
						<?php foreach ($albums as $album): ?>
							<?php if (false !== array_search($album['album_alias'], $album_aliases)): ?>
							<li><a href="/music/<?php echo $album['album_alias']; ?>/"><img src="<?php echo OBSERVANTRECORDS_CDN_BASE_URI;?>/artists/<?php echo $album['artist_alias'];?>/albums/<?php echo $album['album_alias']; ?>/<?php echo strtolower($album['release_catalog_num']); ?>/images/cover_front_medium.jpg" alt="[<?php echo $album['album_title']; ?>]" title="[<?php echo $album['album_title']; ?>]" width="200" /></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
						</ul>

						<script type="text/javascript">
							(function ($) {
								$(function () {
									$('#album-carousel').jcarousel();
								});
							})(jQuery);
						</script>
					</section>
				</div>
<?php endif; ?>

				<div id="column-1" class="col-md-8">
				<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
				<a id="main-content"></a>
				<?php print render($title_prefix); ?>
				<?php if ($title): ?><h2 class="title" id="page-title"><?php print $title; ?></h2><?php else: ?><h2 class="title" id="page-title">Blog</h2><?php endif; ?>
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
					
					<section id="footer-column-2" class="col-md-6">
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
