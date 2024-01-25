<?php 
/**
* Template name: Contacts page template
*/

get_header();
?>
<?php  while ( have_posts() ) : the_post(); ?>
 <!-- Contacts -->
 <article class="contacts">

<div class="info-line cf">
    <div class="map">
        <?php echo do_shortcode('[simpleMapNoApi]');?>
    </div>

    <?php the_content(); ?>

    <div class="contactos">
    <?php if(get_post_meta(get_the_ID(), 'bebe_address',true)){ ?>
        <div class="adress">
            <div class="icon"></div>
            <h3><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_address_label',true)); ?></h3>
            <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_address',true));?></p>
        </div>
        <?php } ?>
        <?php if(get_post_meta(get_the_ID(), 'bebe_phone',true)){ ?>
        <div class="phone">
            <div class="icon"></div>
            <h3><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_phone_label',true)); ?></h3>
            <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_phone',true));?></p>
        </div>
        <?php } ?>
        <?php if(get_post_meta(get_the_ID(), 'bebe_email',true)){ ?>
        <div class="email">
            <div class="icon"></div>
            <h3><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_email_label',true)); ?></h3>
            <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_email',true));?></p>
        </div>
        <?php } ?>
    </div>


</div>

<!-- -->
<?php 

    if(get_post_meta(get_the_ID(), 'bebe_contactform_shortcode',true)){
        $contactform_shortcode = get_post_meta(get_the_ID(), 'bebe_contactform_shortcode',true);    
?>

<div class="respond">
    <div class="top"> <h2>Get in touch with us</h2> </div>

    <form class="cf" method="post" id="respond-form">
        <?php echo do_shortcode($contactform_shortcode); ?>
    </form>

</div>
<?php } ?>

</article>

<?php
endwhile;
get_footer();
?>