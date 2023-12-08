<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => $data['item_no'],
);

if ( !empty( $data['cat'] ) ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $data['cat'],
        )
    );
}
$query = new WP_Query( $args );

if ( !is_woocommerce() ){
    echo '<div class="woocommerce">';
}

$slider_nav_class = ( $data['slider_nav'] == 'yes' ) ? ' slider-nav-enabled' : '';
?>
    <div class="owl-wrap rt-owl-nav-2 rt-owl-dot-1 related products rt-product-slider-2<?php echo esc_attr( $slider_nav_class );?>">
        <?php if ( $query->have_posts() ) : ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <ul class="products"><?php wc_get_template_part( 'content', 'product' ); ?></ul>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <?php wp_reset_query();?>
    </div>
<?php
if ( !is_woocommerce() ){
    echo '</div>';
}