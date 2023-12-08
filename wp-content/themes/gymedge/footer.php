<?php
$gym_socials = array(
	'social_facebook' => array(
		'icon' => 'fa-facebook',
		'url'  => GymEdge::$options['social_facebook'],
	),
	'social_twitter' => array(
		'icon' => 'fa-twitter',
		'url'  => GymEdge::$options['social_twitter'],
	),
	'social_gplus' => array(
		'icon' => 'fa-google-plus',
		'url'  => GymEdge::$options['social_gplus'],
	),
	'social_linkedin' => array(
		'icon' => 'fa-linkedin',
		'url'  => GymEdge::$options['social_linkedin'],
	),
	'social_youtube' => array(
		'icon' => 'fa-youtube',
		'url'  => GymEdge::$options['social_youtube'],
	),
	'social_pinterest' => array(
		'icon' => 'fa-pinterest',
		'url'  => GymEdge::$options['social_pinterest'],
	),
	'social_instagram' => array(
		'icon' => 'fa-instagram',
		'url'  => GymEdge::$options['social_instagram'],
	),
	'social_skype' => array(
		'icon' => 'fa-skype',
		'url'  => GymEdge::$options['social_skype'],
	),
);
$gym_socials = array_filter( $gym_socials, array( 'GymEdge_Helper' , 'filter_social' ) );

//Footer Logo
$gym_footer_logo = empty( GymEdge::$options['footer2_logo']['url'] ) ? GYMEDGE_IMG_URL . 'logo2.png' : GymEdge::$options['footer2_logo']['url'];
$footer_logo_width = GymEdge::$options['footer2_logo']['width'] ?? '';
$footer_logo_height = GymEdge::$options['footer2_logo']['height'] ?? '';
$footer_logo_dimensions = (!empty($footer_logo_width) && !empty($footer_logo_height)) ? 'width="'.$footer_logo_width.'" height="'.$footer_logo_height.'"' : 'width="153" height="42"';

?>
</div><!-- #content -->
<footer>
	<?php if ( GymEdge::$options['footer_style'] != 'style2' ): ?>
		<?php $gym_footer_count = wp_get_sidebars_widgets(); ?>
		<?php if ( !empty( $gym_footer_count['footer'] ) ): ?>
			<div class="footer-top-area">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar( 'footer' ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php else: ?>
		<div class="footer-2-area">
			<div class="container">
				
				<div class="footer2-logo">
					<img <?php echo $footer_logo_dimensions; ?> src="<?php echo esc_url( $gym_footer_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>">
				</div>
				
				<?php if ( !empty( $gym_socials ) ): ?>
					<div class="footer2-social">
						<?php foreach ( $gym_socials as $gym_social ): ?>
							<a target="_blank" href="<?php echo esc_url( $gym_social['url'] );?>"><i class="fab fa-fw <?php echo esc_attr( $gym_social['icon'] );?>"></i></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<div class="footer2-contents"><?php echo wp_kses_post( GymEdge::$options['footer2_content'] );?></div>

				<?php if ( GymEdge::$options['top_phone'] || GymEdge::$options['top_email'] ): ?>
					<div class="footer2-contact">
						<?php if ( GymEdge::$options['top_phone'] ): ?>
							<div class="footer2-contact-item">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_attr( GymEdge::$options['top_phone'] );?>"><?php echo esc_html( GymEdge::$options['top_phone'] );?></a>
							</div>
						<?php endif; ?>
						<?php if ( GymEdge::$options['top_email'] ): ?>
							<div class="footer2-contact-item">
								<i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php echo esc_attr( GymEdge::$options['top_email'] );?>"><?php echo esc_html( GymEdge::$options['top_email'] );?></a>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>	
		</div>
	<?php endif; ?>
	<div class="footer-bottom-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="footer-bottom">
						<p><?php echo wp_kses_post( GymEdge::$options['copyright_text'] );?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</div><!-- #page -->
<?php if ( GymEdge::$options['back_to_top'] == 1 ): ?>
	<a href="#" class="scrollToTop"></a>
<?php endif; ?>
<?php wp_footer();?>
</body>
</html>