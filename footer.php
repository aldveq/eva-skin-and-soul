<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Base_Theme
 */

// ACF Variables
$theme_options_logo_white = get_field('theme_options_logo_white', 'option');
$theme_options_socials = get_field('theme_options_socials', 'option');
?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-footer__wrapper">
						<?php
							if (isset($theme_options_logo_white) && !empty($theme_options_logo_white)):
								?>
									<a href="<?php echo esc_url(home_url())?>" target="_self">
									<?php
									echo wp_get_attachment_image( 
										$theme_options_logo_white, 
										'logo_size', 
										false, 
										array(
											'class' => 'logo',
											'loading' => 'lazy'
										)
									);
									?>
									</a>
								<?php
							endif;
						?>

						<div class="site-footer__navigation-wrapper">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-menu',
									'menu_id'        => 'footer-menu',
								)
							);
						?>
						</div>

						<div class="site-footer__socials-wrapper">
							<ul>
								<?php
									if(isset($theme_options_socials) 
									&& is_array($theme_options_socials) 
									&& count($theme_options_socials) > 0):
										foreach ($theme_options_socials as $social):
											$social_url = $social['theme_option_social_link']['url'];
											$social_target = $social['theme_option_social_link']['target'] ? $social['theme_option_social_link']['target'] : '_self';
											?>
											<li><a href="<?php echo esc_url($social_url); ?>" target="<?php echo esc_attr($social_target); ?>"><i class="<?php echo esc_attr( $social['theme_options_fontawesome_icon'] ); ?>"></i></a></li>
											<?php
										endforeach;
									endif;
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
