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
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="owl-wrap rt-owl-dot-1 rt-owl-testimonial-2">
            <div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] ); ?>">
                <?php if ( $query->have_posts() ) :?>
                    <?php while ( $query->have_posts() ) : $query->the_post();?>
                        <?php
                        $id = get_the_id();
                        $designation = get_post_meta( $id, 'gym_tes_designation', true );
                        ?>
                        <div class="rt-vc-item">
                            <div class="rt-vc-content rtin-client-info"><?php the_content(); ?></div>
                            <?php if ( has_post_thumbnail() ): ?>
                                <div class="rt-vc-thumb"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
                            <?php endif; ?>
                            <h3 class="rt-vc-title rtin-client-name"><?php the_title(); ?></h3>
                            <?php if ( !empty( $designation ) ): ?>
                                <div class="rt-vc-designation rtin-client-designation"><?php echo esc_html( $designation ); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query();?>
            </div>
        </div>
    </div>
</div>