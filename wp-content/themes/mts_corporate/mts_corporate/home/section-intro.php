<?php $mts_options = get_option(MTS_THEME_NAME);
$slider_title = $mts_options['mts_slider_title'];
$slider_desc  = $mts_options['mts_slider_desc'];
?>
<section id="intro">
	<div class="container">
		<div class="intro-container bg-slide">
		<?php if ( !empty( $slider_title ) ) { ?>
			<h3 class="app-title"><?php echo $slider_title; ?></h3>
		<?php } ?>
		<?php if (!empty($slider_desc)) {?>
			<p class="app-intro"><?php echo $slider_desc; ?></p>
		<?php } ?>
		<?php if (!empty($mts_options['mts_intro_button'])) { ?>
			<div class="info-buttons-container">
			<?php
			foreach ( $mts_options['mts_intro_button'] as $button ) {
				$button_url = "#";
				if ( !empty($button['mts_intro_button_url']) ) {
					$button_url = $button['mts_intro_button_url'];
				}
				$button['mts_intro_button_label'] = str_replace("\n\r", "\n", $button['mts_intro_button_label']);
				$btn_texts  = explode("\n", $button['mts_intro_button_label']);
				$label      = !empty($btn_texts[0]) ? $btn_texts[0] : '';
				$boldText   = !empty($btn_texts[1]) ? $btn_texts[1] : '';
				?>
				<a href="<?php echo $button_url; ?>" class="mts-button intro-button" style="background:<?php echo $button['mts_button_color']; ?>; border-color:<?php echo $button['mts_button_color']; ?>; color:<?php echo $button['mts_button_color']; ?>;">
				<?php if(!empty($button['mts_intro_button_icon_select'])) { ?>
					<i class="fa fa-<?php echo $button['mts_intro_button_icon_select']; ?>" style="color:<?php echo $button['mts_button_text_color']; ?>"></i>
				<?php } ?>
					<div class="button-text" style="color:<?php echo $button['mts_button_text_color']; ?>">
						<span class="button-label <?php if(empty($boldText)) { echo 'nobold'; } ?>"><?php echo $label; ?></span>
						<?php if(!empty($boldText)) { ?>
							<span class="button-bold-text"><?php echo $boldText; ?></span>
						<?php } ?>
					</div>
				</a>
			<?php
			}
			?>
			</div>
		<?php } ?>
		</div>
	</div>
</section>