<?php get_header(); ?>
		<?php get_sidebar(); ?>

		<div id="content">
			<?php $offset = substr(date('O'), 0, -2).':00';
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article <?php post_class('unit') ?>>
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} ?>
				<header>
				<p class="meta-top"><time datetime="<?php the_time('Y-m-d\TH:i') ?><?php echo $offset; ?>"><?php the_time('jS F Y, g:ia') ?></time> <span class="meta-author">by <?php the_author(); ?></span></p>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				</header>

				<div class="the-content">
					<?php the_content(); ?>
				</div>

				<footer class="post-footer">
					<?php the_tags('<p class="taglist">Tags: ', ', ', '</p>'); ?>
					<p class="categories"><?php the_category(', '); ?></p>
					<p><?php comments_popup_link( 'No comments', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?></p>
				</footer>

			</article>

			<?php endwhile; else: ?>
			<div class="unit post"><p>Sorry, no posts matched your criteria.</p></div>
			<?php endif; ?>

			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			<div id="navigation" class="unit">
				<div id="next-link"><?php next_posts_link('Older Entries &raquo;'); ?></div>
				<div id="prev-link"><?php previous_posts_link('&laquo; Newer Entries'); ?>&nbsp;</div>
			</div>
			<?php endif; ?>

		</div>
<?php get_footer(); ?>