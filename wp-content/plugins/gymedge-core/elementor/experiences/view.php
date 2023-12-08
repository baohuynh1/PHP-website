<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$experiences = $data['experience'];

if ( empty($experiences) ) {
    $experiences = array();
}

?>

<div class="rt-vc-experience rtin-light">
    <?php foreach ( $experiences as $experience ): ?>
        <?php if ( !$experience['title'] && !$experience['desc'] ) continue; ?>
        <div class="rtin-item">
            <h3 class="rtin-title"><?php echo esc_html( $experience['title'] ); ?></h3>
            <p class="rtin-description"><?php echo esc_html( $experience['desc'] );?></p>
        </div>
    <?php endforeach; ?>
</div>