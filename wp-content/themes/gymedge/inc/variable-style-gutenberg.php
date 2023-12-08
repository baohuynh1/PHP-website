<?php
$gym_primary_color   = GymEdge::$options['primary_color']; // #fb5b21
$gym_secondery_color = GymEdge::$options['secondery_color']; // #b0360a
$gym_primary_rgb     = GymEdge_Helper::hex2rgb( $gym_primary_color ); // 251, 91, 33

// Typography
$gym_typo_body = GymEdge::$options['typo_body'];
$gym_typo_h1   = GymEdge::$options['typo_h1'];
$gym_typo_h2   = GymEdge::$options['typo_h2'];
$gym_typo_h3   = GymEdge::$options['typo_h3'];
$gym_typo_h4   = GymEdge::$options['typo_h4'];
$gym_typo_h5   = GymEdge::$options['typo_h5'];
$gym_typo_h6   = GymEdge::$options['typo_h6'];
?>
body,
gtnbg_root,
p {
	font-family: <?php echo esc_html( $gym_typo_body['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_body['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_body['line-height'] ); ?>;
}
h1 {
	font-family: <?php echo esc_html( $gym_typo_h1['font-family'] ); ?>;
	font-size: <?php echo esc_html( $gym_typo_h1['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h1['line-height'] ); ?>;
}
h2 {
	font-family: <?php echo esc_html( $gym_typo_h2['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_h2['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h2['line-height'] ); ?>;
}
h3 {
	font-family: <?php echo esc_html( $gym_typo_h3['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_h3['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h3['line-height'] ); ?>;
}
h4 {
	font-family: <?php echo esc_html( $gym_typo_h4['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_h4['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h4['line-height'] ); ?>;
}
h5 {
	font-family: <?php echo esc_html( $gym_typo_h5['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_h5['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h5['line-height'] ); ?>;
}
h6 {
	font-family: <?php echo esc_html( $gym_typo_h6['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_h6['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h6['line-height'] ); ?>;
}

a:link,
a:visited {
	color: <?php echo esc_html( $gym_primary_color );?>;
}

a:hover,
a:focus,
a:active {
	color: <?php echo esc_html( $gym_secondery_color );?>;
}

blockquote,
.wp-block-quote,
.wp-block-pullquote {
	border-color: <?php echo esc_html( $gym_primary_color );?>;
}
.wp-block-quote::before {
	background-color: <?php echo esc_html( $gym_primary_color );?>;
}