<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.7
 */

$args = array(
    'post_type'        => 'gym_gallery',
    'posts_per_page'   => -1,
    'suppress_filters' => false
);

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

$posts = get_posts( $args );

$gallery = array();
$cats    = array();

foreach ( $posts as $post ) {
    $img_l = get_the_post_thumbnail_url( $post, 'gymedge-size6' );
    $img_s = get_post_thumbnail_id( $post );
    $terms = get_the_terms( $post, 'gym_gallery_category' );
    $terms = empty( $terms ) ? array() : $terms;
    $terms_html = '';

    foreach ( $terms as $term ) {
        $terms_html .= ' ' . $term->slug;
        if ( !isset( $cats[$term->slug] ) ) {
            $cats[$term->slug] = $term->name;
        }
    }

    $gallery[] = array(
        'img_l' => $img_l,
        'img_s' => $img_s,
        'title' => $post->post_title,
        'cats'  => $terms_html,
    );
}
$col_tab = ( $data['style'] == 'style1' ) ? 'col-md-8 col-xs-12' : 'col-sm-12 col-xs-12';
?>
<div class="rt-gallery-1 <?php echo esc_attr( $data['style'] );?>">
    <div class="row">
        <?php if ( $data['style'] == 'style1' ): ?>
            <div class="col-md-4 col-xs-12">
                <div class="rt-section-title"><?php echo esc_html( $data['title'] );?></div>
            </div>
        <?php endif; ?>
        <div class="<?php echo esc_attr( $col_tab );?>">
            <div class="rt-gallery-tab">
                <a href="#" data-filter="*" class="current"><?php echo esc_html( $data['all'] ); ?></a>
                <?php foreach ( $cats as $key => $value): ?>
                    <a href="#" data-filter=".<?php echo esc_attr( $key );?>"><?php echo esc_html( $value );?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row rt-gallery-wrapper">
        <?php foreach ( $gallery as $gallery_each ): 
            $galler_thumb = wp_get_attachment_image($gallery_each['img_s'], 'gymedge-size7', false, [
                'alt' => esc_html( $gallery_each['title'] )
            ])
            ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12<?php echo esc_attr( $gallery_each['cats'] );?>">
                <div class="rt-gallery-box">
                <?php echo $galler_thumb; ?>
                <div class="rt-gallery-content">
                    <a 
                    href="<?php echo esc_url( $gallery_each['img_l'] );?>" 
                    class="rt-gallery-1-zoom" 
                    title="<?php echo esc_html( $gallery_each['title'] );?>">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>