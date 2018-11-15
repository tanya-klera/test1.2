<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_contact_title            = $mts_options['mts_contact_title'];
$mts_contact_desc             = $mts_options['mts_contact_desc'];
$mts_contact_phone            = $mts_options['mts_contact_phone'];
$mts_contact_company_address  = $mts_options['mts_contact_company_address'];
$mts_contact_email            = $mts_options['mts_contact_email'];
?>
<section id="contact">
	<div class="container">
	<?php if ( !empty( $mts_contact_title) ) { ?>
		<h2><?php echo $mts_contact_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_contact_desc) ) { ?>
		<h4><?php echo $mts_contact_desc; ?></h4>
	<?php } ?>
	<?php if ($mts_options['mts_show_contact_map'] == '1') { ?>
		<div class="row">
			<div class="contact-grid">
				<div class="contact_map">
					<div id="map-canvas"></div>
					<div class="mts-map-contact-info">
						<div class="hexagon">
						<?php if ( !empty($mts_options['mts_contact_company_address']) || !empty($mts_options['mts_contact_email']) || !empty($mts_options['mts_contact_phone']) ) { ?>
							<div class="contact-info-container" id="contact-section-info-container">
								<h4><?php echo $mts_contact_company_address; ?></h4>
								<div class="contact-company-address">
									<?php echo $mts_contact_email; ?><br/><?php echo $mts_contact_phone; ?>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if ($mts_options['mts_show_contact_form'] == '1') { ?>
		<div class="row">
			<div class="contact-grid">
				<div class="contact_map">
					<?php mts_contact_form(); ?>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</section>