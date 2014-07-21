<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1><?php the_title(); ?></h1>

	<div class="summary entry-summary">
		<?php woocommerce_template_single_add_to_cart(); ?>
		<?php the_field('download'); ?>

		<div class="demo-like clearfix">
			<div class="button demo"><a href="<?php the_field('demo'); ?>" class="btn" target="_blank">Demo</a></div>
			<div class="button likes"><?if( function_exists('zilla_likes') ) zilla_likes();?></div>
		</div>

		<?php woocommerce_template_single_rating(); ?>

		<div class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></div>
		<h4 class="author"><?php the_author_posts_link(); ?></h4>

		<p><?php the_field('browser_support'); ?></p>
	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>


	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
