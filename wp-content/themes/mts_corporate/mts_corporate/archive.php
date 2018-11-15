<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php get_header(); ?>
<div id="page">
	<div class="<?php echo mts_article_class(); $full_post = mts_article_class(); ?>">
		<div id="content_box">
			<h1 class="postsby">
				<?php if (is_category()) { ?>
					<span><?php single_cat_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
				<?php } elseif (is_tag()) { ?>
					<span><?php single_tag_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
				<?php } elseif (is_author()) { ?>
					<span><?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->nickname; _e(" Archive", "mythemeshop"); ?></span>
				<?php } elseif (is_day()) { ?>
					<span><?php _e("Daily Archive:", "mythemeshop"); ?></span> <?php the_time('l, F j, Y'); ?>
				<?php } elseif (is_month()) { ?>
					<span><?php _e("Monthly Archive:", "mythemeshop"); ?></span> <?php the_time('F Y'); ?>
				<?php } elseif (is_year()) { ?>
					<span><?php _e("Yearly Archive:", "mythemeshop"); ?></span> <?php the_time('Y'); ?>
				<?php } ?>
			</h1>
			<?php $j = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="latestPost excerpt panel" itemscope itemtype="http://schema.org/BlogPosting">
                    <?php if(has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="nofollow">
                            <div class="featured-thumb">
                                <?php
                                $post_id = get_the_ID(); $blog_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
                                $blog_image = $blog_image[0];
                                if($full_post == 'ss-full-width') {
                                    $blog_image_url = bfi_thumb( $blog_image, array( 'width' => '1070', 'height' => '330', 'crop' => true ) );
                                } else {
                                    $blog_image_url = bfi_thumb( $blog_image, array( 'width' => '726', 'height' => '329', 'crop' => true ) );
                                }
                                echo '<img src="'.$blog_image_url.'" class="single_featured" itemprop="image">';
                                if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper'); ?>
                            </div>
                        </a>
                    <?php } ?>
                    <header>
                        <h2 class="single-title" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php mts_the_postinfo( 'home' ); ?>
                    </header>
                    <div class="post-single-content blog-exceprt">
                        <?php if (empty($mts_options['mts_full_posts'])) : ?>
                            <?php echo mts_excerpt(55); ?>
                            <?php mts_readmore(); ?>
                        <?php else : ?>
                            <?php the_content(); ?>
                            <?php if (mts_post_has_moretag()) : ?><?php endif; ?>
                        <?php endif; ?>
                    </div>
                </article>
			<?php endwhile; endif; ?>

            <!--Start Pagination-->
            <?php if (isset($mts_options['mts_pagenavigation_type']) && $mts_options['mts_pagenavigation_type'] == '1' ) { ?>
                <?php mts_pagination(); ?>
            <?php } else { ?>
                <div class="pagination">
                    <ul>
                        <li class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></li>
                        <li class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></li>
                    </ul>
                </div>
            <?php } ?>
            <!--End Pagination-->
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>