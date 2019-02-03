<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Homeland for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'homeland_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function homeland_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin bundled with a theme.

        array(
            'name'               => esc_html__( 'codeex Shortcodes', 'homeland' ), // The plugin name.
            'slug'               => 'codeex-shortcodes', // The plugin slug (typically the folder name).
            'source'             => esc_url( 'https://qbootstrap.com/wp/plugins/homeland/codeex-shortcodes.zip' ), // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '2.1.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),

        array(
            'name'               => esc_html__( 'codeex Post Types', 'homeland' ), 
            'slug'               => 'codeex-post-types', 
            'source'             => esc_url( 'https://qbootstrap.com/wp/plugins/homeland/codeex-post-types.zip' ), 
            'required'           => true, 
            'version'            => '1.1.1', 
            'force_activation'   => false, 
            'force_deactivation' => false, 
            'external_url'       => '', 
            'is_callable'        => '', 
        ),

        array(
            'name'               => esc_html__( 'Revolution Slider', 'homeland' ),
            'slug'               => 'revslider', 
            'source'             => esc_url( 'https://qbootstrap.com/wp/plugins/homeland/revslider.zip' ), 
            'required'           => false, 
            'version'            => '5.4.8', 
            'force_activation'   => false, 
            'force_deactivation' => false, 
            'external_url'       => '', 
            'is_callable'        => '', 
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository.

        array(
            'name'      => esc_html__( 'Classic Editor', 'homeland' ),
            'slug'      => 'classic-editor',
            'required'  => false,
        ),
        
        array(
            'name'      => esc_html__( 'Contact Form 7', 'homeland' ),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),

        array(
            'name'      => esc_html__( 'One Click Demo Import', 'homeland' ),
            'slug'      => 'one-click-demo-import',
            'required'  => false,
        ),

        array(
            'name'      => esc_html__( 'MailChimp for WordPress', 'homeland' ),
            'slug'      => 'mailchimp-for-wp',
            'required'  => false,
        ),

        array(
            'name'      => esc_html__( 'WooSidebars', 'homeland' ),
            'slug'      => 'woosidebars',
            'required'  => false,
        ),

        array(
            'name'      => esc_html__( 'bbPress', 'homeland' ),
            'slug'      => 'bbpress',
            'required'  => false,
        ),

        array(
            'name'      => esc_html__( 'Booking Calendar', 'homeland' ),
            'slug'      => 'booking',
            'required'  => false,
        ),

        array(
            'name'      => esc_html__( 'Newsletter', 'homeland' ),
            'slug'      => 'newsletter-sign-up',
            'required'  => false,
        ),

        array(
            'name'      => esc_html__( 'Mortgage Loan Calculator', 'homeland' ),
            'slug'      => 'mortgage-loan-calculator',
            'required'  => false,
        ),

        array(
            'name'      => esc_html__( 'WordPress SEO', 'homeland' ),
            'slug'      => 'wordpress-seo',
            'required'  => false,
        ),

        array(
            'name'      => esc_html__( 'WP Smushit', 'homeland' ),
            'slug'      => 'wp-smushit',
            'required'  => false,
        ),

        array(
            'name'      => esc_html__( 'W3 Total Cache', 'homeland' ),
            'slug'      => 'w3-total-cache',
            'required'  => false,
        ),

         array(
            'name'      => esc_html__( 'WP Optimize', 'homeland' ),
            'slug'      => 'wp-optimize',
            'required'  => false,
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'homeland',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

        /*
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'homeland' ),
            'menu_title'                      => __( 'Install Plugins', 'homeland' ),
            /* translators: %s: plugin name. * /
            'installing'                      => __( 'Installing Plugin: %s', 'homeland' ),
            /* translators: %s: plugin name. * /
            'updating'                        => __( 'Updating Plugin: %s', 'homeland' ),
            'oops'                            => __( 'Something went wrong with the plugin API.', 'homeland' ),
            'notice_can_install_required'     => _n_noop(
                /* translators: 1: plugin name(s). * /
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'homeland'
            ),
            'notice_can_install_recommended'  => _n_noop(
                /* translators: 1: plugin name(s). * /
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'homeland'
            ),
            'notice_ask_to_update'            => _n_noop(
                /* translators: 1: plugin name(s). * /
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'homeland'
            ),
            'notice_ask_to_update_maybe'      => _n_noop(
                /* translators: 1: plugin name(s). * /
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'homeland'
            ),
            'notice_can_activate_required'    => _n_noop(
                /* translators: 1: plugin name(s). * /
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'homeland'
            ),
            'notice_can_activate_recommended' => _n_noop(
                /* translators: 1: plugin name(s). * /
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'homeland'
            ),
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'homeland'
            ),
            'update_link'                     => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'homeland'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'homeland'
            ),
            'return'                          => __( 'Return to Required Plugins Installer', 'homeland' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'homeland' ),
            'activated_successfully'          => __( 'The following plugin was activated successfully:', 'homeland' ),
            /* translators: 1: plugin name. * /
            'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'homeland' ),
            /* translators: 1: plugin name. * /
            'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'homeland' ),
            /* translators: 1: dashboard link. * /
            'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'homeland' ),
            'dismiss'                         => __( 'Dismiss this notice', 'homeland' ),
            'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'homeland' ),
            'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'homeland' ),

            'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
        ),
        */
    );

    tgmpa( $plugins, $config );
}
