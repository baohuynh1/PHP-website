<?php
global $product;

$thumbnail = woocommerce_get_product_thumbnail();
if ( !GymEdge::$options['wc_product_hover'] ) {
	$thumbnail = '<a href="' . get_the_permalink() . '">' . $thumbnail . '</a>';
}
?>
<div class="product-thumb-area">
	<?php
	woocommerce_show_product_loop_sale_flash();
	echo wp_kses_post( $thumbnail );
	?>
	<?php if ( GymEdge::$options['wc_product_hover'] ): ?>
		<div class="overlay"></div>
		<div class="product-info">
			<ul>
				<?php if ( function_exists( 'YITH_WCQV_Frontend' ) && GymEdge::$options['wc_quickview_icon'] ): ?>
					<li><a href="" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>"><i class="fa fa-search"></i></a></li>
				<?php endif; ?>
				<?php if ( class_exists( 'YITH_WCWL_Shortcode' ) && GymEdge::$options['wc_wishlist_icon'] ): ?>
					<?php
                    $product_id = $product->get_id();
                    $is_in_wishlist = YITH_WCWL()->is_product_in_wishlist( $product_id, false );
                    $wishlist_url = YITH_WCWL()->get_wishlist_url();

                    $title_before = esc_html__( 'Add to Wishlist', 'gymedge' );
                    $title_after = esc_html__( 'Aleady exists in Wishlist! Click here to view Wishlist', 'gymedge' );

                    if ( $is_in_wishlist ) {
                        $class = 'rdtheme-remove-from-wishlist';
                        $icon_font = 'fa fa-check';
                        $title = $title_after;
                    }
                    else {
                        $class = 'rdtheme-add-to-wishlist';
                        $icon_font = 'fa fa-heart';
                        $title = $title_before;
                    }

                    $html = '';
                    $html .= '<i class="wishlist-icon '.$icon_font.'"></i>';

                    $nonce = wp_create_nonce( 'gymedge_wishlist_nonce' );
                    ?>
                    <li>
                        <a href="<?php echo esc_url( $wishlist_url );?>" title="<?php echo esc_attr( $title ); ?>" rel="nofollow" data-product-id="<?php echo esc_attr( $product_id );?>" data-title-after="<?php echo esc_attr( $title_after );?>" class="rdtheme-wishlist-icon <?php echo esc_attr( $class );?>" data-nonce="<?php echo esc_attr( $nonce ); ?>" target="_blank">
                        <?php echo wp_kses_post( $html ); ?>
                        </a>
                    </li>
				<?php endif; ?>
			</ul>
		</div>
	<?php endif; ?>
</div>