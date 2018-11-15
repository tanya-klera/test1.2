<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_exp_title = $mts_options['mts_exp_title'];
$mts_exp_desc  = $mts_options['mts_exp_desc'];
?>

<section id="experience">
	<div class="container">
	<?php if ( !empty( $mts_exp_title) ) { ?>
		<h2><?php echo $mts_exp_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_exp_desc) ) { ?>
		<h4><?php echo $mts_exp_desc; ?></h4>
	<?php } ?>
	<?php if ( isset( $mts_options['mts_exp'] ) ) { ?>
		<div class="row">
			<div class="exp-container">
			<?php
			$mts_exp = count( $mts_options['mts_exp'] );
			if ($mts_exp):
				$i=0;
				foreach( $mts_options['mts_exp'] as $exp ) :
					$mts_exp_group_prcentage = $exp['mts_exp_group_prcentage'];
					$mts_exp_group_title     = $exp['mts_exp_group_title'];
					?>
					<div class="exp-grid">
						<div class="chart chart-<?php echo $i; ?>" data-percent="<?php echo $mts_exp_group_prcentage; ?>">
							<span class="percent">0</span>
						</div>
						<?php if ( !empty( $mts_exp_group_title  ) ) { ?>
							<div class="sec-desc"><?php echo $mts_exp_group_title ; ?></div>
						<?php } ?>
						<script type="text/javascript">
							jQuery(window).load(function() {
								jQuery(document).scroll(function(){
									if(jQuery(this).scrollTop()>=jQuery('#experience').position().top - 200){
										jQuery('.chart-<?php echo $i; ?>').easyPieChart({
											barColor: "<?php echo $mts_options['mts_color_scheme']; ?>",
											onStep: function(from, to, percent) {
												jQuery(this.el).find('.percent').text(Math.round(percent));
											}
										});
									}
								});
							});
						</script>
					</div>
					<?php
					$i++;
				endforeach;
			endif;
			?>
			</div>
		</div>
		<?php } ?>
	</div>
</section>