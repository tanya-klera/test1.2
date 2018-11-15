<?php
/**
 * Alternative post template
 *
 * To be used as a sample
 */
 ?>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php get_header(); ?>
<?php if (mts_get_thumbnail_url() && has_post_thumbnail()) : ?>
    <div id="parallax" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div>
<?php endif; ?>
<div id="page" class="single parallax">
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
	</article>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
