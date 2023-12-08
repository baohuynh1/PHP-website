<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$attr = $btn = '';

if ( !empty( $data['btn_url']['url'] ) ) {
    $attr  .= 'href="' . $data['btn_url']['url'] . '"';
    $attr .= !empty( $data['btn_url']['is_external'] ) ? ' target="_blank"' : '';
    $attr .= !empty( $data['btn_url']['nofollow'] ) ? ' rel="nofollow"' : '';
}

if ( !empty( $data['btn_text'] ) ) {
    $btn .= '<a class="rtin-btn" ' . $attr . '>' . $data['btn_text'] . '<i class="fa fa-angle-right" aria-hidden="true"></i></a>';
}

?>

<div class="rt-vc-intro rtin-<?php echo esc_attr( $data['style'] ); ?>">
    <div class="rtin-title-area">
        <?php if ( !empty($data['before_title']) ): ?>
            <div class="rtin-before-title"><?php echo esc_html( $data['before_title'] ); ?></div>
        <?php endif; ?>
        <?php if ( !empty($data['title']) ): ?>
            <h3 class="rtin-title"><?php echo esc_html( $data['title'] );?></h3>
        <?php endif; ?>
        <?php if ( !empty($data['after_title']) ): ?>
            <div class="rtin-after-title"><?php echo esc_html( $data['after_title'] ); ?></div>
        <?php endif; ?>
    </div>
    <?php if ( !empty($data['content']) ): ?>
        <div class="rtin-content"><?php echo wp_kses_post( $data['content'] ); ?></div>
    <?php endif; ?>
    <?php if ( $data['social_display'] == 'yes' ): ?>
        <div class="rtin-socials">
            <?php if ( !empty($data['social_facebook']) ): ?>
                <a target="_blank" href="<?php echo esc_url( $data['social_facebook'] ); ?>"><i class="fab fa-fw fa-facebook"></i></a>
            <?php endif; ?>
            <?php if ( !empty($data['social_twitter']) ): ?>
                <a target="_blank" href="<?php echo esc_url( $data['social_twitter'] ); ?>"><i class="fab fa-fw fa-twitter"></i></a>
            <?php endif; ?>
            <?php if ( !empty($data['social_linkedin']) ): ?>
                <a target="_blank" href="<?php echo esc_url( $data['social_linkedin'] ); ?>"><i class="fab fa-fw fa-linkedin"></i></a>
            <?php endif; ?>
            <?php if ( !empty($data['social_instagram']) ): ?>
                <a target="_blank" href="<?php echo esc_url( $data['social_instagram'] ); ?>"><i class="fab fa-fw fa-instagram"></i></a>
            <?php endif; ?>
            <?php if ( !empty($data['social_youtube']) ): ?>
                <a target="_blank" href="<?php echo esc_url( $data['social_youtube'] ); ?>"><i class="fab fa-fw fa-youtube"></i></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if ( $data['btn_display'] == 'yes' ): ?>
        <?php echo wp_kses_post( $btn ); ?>
    <?php endif; ?>
</div>