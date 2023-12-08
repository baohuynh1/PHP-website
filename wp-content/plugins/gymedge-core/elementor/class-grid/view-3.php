<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = $data['thumbnail_size'] ? $data['thumbnail_size'] : 'gymedge-size6';

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

$weeknames = gymedge_weeknames_large();

?>

<div class="rt-class-grid-nopag-2">
    <div class="row auto-clear">
        <?php if ( $query->have_posts() ) :?>
            <?php while ( $query->have_posts() ) : $query->the_post();?>
                <?php
                $schedules = get_post_meta( get_the_ID(), 'gym_class_schedule', true );
                $schedules = $schedules ? $schedules : array();
                $time_html = '';
                foreach ( $schedules as $schedule ) {
                    if ( !isset( $weeknames[$schedule['week']] ) || empty( $schedule['start_time'] ) ) continue;

                    $start_time = !empty( $schedule['start_time'] ) ? strtotime( $schedule['start_time'] ) : false;
                    $end_time   = !empty( $schedule['end_time'] ) ? strtotime( $schedule['end_time'] ) : false;

                    if ( GymEdge::$options['class_time_format'] == '24' ) {
                        $start_time = $start_time ? date( "H:i", $start_time ) : '';
                        $end_time   = $end_time ? date( "H:i", $end_time ) : '';
                    }
                    else {
                        $start_time = $start_time ? date( "g:ia", $start_time ) : '';
                        $end_time   = $end_time ? date( "g:ia", $end_time ) : '';
                    }

                    $time  = "{$weeknames[$schedule['week']]} : {$start_time}";
                    if ( $end_time ) {
                        $time .=  " - {$end_time}";
                    }
                    $time_html .= '<li><i class="fa fa-clock" aria-hidden="true"></i>' . $time . '</li>';
                }
                ?>
                <div class="<?php echo esc_attr( $col_class );?>">
                    <div class="rtin-item elementwidth elwidth-530-450-300">
                        <div class="rtin-image"><?php the_post_thumbnail( $thumb_size );?></div>
                        <div class="rtin-content">
                            <div class="rtin-content-inner">
                                <div class="rtin-left">
                                    <h3 class="rtin-class-title"><?php the_title(); ?></h3>
                                    <?php if ( $time_html ): ?>
                                        <ul class="rtin-class-time"><?php echo wp_kses_post( $time_html );?></ul>
                                    <?php endif; ?>
                                </div>
                                <div class="rtin-right">
                                    <div class="rtin-btn"><a href="<?php the_permalink();?>"><?php esc_html_e( 'Join Now', 'gymedge-core' );?><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
            <?php if ( $data['pagination_display'] == 'yes' ): ?>
                <div class="col-sm-12 col-xs-12"><?php rt_vc_pagination(); ?></div>
            <?php endif; ?>
        <?php endif;?>
    </div>
</div>
<?php wp_reset_query(); ?>