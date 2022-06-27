<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package CustomCarousel
 */

 if( ! defined( 'WP_UNINSTALL_PLUGIN' )) {
    exit;

 }

 //Clear database stored data
 $carousel = get_posts( array('post_type' => 'carousel', 'numberposts' => -1));

 foreach( $carousels as $carousel ) {
    wp_delete_post( $carousel->ID, true); 
 }
