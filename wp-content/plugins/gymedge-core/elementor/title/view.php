<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>

<div class="rt-owl-title-1 <?php echo esc_attr( $data['style'] ); ?>">
    <div class="section-title">
        <?php if( !empty( $data['title'] ) ): ?>
            <h2 class="owl-title"><?php echo wp_kses_post( $data['title'] ); ?></h2>
        <?php endif; ?>
        <?php if( !empty( $data['subtitle'] ) ): ?>
            <div class="owl-description"><?php echo wp_kses_post( $data['subtitle'] ); ?></div>
        <?php endif;?>
    </div>
</div>