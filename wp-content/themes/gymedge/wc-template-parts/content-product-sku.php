<?php
global $product;?>
<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
	<div class="product_meta">
		<?php
		$sku = $product->get_sku();
		$sku = $sku ? $sku : esc_html_e( 'N/A', 'gymedge' );
		?>
		<?php esc_html_e( 'SKU:', 'gymedge' ); ?>: <span class="sku"><?php echo wp_kses_post( $sku ); ?></span>
	</div>
<?php endif;