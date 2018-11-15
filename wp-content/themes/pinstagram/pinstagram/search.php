<?php $mts_options = get_option('pinstagram'); ?>
<?php get_header(); ?>
<div id="page">
	<div class="article">
		<div id="content_box">
			<div class="post-content-in">
			<h1 class="postsby">
				<span><?php _e("Search Results for:", "mythemeshop"); ?></span> <?php the_search_query(); ?>
			</h1>
			<?php $j = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="latestPost excerpt  <?php echo (++$j % 3 == 0) ? 'last' : ''; ?>">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('slider',array('title' => '')); echo '</div>'; ?>
						<?php } ?>
					</a>
					<div class="post-content-inner">
						<header>
							<h2 class="title front-view-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<?php if($mts_options['mts_home_headline_meta'] == '1') { ?>
								<div class="post-info">
									<?php if(isset($mts_options['mts_home_headline_meta_info']['a']) == '1') { ?>
										<span class="theauthor"><i class="icon-user"></i> <?php  the_author_posts_link(); ?></span>
									<?php } ?>
									<?php if(isset($mts_options['mts_home_headline_meta_info']['b']) == '1') { ?>
										<span class="thetime"><i class="icon-calendar"></i> <?php the_time( get_option( 'date_format' ) ); ?></span>
									<?php } ?>
									<?php if(isset($mts_options['mts_home_headline_meta_info']['c']) == '1') { ?>
										<span class="thecomment"><i class="icon-comments"></i> <a rel="nofollow" href="<?php comments_link(); ?>"><?php echo comments_number();?></a></span>
									<?php } ?>
								</div>
							<?php } ?>
						</header>
						<div class="front-view-content">
							<?php echo mts_excerpt(56);?>
						</div>
						<div class="readMore"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow"><?php _e('Read More','mythemeshop'); ?></a></div>
					</div><!--End post-content-inner-->
				</article><!--.post excerpt-->
			<?php endwhile; else: ?>
				<article class="latestPost no-results">
					<div class="post-content-inner">
						<h1><?php _e('No Results Found','mythemeshop'); ?>
						<h2><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.', 'mythemeshop'); ?></h2>
						<?php get_search_form(); ?>
					</div>
				</article><!--noResults-->
			<?php endif; ?>
			<!--Start Pagination-->
			<?php if ($mts_options['mts_pagenavigation'] == '1' ) { ?>
				<?php if ($mts_options['mts_pagenavigation_type'] == '1' ) { ?>
					<?php  $additional_loop = 0; mts_pagination($additional_loop['max_num_pages']); ?>           
				<?php } else { ?>
					<div class="pagination">
						<ul>
							<li class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></li>
							<li class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></li>
						</ul>
					</div>
				<?php } ?>
			<?php } ?>
			<!--End Pagination-->
			</div><!--End post-content-in-->
			<div class="addon-content">
				<?php $posts = get_posts('orderby=rand&numberposts=10'); foreach($posts as $post) { ?>
					<div class="post addon-post">
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
							<?php if ( has_post_thumbnail() ) { ?> 
								<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('featured',array('title' => '')); echo '</div>'; ?>
							<?php } ?>
						</a>
						<div class="addon-post-content">	
							<h2 class="title addon-title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>
							<?php if($mts_options['mts_home_headline_meta'] == '1') { ?>
								<?php if(isset($mts_options['mts_home_headline_meta_info']['a']) == '1') { ?>
									<div class="addon-post-info"><span class="theauthor"><i class="icon-user"></i> <?php setup_postdata($post); the_author_posts_link(); ?></span></div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div><!--End addon-content-->
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>