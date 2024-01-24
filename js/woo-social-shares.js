jQuery(document).ready(function ($) {
    // Add click event for WhatsApp Share button
    $('.wms-whatsapp-share').on('click', function (e) {
        e.preventDefault();

        // Get the product information
        var productTitle = encodeURIComponent($('h1.product_title').text().trim());
        var productURL = encodeURIComponent(window.location.href);

        // Create the WhatsApp share link
        var whatsappShareURL = 'https://wa.me/?text=' + 'Check out this product: ' + productTitle + ' - ' + productURL;

        // Open WhatsApp in a new window with the pre-populated message
        window.open(whatsappShareURL, '_blank');
    });

    // Add click event for Facebook Share button
    $('.wms-facebook-share').on('click', function (e) {
        e.preventDefault();

        // Get the product information
        var productTitle = encodeURIComponent($('h1.product_title').text().trim());
        var productURL = encodeURIComponent(window.location.href);

        // Create the Facebook share link
        var facebookShareURL = 'https://www.facebook.com/sharer/sharer.php?u=' + productURL;

        // Open Facebook in a new window for sharing
        window.open(facebookShareURL, '_blank');
    });
});
