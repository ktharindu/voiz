<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>
<section class="smartlib-content-section container">

    <?php woocommerce_breadcrumb(); ?>

    <div id="page" role="main"
         class="<?php echo bstarter__f('smartlib_content_layout_class', 'smartlib-left-content', 'woocommerce_single') ?>">
        <?php
        /**
         * woocommerce_before_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         */
        do_action('woocommerce_before_main_content');
        ?>
        <div class="smartlib-page-container">
            <?php while (have_posts()) : the_post(); ?>

                <?php wc_get_template_part('content', 'single-product'); ?>

            <?php endwhile; // end of the loop. ?>
        </div>
        <?php
        /**
         * woocommerce_after_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action('woocommerce_after_main_content');
        ?>
    </div>

    <?php

    do_action('smartlib_get_layout_sidebar', 'woocommerce_single'); ?>

</section>

<?php get_footer('shop'); ?>
