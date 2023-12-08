<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 2.2
 */

$attr = $btn = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
    $attr  .= 'href="' . $data['buttonurl']['url'] . '"';
    $attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
    $attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

if ( !empty( $data['buttontext'] ) ) {
    $btn .= '<a class="rt-vc-button-1" ' . $attr . '>' . $data['buttontext'] . '</a>';
}

?>
<div class="gymedge-rt-button">
    <?php echo wp_kses_post($btn); ?>
</div>