<?php 

	/**
		@author: José V.
		@file: page.php
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
				<article>
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<div class="note">
							<h1><?php the_title() ?></h1>
							<div class="meta">
								<span><?php the_time('d/F Y') ?></span>
								<span><?php the_tags('','','') ?></span>
							</div>
							<div class="content"><?php the_content() ?></div>
						</div>
					<?php endwhile; endif; ?>
					<?php wp_reset_postdata() ?>
				</article>
			</div>
		</div>
		<?php get_sidebar() ?>
	</div>
</section>

<?php get_footer() ?>