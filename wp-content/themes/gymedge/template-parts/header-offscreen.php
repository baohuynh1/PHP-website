<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$gym_pagemenu = false;
if ( ( is_single() || is_page() ) ) {
	$gym_menuid = get_post_meta( get_the_id(), 'gym_page_menu', true );
	if ( !empty( $gym_menuid ) && $gym_menuid != 'default' ) {
		$gym_pagemenu = $gym_menuid;
	}
}

//Logo
$greenova_dark_logo = empty( GymEdge::$options['logo']['url'] ) ? GYMEDGE_IMG_URL . 'logo-dark.png' : GymEdge::$options['logo']['url'];

//Logo dimensions
$dark_logo_width = GymEdge::$options['logo']['width'];
$dark_logo_height = GymEdge::$options['logo']['height'];
$dark_logo_dimensions = (!empty($dark_logo_width) && !empty($dark_logo_height)) ? 'width="'.$dark_logo_width.'" height="'.$dark_logo_height.'"' : 'width="211" height="58"';
?>

<div class="rt-header-menu mean-container mobile-offscreen-menu" id="meanmenu">
    <div class="mean-bar">
        <div class="mobile-logo">
            <a href="<?php echo esc_url(home_url('/'));?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) );?>">
                <img <?php echo $dark_logo_dimensions; ?> src="<?php echo esc_url( $greenova_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>">
            </a>
        </div>
        <span class="sidebarBtn ">
            <span class="fa fa-bars">
            </span>
        </span>
    </div>

    <div class="rt-slide-nav">
        <div class="offscreen-navigation">
            <?php 
                if ( $gym_pagemenu ) {
                    wp_nav_menu( array( 'menu' => $gym_pagemenu,'container' => 'nav', 'fallback_cb' => 'false' ) );
                }
                else{
                    wp_nav_menu( array( 'theme_location' => 'primary','container' => 'nav', 'fallback_cb' => 'false' ) );
                }
            ?>
        </div>
    </div>
</div>
