<?php
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

add_action('woocommerce_before_main_content','archive_page_start',5);
add_action('woocommerce_after_main_content','archive_page_end',5);
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );


function archive_page_start(){ 
    echo '<div class="mid-content clearfix">';
    echo '<section id="primary" class="content-area woocommerce-area">';
    echo '<main id="main" class="site-main" role="main">';
}

function archive_page_end(){ 
    echo '</main>';
	echo '</section>';
    get_sidebar();
    echo '</div>';
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'ap_loop_columns');
if (!function_exists('ap_loop_columns')) {
	function ap_loop_columns() {
		return 3; // 3 products per row
	}
}

//Change number of related products on product page
add_filter( 'woocommerce_output_related_products_args', 'ap_related_products_args' );
if (!function_exists('ap_related_products_args')) {
	function ap_related_products_args( $args ) {
        $args['posts_per_page'] = 3; // 3 related products
        $args['columns'] = 3; // arranged in 3 columns
        return $args;
	}
}

add_action( 'body_class', 'ap_woo_body_class');
if (!function_exists('ap_woo_body_class')) {
	function ap_woo_body_class( $class ) {
        $class[] = 'columns-'.ap_loop_columns();
        return $class;
	}
}