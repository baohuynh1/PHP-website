<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// css classes
$schedule_class  = '';
$schedule_class .= ( $data['schedule_background'] != 'yes' ) ? ' schedule-no-background' : ' schedule-has-background';
$schedule_class .= ( $data['btn_display'] != 'yes' ) ? ' schedule-no-button' : ' schedule-has-button';

// week names array
$weeknames = gymedge_weeknames_large();

// class post types array
$args = array(
    'posts_per_page'   => -1,
    'post_type'        => 'gym_class',
    'suppress_filters' => false
);

if ( !empty( $data['category'] ) && ! in_array('0', $data['category'])) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'gym_class_category',
            'field' => 'term_id',
            'terms' => $data['category'],
        )
    );
}

$classes = get_posts( apply_filters( 'gymedge_schedule_args', $args ) );
$uniqid = (int) rand();

$week_ids = array(
    'mon' => 'mon-'. $uniqid,
    'tue' => 'tue-'. $uniqid,
    'wed' => 'wed-'. $uniqid,
    'thu' => 'thu-'. $uniqid,
    'fri' => 'fri-'. $uniqid,
    'sat' => 'sat-'. $uniqid,
    'sun' => 'sun-'. $uniqid,
);

$schedule = array(
    'mon' => array(),
    'tue' => array(),
    'wed' => array(),
    'thu' => array(),
    'fri' => array(),
    'sat' => array(),
    'sun' => array(),
);

foreach ( $classes as $class ) {
    $class_name  = $class->post_title;
    $button_text = get_post_meta( $class->ID, 'gym_class_button_text', true );
    $button_url  = get_post_meta( $class->ID, 'gym_class_button_url', true );
    $metas = get_post_meta( $class->ID, 'gym_class_schedule', true );
    $metas = ( $metas != '' ) ? $metas : array();

    foreach ( $metas as $meta ) {

        $start_time = !empty( $meta['start_time'] ) ? strtotime( $meta['start_time'] ) : false;
        $end_time   = !empty( $meta['end_time'] ) ? strtotime( $meta['end_time'] ) : false;

        if ( GymEdge::$options['class_time_format'] == '24' ) {
            $start_time = $start_time ? date( "H:i", $start_time ) : '';
            $end_time   = $end_time ? date( "H:i", $end_time ) : '';
        }
        else {
            $start_time = $start_time ? date( "g:ia", $start_time ) : '';
            $end_time   = $end_time ? date( "g:ia", $end_time ) : '';
        }

        $schedule[$meta['week']][] = array(
            'class'       => $class_name,
            'trainer'     => !empty( $meta['trainer'] ) ? get_the_title( $meta['trainer'] ) : '',
            'start_time'  => $start_time,
            'end_time'    => $end_time,
            'button_text' => $button_text,
            'button_url'  => $button_url,
        );
    }
}

// remove empty fields
foreach ( $schedule as $key => $value ) {
    if ( !$value ) {
        unset( $weeknames[$key] );
        unset( $week_ids[$key] );
    }
}

// sort by time
foreach ( $schedule as $key => $value ) {
    usort( $schedule[$key], array( $this, 'sort_by_time' ) );
}

?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="rt-class-schedule-1<?php echo esc_attr( $schedule_class );?>">
            <ul class="nav nav-tabs">
                <?php
                $count = 1;
                ?>
                <?php foreach ( $weeknames as $weekid => $weekname ): ?>
                    <?php
                    $id = $week_ids[$weekid];
                    $active_class = ( 1 == $count ) ? 'active' : '';
                    $count++;
                    ?>
                    <li><a class="<?php echo esc_attr( $active_class ); ?>" href="#t<?php echo esc_attr( $id );?>" data-toggle="tab"><?php echo esc_html( $weekname );?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="tab-content class-schedule-tab">
                <?php
                $count = 1;
                ?>
                <?php foreach ( $week_ids as $key => $id ): ?>
                    <?php
                    $active_class = ( 1 == $count ) ? ' show active' : '';
                    $count++;
                    ?>
                    <div class="tab-pane fade<?php echo esc_attr( $active_class );?>" id="t<?php echo esc_attr( $id );?>">
                        <?php foreach ( $schedule[$key] as $value ): ?>
                            <?php
                            $time = $value['start_time'];
                            if ( !empty( $value['end_time'] ) ) {
                                $time .=  " - {$value['end_time']}";
                            }
                            ?>
                            <ul>
                                <li class="rtin-class-name"><?php echo esc_html( $value['class'] );?></li>
                                <li class="rtin-class-time"><?php echo esc_html( $time );?></li>
                                <li class="rtin-class-trainer"><?php echo esc_html( $value['trainer'] );?></li>
                                <?php if ( $data['btn_display'] == 'yes' && !empty( $value['button_text'] ) && !empty( $value['button_url'] ) ): ?>
                                    <li class="rtin-btn"><a href="<?php echo esc_url( $value['button_url'] );?>"><?php echo esc_html( $value['button_text'] );?></a></li>
                                <?php endif; ?>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>