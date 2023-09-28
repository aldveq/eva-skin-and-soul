<?php
// ACF Variables
$general_info_heading = get_field('general_info_heading');
$general_info_image_text_data = get_field('general_info_image_text_data');
?>

<section class="section-general-info">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-general-info__content-wrapper">
					<?php
						if(isset($general_info_heading) && !empty($general_info_heading)):
							echo wp_kses_post($general_info_heading);
						endif;
					?>
				</div>
			</div>
		</div>
		<?php
			if(isset($general_info_image_text_data) && is_array($general_info_image_text_data) && count($general_info_image_text_data) > 0):
				foreach ($general_info_image_text_data as $i_text_data):
				?>
					<div class="row">
						<?php
							if(!$i_text_data['reversed_layout']):
							?>
							<div class="col-12 col-md-6 col-lg-5">
								<?php
									echo wp_get_attachment_image( 
										$i_text_data['image'], 
										'general_info_image', 
										false, 
										array(
											'class' => 'image',
											'loading' => 'lazy'
										)
									);
								?>
							</div>
							<div class="col-12 col-md-6 col-lg-7">
								<div class="section-general-info__content-item">
								<?php
									if(!empty($i_text_data['title'])):
									?>
										<h3><?php echo esc_html($i_text_data['title']);?></h3>
									<?php
									endif;

									if(!empty($i_text_data['description'])):
										echo wp_kses_post($i_text_data['description']);
									endif;

									if(!empty($i_text_data['cta'])):
										$i_text_data_link_target = $i_text_data['cta']['target'] ? $i_text_data['cta']['target'] : '_self';
										?>
										<a href="<?php echo esc_url($i_text_data['cta']['url']); ?>" target="<?php echo esc_attr($i_text_data_link_target); ?>" class="btn btn-primary"><?php echo esc_html($i_text_data['cta']['title']); ?></a>											
										<?php
									endif;
								?>
								</div>
							</div>
							<?php
							else:
							?>
							<div class="col-12 col-md-6 col-lg-7">
								<div class="section-general-info__content-item reversed">
								<?php
									if(!empty($i_text_data['title'])):
									?>
										<h3><?php echo esc_html($i_text_data['title']);?></h3>
									<?php
									endif;

									if(!empty($i_text_data['description'])):
										echo wp_kses_post($i_text_data['description']);
									endif;

									if(!empty($i_text_data['cta'])):
										$i_text_data_link_target = $i_text_data['cta']['target'] ? $i_text_data['cta']['target'] : '_self';
										?>
										<a href="<?php echo esc_url($i_text_data['cta']['url']); ?>" target="<?php echo esc_attr($i_text_data_link_target); ?>" class="btn btn-primary"><?php echo esc_html($i_text_data['cta']['title']); ?></a>											
										<?php
									endif;
								?>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-5">
								<?php
									echo wp_get_attachment_image( 
										$i_text_data['image'], 
										'general_info_image', 
										false, 
										array(
											'class' => 'image reversed',
											'loading' => 'lazy'
										)
									);
								?>
							</div>
							<?php
							endif;
						?>
					</div>					
				<?php
				endforeach;
			endif;
		?>
	</div>
</section>