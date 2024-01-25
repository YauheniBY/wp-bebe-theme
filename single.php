<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bebe
 */

get_header();
?>

 <!-- Caption -->
 

        <!-- Blog Single -->
        <article class="blog-single">

		<?php while ( have_posts() ) : the_post(); ?>
            
            <div class="img">
                <div class="img-bord">
				<?php echo get_the_post_thumbnail(get_the_ID(),'bebe-post-single'); ?>
                </div>
                <div class="info cf">
                    <span class="time"><?php echo get_the_date(); ?></span>
                    <span class="comments"><?php echo comments_number(); ?></span>
                    <span class="by" style="background-image: url(<?php echo (get_template_directory_uri() . '/layouts/images/admin.png'); ?>);"><?php echo get_the_author_meta( 'display_name' ); ?></span>
                </div>
                <div class="wave"></div>
            </div>



				<?php echo get_the_content(); ?>


            <!-- -->
            <div class="dotted-line first"></div>

            <div class="category cf">
                <h4 class="categ">Category: <?php the_category(', '); ?> / <?php the_tags(); ?></h4>
                <div class="share">
                    <h4>Share:  </h4>
                    <ul>
                        <li class="facebook"><a onclick="window.open(this.href, 'Share on Facebook', 'width=300, height=300' ); return false" href="<?php echo bebe_get_share('fb', get_the_permalink(), get_the_title()); ?>"></a></li>
                        <li class="pinterest"><a onclick="window.open(this.href, 'Share on Pinterest', 'width=300, height=300' ); return false" href="<?php echo bebe_get_share('pin', get_the_permalink(), get_the_title()); ?>"></a></li>
                        <li class="twitter"><a onclick="window.open(this.href, 'Share on X', 'width=300, height=300' ); return false" href="<?php echo bebe_get_share('twi', get_the_permalink(), get_the_title()); ?>"></a></li>
                    </ul>
                </div>
            </div>

		<?php endwhile; ?>

            <!-- Comments -->

			<?php comments_template(); ?>


        </article>

	

<?php
get_footer();
