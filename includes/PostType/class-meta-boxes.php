<?php
if ( ! class_exists( 'TRIPO_Meta_Boxes' ) ) {
    class TRIPO_Meta_Boxes {

        public function __construct() {
            add_action( 'add_meta_boxes', [ $this, 'add_trip_meta_boxes' ] );
            add_action( 'save_post', [ $this, 'save_trip_meta' ] );
        }

        public function add_trip_meta_boxes() {
            add_meta_box(
                'trip_details',
                __( 'Trip Details', 'trip-organizer' ),
                [ $this, 'render_trip_meta_box' ],
                'trip',
                'normal',
                'default'
            );
        }

        public function render_trip_meta_box( $post ) {
            wp_nonce_field( 'save_trip_meta', 'trip_meta_nonce' );

            $duration = get_post_meta( $post->ID, '_trip_duration', true );
            $price    = get_post_meta( $post->ID, '_trip_price', true );
            ?>
            <p>
                <label for="trip_duration"><strong><?php esc_html_e( 'Duration (Days)', 'trip-organizer' ); ?></strong></label><br>
                <input type="number" id="trip_duration" name="trip_duration" value="<?php echo esc_attr( $duration ); ?>" min="1" style="width:100px;">
            </p>

            <p>
                <label for="trip_price"><strong><?php esc_html_e( 'Price (SEK)', 'trip-organizer' ); ?></strong></label><br>
                <input type="number" id="trip_price" name="trip_price" value="<?php echo esc_attr( $price ); ?>" min="0" step="100" style="width:150px;">
            </p>
            <?php
        }

        public function save_trip_meta( $post_id ) {
            if ( ! isset( $_POST['trip_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['trip_meta_nonce'])), 'save_trip_meta' ) ) {
                return;
            }

            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
            }

            if ( isset( $_POST['trip_duration'] ) ) {
                update_post_meta( $post_id, '_trip_duration', absint( $_POST['trip_duration'] ) );
            }

            if ( isset( $_POST['trip_price'] ) ) {
                update_post_meta( $post_id, '_trip_price', floatval( $_POST['trip_price'] ) );
            }
        }
    }
}
?>