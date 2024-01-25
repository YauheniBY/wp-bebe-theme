<?php

get_header();
?>

 <!-- Caption -->
 
        <!-- Blog -->
	<main id="primary" class="site-main">
  

    <?php 

    $all_rooms = wp_count_posts('rooms')->publish;
    if ( $all_rooms ) { 

        if($bebe_options['rooms_per_page']){

            $rooms_per_page = $bebe_options['rooms_per_page'];

            if($all_rooms < $rooms_per_page ||  $rooms_per_page < 0){
                $rooms_per_page =  $all_rooms;
            }


        } else {
            $rooms_per_page = $all_rooms;
        }
            
        

        if($rooms_per_page ==  $all_rooms){
            $args_for_wp_query = array(
                'post_type' => 'rooms',
                'posts_per_page' => -1, 
            );

        } else {
            $args_for_wp_query = array(
                'post_type' => 'rooms',
                'posts_per_page' => $rooms_per_page,
                'orderby' => 'date', 
                'order' => 'DESC', 
            );
        }

    

        $rooms = new WP_Query( $args_for_wp_query);
        ?>
            <article class="rooms">
                <?php echo  $rooms_per_page; ?>
                <div class="line cf">
        <!-- -->
                    <?php 
                    $i = 0;
                    
                    /* Start the Loop */
                    while ( $rooms->have_posts() ) :$rooms->the_post(); $i++;?>

                    <div class="col-6">
                        <div class="col-6 text">
                            <h3><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                            <?php echo the_excerpt(); ?>
                            <a class="more" href="<?php echo get_permalink(); ?>">More ></a>
                        </div>
                        <div class="col-6 img">
                        <?php echo get_the_post_thumbnail(get_the_ID(),'bebe-rooms'); ?>	
                        </div>
                    </div>


            <?php
            if (!($i % 2) && ($i < $rooms_per_page)){ ?>
                </div>
                <div class="line cf">
            <?php }?>   
                <?php endwhile; ?>
                </div>
            </article>
            
            <!-- Pagination -->

            <article class="pagination">
                    <?php  $pagination_args = array( 'prev_next' => false,);
                    echo paginate_links($pagination_args); ?>
            </article> 
        <?php
    }	

    else {

        get_template_part( 'template-parts/content', 'none' );

    };
    ?>  
    
	</main><!-- #main -->

<?php
wp_reset_query();
get_footer();
