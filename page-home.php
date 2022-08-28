<?php

/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side.
 *
 */
get_header();
the_post();
// declare the variables to use
$title_header = get_field("title_header");
$short_description = get_field("short_description");
$header_action = get_field("header_action");
$header_main_image = get_field("header_main_image");
$title_benefits = get_field("title_benefits");
$description_benefits = get_field("description_benefits");
// delivered call variables
$delivered_call_image = get_field("delivered_call_image");
$delivered_call_percent_image = get_field("delivered_call_percent_image");
$delivered_call_title = get_field("delivered_call_title");
$delivered_call_value = get_field("delivered_call_value");
$delivered_call_percent = get_field_object("delivered_call_percent");
// conversion rate variables
$conversion_rate_image = get_field("conversion_rate_image");
$conversion_rate_percent_image = get_field("conversion_rate_percent_image");
$conversion_rate_title = get_field("conversion_rate_title");
$conversion_rate_value = get_field_object("conversion_rate_value");
$conversion_rate_percent = get_field_object("conversion_rate_percent");
// new sales
$new_sales_image = get_field("new_sales_image");
// end new sales
// background image
$header_background_image = get_field("header_background_image");
// end background image

?>
<div class="bg-cover">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-10 mx-auto">
				<div class="row d-flex align-items-center">
					<div class="col-md-6 py-5">
						<h1><?php echo $title_header; ?></h1>
						<p class="text-muted"><?php echo $short_description; ?></p>
						<?php
						// Check rows exists to header action.
						if (have_rows('header_action')) :

							// Loop through rows.
							while (have_rows('header_action')) : the_row();

								// Load sub field value.
								$value = get_sub_field('value');
								$link = get_sub_field('link');
								$css_class = get_sub_field('css_class');

								echo '<a href="' . $link . '" class="' . $css_class . '">' . $value . '</a>';

							// Do something...

							// End loop.
							endwhile;

						// No value.
						else :
						// Do something...
						endif;
						?>
					</div>
					<div class="col-md-6 px-2 pt-5 d-flex align-items-end">
						<div class="col-11 col-md-10 mx-auto position-relative">
							<div id="delivered-call" class="p-3 rounded bg-white shadow-lg position-absolute" style="width: 276px;">
								<div class="d-flex justify-content-start">
									<div class="bg-primary p-3 rounded position-relative" style="width: 80px; height: 80px;">
										<?php
										if (!empty($delivered_call_image)) : ?>
											<img src="<?php echo esc_url($delivered_call_image['url']); ?>" alt="<?php echo esc_attr($delivered_call_image['alt']); ?>" class="position-absolute top-50 start-50 translate-middle" style="width: 27px; height: 27px" />
										<?php endif; ?>
									</div>
									<div class="delivered-call-content px-3">
										<p class="mb-0 lh-1 text-uppercase"><small><?php echo $delivered_call_title; ?></small></p>
										<p class="fw-semibold fs-3 mb-0 lh-base"><?php echo $delivered_call_value; ?></p>
										<div class="d-flex justify-content-start">
											<?php
											if (!empty($delivered_call_percent_image)) : ?>
												<img src="<?php echo esc_url($delivered_call_percent_image['url']); ?>" alt="<?php echo esc_attr($delivered_call_percent_image['alt']); ?>" class="mb-0" />
											<?php endif; ?>
											<p class="mb-0 lh-1 px-1"><?php echo $delivered_call_percent["value"] . $delivered_call_percent["append"]; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div id="conversion-rate-call" class="p-3 rounded bg-white shadow-lg position-absolute d-flex align-items-center">
								<div class="d-flex justify-content-start">
									<div class="bg-secondary p-3 rounded position-relative" style="width: 80px; height: 80px;">
										<?php
										if (!empty($conversion_rate_image)) : ?>
											<img src="<?php echo esc_url($conversion_rate_image['url']); ?>" alt="<?php echo esc_attr($conversion_rate_image['alt']); ?>" class="position-absolute top-50 start-50 translate-middle" style="width: 27px; height: 27px" />
										<?php endif; ?>
									</div>
									<div class="delivered-call-content px-3">
										<p class="mb-0 lh-1 text-uppercase"><small><?php echo $conversion_rate_title; ?></small></p>
										<p class="fw-semibold fs-3 mb-0 lh-base"><?php echo $conversion_rate_value["value"] . $conversion_rate_value["append"]; ?></p>
										<div class="d-flex justify-content-start">
											<?php
											if (!empty($conversion_rate_percent_image)) : ?>
												<img src="<?php echo esc_url($conversion_rate_percent_image['url']); ?>" alt="<?php echo esc_attr($conversion_rate_percent_image['alt']); ?>" class="mb-0" />
											<?php endif; ?>
											<p class="mb-0 lh-1 px-1"><?php echo $conversion_rate_percent["value"] . $conversion_rate_percent["append"]; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div id="header_main_image" class="position-relative">
								<?php
								if (!empty($header_main_image)) : ?>
									<img src="<?php echo esc_url($header_main_image['url']); ?>" alt="<?php echo esc_attr($header_main_image['alt']); ?>" class="w-100 mb-0" />
								<?php endif; ?>
							</div>
							<div id="new-sales" class="position-absolute shadow-lg rounded">
								<?php
								if (!empty($new_sales_image)) : ?>
									<img src="<?php echo esc_url($new_sales_image['url']); ?>" alt="<?php echo esc_attr($new_sales_image['alt']); ?>" class="w-100 mb-0" />
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bg-white py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto text-center">
				<h2 class="mt-5"><?php echo $title_benefits; ?></h2>
				<p><?php echo $description_benefits; ?></p>
			</div>
			<div class="col-md-12 col-lg-10 mx-auto p-5">
				<div class="row">
					<?php
					// Check rows exists to benefits repeater.
					if (have_rows('benefits_repeater')) :

						// Loop through rows.
						while (have_rows('benefits_repeater')) : the_row();

							// Load sub field value.
							$image = get_sub_field('image');
							$title = get_sub_field('title');
							$description = get_sub_field('description');
					?>
							<div class="col-md-4">
								<div class="p-2 mb-3 d-flex flex-row mb-3 benefits">
									<div class="p-2">
										<?php
										if (!empty($image)) : ?>
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="" />
										<?php endif; ?>
									</div>
									<div class="p-2">
										<p class="fw-semibold"><?php echo $title; ?></p>
										<p class="text-muted"><?php echo $description; ?></p>
									</div>
								</div>
							</div>
					<?php

						// Do something...

						// End loop.
						endwhile;

					// No value.
					else :
					// Do something...
					endif;
					?>
				</div>
				<div class="row">
					<div class="d-flex justify-content-center">
						<?php
						// Check rows exists to benefits action repeater.
						if (have_rows('benefits_action')) :

							// Loop through rows.
							while (have_rows('benefits_action')) : the_row();

								// Load sub field value.
								$value = get_sub_field('value');
								$link = get_sub_field('link');
								$css_class = get_sub_field('css_class');
						?>
								<a href="<?php echo $link; ?>" class="<?php echo $css_class; ?>"><?php echo $value; ?></a>
						<?php

							// Do something...

							// End loop.
							endwhile;

						// No value.
						else :
						// Do something...
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
			echo apply_filters('the_content', get_post_field('post_content', $page_id));

			edit_post_link(__('Edit', 'createape'), '<span class="edit-link">', '</span>', $page_id);
			?>
		</div><!-- /.col -->
		<div class="col-md-12">
			<?php
			get_template_part('archive', 'loop');
			?>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
<?php
get_footer();
