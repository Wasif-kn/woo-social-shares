<?php
/*
Plugin Name: WhatsApp & Messenger Share for WooCommerce
Description: Allows users to share products on WhatsApp and Messenger.
Version: 1.0
Author: Khizar
*/

// Enqueue scripts and styles
function wms_enqueue_scripts() {
    // Enqueue your custom JavaScript file
    wp_enqueue_script('whatsapp-messenger-share-script', plugin_dir_url(__FILE__) . 'js/woo-social-shares.js', array('jquery'), '1.0', true);

    // You may need to include CSS styles for your buttons
    // wp_enqueue_style('whatsapp-messenger-share-style', plugin_dir_url(__FILE__) . 'css/whatsapp-messenger-share.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'wms_enqueue_scripts');

// Add WhatsApp and Messenger share buttons to single product page
function wms_add_share_buttons() {
    // Get product information
    global $product;
    $product_title = get_the_title();
    $product_url   = get_permalink();

    // Output share buttons
    echo '
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...your-sha-hash-here..." crossorigin="anonymous" />
<head>
<div class="whatsapp-messenger-share-buttons">';
    
    // WhatsApp Share button
    echo '<a href="https://wa.me/?text=' . rawurlencode("Check out this product: $product_title - $product_url") . '" target="_blank" class="wms-whatsapp-share"><span style="position: relative; top: 2.5px; padding-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></span> Share on WhatsApp</a>';
    
    // Messenger Share button
    echo '<a href="https://www.facebook.com/send.php?text=' . rawurlencode("Check out this product: $product_title - $product_url") . '" target="_blank" class="wms-facebook-share"> <br><span style="position: relative; top: 2.5px; padding-right: 5px;">
<svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256.6 8C116.5 8 8 110.3 8 248.6c0 72.3 29.7 134.8 78.1 177.9 8.4 7.5 6.6 11.9 8.1 58.2A19.9 19.9 0 0 0 122 502.3c52.9-23.3 53.6-25.1 62.6-22.7C337.9 521.8 504 423.7 504 248.6 504 110.3 396.6 8 256.6 8zm149.2 185.1l-73 115.6a37.4 37.4 0 0 1 -53.9 9.9l-58.1-43.5a15 15 0 0 0 -18 0l-78.4 59.4c-10.5 7.9-24.2-4.6-17.1-15.7l73-115.6a37.4 37.4 0 0 1 53.9-9.9l58.1 43.5a15 15 0 0 0 18 0l78.4-59.4c10.4-8 24.1 4.5 17.1 15.6z"/></svg></span> Share on Facebook</a>';
    
    echo '</div>';
}
add_action('woocommerce_product_meta_end', 'wms_add_share_buttons', 10);

