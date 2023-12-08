<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.6
 */

$args = array(
    'post_type'      => 'gym_testimonial',
    'posts_per_page' => $data['item_no'],
    'orderby' => $data['orderby'],
    'order'   => $data['sortby'],
);

if ( !empty( $data['cat'] ) ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'gym_testimonial_category',
            'field' => 'term_id',
            'terms' => $data['cat'],
        )
    );
}

$query = new WP_Query( $args );

global $wp_query;
$wp_query = NULL;
$wp_query = $query;

?>
<div class="rt-vc-testimonial-3 rtin-<?php echo esc_attr( $data['theme'] ); ?>">
    <?php if ( !empty( $data['title'] ) ): ?>
        <h2 class="rtin-title testimonial-section-title"><?php echo esc_html( $data['title'] ); ?></h2>
    <?php endif; ?>
    <?php if ( !empty( $data['subtitle'] ) ): ?>
        <p class="rtin-subtitle"><?php echo wp_kses_post( $data['subtitle'] ); ?></p>
    <?php endif; ?>
    <div class="rtin-content owl-wrap">
        <div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] ); ?>">
            <?php if ( $query->have_posts() ) :?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php
                    $id = get_the_id();
                    $designation = get_post_meta( $id, 'gym_tes_designation', true );
                    ?>
                    <div class="rtin-item">
                        <h3 class="rtin-item-title rtin-client-name"><?php the_title(); ?></h3>
                        <?php if ( !empty( $designation ) ): ?>
                            <div class="rtin-designation rtin-client-designation"><?php echo esc_html( $designation ); ?></div>
                        <?php endif; ?>
                        <div class="rtin-item-content rtin-client-info"><?php the_content(); ?></div>
                        <div class="rtin-icon"><i class="fa fa-quote-right" aria-hidden="true"></i></div>
                    </div>
                <?php endwhile;?>
            <?php endif;?>
            <?php wp_reset_query();?>
        </div>
    </div>
</div>