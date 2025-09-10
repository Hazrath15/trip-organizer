<?php
class Ajax_Action_Handler {
    function __construct() {
        add_action('wp_ajax_filter_trips', [$this, 'filter_trips_ajax']);
        add_action('wp_ajax_nopriv_filter_trips', [$this, 'filter_trips_ajax']);
    }

    function filter_trips_ajax() {
        check_ajax_referer('wp_rest', 'security'); // verify nonce

        parse_str($_POST['data'], $form);

        $args = [
            'post_type'      => 'trip',
            'posts_per_page' => -1,
        ];

        // --- Destination Filter ---
        if (!empty($form['destinations'])) {
            // If "all" is NOT selected, apply tax_query
            if (!in_array('all', $form['destinations'])) {
                $args['tax_query'][] = [
                    'taxonomy' => 'destination',
                    'field'    => 'slug',
                    'terms'    => $form['destinations'],
                ];
            }
        }

        // --- Duration Filter ---
        if (!empty($form['min_days']) && !empty($form['max_days'])) {
            $args['meta_query'][] = [
                'key'     => '_trip_duration',
                'value'   => [intval($form['min_days']), intval($form['max_days'])],
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN',
            ];
        }

        // --- Price Filter ---
        if (!empty($form['min_price']) && !empty($form['max_price'])) {
            $args['meta_query'][] = [
                'key'     => '_trip_price',
                'value'   => [intval($form['min_price']), intval($form['max_price'])],
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN',
            ];
        }

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<div class="row gy-4">';
            while ($query->have_posts()) {
                $query->the_post(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="trip-card">
                        <!-- Featured Image -->
                        <div class="trip-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('full', ['class' => 'img-fluid']);
                                } ?>
                            </a>
                            <div class="trip-meta-area">
                                <!-- Duration -->
                                <?php if ($duration = get_post_meta(get_the_ID(), '_trip_duration', true)) : ?>
                                    <p class="trip-duration"><?php echo esc_html($duration); ?> Days</p>
                                <?php endif; ?>

                                <!-- Price -->
                                <?php if ($price = get_post_meta(get_the_ID(), '_trip_price', true)) : ?>
                                    <p class="trip-price">From SEK <?php echo esc_html(number_format_i18n($price)); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Trip Content -->
                        <div class="trip-content-area">
                            <h3 class="trip-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <!-- Short Description -->
                            <div class="trip-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="read-more-btn">Read more</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            echo '</div>';
            wp_reset_postdata();
            
        } else {
            echo "<p>No trips found.</p>";
        }
        the_posts_pagination();
        wp_die();
    }
}
?>
