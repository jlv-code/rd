<?php 

	/**
		@author: José V.
		@file: footer.php
		@version: 1.0
	 */

?>

				<footer>
					<div class="inner">
						<div class="menu">
							<nav><?php wp_nav_menu(array('theme_location' => 'main')); ?></nav>
						</div>
						<div class="social">
							<a href="" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/static/images/twitter.png" alt="Twitter"></a>
							<a href="" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/static/images/facebook.png" alt="Facebook"></a>
						</div>
						<div class="logo">
							<img src="<?php echo get_template_directory_uri() ?>/static/images/logo-gold.png" alt="Revista Diplomática de Venezuela">
						</div>
					</div>
				</footer>
			</div>
		</div>
	</div>
<?php wp_footer() ?>
</body>
</html>