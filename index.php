<?php 

	/**
		@author: José V.
		@file: index.php
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
				<div class="important">
					<?php $d = new WP_Query(array('category_name'=>'Importante', 'posts_per_page'=>'1')); ?>
					<?php if ($d->have_posts()): while ($d->have_posts()): $d->the_post(); ?>
					<div class="title">
						<h1><a href="<?php the_permalink() ?>"><span class="date"><?php the_time('d M') ?></span> - <?php the_title() ?></a></h1>
					</div>
					<div class="image">
						<?php the_post_thumbnail('full') ?>
						<span><a href="<?php the_permalink() ?>">Ver</a></span>
					</div>
					<?php endwhile; endif; ?>
					<?php wp_reset_postdata() ?>
				</div>
			</div>
			<div class="row">
				<div class="news">
					<?php $d = new WP_Query(array('category__not_in'=>array(8), 'posts_per_page'=>'4')); ?>
					<?php if ($d->have_posts()): while ($d->have_posts()): $d->the_post(); ?>
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
		</div>
		<?php get_sidebar() ?>
	</div>
</section>

<?php get_footer() ?>