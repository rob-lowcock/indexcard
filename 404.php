<?php get_header(); ?>
		<?php get_sidebar(); ?>

		<div id="content">
			<?php $offset = substr(date('O'), 0, -2).':00';
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article class="unit post">
				
				<header>
				<h1>Well this is awkward</h1>
				</header>
				<p>Sorry, we can't seem to find what you wanted.</p>
				
				<?php get_search_form(); ?>

				<footer class="post-footer">

				</footer>

			</article>

			<?php endwhile; else: ?>
			<div class="unit post"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
			<?php endif; ?>

		</div>
<?php get_footer(); ?>