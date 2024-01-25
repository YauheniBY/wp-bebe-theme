<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bebe
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>
    <!-- Background Awesomeness -->
    <div id="night"></div>

    <!-- Stars -->
    <div class="back" id="stars1"></div>
    <div class="back" id="stars2"></div>

    <!-- Clouds -->
    <div class="back" id="cloud1"></div>
    <div class="back" id="cloud2"></div>
    <div class="back" id="cloud3"></div>
    <div class="back" id="cloud4"></div>
    <div class="back" id="cloud5"></div>

    <!-- Header Section -->
    <header>	
		<?php global $bebe_options; ?>
        <div class="center-align cf">

            <!-- Logo -->
		<div class="logo float-left">
		<?php if(($bebe_options['bebe_logo']['url'])){ ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
				<img src="<?php echo esc_attr($bebe_options['bebe_logo']['url']); ?>" alt="">
			</a>
		<?php } ?>
            <span><?php echo esc_html($bebe_options['bebes_slogan']); ?></span>
		</div>
            

            <!-- Social & Search -->
            <div class="social float-right cf">
                <form id="search" method="get" action="<?php echo esc_url(home_url('/'));?>">
                    <input class="search-inp" type="text" name="s" size="21" maxlength="120" placeholder="Search">
                    <input class="search-btn" type="submit" value="">
                </form>
                <ul>
					<?php if(($bebe_options['face'])){ ?><li class="facebook"><a href="<?php echo esc_url($bebe_options['face']); ?>"></a></li> <?php } ?>
					<?php if(($bebe_options['inst'])){ ?><li class="instagram"><a href="<?php echo esc_url($bebe_options['inst']); ?>"></a></li><?php } ?>
					<?php if(($bebe_options['pint'])){ ?><li class="pinterest"><a href="<?php echo esc_url($bebe_options['pint']); ?>"></a></li><?php } ?>
					<?php if(($bebe_options['twit'])){ ?><li class="twitter"><a href="<?php echo esc_url($bebe_options['twit']); ?>"></a></li><?php } ?>
					<?php if(($bebe_options['yout'])){ ?><li class="youtube"><a href="<?php echo esc_url($bebe_options['yout']); ?>"></a></li><?php } ?>
                </ul>
            </div>

            <!-- Nav -->
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'cf',
						'container'     => 'nav',
					)
				);
			?>

            <!-- Drop Down -->
            <div class="drop-menu">
                <a>Menu</a>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'mobile-menu',
						'menu_class'     => 'ul-drop',
						'container'     => 'ul',
					)
				);
				?>               
            </div>

        </div>
    </header>

	<?php if(is_front_page()){ ?>

    <!-- Slider -->

	<?php 
	$slides ='';
	$slides  = $bebe_options['homepageslider'];
	if($slides){ ?>
					<div class="center-align">
						<div id="slider">
							<ul class="slides">
								<!-- -->

	<?php foreach($slides as $slide){?>

			
								<li>
									<div class="wood">
										<div class="text">
										<?php if($slide['title']){ ?><h2 class="caption"><?php echo esc_html($slide['title']); ?></h2><?php } ?>
											<p class="content">
											<?php if($slide['description']){ ?><?php echo esc_html($slide['description']); ?><?php } ?>
											</p>
											<?php if($slide['url']){ ?><a class="more" href="<?php echo esc_html($slide['url']); ?>"><?php esc_html_e('More','bebe'); ?> </a><?php } ?>
										</div>
									</div>
									<?php if($slide['thumb']){ ?><img src="<?php echo esc_url($slide['thumb']); ?>" alt="" /><?php } ?>
								</li>
				

	
		<?php } ?>
							</ul>
						</div>
					</div> 

	<?php } ?>
	<section id="content" class="center-align">
		
	
	<?php }else { ?>
		<section id="content" class="center-align">

	<!-- Caption -->
		<div class="title-page">
			<h2><?php 
					if(is_tag()){
						echo esc_html(single_tag_title('Tag Archive: '));
					} else if (is_search()){
						echo esc_html('Search result for: '.get_search_query());
					} else if (is_category()){
						echo esc_html(single_cat_title('Category: '));
					} else if (is_post_type_archive('rooms')){
						echo ('Our Rooms');
					} else if (is_author()){
					} else if (is_post_type_archive('gallery')){
						echo ('Our Gallery');
					} else if (is_author()){
						echo ('Search result for: '.get_the_author());
					} else if(is_archive()){
						if(is_day()){
							echo esc_html('The day: '. get_the_date('d M'));
						} else if (is_month()){
							echo esc_html('The month: '. get_the_date('M'));
						} else if (is_year()){
							echo esc_html('The year: '. get_the_date('Y'));
						}			

					} else {
						echo wp_title('');
					}
			 ?>
			 </h2>
			<div class="page">
			 <span class="home"></span> <?php echo get_breadcrumbs(); ?>
			</div>
		</div>

		<!-- -->
		<div class="dotted-line"></div>
	<?php } ?>

	