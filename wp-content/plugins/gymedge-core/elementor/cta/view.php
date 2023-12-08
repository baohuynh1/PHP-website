<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 2.2
 */

switch ( $data['style'] ) {
    case 'default':
        $btn_class = 'rdtheme-button-3';
        break;
    default:
        $btn_class = 'rdtheme-button-2';
}

$class = $data['style'];
$class .= empty( $data['subtitle'] ) ? ' rt-no-sub': ' rt-has-sub';

$attr = $btn = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
    $attr  .= 'href="' . $data['buttonurl']['url'] . '"';
    $attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
    $attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

if ( !empty( $data['buttontext'] ) ) {
    $btn .= '<a class="'.esc_attr( $btn_class ).'" ' . $attr . '>' . $data['buttontext'] . '</a>';
}

?>
<div class="rt-cta-1 <?php echo esc_attr( $class ); ?>">
    <div class="row">
        <div class="col-md-9 col-sm-8 col-xs-12">
            <div class="rt-cta-contents">
                <?php if (!empty($data['title'])): ?>
                    <h3 class="rt-cta-title"><?php echo esc_html($data['title']); ?></h3>
                <?php endif; ?>
                <?php if (!empty($data['subtitle'])): ?>
                    <p class="rt-cta-subtitle"><?php echo wp_kses_post($data['subtitle']); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( !empty( $data['buttontext'] ) ): ?>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="rt-cta-button">
                    <?php echo wp_kses_post($btn); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>