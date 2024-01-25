<?php get_header(); ?>


 <!-- Gallery -->
 <article class="gallery">
    <div class="items1 cf">
    <?php global $query_string;

    query_posts($query_string.'&posts_per_page=10'); 
    
    $i = 0; while ( have_posts() ) : the_post(); $i++;

        if( $i == 1 or $i == 6){ ?>
            <a href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(),'bebe-gallery-one'); ?> </a>
        <?php } else if( $i == 2 or $i == 5 or $i == 7 or $i == 10){ ?>
            <a href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(),'bebe-gallery-two'); ?> </a>
        <?php } else if($i == 3 or $i == 4 or $i == 8 or $i == 9){ ?>
            <a href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(),'bebe-gallery-three'); ?> </a>
        <?php }

        if( $i == 5){ ?>

        </div>
        <div class="items2 cf">

        <?php }?>
        <!-- </li> -->

        <?php endwhile;
        wp_reset_postdata();    
        ?>
    </div>
</article>

<!-- Pagination -->
<article class="pagination gall">
    <?php  $pagination_args = array( 'prev_next' => false,);
    echo paginate_links($pagination_args); ?>
</article>



<?php get_footer(); ?>