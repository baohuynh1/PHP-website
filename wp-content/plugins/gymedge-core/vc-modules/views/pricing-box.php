<?php
$style = "";
if ( !empty( $maxwidth ) ) {
	$style .= "max-width:{$maxwidth}px;";
}
$price_html = $unit ? "{$price}<span>/{$unit}</span>" : "{$price}";
?>
<div class="rt-pricing-box-1 <?php echo esc_attr( $class ); ?>" style="<?php echo esc_attr( $style ); ?>">
	<div class="rt-top">
		<div class="rt-title"><?php echo esc_html( $title );?></div>
		<div class="rt-price"><?php echo wp_kses_post( $price_html );?></div>
        <?php if (!empty($features)): ?>
            <div class="rt-features">
                <?php foreach ( $features as $feature ): ?>
                    <div><?php echo esc_html( $feature ); ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
	</div>
	<div class="rt-btn"><a href="<?php echo esc_url( $btnurl );?>"><?php echo esc_html( $btntext ); ?></a></div>
</div>
