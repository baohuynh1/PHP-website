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

$count = $data['limit'];

$query = new WP_Query( $args );

?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="owl-wrap rt-owl-nav-1 rt-owl-post-1 rt-owl-dot-1">
            <div class="section-title">
                <?php if (!empty( $data['title'] )): ?>
                    <h2 class="owl-custom-nav-title"><?php echo esc_html( $data['title'] ); ?></h2>
                <?php endif; ?>
                <?php if ( $data['slider_nav'] == 'yes' ): ?>
                    <div class="owl-custom-nav">
                        <?php GymEdge_Helper::owl_custom_navs(); ?>
                    </div>
                <?php endif; ?>
                <div class="owl-custom-nav-bar"></div>
                <div class="clear"></div>
            </div>
            <div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] ); ?>">
                <?php if ( $query->have_posts() ) :?>
                    <?php while ( $query->have_posts() ) : $query->the_post();?>
                        <?php
                        $content = GymEdge_Helper::get_current_post_content();
                        $content = wp_trim_words( $content, $count );
                        $thumb_class = has_post_thumbnail() ? '':' vc-nothumb';
                        ?>
                        <div class="single-item<?php echo esc_attr( $thumb_class );?>">
                            <div class="single-item-meta">
                                <a href="<?php the_permalink();?>" class="single-item-image"><?php the_post_thumbnail( $thumb_size );?></a>
                                <div class="date"><?php the_time( 'j' );?><br/><?php the_time( 'M' );?><br/><?php the_time( 'Y' );?></div>
                            </div>
                            <div class="single-item-content">
                                <h3 class="rtin-post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
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

