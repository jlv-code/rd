<?php 

	/**
		@author: José V.
		@file: category.php
		@version: 1.0
	 */

?>

<?php get_header() ?>

<section>
	<div class="inner">
		<div class="col-one">
			<div class="row">
				<div class="breadcrumb"><?php the_breadcrumb() ?></div>
			</div>
			<div class="row">
				<div class="news">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<div class="note">
							<div class="image">
								<a href="<?php the_permalink() ?>">
									<?php the_post_thumbnail('medium') ?>
									<span><?php the_time('d/M') ?></span>
								</a>
							</div>
							<a href="<?php the_permalink() ?>"><h1><?php the_title() ?></h1></a>
							<?php the_excerpt() ?>
						</div>
					<?php endwhile; endif; ?>
					<?php wp_reset_postdata() ?>
				</div>
			</div>
			<div class="row">
				<div class="paging">
					<?php the_post_paging('') ?>
				</div>
			</div>
		</div>
		<?php get_sidebar() ?>
	</div>
</section>

<?php get_footer() ?>