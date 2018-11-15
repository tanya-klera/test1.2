<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_sub_title = $mts_options['mts_sub_title'];
$mts_sub_desc  = $mts_options['mts_sub_desc'];
?>
<section id="subscription"<?php if (!empty($mts_options['mts_wp_subscribe_css'])) echo ' class="wp-subscribe-custom-css"' ?>>
	<div class="container">
	<?php if ( !empty( $mts_sub_title) ) { ?>
		<h2><?php echo $mts_sub_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_sub_desc) ) { ?>
		<h4><?php echo $mts_sub_desc; ?></h4>
	<?php } ?>
		<div class="row">
			<?php if (!dynamic_sidebar('homepage-widget-area')) : ?><?php endif; ?>
		</div>
	</div>
</section>