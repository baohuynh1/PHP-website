<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$noimg_class = ( empty( $data['image']['id'] ) ) ? ' noimg' : '';
?>

<div class="rt-fitness-wrap<?php echo esc_attr( $noimg_class ); ?>">
    <?php if( !empty( $data['image']['id'] ) ):
        echo wp_get_attachment_image( $data['image']['id'], 'full' );
    endif; ?>
    <?php if( !empty( $data['content'] ) ): ?>
        <div class="rt-fitness"><?php echo wp_kses_post( $data['content'] ); ?></div>
    <?php endif; ?>
</div>