<form method="get" action="<?php echo home_url('/'); ?>" class="search-form">
	<input placeholder="BUSQUEDA..." type="text" id="s" name="s" value="<?php the_search_query(); ?>">
</form>