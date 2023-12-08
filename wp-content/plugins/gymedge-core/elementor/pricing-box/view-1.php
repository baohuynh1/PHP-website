<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$attr = $btn = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
    $attr  = 'href="' . $data['buttonurl']['url'] . '"';
    $attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
    $attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

if ( !empty( $data['buttontext'] ) ) {
    $btn = '<a ' . $attr . '>' . $data['buttontext'] . '</a>';
}

$price_html = !empty($data['unit']) ? "{$data['price']}<span>/{$data['unit']}</span>" : "{$data['price']}";

?>
<div class="rt-pricing-box-1">
    <div class="rt-top">
        <div class="rt-title price-box-title"><?php echo esc_html( $data['title'] ); ?></div>
        <div class="rt-price pricing-box-price"><?php echo wp_kses_post( $price_html ); ?></div>
        <div class="rt-features pricing-box-content">
            <?php foreach ( $data['features'] as $feature ): ?>
                <div><?php echo esc_html( $feature ); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if ( $btn ): ?>
        <div class="rt-btn"><?php echo wp_kses_post( $btn ); ?></div>
    <?php endif; ?>
</div>
