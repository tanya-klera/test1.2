<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_testimonials_title = $mts_options['mts_testimonials_title'];
$mts_testimonials_desc  = $mts_options['mts_testimonials_desc'];
?>
<section id="testimonials">
	<div class="container">
	<?php if ( !empty( $mts_testimonials_title) ) { ?>
		<h2><?php echo $mts_testimonials_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_testimonials_desc) ) { ?>
		<h4><?php echo $mts_testimonials_desc; ?></h4>
	<?php } ?>
	<?php if ( isset( $mts_options['mts_testimonial'] ) ) { ?>
		<div class="frame">
			<div class="nnz-1">
				<div class="testimonials">
				<?php
				$nav   = '';
				$count = 0;
				foreach ( $mts_options['mts_testimonial'] as $key => $section ) {
					$mts_test_group_name = $section['mts_test_group_name'];
					$mts_test_group_desc = $section['mts_test_group_desc'];
					$mts_test_group_image = $section['mts_test_group_image'];
					$mts_test_group_source = $section['mts_test_group_source'];

					$mts_image_resize = bfi_thumb( $mts_test_group_image, array( 'width' => '80', 'height' => '80', 'crop' => true ) );

					$count ++;

					$nav .= '<li id="testimonial-'.$count.'">';
					$nav .= '<div class="mask fa fa-quote-left"></div>';
					$nav .= '<img src="'.$mts_image_resize.'">';
					$nav .= '</li>';
					?>
					<div class="mts-testimonial" id="testimonial-<?php echo $count; ?>" >
						<p>"<?php echo $mts_test_group_desc; ?>"</p>
						<span class="via"><strong><?php echo $mts_test_group_name; ?></strong> <?php echo $mts_test_group_source; ?></span>
					</div>
				<?php } ?>
				</div>
				<ul id="testimonials-authors" class="testimonials-authors">
					<?php echo $nav; ?>
				</ul>
			</div>
		</div>
	<?php } ?>
	</div>
</section>