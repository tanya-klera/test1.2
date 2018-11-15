<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_pricing_title = $mts_options['mts_pricing_title'];
$mts_pricing_desc  = $mts_options['mts_pricing_desc'];
?>
<section id="pricing">
	<div class="container">
	<?php if ( !empty( $mts_pricing_title) ) { ?>
		<h2><?php echo $mts_pricing_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_pricing_desc) ) { ?>
		<h4><?php echo $mts_pricing_desc; ?></h4>
	<?php } ?>
	<?php if ( isset( $mts_options['mts_price'] ) ) { ?>
		<div class="row">
			<div class="price-container">
			<?php
			$nav   = '';
			foreach( $mts_options['mts_price'] as $key => $price ) {
				$mts_price_group_title       = $price['mts_price_group_title'];
				$mts_price_group_price       = $price['mts_price_group_price'];
				$mts_price_group_price_desc  = $price['mts_price_group_price_desc'];
				$mts_price_group_btn_lbl     = $price['mts_price_group_btn_lbl'];
				$mts_price_group_btn_url     = $price['mts_price_group_btn_url'];
				$mts_price_group_features    = $price['mts_price_group_features'];
				?>
				<div class="price-grid">
					<div class="tab-title"><?php echo $mts_price_group_title; ?></div>
					<div class="tab-price">
						<sup>$</sup><?php echo $mts_price_group_price; ?>
						<span class="sec-desc"><?php echo $mts_price_group_price_desc; ?></span>
					</div>
					<a href="<?php echo $mts_price_group_btn_url; ?>" class="mts-button blue"><?php echo $mts_price_group_btn_lbl; ?></a>
					<ul class="plan-features">
						<?php
						$text = trim($mts_price_group_features);
						$textAr = explode("\n", $text);
						$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind
						$output ='';
						foreach ($textAr as $line) {
							$fea = substr($line, 0,1);
							if($fea == "x"){
								$close = '<span class="fa fa-close"></span>';
								$fea = substr($line, 1);
							}else{
								$close = '<span class="fa fa-check"></span>';
								$fea = substr($line, 0);
							}
							$output .= '<li>'. $close . $fea . '</li>';
						}
						echo $output;
						?>
					</ul>
				</div>
			<?php
			}
			?>
			</div>
		</div>
	<?php } ?>
	</div>
</section>