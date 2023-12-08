<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$container_start = !empty( $data['buttonurl']['url'] ) ? '<a href="'.esc_url( !empty( $data['buttonurl']['url'] ) ).'" class="rtin-item">' : '<div class="rtin-item">';
$container_end   = !empty( $data['buttonurl']['url'] ) ? '</a>' : '</div>';

$price_html = !empty($data['unit']) ? "{$data['price']}<span>/{$data['unit']}</span>" : "{$data['price']}";

?>
<div class="rt-vc-pricing-box-2">
    <?php echo $container_start;?>
    <div class="rtin-left">
        <h3 class="rtin-title price-box-title"><?php echo wp_kses_post( $data['title'] ); ?></h3>
        <div class="rtin-features pricing-box-content"><?php echo wp_kses_post( $data['features'] ); ?></div>
    </div>
    <div class="rtin-right">
        <div class="rtin-price pricing-box-price"><?php echo wp_kses_post( $price_html ); ?></div>
    </div>
    <?php echo $container_end; ?>
</div>
