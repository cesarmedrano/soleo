<?php
/**
 * CreateApe Child functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage CreateApe Child
 * @since CreateApe Child 1.0
 */
// Wp v4.7.1 and higher
add_filter(
    'wp_check_filetype_and_ext',
    function ($data, $file, $filename, $mimes) {
        $filetype = wp_check_filetype($filename, $mimes);
        return [
            'ext' => $filetype['ext'],
            'type' => $filetype['type'],
            'proper_filename' => $data['proper_filename'],
        ];
    },
    10,
    4
);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'fix_svg');

// add Pulpora copy, current year and site title shortcode
function site_copy()
{
    $year = date('Y');
    $copy = 'Copyright';
    $site_title = get_bloginfo('name');
    return $copy . '&nbsp;' . $year . '&nbsp;' . $site_title;
}
add_shortcode('site_copy', 'site_copy');
// end add Pulpora copy, current year and site title shortcode

// add roboto fonts
if (!function_exists('twentytwentytwo_get_font_face_styles')):
    /**
     * Get font face styles.
     * Called by functions twentytwentytwo_styles() and twentytwentytwo_editor_styles() above.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return string
     */
    function twentytwentytwo_get_font_face_styles()
    {
        return "
		/* latin-ext */
		@font-face {
		  font-family: 'Roboto';
		  font-style: italic;
		  font-weight: 400;
		  font-display: swap;
		  src: url(https://fonts.gstatic.com/s/roboto/v29/KFOkCnqEu92Fr1Mu51xGIzIXKMnyrYk.woff2) format('woff2');
		  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
		}
		/* latin */
		@font-face {
		  font-family: 'Roboto';
		  font-style: italic;
		  font-weight: 400;
		  font-display: swap;
		  src: url(https://fonts.gstatic.com/s/roboto/v29/KFOkCnqEu92Fr1Mu51xIIzIXKMny.woff2) format('woff2');
		  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
		}
		/* latin-ext */
		@font-face {
		  font-family: 'Roboto';
		  font-style: normal;
		  font-weight: 400;
		  font-display: swap;
		  src: url(https://fonts.gstatic.com/s/roboto/v29/KFOmCnqEu92Fr1Mu7GxKKTU1Kvnz.woff2) format('woff2');
		  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
		}
		/* latin */
		@font-face {
		  font-family: 'Roboto';
		  font-style: normal;
		  font-weight: 400;
		  font-display: swap;
		  src: url(https://fonts.gstatic.com/s/roboto/v29/KFOmCnqEu92Fr1Mu4mxKKTU1Kg.woff2) format('woff2');
		  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
		}
		";
    }
endif;

if (!function_exists('twentytwentytwo_preload_webfonts')):
    /**
     * Preloads the main web font to improve performance.
     *
     * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
     * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
     * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
     * at all.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return void
     */
    function twentytwentytwo_preload_webfonts()
    {
        ?>
		<link rel="preload" href="<?php echo esc_url(
      'https://fonts.gstatic.com/s/roboto/v29/KFOmCnqEu92Fr1Mu4mxKKTU1Kg.woff2'
  ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
    }
endif;

add_action('wp_head', 'twentytwentytwo_preload_webfonts');
// enqueue scripts and style
function pulpora_child_theme_enqueue_styles()
{
    $version_file = 0;
    // Custom CSS
    wp_enqueue_style(
        'custom style',
        get_stylesheet_directory_uri() . '/assets/css/app.css?'.$version_file
    );
    // Bootstrap CSS 5.2.0
    wp_enqueue_style(
        'bootstrap grid css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx'
    );
    // Animate CSS
    wp_enqueue_style(
        'animate',
        'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'
    );
    // WOW JS Library
    wp_enqueue_script(
        'wow',
        'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js',
        [],
        '1.0',
        true
    );
    // Custom script
    wp_enqueue_script(
        'script',
        get_stylesheet_directory_uri() . '/assets/js/script.js?'.$version_file,
        [],
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'pulpora_child_theme_enqueue_styles');
// end enqueue scripts and style
// add style and scripts to admin
function admin_style()
{
    wp_enqueue_style(
        'admin-styles',
        get_stylesheet_directory_uri() . '/assets/css/admin.css?v=4'
    );
}
add_action('admin_enqueue_scripts', 'admin_style');
// end style and scripts to admin
//  remove category from archive page title
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    }

    return $title;
});
//  end remove category from archive page title
// personalizar frase Gracias por crear con WordPress
function modify_footer_admin_message($message)
{
    $message =
        'Proyecto realizado por <a href="https://www.pulpora.com" target="_blank">Pulpora SRL</a>';
    echo $message;
}
add_filter('admin_footer_text', 'modify_footer_admin_message');
// fin personalizar frase Gracias por crear con WordPress
// // deregister native ACF Form front styles
add_action('wp_enqueue_scripts', 'acf_form_deregister_styles');
function acf_form_deregister_styles()
{
    // Deregister ACF Form style
    wp_deregister_style('acf-global');
    wp_deregister_style('acf-input');

    // Avoid dependency conflict
    wp_register_style('acf-global', false);
    wp_register_style('acf-input', false);
}
// end deregister native ACF Form front styles
// bootstrap row, success message & submit button
add_filter('acf/validate_form', 'acf_form_bootstrap_styles');
function acf_form_bootstrap_styles($args)
{
    // Before ACF Form
    if (!$args['html_before_fields']) {
        $args['html_before_fields'] = '<div class="row">';
    } // May be .form-row

    // After ACF Form
    if (!$args['html_after_fields']) {
        $args['html_after_fields'] = '</div>';
    }

    // Success Message
    if (
        $args['html_updated_message'] ==
        '<div id="message" class="updated"><p>%s</p></div>'
    ) {
        $args['html_updated_message'] =
            '<div id="message" class="updated alert alert-success">%s</div>';
    }

    // Submit button
    if (
        $args['html_submit_button'] ==
        '<input type="submit" class="acf-button button button-primary button-large" value="%s" />'
    ) {
        $args['html_submit_button'] =
            '<input type="submit" class="acf-button button button-primary button-large btn btn-primary" value="%s" />';
    }

    return $args;
}
// end bootstrap row, success message & submit button
// wrap fields with form-group, col-12 & adding form-control
add_filter('acf/prepare_field', 'acf_form_fields_bootstrap_styles');
function acf_form_fields_bootstrap_styles($field)
{
    // Target ACF Form Front only
    if (is_admin() && !wp_doing_ajax()) {
        return $field;
    }

    // Add .form-group & .col-12 fallback on fields wrappers
    $field['wrapper']['class'] .= ' col mb-1';

    // Add .form-control on fields
    $field['class'] .= ' form-control';

    return $field;
}
// end wrap fields with form-group, col-12 & adding form-control
// adding text-danger on required
add_filter('acf/get_field_label', 'acf_form_fields_required_bootstrap_styles');
function acf_form_fields_required_bootstrap_styles($label)
{
    // Target ACF Form Front only
    if (is_admin() && !wp_doing_ajax()) {
        return $label;
    }
    // Add .text-danger
    $label = str_replace(
        '<span class="acf-required">*</span>',
        '<span class="acf-required text-danger">*</span>',
        $label
    );
    return $label;
}
// end adding text-danger on required
// asignacion de titulo y enlace a las pre-solicitudes de servicios
function pre_application_title_update($post_id, $object)
{
    $pre_solicitud_post = [];
    $pre_solicitud_post['ID'] = $post_id;
    $nombres = $_POST['acf']['field_6183eb70d40ee'];
    $apellidos = $_POST['acf']['field_6183eb81d40ef'];

    if (
        get_post_type() == 'pre-application' ||
        is_page('pre-application-service')
    ) {
        $pre_solicitud_post = [
            'ID' => $post_id,
            'post_title' => $nombres . ' ' . $apellidos,
            'post_name' => sanitize_title(
                $nombres . '-' . $apellidos . '-' . $post_id
            ),
            'post_type' => 'pre-application',
            'post_status' => 'pending',
        ];
        wp_update_post($pre_solicitud_post);
    }
}
add_action(
    'acfe/save_post/post_type=pre-application',
    'pre_application_title_update',
    10,
    3
);
// fin asignacion de titulo y enlace a las pre-solicitudes de servicios
//
// // Add the custom columns to the book post type:
add_filter(
    'manage_pre-application_posts_columns',
    'set_custom_edit_pre_application_columns'
);
function set_custom_edit_pre_application_columns($columns)
{
    //unset( $columns['author'] );
    $columns['services'] = __('Servicios', 'pulpora');
    //$columns['publisher'] = __( 'Publisher', 'your_text_domain' );
    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action(
    'manage_pre-application_posts_custom_column',
    'custom_pre_application_column',
    10,
    2
);
function custom_pre_application_column($column, $post_id)
{
    switch ($column) {
        case 'services':
            $services_posts = get_field('services');
            if ($services_posts):
                foreach ($services_posts as $service):
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($service);
                    echo '<a href="' .
                        get_permalink() .
                        '">' .
                        get_the_title() .
                        '</a>';
                endforeach;
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata();
            endif;
            break;

        case 'publisher':
            echo get_post_meta($post_id, 'publisher', true);
            break;
    }
}
