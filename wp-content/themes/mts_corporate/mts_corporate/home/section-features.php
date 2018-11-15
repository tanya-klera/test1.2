<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_features_title = $mts_options['mts_feature_title'];
$mts_features_desc  = $mts_options['mts_feature_desc'];
?>
<section id="features">
	<div class="container">
	<?php if ( !empty( $mts_features_title) ) { ?>
		<h2><?php echo $mts_features_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_features_desc) ) { ?>
		<h4><?php echo $mts_features_desc; ?></h4>
	<?php } ?>
	<?php if ( isset( $mts_options['mts_features'] ) ) { ?>
		<div class="row">
		<?php
		foreach( $mts_options['mts_features'] as $features ) :
			$mts_grid_service_title       = $features['mts_feature_group_title'];
			$mts_grid_service_desc        = $features['mts_feature_group_desc'];
			$mts_grid_service_icon_select = $features['mts_feature_group_icon'];
			?>
			<div class="features_grid">
				<div class="features-icon">
				<?php if ( !empty( $mts_grid_service_icon_select ) ) { ?>
					<span class="features_ic fa fa-<?php echo $mts_grid_service_icon_select; ?>"></span>
				<?php } ?>
				</div>
				<div class="features-desc">
				<?php if ( !empty( $mts_grid_service_title ) ) { ?>
					<h5><?php echo $mts_grid_service_title; ?></h5>
				<?php } ?>
				<?php if ( !empty( $mts_grid_service_desc ) ) { ?>
					<p><?php echo $mts_grid_service_desc; ?></p>
				<?php } ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	<?php } ?>
	</div>
</section>