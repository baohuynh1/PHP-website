<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<div class="rt-counter-1">
    <div class="rt-left"><i class="<?php echo esc_attr( $data['icon'] ); ?>" aria-hidden="true"></i></div>
    <div class="rt-right">
        <?php if (!empty($data['title'])): ?>
            <div class="rt-title"><?php echo esc_html( $data['title'] ); ?></div>
        <?php endif; ?>
        <?php if (!empty($data['subtitle'])): ?>
            <div class="rt-subtitle"><?php echo esc_html( $data['subtitle'] ); ?></div>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>