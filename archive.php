<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bebe
 */

get_header();
?>

 <!-- Caption -->
 
        <!-- Blog -->
	<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
			
        <article class="blog">
            <div class="items cf">
			
				<?php 
				/* Start the Loop */
				while ( have_posts() ) :
					the_post(); ?>
						<div class="col-3">
							<a href="<?php echo get_permalink(); ?>">
							<?php echo get_the_post_thumbnail(get_the_ID(),'bebe-post-single'); ?>							
							</a>
							<div class="info cf">
								<div class="time"><?php echo the_date(); ?></div>
								<a href="<?php echo get_permalink(); ?>" class="comments"><?php echo comments_number(); ?></a>
							</div>
							<div class="text">
								<a href="<?php echo get_permalink(); ?>" class="caption"><?php echo the_title(); ?></a>
								<?php echo the_excerpt(); ?>
							</div>
							<div class="wave"></div>
						</div>
					<?php

				endwhile;
			?>
			</div>
        </article>
		
		<!-- Pagination -->

		<article class="pagination">

				<?php 
				$pagination_args = array(
					'prev_next' => false,
				);
				echo paginate_links($pagination_args);
				?>
				<!-- Pagination -->
				<!-- <article class="pagination">
					<a class="active" href="">1</a>
					<a href="">2</a>
					<a href="">3</a>
					<a href="">4</a>
					<a href="">5</a> -->
		</article>
	<?php	

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>   
	</main><!-- #main -->

<?php
wp_reset_query();
get_footer();
