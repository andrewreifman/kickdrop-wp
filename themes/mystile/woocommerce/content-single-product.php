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

<h1><?php the_title(); ?></h1>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="drop-left-col">
		<?php woocommerce_show_product_images(); ?>

		<?php woocommerce_output_product_data_tabs(); ?>
	</div><!-- .drop-left-col -->

	<div class="summary entry-summary">
		<?php woocommerce_template_single_add_to_cart(); ?>
		<?php the_field('download'); ?>

		<div class="demo-like clearfix">
			<div class="button demo"><a href="<?php the_field('demo'); ?>" class="btn" target="_blank">Demo</a></div>
			<div class="button likes"><?if( function_exists('zilla_likes') ) zilla_likes();?></div>
		</div>

		<?php woocommerce_template_single_rating(); ?>

		<div class="more-info">
			<div class="author">
				<div class="avatar-thumb"><?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?></div>
				<h4><?php the_author(); ?></h4>
				<a href="<?php the_author_posts_link(); ?>" class="button">View profile</a>
			</div>

			<ul class="specs">
				<li class="category"><?php woocommerce_template_single_category(); ?></li>
				<li class="count"><?php wc_product_sold_count(); ?></li>
				<li class="date"><?php echo get_the_date(); ?></li>
				<li class="files"><?php the_field('files'); ?></li>
				<li class="browser"><?php the_field('browser_support'); ?></li>
			</ul>
		</div>

		<div class="tags">
			<?php woocommerce_template_single_tags(); ?>
		</div>

	</div><!-- .summary -->

	<?php woocommerce_output_related_products(); ?>


	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
