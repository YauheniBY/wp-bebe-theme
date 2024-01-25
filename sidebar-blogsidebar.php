<?php 


if ( ! is_active_sidebar( 'blogsidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'blogsidebar' ); ?>
</aside><!-- #secondary -->