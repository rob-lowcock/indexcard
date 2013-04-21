<?php 

if ( ! isset( $content_width ) ) $content_width = 618;

$GLOBALS['content_width'] = 618;

add_action( 'after_setup_theme', 'indexcard_setup' );
add_action( 'widgets_init', function(){
     register_sidebar(array(
    	'name' => 'Sidebar',
        'before_widget' => '<div id="%1$s" class="unit widget %2$s">',
        'after_widget' => '</div>',
    ));
});
add_action('wp_enqueue_scripts', 'indexcard_theme_styles');

function indexcard_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', array('default-color' => 'e5e5e5') );
	set_post_thumbnail_size( 618, 150, true ); // default Post Thumbnail dimensions (cropped)
    
}

function indexcard_theme_styles()  
{ 
  // Register the style like this for a theme:  
  // (First the unique name for the style (custom-style) then the src, 
  // then dependencies and ver no. and media type)
  wp_register_style( 'screen', 
    get_template_directory_uri() . '/style.css', 
    array(), 
    '20130421', 
    'screen' );
  wp_register_style( 'fonts',
  	'http://fonts.googleapis.com/css?family=Droid+Sans:400,700',
  	array(),
  	'20130421',
  	'screen' );

  // enqueing:
  wp_enqueue_style( 'screen' );

}

function indexcard_filter_wp_title($title, $sep, $sep_location) {
 
  // add white space around $sep
  $sep = ' ' . $sep . ' ';
 
  $site_description = get_bloginfo('description');
 
  if ($site_description && (is_home() || is_front_page()))
      $custom = '';
 
  elseif(is_category())
      $custom = $sep . 'Category';
 
  elseif(is_tag())
      $custom = $sep . 'Tag';
 
  elseif(is_author())
      $custom = $sep . 'Author';
 
  elseif(is_year() || is_month() || is_day())
      $custom = $sep . 'Archives';
 
  else
      $custom = '';
 
  // get the page number (main page or an archive)
  if(get_query_var('paged'))
    $page_number = $sep . 'Page ' . get_query_var('paged');
 
  // get the page number (post with multipages)
  elseif(get_query_var('page'))
    $page_number = $sep . 'Page ' . get_query_var('page');
 
  else
    $page_number = '';
 
  // Comment the 4 lines of code below and see how odd the title format becomes
  if($sep_location == 'right' && !(is_home() || is_front_page())) {
      $custom = $custom . $sep;
      $title = substr($title, 0, -2);
  }
 
  // return full title
  return get_bloginfo('name') . $custom . $title . $page_number;
 
} // end of function elevenchild_filter_wp_title


function indexcard_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback unit">
		<p><?php _e( 'Pingback:', 'indexcard' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'indexcard' ), ' <span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class('unit'); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" <?php comment_class('comment'); ?>>
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size ); ?>

						<p class="ct-commentmeta">
						<?php
						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'indexcard' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'indexcard' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'indexcard' ), ' <span class="edit-link">', '</span>' ); ?>
				</p>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'indexcard' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'indexcard' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}

add_filter('wp_title', 'indexcard_filter_wp_title', 10, 3);