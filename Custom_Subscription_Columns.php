<?php
/*
Plugin Name: Custom Subscription Columns
Description: This function adds a custom column to the WooCommerce Subscriptions table in the WordPress admin dashboard. It enhances the table by displaying information about custom column for each subscription.
Version: 1.0
Author: Peter J Tshiani
Author URI: Your Website
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define the plugin class
class My_Custom_Plugin {

    // Plugin name
    private $plugin_name;

    // Constructor method
    public function __construct() {
        // Hook into WooCommerce to modify the columns
        add_filter( 'manage_edit-shop_subscription_columns', array( $this, 'modifySubscriptionColumns' ), 20 );

        // Hook into WooCommerce to give field value
         add_action( 'manage_shop_subscription_posts_custom_column', array( $this, 'populate_custom_columns' ), 10, 2 );
    }

    // modifying the table
    public function modifySubscriptionColumns( $columns ) {
        
        // Remove trial_end_date
        unset( $columns['desired comun to be removed'] );
    
        // Add new_column (assuming it's a custom field meta key)
        $columns['new_column = __( 'Renew column', 'your-text-domain' );
    
  
        return $columns;
      }

  // give value to custmn column
  public function populate_custom_columns( $column, $post_id ) {
   +
    if ('new_column' === $column) {
        // Retrieve and display your custom data here
        $new_value_value_data = get_post_meta($post_id, 'new_column_value', true);
        echo esc_html($new_value_value_data);
    
    }

}
}

// Instantiate the plugin class
$my_custom_plugin = new My_Custom_Plugin();
