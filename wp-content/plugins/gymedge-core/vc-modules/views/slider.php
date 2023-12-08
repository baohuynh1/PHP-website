<?php

$class = vc_shortcode_custom_css_class( $css );

$sliders     = vc_param_group_parse_atts( $slide_items );
$show_dots   = ( in_array( $slider_navigation, [ 'dots', 'both' ] ) );
$show_arrows = ( in_array( $slider_navigation, [ 'arrows', 'both' ] ) );

$animation_overflow = $slider_zoomin = $slider_zoomout = '';
if ( 'hidden' == $overflow ) {
	$animation_overflow = "overflow:hidden;";
}

$slides_count  = count( $sliders );
$slider_option = json_encode( $swipper_data );


// BG Animation
if ( $slider_bg_animation == 'zoom-in' ) {
	$slider_zoomin = 'data-swiper-parallax-scale="1.1" data-swiper-parallax-duration="1500"';
} elseif ( $slider_bg_animation == 'zoom-out' ) {
	$slider_zoomout = 'zoom-out';
}
wp_enqueue_style( 'swiper' );
wp_enqueue_script( 'swiper' );

$uid = uniqid();

?>

<div id="rt-slider-<?php echo esc_attr( $uid ) ?>" class="rt-main-slider-wrapper vc-main-slider <?php echo esc_attr( $class ); ?>">
    <div class="rt-slider-wrapper swiper-container rt-swiper-slider <?php echo esc_attr( $arrow_visibility ) ?>" data-option="<?php echo esc_js( $slider_option ); ?>">
        <div class="rt-slider swiper-wrapper">
			<?php if ( $sliders ) :
				foreach ( $sliders as $slide ) :
					$image = wp_get_attachment_image_url( $slide['slider_image'], 'full' );

					$link = vc_build_link( $slide['slider_link'] );
					if ( ! empty( $link ) && is_array( $link ) ) {
						$a_href   = isset( $link['url'] ) ? $link['url'] : '';
						$a_title  = isset( $link['title'] ) ? $link['title'] : '';
						$a_target = trim( $link['target'] );
						$target   = $title = '';
						$target   = $a_target ? 'target=' . $a_target . '' : null;
						$title    = $a_title ? 'title=' . $a_title . '' : null;
					}
					// Title Animatin
					$title_x_paralax        = isset( $slide["title_x_paralax"] ) ? ' data-swiper-parallax-x="' . $slide["title_x_paralax"] . '"' : '';
					$title_y_paralax        = isset( $slide["title_y_paralax"] ) ? ' data-swiper-parallax-y="' . $slide["title_y_paralax"] . '"' : '';
					$title_paralax_delay    = isset( $slide["title_paralax_delay"] ) ? 'transition-delay:' . $slide["title_paralax_delay"] . 'ms' : '';
					$title_paralax_opacity  = ' data-swiper-parallax-opacity="0"';
					$title_paralax_duration = ' data-swiper-parallax-duration="800"';

					// Subtitle Animatin
					$subtitle_x_paralax        = isset( $slide["subtitle_x_paralax"] ) ? ' data-swiper-parallax-x="' . $slide["subtitle_x_paralax"] . '"' : '';
					$subtitle_y_paralax        = isset( $slide["subtitle_y_paralax"] ) ? ' data-swiper-parallax-y="' . $slide["subtitle_y_paralax"] . '"' : '';
					$subtitle_paralax_delay    = isset( $slide["subtitle_paralax_delay"] ) ? 'transition-delay:' . $slide["subtitle_paralax_delay"] . 'ms' : '';
					$subtitle_paralax_opacity  = ' data-swiper-parallax-opacity="0"';
					$subtitle_paralax_duration = ' data-swiper-parallax-duration="800"';

					// Button Animatin
					$btn_x_paralax        = isset( $slide["btn_x_paralax"] ) ? ' data-swiper-parallax-x="' . $slide["btn_x_paralax"] . '"' : '';
					$btn_y_paralax        = isset( $slide["btn_y_paralax"] ) ? ' data-swiper-parallax-y="' . $slide["btn_y_paralax"] . '"' : '';
					$btn_paralax_delay    = isset( $slide["btn_paralax_delay"] ) ? 'transition-delay:' . $slide["btn_paralax_delay"] . 'ms' : '';
					$btn_paralax_opacity  = ' data-swiper-parallax-opacity="0"';
					$btn_paralax_duration = ' data-swiper-parallax-duration="800"';

					?>
                    <div class="swiper-slide">

                        <div class="slider-inner-wrapper">
                            <div class="bg <?php echo esc_attr( $slider_zoomout ); ?>" <?php echo $slider_zoomin ?>
                                 style="background-image:url(<?php echo esc_url( $image ) ?>)"></div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
										<?php if ( isset( $slide['title'] ) ) : ?>
                                            <div class="slider-title-wrap rt-slider-content-wrap" style="<?php echo esc_attr( $animation_overflow ); ?>">
                                                <h2 style="<?php echo esc_attr( $title_paralax_delay ) ?>" <?php echo( $title_x_paralax . $title_y_paralax
												                                                                       . $title_paralax_opacity . $title_paralax_duration ) ?>>
													<?php echo $slide['title'] ?>
                                                </h2>
                                            </div>
										<?php endif; ?>

										<?php if ( isset( $slide['subtitle'] ) ) : ?>
                                            <div class="slider-subtitle-wrap rt-slider-content-wrap" style="<?php echo esc_attr( $animation_overflow ); ?>">
                                                <h4 style="<?php echo esc_attr( $subtitle_paralax_delay ) ?>" <?php echo( $subtitle_x_paralax . $subtitle_y_paralax
												                                                                          . $subtitle_paralax_opacity
												                                                                          . $subtitle_paralax_duration ) ?>><?php echo $slide['subtitle'] ?></h4>
                                            </div>
										<?php endif; ?>

										<?php

										if ( $button_text ) : ?>
                                            <div class="slider-button rt-slider-content-wrap" style="<?php echo esc_attr( $animation_overflow ); ?>">
                                                <div class="slider-btn" style="<?php echo esc_attr( $btn_paralax_delay ) ?>" <?php echo( $btn_x_paralax . $btn_y_paralax
												                                                                                         . $btn_paralax_opacity
												                                                                                         . $btn_paralax_duration ) ?>>
                                                    <a class="slider-dark-button" href="<?php echo esc_url( $a_href ); ?>" <?php echo esc_attr( $title . ' ' . $target ); ?>>
                                                        <span><?php echo esc_html( $button_text ) ?></span>
                                                    </a>


                                                </div>
                                            </div>
										<?php endif; ?>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
				<?php endforeach;
			endif; ?>
        </div>

		<?php if ( 1 < $slides_count ) : ?>
			<?php if ( $show_dots ) : ?>
                <div class="swiper-pagination"></div>
			<?php endif; ?>
			<?php if ( $show_arrows ) : ?>
                <div class="elementor-swiper-button elementor-swiper-button-prev rt-prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </div>
                <div class="elementor-swiper-button elementor-swiper-button-next rt-next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
			<?php endif; ?>
		<?php endif; ?>

    </div>
