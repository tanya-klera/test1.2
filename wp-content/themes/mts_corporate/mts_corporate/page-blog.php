<?php
/*
 * Template Name: Blog
*/
$mts_options = get_option(MTS_THEME_NAME);
get_header(); ?>

<?php if(!empty($mts_options['mts_blog_tagline']) || !empty($mts_options['mts_blog_title'])) { ?>
    <div class="single-page-header">
        <div class="container">
            <div class="blog-title-container">
                <?php if(!empty($mts_options['mts_blog_title'])) { ?><h2 class="text-heading"><?php echo $mts_options['mts_blog_title']; ?></h2><?php } ?>
                <?php if(!empty($mts_options['mts_blog_tagline'])) { ?><div class="blog-tagline"><?php echo $mts_options['mts_blog_tagline']; ?></div><?php } ?>
            </div>
            <div class="blog-header-search">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
<?php } ?>

<div id="page" class="single">
    <div class="<?php echo mts_article_class(); $full_post = mts_article_class(); ?> post-container">
        <?php $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'paged' => $paged,
                'ignore_sticky_posts'=> 1,
            );
            $latest_posts = new WP_Query( $args );
            global $wp_query;
            $tmp_query = $wp_query;
            $wp_query = null;
            $wp_query = $latest_posts;
            $j = 0; if ( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
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
            <?php $j++; endwhile; endif; ?>

            <!--Start Pagination-->
            <?php if ( $j !== 0 ) { // No pagination if there is no posts ?>
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
        <?php }
            // Restore original query object
            $wp_query = $tmp_query;
            // Be kind; rewind
            wp_reset_postdata(); ?>
    </div>
    <?php get_sidebar(); ?>
</div>
</div>

<?php if ($mts_options['mts_show_contact_form'] == '1') { ?>
  <?php get_template_part( 'home/section', 'contact' ); ?>
<?php } ?>

<?php get_footer(); ?>