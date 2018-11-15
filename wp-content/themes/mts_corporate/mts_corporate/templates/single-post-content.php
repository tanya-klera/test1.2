<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<div class="single_post">
	<?php if ( basename( mts_get_post_template() ) == 'singlepost-parallax.php' || basename( get_page_template() ) == 'page-parallax.php' ) { ?>
    <?php } else { ?>
		<?php if(has_post_thumbnail()) { ?>
			<div class="featured-thumb">
                <?php $full_post = mts_article_class();
                $post_id = get_the_ID(); $blog_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
                $blog_image = $blog_image[0];
                if($full_post == 'ss-full-width') {
                    $blog_image_url = bfi_thumb( $blog_image, array( 'width' => '1070', 'height' => '330', 'crop' => true ) );
                } else {
                    $blog_image_url = bfi_thumb( $blog_image, array( 'width' => '726', 'height' => '329', 'crop' => true ) );
                }
                echo '<img src="'.$blog_image_url.'" class="single_featured">';
                if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper'); ?>
            </div>
        <?php } ?>
	<?php } ?>
	<header>
		<h1 class="title single-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php mts_the_postinfo( 'single' ); ?>
	</header><!--.headline_area-->
	<div class="post-single-content box mark-links entry-content">
		<?php if ($mts_options['mts_posttop_adcode'] != '') { ?>
			<?php $toptime = $mts_options['mts_posttop_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$toptime day")), get_the_time("Y-m-d") ) >= 0) { ?>
				<div class="topad">
					<?php echo do_shortcode($mts_options['mts_posttop_adcode']); ?>
				</div>
			<?php } ?>
		<?php } ?>
		<?php if (isset($mts_options['mts_social_button_position']) && $mts_options['mts_social_button_position'] !== 'bottom') mts_social_buttons(); ?>
		<div class="thecontent" itemprop="articleBody">
			<?php the_content(); ?>
		</div>
		<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next','mythemeshop'), 'previouspagelink' => __('Previous','mythemeshop'), 'pagelink' => '%','echo' => 1 )); ?>
		<?php if ($mts_options['mts_postend_adcode'] != '') { ?>
			<?php $endtime = $mts_options['mts_postend_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$endtime day")), get_the_time("Y-m-d") ) >= 0) { ?>
				<div class="bottomad">
					<?php echo do_shortcode($mts_options['mts_postend_adcode']); ?>
				</div>
			<?php } ?>
		<?php } ?>
		<?php if (empty($mts_options['mts_social_button_position']) || $mts_options['mts_social_button_position'] == 'bottom') mts_social_buttons(); ?>
	</div><!--.post-single-content-->
</div><!--.single_post-->