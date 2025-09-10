<?php get_header(); ?>

<?php
?>
<div id="contactModal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <div class="contact-form-container">
            <h2>Send request</h2>
            <div class="contact-information-block">
                <h4>Contact Information</h4>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-row">
                                <label for="first-name">First name *</label>
                                <input type="text" id="first-name" name="first-name" placeholder="Placeholder" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-row">
                                <label for="surname">Surname *</label>
                                <input type="text" id="surname" name="surname" placeholder="Placeholder" required>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-6">
                            <div class="form-row">
                                <label for="phone">Phone (Day)</label>
                                <input type="tel" id="phone" name="phone" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-row">
                                <label for="email">E-mail *</label>
                                <input type="email" id="email" name="email" placeholder="Placeholder" required>
                            </div>
                        </div>
                    </div>
                    <div class="selected-trip-block">
                        <h4>Selected Trip</h4>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <h2><?php the_title(); ?></h2>
                            <input type="hidden" name="trip_title" value="<?php the_title(); ?>">
                            <input type="hidden" name="trip_id" value="<?php the_ID(); ?>">
                        <?php endwhile; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-6 d-flex align-items-center">
                            <div class="policy-checkbox">
                                <input type="checkbox" id="privacy-policy" name="privacy-policy" required>
                                <label for="privacy-policy">I accept privacy policy*</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <button type="submit" class="send-button">Send</button>
                        </div>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>
</div>
<section class="content-area ptb-110">
    <div class="container container-regular">
        <?php
        while ( have_posts() ) : the_post();

        // Meta data
        $duration = get_post_meta( get_the_ID(), '_trip_duration', true );
        $price    = get_post_meta( get_the_ID(), '_trip_price', true );
        $currency = 'SEK'; // You can make this dynamic

        ?>

        <div class="trip-single-container">
            
            <!-- Breadcrumb -->
            <nav class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Home</a> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>
                <a href="<?php echo get_post_type_archive_link('trip'); ?>">Destination</a> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>
                <?php
                $terms = get_the_terms( get_the_ID(), 'destination' );
                if ( $terms && ! is_wp_error( $terms ) ) {
                    foreach ( $terms as $term ) {
                        echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg> ';
                    }
                }
                ?>
                <?php the_title(); ?>
            </nav>

            <!-- Title -->
            <h1 class="trip-title"><?php the_title(); ?></h1>

            <div class="trip-header">
                
                <!-- Featured Image -->
                <div class="trip-image">
                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'full', [ 'class' => 'trip-featured-image' ] );
                    } ?>
                </div>

                <!-- Price & CTA -->
                <div class="trip-sidebar">
                    <p class="trip-duration">
                        <?php echo esc_html( $duration ); ?> days/<?php echo esc_html( $duration-1 ); ?> nights incl. travel days
                    </p>
                    <p class="trip-price">
                        From <span class="trip-price-value"><?php echo number_format( $price ); ?></span> <?php echo $currency; ?> per person
                    </p>
                    <a href="#contact" class="trip-contact-btn">
                        Contact us for travel suggestions
                    </a>
                </div>

            </div>

            <!-- Tabs -->
            <div class="trip-tabs">
                <button class="trip-tab-btn">Overview</button>
                <a href="#contact" class="trip-contact-btn">
                    Contact us for travel suggestions
                </a>
            </div>

            <!-- Content -->
            <div class="trip-content">
                <?php the_content(); ?>
            </div>

        </div>

        <?php
        endwhile; ?>
    </div>
</section>
<?php get_footer(); ?>
