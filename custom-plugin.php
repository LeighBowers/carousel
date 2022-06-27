<?php

/**
 * @package CustomCarousel
 * Plugin Name:       Our Custom Plugin 
 * Description:       Created carousel plugin from scratch 
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Leigh-Anne Bowers & Xola Magatya
 * Text Domain: Custom Carousel
 */

// if ( current_user_can('contributor') && !current_user_can('upload_files') )
//      add_action('admin_init', 'allow_contributor_uploads');      
//      function allow_contributor_uploads() {
//           $contributor = get_role('contributor');
//           $contributor->add_cap('upload_files');
//      }

//      add_filter( 'show_admin_bar', '__return_false' );

//      add_action( 'admin_menu', 'wporg_options_page' );
// function wporg_options_page() {
//     add_menu_page(
//         'Carousel',
//         'Carousel Options',
//         'manage_options',
//         plugin_dir_path(__FILE__) . 'admin/view.php',
//         null,
//         'dashicons-admin-plugins',
//         20
//     );
// }
 

defined('ABSPATH') or exit('Oops the file cannot be accessed!!')

class customCarouselPlugin
{
    function __construct() {
        add_action('init', array ($this, 'custom_post_type'));
    } 
 
    function activate() {
    //generated a CPT
    $this->custom_post_type();
    //flush rewrite rules
    flush_rewrite_rules();

    }

    function deactivate() {
    // flush rewrite rules
    flush_rewrite_rules();

    } 

    function uninstall() {
     // delete CPT
     // delete all the plugin data from the DB

    } 
     

    function custom_post_type() {
        register_post_type('carousel', ['public' => true, 'label' => 'Carousels']);
    }

}


if (class_exist( 'customCarouselPlugin')) {
$CustomCarouselPlugin = new customCarouselPlugin();  
}  

// activation
register_activation_hook(__FILE__, array($CustomCarouselPlugin, 'activate'));

//deactivation
register_deactivation_hook(__FILE__, array($CustomCarouselPlugin, 'deactivate'));

//unistall
register_deactivation_hook(__FILE__, array($CustomCarouselPlugin, 'unistall'));
