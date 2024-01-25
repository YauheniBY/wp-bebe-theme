<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<article class="rooms-opened cf">
<?php 
                $room_slides = get_post_meta(get_the_ID(), 'ale_gallery_id', true);
                if($room_slides){                   
            ?>
            <div id="room-slider">
                <ul class="slides">
                <?php foreach($room_slides as $slide){  ?>
                    <li>
                    <?php 
                        echo wp_get_attachment_image( $slide, 'bebe-rooms-slider');
                    ?>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <?php 
            }
            the_content(); ?>
        </article>
          

<?php endwhile; ?>

 <!-- Other Rooms -->
 <article class="rooms opened">

<h2 class="title">Other Rooms</h2>
<?php 
$args = array(
    'post_type' => 'rooms',
    'posts_per_page' => 2,
    'orderby' => 'rand',    
);
$similar_rooms = new WP_Query($args);
 ?>

<div class="line cf">
    <?php 
    if($similar_rooms->have_posts()){
    ?>
    <?php while ( $similar_rooms->have_posts() ) : $similar_rooms->the_post();?>
    <div class="col-6">        
        <div class="col-6 text">
            <h3><a href="<?php the_permalink(); ?>"><?php echo esc_attr(get_the_title()); ?></a></h3>
            <p><?php echo esc_attr(get_the_excerpt()); ?></p>            
            <a class="more" href="<?php the_permalink(); ?>">More ></a>
        </div>
        <div class="col-6 img">
            <?php echo get_the_post_thumbnail(get_the_ID(),'bebe-room-photo'); ?>
        </div>        
    </div>
    <?php endwhile; ?>
    <?php } ?>
</div>

</article>


<?php get_footer(); ?>