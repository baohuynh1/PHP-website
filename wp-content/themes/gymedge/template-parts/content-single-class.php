<?php
global $post;
$gym_schedules = get_post_meta( $post->ID, 'gym_class_schedule', true );
$gym_weeknames = gymedge_weeknames_large();
$class_details = apply_filters( 'gymedge_class_details_text', [
	'Schedule',
	'Class time',
	'Trainer',
] );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-header-single">
		<?php if ( has_post_thumbnail() ): ?>
            <div class="entry-thumbnail"><?php the_post_thumbnail( 'gymedge-size1' ); ?></div>
		<?php endif; ?>
    </div>
    <div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
    </div>
	<?php if ( ! empty( $gym_schedules ) ): ?>
        <div class="entry-footer class-footer">
            <h3><?php esc_html_e( $class_details[0], 'gymedge' ); ?></h3>
			<?php foreach ( $gym_schedules as $gym_schedule ): ?>
				<?php
				if ( ! isset( $gym_weeknames[ $gym_schedule['week'] ] ) || ! $gym_schedule['start_time'] ) {
					continue;
				}

				$gym_trainer = false;
				if ( ! empty( $gym_schedule['trainer'] ) && get_post_status( $gym_schedule['trainer'] ) ) {
					$gym_trainer      = true;
					$gym_trainer_name = get_the_title( $gym_schedule['trainer'] );
					$gym_trainer_link = get_permalink( $gym_schedule['trainer'] );
				}

				$start_time = ! empty( $gym_schedule['start_time'] ) ? strtotime( $gym_schedule['start_time'] ) : false;
				$end_time   = ! empty( $gym_schedule['end_time'] ) ? strtotime( $gym_schedule['end_time'] ) : false;

				if ( GymEdge::$options['class_time_format'] == '24' ) {
					$start_time = $start_time ? date_i18n( "H:i", $start_time ) : '';
					$end_time   = $end_time ? date_i18n( "H:i", $end_time ) : '';
				} else {
					$start_time = $start_time ? date_i18n( "g:ia", $start_time ) : '';
					$end_time   = $end_time ? date_i18n( "g:ia", $end_time ) : '';
				}

				$time = "{$gym_weeknames[$gym_schedule['week']]}, {$start_time}";
				if ( $end_time ) {
					$time .= "- {$end_time}";
				}

				if ( is_rtl() ) {
					$time = "{$gym_weeknames[$gym_schedule['week']]}/ {$start_time}";
					if ( $end_time ) {
						$time .= "- {$end_time}";
					}
				}
				?>
                <ul>
                    <li><i class="fa fa-clock" aria-hidden="true"></i><?php esc_html_e( $class_details[1], 'gymedge' ); ?> : <?php echo esc_html( $time ); ?></li>
					<?php if ( $gym_trainer ): ?>
                        <li><i class="fa fa-user" aria-hidden="true"></i><?php esc_html_e( $class_details[2], 'gymedge' ); ?> : <a href="<?php echo esc_url( $gym_trainer_link ); ?>"><?php echo esc_html( $gym_trainer_name ); ?></a></li>
					<?php endif; ?>
                </ul>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>
</article>