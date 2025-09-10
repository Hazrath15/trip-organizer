<?php
class Contact_Form_Handler {

    public function __construct() {
        // Register REST endpoint
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    /**
     * Register custom REST route
     */
    public function register_routes() {
        register_rest_route('custom-contact/v1', '/send', [
            'methods' => 'POST',
            'callback' => [$this, 'handle_contact_form'],
            'permission_callback' => '__return_true',
        ]);
    }

    /**
     * Handle form submission
     */
    public function handle_contact_form($request) {
        $params = $request->get_json_params();

        // Sanitize
        $first_name = sanitize_text_field($params['first-name'] ?? '');
        $surname    = sanitize_text_field($params['surname'] ?? '');
        $phone      = sanitize_text_field($params['phone'] ?? '');
        $email      = sanitize_email($params['email'] ?? '');
        $trip_title = sanitize_text_field($params['trip_title'] ?? '');
        $trip_id    = absint($params['trip_id'] ?? 0);
        $privacy    = isset($params['privacy-policy']) ? (bool)$params['privacy-policy'] : false;

        if (empty($first_name) || empty($surname) || empty($email)) {
            return [
                'success' => false,
                'message' => 'Required fields are missing.'
            ];
        }

        if ( ! $privacy ) {
            return [
                'success' => false,
                'message' => 'You must accept the privacy policy.'
            ];
        }

        // Send emails
        // Save order to dashboard
        $this->save_order( $first_name, $surname, $phone, $email, $trip_title, $trip_id );
        $this->send_admin_email($first_name, $surname, $phone, $email, $trip_title, $trip_id);
        $this->send_client_email($first_name, $email, $trip_title);

        return [
            'success' => true,
            'message' => 'Emails sent successfully.'
        ];
    }

    /**
     * Send email to admin
     */
    private function send_admin_email($first_name, $surname, $phone, $email, $trip_title, $trip_id) {
        $subject = "New Contact Request from $first_name $surname";
        $message = "You have a new request:\n\n".
                "Name: $first_name $surname\n".
                "Phone: $phone\n".
                "Email: $email\n\n".
                "Selected Trip: $trip_title (ID: $trip_id)\n";

        $admin_email = get_option('admin_email');
        wp_mail($admin_email, $subject, $message);
    }

    /**
     * Send confirmation email to client
     */
    private function send_client_email($first_name, $email, $trip_title) {
        $subject = "Thank you for your request";
        $message = "Hello $first_name,\n\n".
                "We received your request for the trip: $trip_title.\n".
                "We will get back to you soon.\n\n".
                "Best regards,\nStrativ Trips Team";

        wp_mail($email, $subject, $message);
    }

    private function save_order($first_name, $surname, $phone, $email, $trip_title, $trip_id) {
        $order_id = wp_insert_post([
            'post_type'   => 'trip_order',
            'post_title'  => $first_name . ' ' . $surname,
            'post_status' => 'publish',
        ]);

        if ( $order_id ) {
            update_post_meta( $order_id, '_first_name', $first_name );
            update_post_meta( $order_id, '_surname', $surname );
            update_post_meta( $order_id, '_phone', $phone );
            update_post_meta( $order_id, '_email', $email );
            update_post_meta( $order_id, '_trip_title', $trip_title );
            update_post_meta( $order_id, '_trip_id', $trip_id );
        }
    }


}
?>