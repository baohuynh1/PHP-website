<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'gymedge-size2';

$args = array(
    'posts_per_page' => $data['item_no'],
);

if (!empty($data['cat'])) {
    $args['cat'] = $data['cat'];
}

$orderby = $data['orderby'];

switch ( $orderby ) {
    case 'title':
        $args['orderby'] = 'title';
        $args['order']   = 'ASC';
        break;
    case 'menu_order':
        $args['orderby'] = 'menu_order';
        $args['order']   = 'ASC';
        break;
}

$query = new WP_Query( $args );

$count = $data['limit'];
$slider_nav_class = ( $data['slider_nav'] == 'yes' ) ? ' slider-nav-enabled' : '';

?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="owl-wrap rt-owl-nav-2 rt-owl-dot-1 rt-owl-post-2<?php echo esc_attr( $slider_nav_class ); ?>">
            <div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
                <?php if ( $query->have_posts() ) :?>
                    <?php while ( $query->have_posts() ) : $query->the_post();?>
                        <?php
                        $content = GymEdge_Helper::get_current_post_content();
                        $content = wp_trim_words( $content, $count );
                        ?>
                        <div class="single-item">
                            <div class="single-item-content">
                                <div class="single-item-image"><?php the_post_thumbnail( $thumb_size );?></div>
                                <div class="overly"></div>
                                <div class="date"><?php the_time( 'j' ); ?><br/><?php the_time( 'M' );?><br/><?php the_time( 'Y' );?></div>
                                <div class="details"><a href="<?php the_permalink(); ?>"><i class="fa fa-link" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="single-item-meta">
                                <h3 class="rtin-post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                <p class="rtin-post-content"><?php echo wp_kses_post($content); ?></p>
                            </div>
                        </div>
                    <?php endwhile;?>
                <?php endif;?>
                <?php wp_reset_query();?>
            </div>
        </div>
    </div>
</div>

