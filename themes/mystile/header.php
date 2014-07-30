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
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
	woo_head();
?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41062279-2', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="wrapper">
	<div id="top">
		<nav role="navigation" class="clearfix">
			<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>

				<ul id="top-nav" class="nav pull-right">

					<?php if ( is_user_logged_in() ) { ?>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="<?php home_url(); ?>/my-account">My account</a>
						</li>

			    	<li class="menu-item menu-item-type-post_type menu-item-object-page">
			    		<a href="<?php home_url(); ?>/?customer-logout=true">Log out</a>
			    	</li>

					<?php } else { ?>
					 	<li class="menu-item">
					  	<a href="<?php home_url(); ?>/my-account">Sign In</a>
						</li>

		    		<li class="menu-item menu-item-type-post_type menu-item-object-page">
		    			<a href="<?php home_url(); ?>/sign-up">Create an account</a>
		    		</li>

					<?php } ?>

				<li class="menu-item menu-item-type-post_type menu-item-object-page">
					<a href="<?php home_url(); ?>/sell-on-kickdrop">Sell on Kickdrop</a></li>
				</li>
			</ul>
		</nav>
	</div><!-- /#top -->

	<div class="search-input">
		<?php
			if ( class_exists( 'woocommerce' ) ) {
				echo get_search_form();
		} ?>
	</div><!-- search-input -->

  <?php woo_header_before(); ?>

	<header id="header" class="col-full">
	  <hgroup class="pull-left">
		  <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		  	<img src="<?php echo esc_url( get_template_directory_uri().'/images/logo.png' ); ?>" width="134" />
		  </a>
		</hgroup>

		<?php
			if ( class_exists( 'woocommerce' ) ) {
				echo '<ul class="nav search-cart pull-right">';
				echo '<li class="search-btn"><a href="#"><i class="fa fa-search"></i></a></li>';
				woocommerce_cart_link();
				echo '</ul>';
			}
		?>

<?php } ?>

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