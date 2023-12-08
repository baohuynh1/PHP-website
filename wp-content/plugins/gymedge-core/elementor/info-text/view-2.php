<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$attr = '';

if ( !empty( $data['title_url']['url'] ) ) {
    $attr  .= 'href="' . $data['title_url']['url'] . '"';
    $attr .= !empty( $data['title_url']['is_external'] ) ? ' target="_blank"' : '';
    $attr .= !empty( $data['title_url']['nofollow'] ) ? ' rel="nofollow"' : '';
    $title = '<a class="rtin-btn" ' . $attr . '>'. $data['title'] .'</a>';
} else {
    $title = $data['title'];
}

$sep_class = ( $data['separator_display'] == 'yes' ) ? ' rt-separator' : '';
?>
<div class="media rt-info-text-2">
    <div class="pull-left<?php echo ( $data['image_style'] == 'rounded' ) ? ' rounded' : '' ; ?>">
        <?php if ( $data['icon_type'] == 'image' ): ?>
            <?php echo wp_get_attachment_image( $data['image']['id'], 'full', true ); ?>
        <?php else: ?>
            <i class="<?php echo esc_attr( $data['icon'] ); ?>" aria-hidden="true"></i>
        <?php endif; ?>
    </div>
    <div class="media-body">
        <?php if( !empty( $title ) ): ?>
            <h3 class="media-heading"><?php echo wp_kses_post( $title ); ?></h3>
        <?php endif; ?>
        <?php if( $data['separator_display'] == 'yes' ): ?>
            <div class="rt-spacing<?php echo esc_attr( $sep_class ); ?>"></div>
        <?php endif; ?>
        <?php if( !empty( $data['content'] ) ): ?>
            <div class="mb0 elementor-para"><?php echo wp_kses_post( $data['content'] ); ?></div>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>