<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_stats_title = $mts_options['mts_stats_title'];
$mts_stats_desc  = $mts_options['mts_stats_desc'];
?>
<section id="statistics">
	<div class="container">
	<?php if ( !empty( $mts_stats_title) ) { ?>
		<h2><?php echo $mts_stats_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_stats_desc) ) { ?>
		<h4><?php echo $mts_stats_desc; ?></h4>
	<?php } ?>
	<?php if ( isset( $mts_options['mts_stats'] ) ) { ?>
		<div id="counters" class="row">
		<?php
		$mts_stats = count( $mts_options['mts_stats'] );
		if ($mts_stats):
			$i=0;
			foreach( $mts_options['mts_stats'] as $stats ) :
				$mts_stat_group_title      = $stats['mts_stat_group_title'];
				$mts_stat_group_number     = $stats['mts_stat_group_number'];
				?>
				<div class="counter-grid">
					<span class="counter count-<?php echo $i; ?>">0</span>
					<?php if ( !empty( $mts_stat_group_title ) ) { ?>
						<?php echo $mts_stat_group_title; ?>
					<?php } ?>
					<script type="text/javascript">
						jQuery(window).load(function() {
							jQuery(document).scroll(function(){
								if(jQuery(this).scrollTop()>=jQuery('#statistics').position().top - 200){
									jQuery('#counters .count-<?php echo $i; ?>').animateNumbers(<?php echo $mts_stat_group_number; ?>,200);
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
	<?php } ?>
	</div>
</section>