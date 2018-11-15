<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php if (isset($mts_options['mts_pagenavigation_type']) && $mts_options['mts_pagenavigation_type'] == '1' ) { ?>
	<?php mts_pagination(); ?> 
<?php } else { ?>
	<div class="pagination pagination-previous-next">
		<ul>
			<li class="nav-previous"><?php next_posts_link( '<i class="fa fa-angle-left"></i> '. __( 'Previous', 'mythemeshop' ) ); ?></li>
			<li class="nav-next"><?php previous_posts_link( __( 'Next', 'mythemeshop' ).' <i class="fa fa-angle-right"></i>' ); ?></li>
		</ul>
	</div>
<?php } ?>