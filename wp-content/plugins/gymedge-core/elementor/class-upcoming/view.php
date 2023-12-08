<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$schedule = $this->get_schedule( $data['item_no'] );

$count = 0;

?>

<div class="rt-owl-upcoming-1">
    <div class="rt-heading">
        <div class="rt-heading-left"><?php echo wp_kses_post( $data['title'] ); ?></div>
        <div class="rt-heading-right">
            <div class="rt-arrow rt-arrow-1"><i class="fa fa-angle-left"></i></div>
            <div class="rt-arrow rt-arrow-2"><i class="fa fa-angle-right"></i></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="owl-wrap">
        <div class="owl-theme owl-carousel rt-owl-carousel-2" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
            <?php foreach ( $schedule as $class_data ): ?>
                <?php $count++;
                $time = $class_data['start_time'];
                if ( $class_data['end_time'] ) {
                    $time .=  "- {$class_data['end_time']}";
                }
                $time .= ", {$class_data['weekname']}";
                ?>
                <div class="rt-item <?php echo $count % 2 ? 'rt-odd':'rt-even';?>">
                    <div class="rt-title"><?php echo esc_html( $class_data['class'] );?></div>
                    <div class="rt-meta"><i class="fa fa-clock" aria-hidden="true"></i><?php echo esc_html( $time ); ?></div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="clear"></div>
</div>