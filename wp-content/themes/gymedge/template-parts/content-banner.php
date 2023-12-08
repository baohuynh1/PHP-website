<?php
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$gym_title = woocommerce_page_title( false );
}
elseif ( is_404() ) {
	$gym_title = GymEdge::$options['error_title'];
}
elseif ( is_search() ) {
	$gym_title = esc_html__( 'Search Results for : ', 'gymedge' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$gym_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$gym_title = apply_filters( 'gym_blog_title', esc_html__( 'All Posts', 'gymedge' ) );
	}
}
elseif ( is_post_type_archive( 'gym_class' ) ) {
	$gym_title = esc_html__( 'All Classes', 'gymedge' );
}
elseif ( is_post_type_archive( 'gym_trainer' ) ) {
	$gym_title = esc_html__( 'All Trainers', 'gymedge' );
}
elseif ( is_archive() ) {
	$gym_title = get_the_archive_title();
}
else{
	$gym_title = get_the_title();
}

$gym_title = apply_filters( 'gym_page_title', $gym_title );
?>
<?php if ( GymEdge::$has_banner == '1' || GymEdge::$has_banner == 'on' ): ?>
	<div class="entry-banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="entry-banner-content">
						<h1 class="entry-title"><?php echo wp_kses_post( $gym_title );?></h1>
						<?php if ( GymEdge::$has_breadcrumb == '1' || GymEdge::$has_breadcrumb == 'on' ): ?>
							<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>