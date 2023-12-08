<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
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
        <div class="owl-wrap rt-owl-dot-1 rt-owl-testimonial-1">
            <?php if ( !empty( $data['title'] ) ): ?>
                <div class="section-title">
                    <h2 class="testimonial-section-title"><?php echo esc_html( $data['title'] ); ?></h2>
                </div>
            <?php endif; ?>
            <div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] ); ?>">
                <?php if ( $query->have_posts() ) :?>
                    <?php while ( $query->have_posts() ) : $query->the_post();?>
                        <?php
                        $id = get_the_id();
                        $designation = get_post_meta( $id, 'gym_tes_designation', true );
                        ?>
                        <div class="rt-vc-item media">
                            <div class="pull-left rt-vc-img">
                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                            </div>
                            <div class="media-body rt-vc-content">
                                <h3 class="rtin-client-name"><?php the_title(); ?>
                                    <?php if ( !empty( $designation ) ): ?>
                                        <span class="rtin-client-designation"> / <?php echo esc_html( $designation ); ?></span>
                                    <?php endif; ?>
                                </h3>
                                <div class="rtin-client-info"><?php the_content(); ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query();?>
            </div>
        </div>
    </div>
</div>