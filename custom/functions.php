<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'init', 'custom_storefront_elements', 10 );
function custom_storefront_elements() {
	remove_action( 'storefront_header', 'storefront_product_search', 40 );
}

add_action( 'init', 'custom_storefront_site_branding' );
if ( ! function_exists( 'custom_storefront_site_branding' ) ) {
	function custom_storefront_site_branding() {
		if ( function_exists( 'storefront_site_branding' ) ) {
			remove_action( 'storefront_header', 'storefront_site_branding', 20 );
		}	
		add_action( 'storefront_header', 'custom_storefront_display_custom_logo', 20 );
	}
}
function custom_storefront_display_custom_logo() {
	?>
<div class="site-branding">
<a href="https://islamiceducare.org/" class="custom-logo-link" rel="home" itemprop="url"><img width="300" height="300" src="https://islamiceducare.org/wp-content/uploads/2018/03/iec-logo.png" class="custom-logo" alt="" itemprop="logo"></a>
</div>
	<?php
	
}


if ( ! function_exists( 'storefront_credit' ) ) {
	function storefront_credit() {
		?>
		<div class="site-info">
			<p style="clear:both;text-align:center"><?php echo date( 'Y' ); ?> &copy; <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. Untuk generasi muslim Indonesia yang berakhlak mulia.</p>
	    </div><!-- .site-info -->
		<?php
	}
}

add_filter( 'storefront_recent_products_args', 'custom_storefront_recent_products', 199 );
function custom_storefront_recent_products( $args ) {
 $args['limit']   = 9;
 $args['columns'] = 3;
 $args['title'] = __( 'Our Products', 'storefront' );
 return $args;
}

function reduce_woocommerce_min_strength_requirement( $strength ) {
    return 0;
}
add_filter( 'woocommerce_min_password_strength', 'reduce_woocommerce_min_strength_requirement' );

function storefront_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'storefront_excerpt_length', 999 );
function storefront_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'storefront_excerpt_more' );
