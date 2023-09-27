<?php
// Home Hero Variables
$hero_image = get_field('hero_image');
$hero_title = get_field('hero_title');
$hero_description = get_field('hero_description');
$hero_cta = get_field('hero_cta');
?>

<section class="section-home-hero">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="section-home-hero__content-wrapper">
					<?php
						if(isset($hero_title) && !empty($hero_title)):
						?>
						<h1 class="title"><?php echo esc_html($hero_title);?></h1>
						<?php
						endif;

						if(isset($hero_description) && !empty($hero_description)):
							echo wp_kses_post($hero_description);
						endif;

						if(isset($hero_cta) && is_array($hero_cta) && count($hero_cta) > 0):
						$hero_cta_target = $hero_cta['target'] ? $hero_cta['target'] : '_self';
						?>
				  		<a href="<?php echo esc_url($hero_cta['url']); ?>" class="btn btn-primary" target="<?php echo esc_attr($hero_cta_target); ?>"><?php echo esc_html($hero_cta['title']); ?></a>
						<?php
						endif;
					?>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<?php
					if(isset($hero_image) && !empty($hero_image)):
						echo wp_get_attachment_image( 
							$hero_image, 
							'hero_image', 
							false, 
							array(
								'class' => 'section-home-hero__img',
								'loading' => 'lazy'
							)
						);
					endif;
				?>
			</div>
		</div>
	</div>
</section>
