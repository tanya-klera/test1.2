<?php get_header(); ?>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>

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
	<article class="<?php echo mts_article_class(); ?>" itemscope itemtype="http://schema.org/BlogPosting">
		<?php if (mts_get_thumbnail_url()) : ?>
			<meta itemprop="image" content="<?php echo mts_get_thumbnail_url(); ?>" />
		<?php endif; ?>
		<div id="content_box" >
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
					<?php if ($mts_options['mts_breadcrumb'] == '1') { ?>
						<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><?php mts_the_breadcrumb(); ?></div>
					<?php } ?>
					<?php
					// Single post parts ordering
					if ( isset( $mts_options['mts_single_post_layout'] ) && is_array( $mts_options['mts_single_post_layout'] ) && array_key_exists( 'enabled', $mts_options['mts_single_post_layout'] ) ) {
						$single_post_parts = $mts_options['mts_single_post_layout']['enabled'];
					} else {
						$single_post_parts = array( 'content' => 'content', 'related' => 'related', 'author' => 'author' );
					}
					foreach( $single_post_parts as $part => $label ) { get_template_part( 'templates/single-post-'.$part ); }
					?>
				</div><!--.g post-->
				<?php comments_template( '', true ); ?>
			<?php endwhile; /* end loop */ ?>
		</div>
	</article>
	<?php get_sidebar(); ?>
</div>
<?php if ($mts_options['mts_show_contact_form'] == '1') { ?>

  <?php get_template_part( 'home/section', 'contact' ); ?>

<?php } ?>
<?php get_footer(); ?>