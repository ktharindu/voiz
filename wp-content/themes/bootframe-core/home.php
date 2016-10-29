<?php
/**
 * BootFrame home template file.
 *
 *
 *
 * @since      BootFrame 1.0
 */

get_header(); ?>


<div class="smartlib-page-blocks">

	<?php

	/**
	 * Display Main Slider
	 */

	smartlib_slider();

	?>


	<div class="container">
		<?php

		/**
		 * Get title features
		 */

		$title_features = get_theme_mod('smartlib_frontapge_features_header');

		if ($title_features===false) {

			smartlib_get_frontpage_section_header(__('Our Services', 'bootframe-core'));

		}elseif(strlen($title_features)>0){

			smartlib_get_frontpage_section_header($title_features);

		}

		dynamic_sidebar('sidebar-frontpage_features');

		?>
	</div>
	<div class="container">
		<?php

		/**
		 * Last news Header
		 */

		$title_news = get_theme_mod('smartlib_frontapge_lastnews_header');

		if ($title_news===false) {

			smartlib_get_frontpage_section_header(__('Latest News', 'bootframe-core'));

		}elseif(strlen($title_news)>0){

			smartlib_get_frontpage_section_header($title_news);

		}

		/**
		 * Display last news
		 */

		$args = array('posts_per_page' => 4, 'ignore_sticky_posts' => 1, 'post_type' => 'post');

		$posts_array = new WP_Query($args);

		/**
		 * Latest News Loop
		 */

		if ($posts_array->have_posts()) {
			?>
			<ul class="smartlib-layout-list smartlib-column-list smartlib-4-columns-list">
				<?php

				while ($posts_array->have_posts()):$posts_array->the_post();

					?>

					<li>
						<div class="panel smartlib-inside-box smartlib-widget">
							<?php smartlib_post_thumbnail_block('smartlib-large-thumb', 'default') ?>

							<div class="panel-body">
								<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>

								<p><?php the_excerpt() ?></p>
								<a href="<?php the_permalink() ?>"
								   class="btn btn-primary"><?php _e('Read more', 'bootframe-core'); ?></a>
                        	<span class="pull-right">
											<?php do_action('smartlib_comments_count', 'default'); ?>
										</span>
							</div>
						</div>

					</li>
				<?php


				endwhile;
				?>
			</ul>
		<?php
		}

		wp_reset_postdata();

		?>
	</div>
</div>
<?php get_footer(); ?>
