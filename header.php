<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Base_Theme
 */

// ACF Variables
$theme_options_logo_default = get_field('theme_options_logo_default', 'option');
$theme_options_socials = get_field('theme_options_socials', 'option');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'theme-eva-skin-and-soul' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-6 col-lg-1">
					<div class="site-branding">
						<?php
							if (isset($theme_options_logo_default) && !empty($theme_options_logo_default)):
								?>
								<a href="<?php echo esc_url(home_url()); ?>" target="_self">
								<?php
									echo wp_get_attachment_image( 
										$theme_options_logo_default, 
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
					</div><!-- .site-branding -->
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-11">
					<div class="navigation-socials-wrapper">
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav><!-- #site-navigation -->
						<?php
							if(isset($theme_options_socials) && is_array($theme_options_socials) && count($theme_options_socials) > 0):
								?>
									<div class="socials-wrapper">
										<?php
											foreach($theme_options_socials as $social):
												$social_url = $social['theme_option_social_link']['url'];
												$social_target = $social['theme_option_social_link']['target'] ? $social['theme_option_social_link']['target'] : '_self';
												?>
													<a href="<?php echo esc_url($social_url);?>" target="<?php echo esc_attr( $social_target ); ?>" class="social-icon"><i class="<?php echo esc_attr( $social['theme_options_fontawesome_icon'] ); ?>"></i></a>
												<?php
											endforeach;
										?>
									</div>
								<?php
							endif;
						?>
					</div>
				</div>
			</div>
		</div>

	</header><!-- #masthead -->
