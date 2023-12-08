<?php
$thumb_size = 'gymedge-size3';

if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
}
else {
    $paged = 1;
}

$number = isset($data['item_no']) ? $data['item_no'] : 9;
$orderby = $data['orderby'];
$count = $data['length'];

$args = array(
    'post_type'      => 'gym_trainer',
    'posts_per_page' => $number,
    'paged'          => $paged,
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

$col_lg = isset($data['col_lg']) ? $data['col_lg'] : 4;
$col_md = isset($data['col_md']) ? $data['col_md'] : 4;
$col_sm = isset($data['col_sm']) ? $data['col_sm'] : 6;
$col_xs = isset($data['col_xs']) ? $data['col_xs'] : 12;

$col_class = "col-lg-$col_lg col-md-$col_md col-sm-$col_sm col-xs-$col_xs";

// Pagination fix
global $wp_query;
$wp_query   = NULL;
$wp_query   = $query;
?>
    <div class="rt-team-grid-1">
        <div class="row auto-clear">
            <?php if ( have_posts() ) :?>
                <?php while ( have_posts() ) : the_post();?>
                    <?php
                    $id = get_the_id();
                    $socials = get_post_meta( $id, 'gym_trainer_socials', true );
                    $designation = get_post_meta( $id, 'gym_trainer_designation', true );
                    ?>
                    <div class="<?php echo esc_attr( $col_class );?>">
                        <div class="vc-item-wrap">
                            <div class="vc-item">
                                <?php the_post_thumbnail( $thumb_size ); ?>
                                <?php if ( $data['social_icon_display'] == 'yes' ): ?>
                                    <div class="vc-overly">
                                        <?php if ( !empty( $socials ) ): ?>
                                            <ul>
                                                <?php foreach ( $socials as $key => $social ): ?>
                                                    <?php if ( !empty( $social ) ): ?>
                                                        <li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fa <?php echo esc_attr( GymEdge::$trainer_social_fields[$key]['icon'] ); ?>" aria-hidden="true"></i></a></li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="vc-meta">
                                    <h3 class="rtin-trainer-name"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                    <?php if ( $data['designation_display'] == 'yes' ): ?>
                                        <div class="rtin-trainer-designation"><?php echo esc_html( $designation );?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php if ( $data['pagination_display'] == 'yes' ): ?>
                    <div class="col-sm-12 col-xs-12"><?php rt_vc_pagination(); ?></div>
                <?php endif;?>
            <?php endif;?>
        </div>
    </div>
<?php wp_reset_query();?>