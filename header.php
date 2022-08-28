<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<?php
$navbar_scheme   = get_theme_mod('navbar_scheme', 'navbar-light bg-light'); // Get custom meta-value.
$navbar_position = get_theme_mod('navbar_position', 'static'); // Get custom meta-value.

$search_enabled  = get_theme_mod('search_enabled', '1'); // Get custom meta-value.
$header_site_icon = get_site_icon_url('site-icon'); // Get custom site icon meta-value.
$header_logo = get_theme_mod('header_logo'); // Get custom header logo meta-value.
?>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<a href="#main" class="visually-hidden-focusable"><?php esc_html_e('Skip to main content', 'createape'); ?></a>

	<div id="wrapper">
		<!-- offcanvas  -->
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCreateApe" aria-labelledby="CreateApe_theme">
			<div class="offcanvas-header pt-5 pb-0">
				<h5 class="offcanvas-title mb-0 inline-block text-center" id="offcanvasCreateApe"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<div>
					<p class="text-center"><?php echo esc_attr(get_bloginfo('description', 'display')); ?></p>
				</div>
				<div class="mobile-navigation">
					<?php
					// Loading WordPress Custom Menu (theme_location).
					wp_nav_menu(
						array(
							'theme_location' => 'mobile-menu',
							'container'      => '',
							'menu_class'     => 'nav flex-column text-center',
							'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
							'walker'         => new WP_Bootstrap_Navwalker(),
						)
					);
					?>
				</div>
			</div>
		</div>
		<!-- end offcanvas  -->
		<!-- header  -->
		<header class="bg-white <?php echo esc_attr($navbar_scheme);
								if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' fixed-top';
								elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' fixed-bottom';
								endif;
								if (is_home() || is_front_page()) : echo ' home';
								endif; ?>">
			<div class="container">
				<!-- Navbar-->
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container-fluid justify-content-between">
						<!-- left elements -->
						<a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
							<?php
							if (!empty($header_logo)) :
							?>
								<img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="d-none d-lg-block" />
								<img src="<?php echo esc_url($header_site_icon); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="d-block d-lg-none" />
							<?php
							else :
								echo esc_attr(get_bloginfo('name', 'display'));
							endif;
							?>
						</a>
						<!-- left elements -->
						<!-- center elements -->
						<div class="d-flex justify-content-center d-none d-lg-block">
							<?php
							// Loading WordPress Custom Menu (theme_location).
							wp_nav_menu(
								array(
									'theme_location' => 'main-menu',
									'container'      => '',
									'menu_class'     => 'navbar-nav',
									'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
									'walker'         => new WP_Bootstrap_Navwalker(),
								)
							);
							?>
						</div>
						<!-- center elements -->
						<!-- right elements -->
						<div class="d-flex justify-content-end">
							<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCreateApe" aria-controls="offcanvasCreateApe" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="d-none d-lg-block">
								<ul class="navbar-nav  h-100">
									<li class="nav-item d-flex align-items-center">
										<a href="#" class="p-2">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#2F3037" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M20.9999 20.9999L16.6499 16.6499" stroke="#2F3037" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											</svg>
										</a>
									</li>
								</ul>
							</div>
							<div class="d-none d-lg-block d-flex justify-content-center">
								<?php
								// Loading WordPress Custom Menu (theme_location).
								wp_nav_menu(
									array(
										'theme_location' => 'right-menu',
										'container'      => '',
										'menu_class'     => 'navbar-nav',
										'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
										'walker'         => new WP_Bootstrap_Navwalker(),
									)
								);
								?>
							</div>
						</div>
						<!-- right elements -->
					</div>
				</nav>
			</div>
		</header>
		<!-- end header  -->
		<main id="main mt-0" <?php if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' style="padding-top: 70px;"';
								elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' style="padding-bottom: 70px;"';
								endif; ?>>