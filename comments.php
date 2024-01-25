<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bebe
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="title">Comments</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<div class="comments">


			<?php wp_list_comments('callback=bebe_comment&end-callback=bebe_comment_close'); ?>

		</div><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bebe' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().


	// Form for comments
	

	$commenter = wp_get_current_commenter();

	add_filter( 'comment_form_defaults', 'bebe_form_defaults' );
	
	function bebe_form_defaults( $defaults )
	{
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' ) ? ' <span class="required">*</span>' : '';
		$aria_req = $req ? " aria-required='true'" : '';
		$html_req = $req ? " required='required'"  : '';
		$defaults['title_reply'] = '';
		$defaults['email'] = '<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />';
		$defaults['url'] = '<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />';
		$defaults['author'] = '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />';		
		$fields['cookies'] = '';
		return $defaults;
	}	

	add_filter('comment_form_defaults', 'bebe_adminify_remove_comments_notes');
	function bebe_adminify_remove_comments_notes($defaults)
	{
		$defaults['comment_notes_before'] = '';
		return $defaults;
	}

	add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
	function kama_reorder_comment_fields( $fields ){
		// die(print_r( $fields )); // посмотрим какие поля есть

		$new_fields = array(); // сюда соберем поля в новом порядке

		$myorder = array('author','email','url','comment'); // нужный порядок

		foreach( $myorder as $key ){
			$new_fields[ $key ] = $fields[ $key ];
			unset( $fields[ $key ] );
		}

		// если остались еще какие-то поля добавим их в конец
		if( $fields )
			foreach( $fields as $key => $val )
				$new_fields[ $key ] = $val;

		return $new_fields;
	}



		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' ) ? ' <span class="required">*</span>' : '';
		$aria_req = $req ? " aria-required='true'" : '';
		$html_req = $req ? " required='required'"  : '';

		$fields  = array(
			'email' => '<div class="col-4"><input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . '  placeholder="Type your email" /></div>',
			'url' => '<div class="col-4"><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"  placeholder="Type your website" /></div>',
			'author' => '<div class="col-4"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . '  placeholder="Type your name" /></div>',
			'cookies' => '',
		);

		add_filter( 'comment_form_logged_in', '__return_empty_string' );

		$args = array(
			'fields' => apply_filters('comment_form_default_fields', $fields),
			'label_submit' => __(''),
			'comment_field' => '<textarea name="subject" placeholder="Type your comment"></textarea>',
			'title_reply_before'   => '<div class="respond"><div class="top"> <h2>Respond</h2> </div>',
			

		);
		add_filter( 'comment_form_default_fields', 'bebe_comment_form_hide_cookies_consent' );
			function bebe_comment_form_hide_cookies_consent( $fields ) {
				 unset( $fields['cookies'] );
				return $fields;
			}





	

	comment_form($args);

	?>

			<!-- <div class="respond">
                <div class="top"> <h2>Respond</h2> </div>

                <form class="cf" method="post" id="respond-form">

                    <div class="col-4">
                        <input name="name" type="text" placeholder="Type your name"/>
                    </div>

                    <div class="col-4">
                        <input name="email" type="text" placeholder="Type your email"/>
                    </div>

                    <div class="col-4">
                        <input name="website" type="text" placeholder="Type your website"/>
                    </div>

                    <textarea name="subject" placeholder="Type your comment"></textarea>

                    <input class="submit" type="submit" value=""/>
                </form> -->

            </div>

</div><!-- #comments -->