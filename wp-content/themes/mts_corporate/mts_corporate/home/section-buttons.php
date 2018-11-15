<?php
$mts_options = get_option(MTS_THEME_NAME);
$mts_buttons_title = $mts_options['mts_buttons_title'];
$mts_buttons_desc  = $mts_options['mts_buttons_desc'];
?>
<section id="buttons">
	<div class="container">
	<?php if ( !empty( $mts_buttons_title) ) { ?>
		<h2><?php echo $mts_buttons_title; ?></h2>
	<?php } ?>
	<?php if ( !empty( $mts_buttons_desc) ) { ?>
		<h4><?php echo $mts_buttons_desc; ?></h4>
	<?php } ?>
	<?php if ( isset( $mts_options['mts_buttons'] ) ) { ?>
		<div class="frame">
			<div class="nnz-1">
				<div class="mts-subscribe">
				<?php 
				foreach( $mts_options['mts_buttons'] as $buttons ) :
					$mts_button_group_icon = $buttons['mts_button_group_icon'];
					$mts_button_url = $buttons['mts_button_group_url'];
					$buttons['mts_button_group_label'] = str_replace("\n\r", "\n", $buttons['mts_button_group_label']);
					$btn_texts  = explode("\n", $buttons['mts_button_group_label']);
					$label      = !empty($btn_texts[0]) ? $btn_texts[0] : '';
					$boldText   = !empty($btn_texts[1]) ? $btn_texts[1] : '';
				?>
					<div class="intro-button">
						<a href="<?php echo $mts_button_url; ?>">
						<?php if ( !empty( $mts_button_group_icon  ) ) { ?>
							<i class="fa fa-<?php echo $mts_button_group_icon; ?>"></i>
						<?php } ?>
							<div class="button-text">
								<span class="button-label <?php if(empty($boldText)) { echo 'nobold'; } ?>"><?php echo $label; ?></span>
								<?php if(!empty($boldText)) { ?>
									<span class="button-bold-text"><?php echo $boldText; ?></span>
								<?php } ?>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</section>