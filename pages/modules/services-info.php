<?php
wp_enqueue_script('theme-eva-skin-and-soul-services-info', get_template_directory_uri() . '/js/modules/services_info.js', array('theme-eva-skin-and-soul-gsap'), _S_VERSION, true);

// ACF Variables
$services_heading = get_field('services_heading');

// Services post type query
$services_query = new WP_Query(
	array(
		'post_type' => 'service',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'order' => 'ASC', 
		'orderby'=> 'date', 
	)
);
?>

<section class="section-services-info">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-services-info__content-wrapper">
				<?php
					if(isset($services_heading) && !empty($services_heading)):
						echo wp_kses_post($services_heading);
					endif;
				?>
				</div>
			</div>
		</div>
		<?php
			if($services_query->have_posts()):
				?>
				<div class="row" style="position: relative;">
					<?php
						while($services_query->have_posts()):
							$services_query->the_post();
							$services_thumbnail_image_url = get_the_post_thumbnail_url(get_the_ID(), 'services_thumbnail_image');
							?>
							<div class="col-12">
								<div class="section-services-info__item">
									<a href="#" data-image="<?php echo esc_attr($services_thumbnail_image_url); ?>">
										<h3><?php echo the_title(); ?></h3>
									</a>
								</div>
							</div>
							<?php
						endwhile;
					?>
					<div class="section-services-info__img-wrap">
						<div class="section-services-info__img"></div>
					</div>
				</div>
				<?php
			endif;
			wp_reset_postdata();
		?>
	</div>
</section>