</div>
<?php
$_height     = intval( rtrim( $slider_height, 'px' ) );
$_mid_height = absint( $_height / 100 * 80 );
$_min_height = absint( $_height / 100 * 60 );
?>
<style>
    #rt-slider-<?php echo esc_attr($uid) ?> .swiper-slide {
        min-height: <?php echo esc_attr( $_height . "px;") ?>
    }

    @media (max-width: 1200px) {
        #rt-slider-<?php echo esc_attr($uid) ?> .swiper-slide {
            min-height: <?php echo esc_attr( ($_mid_height > 600 ? $_mid_height : 600) . "px;") ?>
        }
    }

    @media (max-width: 767px) {
        #rt-slider-<?php echo esc_attr($uid) ?> .swiper-slide {
            min-height: <?php echo esc_attr( ($_min_height > 400 ? $_min_height : 600) . "px;") ?>
        }
    }

    <?php if($slider_color) : ?>
    #rt-slider-<?php echo esc_attr($uid) ?> .rt-slider-wrapper .slider-title-wrap h2 span {
        color: <?php echo esc_attr($slider_color) ?>;
    }

    #rt-slider-<?php echo esc_attr($uid) ?>.rt-main-slider-wrapper.vc-main-slider .elementor-swiper-button i,
    #rt-slider-<?php echo esc_attr($uid) ?> .rt-swiper-slider .slider-dark-button {
        border-color: <?php echo esc_attr($slider_color) ?>;
    }

    #rt-slider-<?php echo esc_attr($uid) ?>.vc-main-slider .swiper-pagination-bullet.swiper-pagination-bullet-active,
    #rt-slider-<?php echo esc_attr($uid) ?>.rt-main-slider-wrapper.vc-main-slider .elementor-swiper-button i:hover,
    #rt-slider-<?php echo esc_attr($uid) ?> .rt-swiper-slider .slider-dark-button:hover {
        background-color: <?php echo esc_attr($slider_color) ?>;
    }
    <?php endif; ?>
</style>