<?php
$thumb_size = 'gymedge-size3';

$number = isset($data['item_no']) ? $data['item_no'] : 9;
$orderby = $data['orderby'];
$count = $data['length'];

$args = array(
    'post_type'      => 'gym_trainer',
    'posts_per_page' => $number,
);

if ( !empty( $data['cat'] ) ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'gym_team_category',
            'field' => 'term_id',
            'terms' => $data['cat'],
        )
    );
}

switch ( $orderby ) {
    case 'title':
        $args['orderby'] = 'title';
        $args['order']   = 'ASC';
        break;
    case 'menu_order':
        $args['orderby'] = 'menu_order';
        $args['order']   = 'ASC';
        break;
}

$query = new WP_Query( $args );

?>

<div class="owl-wrap rt-owl-nav-1 rt-owl-team-1 rt-owl-dot-1">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="section-title">
                <?php if (!empty($data['title'])): ?>
                    <h2 class="owl-custom-nav-title"><?php echo esc_html( $data['title'] ); ?></h2>
                <?php endif; ?>
                <?php if ( $data['slider_nav'] == 'yes' ): ?>
                    <div class="owl-custom-nav">
                        <?php GymEdge_Helper::owl_custom_navs();?>
                    </div>
                <?php endif; ?>
                <div class="owl-custom-nav-bar"></div>
                <div class="clear"></div>
            </div>
            <div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] ); ?>">
                <?php if ( $query->have_posts() ) :?>
                    <?php while ( $query->have_posts() ) : $query->the_post();?>
                        <?php
                        $id = get_the_id();
                        $socials = get_post_meta( $id, 'gym_trainer_socials', true );
                        $designation = get_post_meta( $id, 'gym_trainer_designation', true );
                        ?>
                        <div class="vc-item-wrap">
                            <div class="vc-item">
                                <?php the_post_thumbnail( $thumb_size ); ?>
                                <div class="vc-overly">
                                    <?php if ( !empty( $socials ) && $data['social_icon_display'] == 'yes' ): ?>
                                        <ul>
                                            <?php foreach ( $socials as $key => $social ): ?>
                                                <?php if ( !empty( $social ) ): ?>
                                                    <li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fa <?php echo esc_attr( GymEdge::$trainer_social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="vc-team-meta">
                                    <h3 class="rtin-trainer-name"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                    <?php if ( $data['designation_display'] == 'yes' ): ?>
                                        <div class="rtin-trainer-designation"><?php echo esc_html( $designation ); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
</div>