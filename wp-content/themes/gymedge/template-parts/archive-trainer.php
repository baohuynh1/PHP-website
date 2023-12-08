<?php
$thumb_size = 'gymedge-size3';
$col_class = "col-lg-4 col-md-4 col-sm-6 col-xs-12";
?>
<?php get_header(); ?>
<?php get_template_part('template-parts/content', 'banner');?>
<div id="primary" class="content-area">
	<div class="container">
		<main id="main" class="site-main">
			<?php if ( have_posts() ) :?>
				<div class="rt-team-grid-1 rt-team-archive">
					<div class="row auto-clear">
						<?php while ( have_posts() ) : the_post();?>
							<?php
							$id = get_the_id();
							$socials = get_post_meta( $id, 'gym_trainer_socials', true );
							$designation = get_post_meta( $id, 'gym_trainer_designation', true );
							?>
							<div class="<?php echo esc_attr( $col_class );?>">
								<div class="vc-item-wrap">
									<div class="vc-item">
										<?php the_post_thumbnail( $thumb_size );?>
										<div class="vc-overly">
											<?php if ( !empty( $socials ) ): ?>
												<ul>
													<?php foreach ( $socials as $key => $social ): ?>
														<?php if ( !empty( $social ) ): ?>
															<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( GymEdge::$trainer_social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
														<?php endif; ?>
													<?php endforeach; ?>
												</ul>
											<?php endif; ?>
										</div>
										<div class="vc-meta">
											<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
											<?php if ( $designation ): ?>
												<div><?php echo esc_html( $designation );?></div>
											<?php endif; ?>
										</div>
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