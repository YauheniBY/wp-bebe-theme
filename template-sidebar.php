<?php 
/**
* Template name: With sidebar template
*/
get_header();?>


<div class="content_box">
    <?php if($bebe_options['buttons'] != 2){?>
        <div class="blogsidebar">
            <?php get_sidebar('blogsidebar'); ?>
        </div>
    <?php } ?>
    
        <div class="our_content">
            <?php the_content(); ?>
        </div>
</div>




<?php get_footer(); ?>