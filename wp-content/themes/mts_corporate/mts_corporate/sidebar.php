<?php
	$sidebar = mts_custom_sidebar();
    if ( $sidebar != 'mts_nosidebar' ) {
?>
<aside class="sidebar c-4-12" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	<div id="sidebars" class="g">
		<div class="sidebar">
			<?php if (!dynamic_sidebar($sidebar)) : ?>
				<div id="sidebar-archives" class="widget">
					<h2 class="widget-title"><?php _e('Archives', 'mythemeshop') ?></h2>
					<ul>
						<?php wp_get_archives( 'type=monthly' ); ?>
					</ul>
				</div>
				<div id="sidebar-meta" class="widget">
					<h2 class="widget-title"><?php _e('Meta', 'mythemeshop') ?></h2>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</div><!--sidebars-->
</aside>
<?php } ?>