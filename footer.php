<?php

?>
</section>

  <!-- Footer Section -->
  <footer>
  <?php global $bebe_options; ?>

<section>
	<div class="center-align cf">

		<!-- Some Info  -->
		<div class="col-6 float-left">
			<div class="col-5 information">
				<h3>Information</h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer',
						'menu_id'        => 'footer-menu',
						'menu_class'     => 'ul-drop',
						// 'container'     => 'ul',
					)
				);
				?> 
			</div>
			<div class="col-7 contacts">
				<h3>Contacts</h3>
				<?php if(($bebe_options['bebephone'])){ ?><span class="tel"><strong><?php echo esc_html($bebe_options['bebephone']); ?></strong></span><?php } ?>
				<?php if(($bebe_options['bebeemail'])){ ?><span><a href="mailto:<?php echo ($bebe_options['bebeemail']); ?>"><?php echo esc_html($bebe_options['bebeemail']); ?></a></span><?php } ?>
				<?php if(($bebe_options['bebeaddress'])){ ?><span><?php echo esc_html($bebe_options['bebeaddress']); ?></span><?php } ?>
				<ul>
					<?php if(($bebe_options['face'])){ ?><li class="facebook"><a href="<?php echo esc_url($bebe_options['face']); ?>"></a></li> <?php } ?>
					<?php if(($bebe_options['inst'])){ ?><li class="instagram"><a href="<?php echo esc_url($bebe_options['inst']); ?>"></a></li><?php } ?>
					<?php if(($bebe_options['pint'])){ ?><li class="pinterest"><a href="<?php echo esc_url($bebe_options['pint']); ?>"></a></li><?php } ?>
					<?php if(($bebe_options['twit'])){ ?><li class="twitter"><a href="<?php echo esc_url($bebe_options['twit']); ?>"></a></li><?php } ?>
					<?php if(($bebe_options['yout'])){ ?><li class="youtube"><a href="<?php echo esc_url($bebe_options['yout']); ?>"></a></li><?php } ?>
                </ul>
			</div>
		</div>

		<!-- Form -->
		<div class="form float-right">
		<?php if(($bebe_options['bebefooterform'])){ 
					echo do_shortcode($bebe_options['bebefooterform']); 
				} ?>				
		</div>

	</div>

	<!-- Bottom Line -->
	<div class="bottom-line">
		<a class="top" href="#top">TOP</a>

		<div class="center-align cf">
			<div class="left">&copy; <?php echo date('Y').' '.$bebe_options['bebes_copyrights']; ?></div>
			<div class="right">
			<?php if(($bebe_options['bebe_footer_logo']['url'])){ ?>
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo esc_attr($bebe_options['bebe_footer_logo']['url']); ?>" alt="">
				</a>
			<?php } ?>
			</div>
		</div>
	</div>

</section>


<!-- Background Awesomeness -->
<div id="footer-white"></div>
<div id="footer-yellow"></div>

<!-- Clouds -->
<div id="footer-cloud1"></div>
<div id="footer-cloud2"></div>

<!-- Birds -->
<div id="footer-bird1"></div>
<div id="footer-bird2"></div>
<div id="footer-bird3"></div>

<!-- Waves -->
<div class="waves">
	<div id="footer-wave1"></div>
	<div id="bui"></div>
	<div id="footer-wave2"></div>
</div>
</footer>



<?php wp_footer(); ?>

</body>
</html>
