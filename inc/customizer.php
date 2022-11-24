<?php

/**
 * mason Theme Customizer
 *
 * @package mason
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mason_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'mason_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'mason_customize_partial_blogdescription',
            )
        );
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Section - Corners
    $wp_customize->add_section('Corners', array(
        'title'      => __('Corners', 'mason'),
        'priority'   => 40,
    ));

    //Settings - Corners
    $wp_customize->add_setting('corner_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    //Controls - Corners
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'corner_image', array(
        'label'      => __('Image Corner Radius (px)', 'mason'),
        'type'       => 'text',
        'section'    => 'Corners',
        'settings'   => 'corner_image',
    )));

    /////////////////////////////////////////////////////////////////////////////////////////////////////////

}
add_action('customize_register', 'mason_customize_register');


//Customizer CSS Generation with Variables
function mason_customize_css()
{
?>
    <style type="text/css">
        :root {
            /* Colors */
            --color-menu: rgba(255, 255, 255, 0.9);
            --color-text: #1f1f1f;
            --color-card: #ffffff;
            --color-bg: #ffffff;
            --color-bg-accent-1: #F5F5F5;
            --color-bg-accent-2: #EBEBEB;
            --color-bg-accent-3: #DEDEDE;
            --color-btn: #3A86FF;
            --color-btn-hover: #2f6ccc;
            --color-success: #16b76e;
            --color-success-accent: #1eaa5025;
            --color-error: #FF006E;
            --color-error-accent: #FF006E25;
            --color-caution: #FFBE0B;
            --color-caution-accent: #FFBE0B25;
            --color-notification: #3A86FF;
            --color-notification-accent: #3A86FF25;

            /* General Styles */
            --border-std: 1px solid var(--color-bg-accent-3);
            --shadow-std: 0px 40px 50px 0px rgba(0, 0, 0, 0.05);
            --shadow-strong: 0px 40px 50px 0px rgba(0, 0, 0, 0.1);
            --shadow-x-strong: 0px 20px 30px 0 rgba(0, 0, 0, 0.25);
            ;
            --transition-speed-std: .25s ease all;
            --transition-speed-slow: .5s ease all;

            /* Structure & Spacing */
            --corner-sm: 10px;
            --corner-m: 20px;
            --corner-l: 30px;
            --sidebar-width-closed: 90px;
            --sidebar-width-open: 250px;

        }

        [data-theme="dark"] {
            --color-menu: rgba(0, 0, 0, 0.9);
            --color-text: #ffffff;
            --color-card: #000000;
            --color-bg: #000000;
            --color-bg-accent-1: #1D1D1D;
            --color-bg-accent-2: #252525;
            --color-bg-accent-3: #303030;
            --color-success-accent: #1eaa5045;
        }
    </style>
<?php
}
add_action('wp_head', 'mason_customize_css');



/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mason_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mason_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mason_customize_preview_js()
{
    wp_enqueue_script('mason-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'mason_customize_preview_js');
