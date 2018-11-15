<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_screenshot_title = $mts_options['mts_screenshot_title'];
$mts_screenshot_desc  = $mts_options['mts_screenshot_desc'];
?>

<section id="screenshot">
	<div class="container">
	<?php if ( !empty( $mts_screenshot_title) ) { ?>
		<h2><?php echo $mts_screenshot_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_screenshot_desc) ) { ?>
		<h4><?php echo $mts_screenshot_desc; ?></h4>
	<?php } ?>
	<?php if ( isset( $mts_options['mts_screenshots'] ) ) { ?>
		<div class="frame">
		<?php
		foreach( $mts_options['mts_screenshots'] as $screenshots ) :
			$mts_screenshot_group_title  = $screenshots['mts_screenshot_group_title'];
			$mts_screenshot_group_image  = $screenshots['mts_screenshot_group_image'];
			$mts_image_resize = bfi_thumb( $mts_screenshot_group_image, array( 'width' => '249', 'height' => '249', 'crop' => true ) );
		?>
			<div class="nnz-4">
				<div class="works-thumb">
					<a class="screenshot_magnific" href="<?php echo $mts_screenshot_group_image; ?>" title="<?php echo $mts_screenshot_group_title; ?>">
						<div class="mask"><i class="fa fa-expand"></i></div>
						<img src="<?php echo $mts_image_resize; ?>" />
					</a>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	<?php } ?>
	</div>
</section>