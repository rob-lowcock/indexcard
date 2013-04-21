<div id="comments">
<?php if ( post_password_required() ) : ?>
	<p class="nopassword">This post is password protected. Enter the password to view any comments.></p>
</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php // You can start editing here -- including this comment! ?>

<?php if ( have_comments() ) : ?>
<div class="unit" id="comments-title">
	<h2>
		<?php comments_number('No comments yet', '1 comment', '% comments'); ?>
	</h2>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
	<nav id="comment-nav-above">
	<p>
		<span class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></span>
		<span class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></span>
	</p>
		
	</nav>
	<?php endif; // check for comment navigation ?>
</div>

	

	<ol class="commentlist">
		<?php
			wp_list_comments( array( 'callback' => 'indexcard_comment' ) );
		?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
	<nav id="comment-nav-below" class="unit">
		<p>
		<div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
		<div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
	</p>
		
	</nav>
	<?php endif; // check for comment navigation ?>

<?php
	/* If there are no comments and comments are closed, let's leave a little note, shall we?
	 * But we don't want the note on pages or post types that do not support comments.
	 */
	elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<p class="nocomments">Comments are closed</p>
<?php endif; ?>

<div class="unit" id="comment-form">
<?php comment_form(); ?>
</div>

</div><!-- #comments -->
