<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_app_feature_title = $mts_options['mts_app_feature_title'];
$mts_app_feature_desc  = $mts_options['mts_app_feature_desc'];
?>
<section id="app-features">
	<div class="container">
	<?php if ( !empty( $mts_app_feature_title) ) { ?>
		<h2><?php echo $mts_app_feature_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_app_feature_desc) ) { ?>
		<h4><?php echo $mts_app_feature_desc; ?></h4>
	<?php } ?>
	<?php if ( isset( $mts_options['mts_app_feature'] ) ) { ?>
		<div class="row">
			<div class="services-container">
			<?php
			foreach( $mts_options['mts_app_feature'] as $appfeature ) :
				$mts_group_app_feature_title       = $appfeature['mts_group_app_feature_title'];
				$mts_group_app_feature_desc        = $appfeature['mts_group_app_feature_desc'];
				$mts_group_app_feature_icon_select = $appfeature['mts_group_app_feature_icon_select'];
			?>
				<div class="services">
					<div class="services-icon">
						<span class="features_ic fa fa-<?php echo $mts_group_app_feature_icon_select; ?>"></span>
					</div>
					<div class="services-desc">
					<?php if ( !empty( $mts_group_app_feature_title ) ) { ?>
						<h5><?php echo $mts_group_app_feature_title; ?></h5>
					<?php } ?>
					<?php if ( !empty( $mts_group_app_feature_desc ) ) { ?>
						<?php echo $mts_group_app_feature_desc; ?>
					<?php } ?>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	<?php } ?>
	</div>
</section>