<?php
/**
 * Single Product Tags
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>

<?php do_action( 'woocommerce_product_tags_start' ); ?>

<?php echo $product->get_tags( _n( $tag_count ) ); ?>

<?php do_action( 'woocommerce_product_tags_end' ); ?>