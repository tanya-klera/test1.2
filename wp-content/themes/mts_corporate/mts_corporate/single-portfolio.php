<?php get_header(); ?>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php if (mts_get_thumbnail_url() && has_post_thumbnail()) : ?>
    <div id="parallax" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div>
<?php endif; ?>
<div id="page" class="single">
	<article class="<?php echo mts_article_class(); ?>" itemscope itemtype="http://schema.org/BlogPosting">
		<div id="content_box" >
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
					<header class="portfolio-header">
						<h1 class="title single-title gallery-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
					</header><!--.headline_area-->
					<div class="post-single-content box mark-links entry-content">
		                <div class="thecontent" itemprop="articleBody">
		                	<?php if (isset($mts_options['mts_social_button_position']) && $mts_options['mts_social_button_position'] == 'top') mts_social_buttons(); ?>
		                    <?php the_content(); ?>
		              		<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next','mythemeshop'), 'previouspagelink' => __('Previous','mythemeshop'), 'pagelink' => '%','echo' => 1 )); ?>
							<?php if (empty($mts_options['mts_social_button_position']) || $mts_options['mts_social_button_position'] == 'bottom' || $mts_options['mts_social_button_position'] == 'floating') mts_social_buttons(); ?>
							<?php if($mts_options['mts_tags'] == '1') { ?>
								<div class="tags"><?php mts_the_tags('<span class="tagtext">'.__('Tags','mythemeshop').':</span>',' ') ?></div>
							<?php } ?>
						</div>
					</div>
				</div><!--.g post-->
			<?php endwhile; /* end loop */ ?>
		</div>
	</article>
</div>
<?php get_footer(); ?>