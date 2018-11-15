<?php $mts_options = get_option('pinstagram'); ?>
<?php get_header(); ?>
<div id="page" class="single">
	<article class="article">
		<div id="content_box" >
			<div class="post" >
				<div class="single_post" >
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>">
							<div class="single_page">
								<?php if ($mts_options['mts_breadcrumb'] == '1') { ?>
									<div class="breadcrumb" itemprop="breadcrumb"><?php mts_the_breadcrumb(); ?></div>
								<?php } ?>
								<header>
									<h1 class="title"><?php the_title(); ?></h1>
								</header>
								<div class="mark-links">
									<?php the_content(); ?>
									<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next','mythemeshop'), 'previouspagelink' => __('Previous','mythemeshop'), 'pagelink' => '%','echo' => 1 )); ?>
								</div><!--.post-content box mark-links-->
							</div>
						</div>
						<?php comments_template( '', true ); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</article>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>