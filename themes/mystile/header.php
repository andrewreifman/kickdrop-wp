<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options, $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic" media="all" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
	woo_head();
?>

</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="wrapper">
	<div id="top">
		<nav role="navigation" class="clearfix">
			<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>
			<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav pull-right', 'theme_location' => 'top-menu' ) ); ?>
			<?php } ?>
		</nav>
	</div><!-- /#top -->

    <?php woo_header_before(); ?>

	<header id="header" class="col-full">
	  <hgroup>
		  <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		  	<img src="<?php echo esc_url( get_template_directory_uri().'/images/logo.png' ); ?>" width="134" />
		  </a>

			<h3 class="nav-toggle"><a href="#navigation"><mark class="websymbols">&#178;</mark> <span><?php _e('Navigation', 'woothemes'); ?></span></a></h3>
		</hgroup>

		<?php
			if ( class_exists( 'woocommerce' ) ) {
				echo '<ul class="nav pull-right">';
				echo get_search_form();
				woocommerce_cart_link();
				echo '</ul>';
			}
		?>

    <?php woo_nav_before(); ?>

		<nav id="navigation" role="navigation">
			<?php
				if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
					wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) );
				} else {
			?>
	       <ul id="main-nav" class="nav">
					<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
						<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
					<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
				</ul><!-- /#nav -->
	    <?php } ?>

		</nav><!-- /#navigation -->

		<?php woo_nav_after(); ?>

	</header><!-- /#header -->

	<?php woo_content_before(); ?>