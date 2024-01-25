<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


<!-- Gallery -->
<article class="gallery-opened">

<!-- Slider -->
<?php 
        $gallery_slides = get_post_meta(get_the_ID(), 'ale_gallery_id', true);
        if($gallery_slides){                   
    ?>
<div id="gallery-slider">
    <ul class="slides">
        <?php foreach($gallery_slides as $slide){  ?>
        <li>
        <?php 
            echo wp_get_attachment_image( $slide, 'full');
        ?>
        </li>
        <?php } ?>
    </ul>
</div>
<?php } ?>

<!-- Comments -->
<h2 class="title"><?php the_title(); ?></h2>
<?php the_content(); ?>
<!-- -->
<div class="dotted-line"></div>

<!-- -->
<div class="info cf">
    <h4 class="categ">Date: <?php echo get_the_date(); ?> / Category: 
    <?php $gallery_cats = get_the_terms(get_the_ID(), 'gallery-category');
    foreach($gallery_cats as $category){
        echo $category->name.' ';
    } ?>
    </h4>
    <div class="share">
        <h4>Share:  </h4>
        <ul>
            <?php if(($bebe_options['face'])){ ?><li class="facebook"><a href="<?php echo esc_url($bebe_options['face']); ?>"></a></li> <?php } ?>
            <?php if(($bebe_options['pint'])){ ?><li class="pinterest"><a href="<?php echo esc_url($bebe_options['pint']); ?>"></a></li><?php } ?>
            <?php if(($bebe_options['twit'])){ ?><li class="twitter"><a href="<?php echo esc_url($bebe_options['twit']); ?>"></a></li><?php } ?>
        </ul>
    </div>
</div>

</article>

<?php endwhile; ?>

<?php get_footer(); ?>