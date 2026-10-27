<?php
/**
 * WooCommerce Fallback Template for VEDAMRIT
 *
 * @package Vedamrit
 */

get_header();
?>

<main id="main-content" class="site-main woocommerce-main">
    <div class="vedamrit-container py-12">
        <?php woocommerce_content(); ?>
    </div>
</main>

<?php
get_footer();
