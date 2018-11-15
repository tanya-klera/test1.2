<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_team_title = $mts_options['mts_team_title'];
$mts_team_desc  = $mts_options['mts_team_desc'];
?>
<section id="ourteam">
	<div class="container">
	<?php if ( !empty( $mts_team_title) ) { ?>
		<h2><?php echo $mts_team_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_team_desc) ) { ?>
		<h4><?php echo $mts_team_desc; ?></h4>
	<?php } ?>
	<?php if ( isset( $mts_options['mts_team'] ) ) { ?>
		<div class="row">
		<?php
		foreach( $mts_options['mts_team'] as $team ) :
			$mts_team_group_title    = $team['mts_team_group_title'];
			$mts_team_group_image    = $team['mts_team_group_image'];
			$mts_team_group_position = $team['mts_team_group_position'];
			$mts_team_group_desc     = $team['mts_team_group_desc'];
			$mts_image_resize = bfi_thumb( $mts_team_group_image, array( 'width' => '150', 'height' => '150', 'crop' => true ) );
			?>
			<div class="team_grid">
				<div class="fa team-thumb">
				<?php if ( !empty( $mts_image_resize ) ) { ?>
					<img src="<?php echo $mts_image_resize; ?>" />
				<?php } ?>
				</div>
				<?php if ( !empty( $mts_team_group_title ) ) { ?>
					<h5><?php echo $mts_team_group_title; ?></h5>
				<?php } ?>
				<?php if ( !empty( $mts_team_group_position ) ) { ?>
					<?php echo $mts_team_group_position; ?>
				<?php } ?>
				<?php if ( !empty( $mts_team_group_desc ) ) { ?>
					<div class="team-desc">
						<?php echo $mts_team_group_desc; ?>
					</div>
				<?php } ?>
			</div>
		<?php endforeach; ?>
		</div>
	<?php } ?>
	</div>
</section>