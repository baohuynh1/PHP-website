<?php
$thumb_size = 'gymedge-size5';
$col_class  = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';

$weeknames = array(
	'mon' => esc_html__( 'Mon', 'gymedge' ),
	'tue' => esc_html__( 'Tue', 'gymedge' ),
	'wed' => esc_html__( 'Wed', 'gymedge' ),
	'thu' => esc_html__( 'Thu', 'gymedge' ),
	'fri' => esc_html__( 'Fri', 'gymedge' ),
	'sat' => esc_html__( 'Sat', 'gymedge' ),
	'sun' => esc_html__( 'Sun', 'gymedge' ),
);
$weeknames = apply_filters( 'gym_weeknames_short', $weeknames );
?>
<?php get_header(); ?>
<?php get_template_part('template-parts/content', 'banner');?>
<div id="primary" class="content-area">
	<div class="container">
		<main id="main" class="site-main">
			<?php if ( have_posts() ) :?>
				<div class="rt-class-grid-1">
					<div class="row auto-clear">
						<?php while ( have_posts() ) : the_post();?>
							<?php
							$id = get_the_id();
							$schedule = get_post_meta( $id, 'gym_class_schedule', true );
							$schedule = ( $schedule != '' ) ? $schedule : array();
							$schedule_limit = apply_filters( 'gym_schedule_limit', false );
							if ( $schedule_limit ) {
								$schedule = array_slice( $schedule, 0, $schedule_limit );
							}
							?>
							<div class="<?php echo esc_attr( $col_class );?>">
								<div class="vc-item-wrap">
									<div class="vc-item">
										<?php the_post_thumbnail( $thumb_size );?>
										<div class="vc-overly">
											<ul class="vc-grid-ul-parent">
												<?php foreach ( $schedule as $time ): ?>
													<?php if ( !empty( $time['week'] ) && !empty( $time['start_time'] ) ): ?>
														<?php
														$start_time = !empty( $time['start_time'] ) ? strtotime( $time['start_time'] ) : false;

														if ( GymEdge::$options['class_time_format'] == '24' ) {
															$start_time = $start_time ? date( "H:i", $start_time ) : '';
														}
														else {
															$start_time = $start_time ? date( "g:ia", $start_time ) : '';
														}
														?>
														<li>
															<ul class="vc-grid-ul-child">
																<li><?php echo esc_html( $weeknames[$time['week']] );?></li>
																<li><?php echo esc_html( $start_time );?></li>
															</ul>
														</li>
													<?php endif; ?>
												<?php endforeach; ?>
											</ul>
										</div>
										<a class="vc-meta" href="<?php the_permalink();?>"><?php the_title();?></a>
									</div>
								</div>
							</div>
						<?php endwhile;?>
					</div>
					<?php GymEdge_Helper::pagination();?>
				</div>
			<?php else:?>
				<?php get_template_part( 'template-parts/content', 'none' );?>
			<?php endif;?>
		</main>
	</div>
</div>
<?php get_footer(); ?>