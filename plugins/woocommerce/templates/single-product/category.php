<?php
/**
 * Single Product Meta
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
?>

<?php do_action( 'woocommerce_product_category_start' ); ?>

<?php echo $product->get_categories( ', ',  _n( $cat_count ) ); ?>

<?php do_action( 'woocommerce_product_category_end' ); ?>