<?php
class Search_By_Destination_Shortcode {
    public function __construct() {
        add_shortcode('trip_destination_search', [$this, 'trip_destination_search_shortcode']);
    }

    function trip_destination_search_shortcode() {
        ob_start();

        // Get all destinations
        $destinations = get_terms([
            'taxonomy'   => 'destination',
            'hide_empty' => true,
        ]);

        // Selected destination from query
        $selected = isset($_GET['destination']) ? sanitize_text_field($_GET['destination']) : '';
        ?>
        <section class="content-area pt-50 pb-50 search-by-destination">
            <div class="team-archive">
                <div class="container container-regular">
                    <form class="trip-destination-search" method="get">
                        <select name="destination" class="trip-destination-select">
                            <option value="">Destinations</option>
                            <?php foreach ($destinations as $destination): ?>
                                <option value="<?php echo esc_attr($destination->slug); ?>" <?php selected($selected, $destination->slug); ?>>
                                    <?php echo esc_html($destination->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="trip-search-btn">View available trips</button>
                    </form>

                    <?php
                    // If destination selected → show results
                    if ($selected) {
                        $args = [
                            'post_type'      => 'trip',   // adjust to your CPT
                            'posts_per_page' => -1,
                            'tax_query'      => [
                                [
                                    'taxonomy' => 'destination',
                                    'field'    => 'slug',
                                    'terms'    => $selected,
                                ]
                            ]
                        ];

                        $query = new WP_Query($args);

                        if ($query->have_posts()) {
                            echo '<div class="trip-results pt-24">';
                            echo '<div class="row gy-4">';
                            while ($query->have_posts()) {
                                $query->the_post();
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="trip-card">
                                        <!-- Featured Image -->
                                        <div class="trip-image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail('full', ['class' => 'img-fluid']);
                                                }?>
                                            </a>
                                            <div class="trip-meta-area">
                                                <!-- Duration (Custom Field or Meta) -->
                                                <?php if ($duration = get_post_meta(get_the_ID(), '_trip_duration', true)) : ?>
                                                    <p class="trip-duration"><?php echo esc_html($duration); ?> Days</p>
                                                <?php endif; ?>

                                                <!-- Price (Custom Field or Meta) -->
                                                <?php if ($price = get_post_meta(get_the_ID(), '_trip_price', true)) : ?>
                                                    <p class="trip-price">From SEK <?php echo esc_html($price); ?></p>
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
                            echo '</div>';
                        } else {
                            echo '<p>No trips found for this destination.</p>';
                        }

                        wp_reset_postdata();
                    }
                    
                    ?>
                    <div class="button-wrapper">
                        <a href="/trip" class="trip-search-btn">View all trips</a>
                    </div>
                </div>
            </div>
        </section>
        <?php
        return ob_get_clean();
    }

}
?>