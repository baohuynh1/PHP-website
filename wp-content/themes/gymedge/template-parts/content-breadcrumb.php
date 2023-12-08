<div class="breadcrumb-area">
	<div class="entry-breadcrumb">
		<?php
		if( function_exists( 'bcn_display') ){
			if ( is_rtl() ) {
				bcn_display( false, true, true );
			}
			else {
				bcn_display();
			}
		}
		else {
			require_once GYMEDGE_INC_DIR . 'breadcrumbs.php';
			$args = array(
				'show_browse'   => false,
				'post_taxonomy'   => array(
					'product'     =>'product_cat',
					'gym_class'   =>'gym_class_category',
					'gym_trainer' =>'gym_team_category',
				)
			);
			$breadcrumb = new RDTheme_Breadcrumb( $args );
			$breadcrumb->trail();
		}
		?>
	</div>
</div>