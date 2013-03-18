<?php get_header(); ?>
		<?php get_sidebar(); ?>

		<div id="content">

			<article class="unit post page-404">
				
				<header>
				<h1>Well this is awkward</h1>
				<p class='error-code'>404 - not found</p>
				</header>
				<p>Sorry, we can't seem to find what you wanted. You could try using the search box below to find things if that helps.</p>
				
				<div class="search-404">
					<?php get_search_form(); ?>
				</div>

			</article>

		</div>
<?php get_footer(); ?>