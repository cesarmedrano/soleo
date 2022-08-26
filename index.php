<?php

/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

get_header();
$page_id = get_option('page_for_posts');
if (have_posts()) :
	while (have_posts()) :
		the_post();
		// Declare the variables to use
		$title_header = get_field("title_header");
		$short_description = get_field("short_description");
		$title_header = get_field("title_header");
		$title_header = get_field("title_header");
		$title_header = get_field("title_header");
		$title_header = get_field("title_header");
		$title_header = get_field("title_header");
		$title_header = get_field("title_header");
		$title_header = get_field("title_header");
	endwhile;
endif;
wp_reset_postdata();
?>
<div class="bg-light bg-gradient">
	<div class="container">
		<div class="row d-flex align-items-center">
			<div class="col-md-6 p-5">
				<h1><?php echo $title_header; ?></h1>
				<p><?php echo $short_description; ?></p>
				<a href="#" class="btn btn-primary">Let’s Talk</a>
			</div>
			<div class="col-md-6 p-5 pb-0 vh-100 d-flex align-items-end">
				<div class="p-5 bg-alert">Asistant</div>
			</div>
		</div>
	</div>
</div>
<div class="bg-white py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto text-center">
				<h2 class="mt-5">Get the Most Out of Your Marketing Dollars</h2>
				<p>Target the customers you want and get leads that convert. Performance marketing maximizes your marketing spend by focusing on high-intent inbound leads from qualified sources.</p>
			</div>
			<div class="col-md-10 mx-auto p-5">
				<div class="row">
					<div class="col-md-4">
						<div class="p-2 mb-3 d-flex flex-row mb-3">
							<div class="p-2">icono</div>
							<div class="p-2">
								<p class="fw-semibold">Only Pay for Performance</p>
								<p>Amplify your ROAS with the highest-converting form of leads – calls</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="p-2 mb-3 d-flex flex-row mb-3">
							<div class="p-2">icono</div>
							<div class="p-2">
								<p class="fw-semibold">Increase Your Profitability</p>
								<p>Innovative call management technology that increases the efficiency of your team & campaigns</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="p-2 mb-3 d-flex flex-row mb-3">
							<div class="p-2">icono</div>
							<div class="p-2">
								<p class="fw-semibold">Benefit from our Experience</p>
								<p>Our 20+ years in call management make Soleo a pioneer and trusted expert in pay-per-call</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-3 mx-auto">
						<a href="#" class="btn btn-light form-control">Learn more</a>
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
