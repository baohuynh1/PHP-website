<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>

<div class="rt-counter-2">
    <div class="rt-icon"><i class="<?php echo esc_attr( $data['icon'] ); ?>" aria-hidden="true"></i></div>
    <?php if (!empty($data['title'])): ?>
        <h3 class="rt-title"><?php echo esc_html( $data['title'] );?></h3>
    <?php endif; ?>
    <?php if (!empty($data['subtitle'])): ?>
        <div class="rt-subtitle"><?php echo esc_html( $data['subtitle'] ); ?></div>
    <?php endif; ?>
</div>