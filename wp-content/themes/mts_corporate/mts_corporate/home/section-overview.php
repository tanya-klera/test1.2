<?php
$mts_options = get_option(MTS_THEME_NAME);
$mts_overview_title = $mts_options['mts_overview_title'];
$mts_overview_desc  = $mts_options['mts_overview_desc'];
?>
<section id="overview">
	<?php if ( !empty( $mts_overview_title) ) { ?>
		<h2><?php echo $mts_overview_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_overview_desc) ) { ?>
		<h4><?php echo $mts_overview_desc; ?></h4>
	<?php } ?>
	<?php if ( isset( $mts_options['mts_overview'] ) ) { ?>
		<?php
		foreach( $mts_options['mts_overview'] as $overview ) :
			$mts_overview_group_image  = $overview['mts_overview_group_image'];
			$mts_overview_group_title  = $overview['mts_overview_group_title'];
			$mts_overview_group_desc   = $overview['mts_overview_group_desc'];
			$mts_image_resize = bfi_thumb( $mts_overview_group_image, array( 'width' => '319', 'height' => '391', 'crop' => true ) );
		?>
			<div class="wrapper">
				<div class="container">
					<div class="row">
						<div class="overview-grid">
							<div class="overview-img">
							<?php if ( !empty( $mts_image_resize) ) { ?>
								<img src="<?php echo $mts_image_resize; ?>" />
							<?php } ?>
							</div>
							<div class="overview-wrap">
								<div class="overview-desc">
								<?php if ( !empty( $mts_overview_group_title) ) { ?>
									<h2 class="overview-title single-title"><i class="fa fa-circle"></i><div class="overview-title-text"><?php echo $mts_overview_group_title; ?></div></h2>
								<?php } ?>
								<?php
								if ( !empty( $mts_overview_group_desc) ) {
									$text = trim($mts_overview_group_desc);
									$textAr = explode("\n", $text);
									$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind

									$output ='';
									foreach ($textAr as $line) {
										$output .= '<p>'. $line . '</p>';
									}
									echo $output;
								}
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php } ?>
</section>