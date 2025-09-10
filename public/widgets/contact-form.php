<?php
class TRIPO_Contact_Form extends \Elementor\Widget_Base {

    public function get_name() {
        return 'tripo-contact-form';
    }

    public function get_title() {
        return __( 'Tripo Contact Form', 'trip-organizer' );
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'trip-organizer' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_text',
            [
                'label' => __( 'Heading Text', 'trip-organizer' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Default heading', 'trip-organizer' ),
                'placeholder' => __( 'Type your heading here', 'trip-organizer' ),
            ]
        );
        $this->add_control(
            'cf7_form',
            [
                'label' => __( 'Select Contact Form 7', 'trip-organizer' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_cf7_forms(),
                'default' => '',
                'description' => __( 'Choose a Contact Form 7 form to display.', 'trip-organizer' ),
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="contact-form">
            <div class="custom-container container">
                <div class="row">
                    <div class="col-md-6 contact-info-area">
                        <div class="text-area">
                            <p>Your imagination is the limit. Want to explore how our printed light solutions can add value to your products? Send us your inquiry or make a prototype request using the form. We look forward to realizing your application ideas</p>
                        </div>
                        <div class="info-list">
                            <li><a href="#"><svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.879 6.379C3 7.257 3 8.672 3 11.5V13.5C3 16.328 3 17.743 3.879 18.621C4.757 19.5 6.172 19.5 9 19.5H15C17.828 19.5 19.243 19.5 20.121 18.621C21 17.743 21 16.328 21 13.5V11.5C21 8.672 21 7.257 20.121 6.379C19.243 5.5 17.828 5.5 15 5.5H9C6.172 5.5 4.757 5.5 3.879 6.379ZM6.555 8.668C6.33434 8.52081 6.06424 8.4673 5.80413 8.51924C5.54402 8.57119 5.3152 8.72434 5.168 8.945C5.02081 9.16566 4.9673 9.43576 5.01924 9.69587C5.07119 9.95598 5.22434 10.1848 5.445 10.332L10.891 13.962C11.2195 14.1809 11.6053 14.2976 12 14.2976C12.3947 14.2976 12.7805 14.1809 13.109 13.962L18.555 10.332C18.7757 10.1848 18.9288 9.95598 18.9808 9.69587C19.0327 9.43576 18.9792 9.16566 18.832 8.945C18.6848 8.72434 18.456 8.57119 18.1959 8.51924C17.9358 8.4673 17.6657 8.52081 17.445 8.668L12 12.298L6.555 8.668Z" fill="#FFFFE5"/>
                            </svg>
                            <span>Email: sales@illumunation.com</span></a></li>
                            <li><a href="#"><svg width="24" height="32" viewBox="0 0 24 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5413 28.4326C15.8653 26.4581 20 22.4243 20 18.7226C20 16.6745 19.1571 14.7102 17.6569 13.2619C16.1566 11.8136 14.1217 11 12 11C9.87827 11 7.84344 11.8136 6.34315 13.2619C4.84285 14.7102 4 16.6745 4 18.7226C4 22.4243 8.13333 26.4581 10.4587 28.4326C10.8828 28.798 11.4315 29 12 29C12.5685 29 13.1172 28.798 13.5413 28.4326ZM9.33333 18.7226C9.33333 18.0399 9.61428 17.3851 10.1144 16.9024C10.6145 16.4196 11.2928 16.1484 12 16.1484C12.7072 16.1484 13.3855 16.4196 13.8856 16.9024C14.3857 17.3851 14.6667 18.0399 14.6667 18.7226C14.6667 19.4054 14.3857 20.0601 13.8856 20.5429C13.3855 21.0256 12.7072 21.2968 12 21.2968C11.2928 21.2968 10.6145 21.0256 10.1144 20.5429C9.61428 20.0601 9.33333 19.4054 9.33333 18.7226Z" fill="#FFFFE5"/>
                            </svg>
                            <span>illumination Road 1 Sweden</span></a></li>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <form action="#" method="post">
                                <input type="text" placeholder="Name" required>
                                <input type="email" placeholder="E-mail" required>
                                <input type="text" placeholder="Company">
                                <textarea placeholder="Message"></textarea>
                                <button class="primary-btn" type="submit" style="background: url('<?php echo esc_url(get_template_directory_uri() . '/assets/img/button-bg.png') ?>') no-repeat center center; background-size: contain;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
    private function get_cf7_forms() {
        $forms = [];
        $cf7_forms = get_posts( [
            'post_type' => 'wpcf7_contact_form',
            'numberposts' => -1,
        ] );

        if ( ! empty( $cf7_forms ) ) {
            foreach ( $cf7_forms as $form ) {
                $forms[ $form->ID ] = $form->post_title;
            }
        }

        return $forms;
    }
}