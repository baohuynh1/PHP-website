<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = $data['thumbnail_size'] ? $data['thumbnail_size'] : 'gymedge-size2';

if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
}
else {
    $paged = 1;
}

$args = array(
    'post_type'         => 'gym_class',
    'posts_per_page'    => $data['item_no'],
    'orderby'           => $data['orderby'],
    'order'             => $data['sortby'],
    'paged'             => $paged,
);

if ( !empty( $data['cat'] ) ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'gym_class_category',
            'field' => 'term_id',
            'terms' => $data['cat'],
        )
    );
}

$query = new WP_Query( $args );

$col_lg = isset($data['col_lg']) ? $data['col_lg'] : 4;
$col_md = isset($data['col_md']) ? $data['col_md'] : 4;
$col_sm = isset($data['col_sm']) ? $data['col_sm'] : 6;
$col_xs = isset($data['col_xs']) ? $data['col_xs'] : 12;

$col_class = "col-lg-$col_lg col-md-$col_md col-sm-$col_sm col-xs-$col_xs";

global $wp_query;
$wp_query = NULL;
$wp_query = $query;

?>
<div class="rt-class-grid-2">
    <div class="row auto-clear">
        <?php if ( $query->have_posts() ) :?>
            <?php while ( $query->have_posts() ) : $query->the_post();?>
                <?php
                $content = GymEdge_Helper::get_current_post_content();
                $content = wp_trim_words( $content, 11 );
                ?>
                <div class="<?php echo esc_attr( $col_class );?>">
                    <div class="single-item">
                        <div class="single-item-content">
                            <div class="single-item-image"><?php the_post_thumbnail( $thumb_size );?></div>
                            <div class="overly"></div>
                            <div class="details"><a href="<?php the_permalink();?>"><?php esc_html_e( 'Details', 'gymedge-core' ); ?></a></div>
                        </div>
                        <div class="single-item-meta">
                            <h3 class="rtin-class-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="rtin-class-content"><?php echo $content; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php if ( $data['pagination_display'] == 'yes' ): ?>
                <div class="col-sm-12 col-xs-12"><?php rt_vc_pagination(); ?></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php wp_reset_query(); ?>