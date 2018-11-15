<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<article class="latestPost excerpt panel" itemscope itemtype="http://schema.org/BlogPosting">
    <div class="featured-thumb">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'featured' ); ?></a>
    </div>
    <header>
        <h2 class="single-title" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="post-info">
            <span class="thetime updated"><span itemprop="datePublished"><?php the_time( get_option( 'date_format','d.m.Y' ) ); ?></span></span>
            <span class="theauthor"><span itemprop="author">By <?php the_author_posts_link(); ?></span></span>
        </div>
    </header>
    <div class="post-single-content blog-exceprt">
        <?php if (empty($mts_options['mts_full_posts'])) : ?>
            <?php echo mts_excerpt(29); ?>
        <?php else : ?>
            <?php the_content(); ?>
        <?php endif; ?>
    </div>
    <?php mts_readmore(); ?>
</article>

