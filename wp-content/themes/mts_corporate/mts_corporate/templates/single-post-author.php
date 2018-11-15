<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<div class="postauthor">
	<h4><?php _e('About The Author', 'mythemeshop'); ?></h4>
	<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '100' );  } ?>
	<h5 class="vcard"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="nofollow" class="fn"><?php the_author_meta( 'nickname' ); ?></a></h5>
	<p><?php the_author_meta('description') ?></p>
</div>