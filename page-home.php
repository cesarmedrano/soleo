<?php

/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side.
 *
 */
get_header();
the_post();
// Declare the variables to use
$title_header = get_field("title_header");
$short_description = get_field("short_description");
$header_action = get_field("header_action");
$header_main_image = get_field("header_main_image");
$title_benefits = get_field("title_benefits");
$description_benefits = get_field("description_benefits");
$title_header = get_field("title_header");
$title_header = get_field("title_header");
$title_header = get_field("title_header");

?>
<div class="bg-light bg-gradient">
	<div class="container">
		<div class="row d-flex align-items-center">
			<div class="col-md-6 p-5">
				<h1><?php echo $title_header; ?></h1>
				<p><?php echo $short_description; ?></p>
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
			<div class="col-md-6 p-5 pb-0 d-flex align-items-end">
				<div class="col-9 col-md-8 mx-auto">
					<?php
					if (!empty($header_main_image)) : ?>
						<img src="<?php echo esc_url($header_main_image['url']); ?>" alt="<?php echo esc_attr($header_main_image['alt']); ?>" class="w-100 mb-0" />
					<?php endif; ?>
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
			<div class="col-md-10 mx-auto p-5">
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
								<div class="p-2 mb-3 d-flex flex-row mb-3">
									<div class="p-2">
										<?php
										if (!empty($image)) : ?>
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="" />
										<?php endif; ?>
									</div>
									<div class="p-2">
										<p class="fw-semibold"><?php echo $title; ?></p>
										<p><?php echo $description; ?></p>
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
