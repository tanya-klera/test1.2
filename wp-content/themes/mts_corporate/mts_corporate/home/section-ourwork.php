<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_work_title = $mts_options['mts_work_title'];
$mts_work_desc = $mts_options['mts_work_desc'];
$mts_work_count_home = $mts_options['mts_work_count_home'];
$mts_work_btn_lbl = $mts_options['mts_work_btn_lbl'];
?>
<section id="ourworks">
	<div class="container">
	<?php if (!empty($mts_work_title)) {?>
		<h2><?php echo $mts_work_title;?></h2>
	<?php }?>
	<?php if (!empty($mts_work_desc)) {?>
		<h4><?php echo $mts_work_desc;?></h4>
	<?php }?>
		<div class="frame">
		<?php
		$paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'portfolio',
			'post_status' => 'publish',
			'paged' => $paged,
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $mts_work_count_home,
		);
		$latest_posts = new WP_Query($args);
		$j = 0;
		if ($latest_posts->have_posts()):while ($latest_posts->have_posts()):$latest_posts->the_post();?>
			<div class="latestPost nnz-4 ourworks">
				<div class="works-thumb">
					<a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" rel="nofollow">
						<div class="mask"><i class="fa fa-search"></i></div>
						<?php
						if (has_post_thumbnail()) {
							$post_id = get_the_ID();
							$project_image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
							$project_image = $project_image[0];
							$project_image_url = bfi_thumb($project_image, array('width' => '249', 'height' => '249', 'crop' => true));
						} else {
							$project_image_url = get_template_directory_uri() . '/images/nothumb.png';
						}
						echo '<img src="' . $project_image_url . '" class="project-image">';
						?>
					</a>
				</div>
			</div>
		<?php
		$j++;
		endwhile;endif;
		?>
		</div>
		<div class="frame">
			<div class="nnz-1"><a class="mts-button blue" href="<?php echo get_post_type_archive_link('portfolio');?>"><?php echo $mts_work_btn_lbl;?></a></div>
		</div>
	</div>
</section>