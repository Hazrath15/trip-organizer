<?php
class TRIPO_Timeline extends \Elementor\Widget_Base {

    public function get_name() {
        return 'tripo-timeline';
    }

    public function get_title() {
        return __( 'Tripo Timeline', 'trip-organizer' );
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

        $this->end_controls_section();

    }

    protected function render() {
        ?>
        <section class="timeline-main-wrapper" style="background: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/shape.png) no-repeat top center; background-size: contain;">
            <div class="left-side-shape ">
                <img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/img/left-cruve.png';?>" alt="left curve">
            </div>
            <div class="right-side-shape ">
                <img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/img/right-curve.png';?>" alt="left curve">
            </div>

            <div class="timeline custom-container">

                <div class="timeline-item" id="step1">

                    <div class="content left">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 1V11" stroke="#F5F305" stroke-linecap="round" />
                            <path d="M1 6H11" stroke="#F5F305" stroke-linecap="round" />
                        </svg>
                        <h3>Smartcards</h3>
                        <p>Make your logo light up out of nowhere on your smartcard solution. With an integrated NFC
                            antenna, our Lumifoil enables wireless activation without the need of an internal power
                            source.</p>
                    </div>
                    <div class="circle"><span><svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.82861 9.00391H14.3286M14.3286 9.00391L9.07861 3.75391M14.3286 9.00391L9.07861 14.2539"
                                    stroke="#001420" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                    <div class="empty right">
                        <img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/img/single-img.png';?> " alt="Smartcards">
                    </div>
                </div>

                <div class="timeline-item" id="step2">
                    <div class="empty left"> <img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/img/single-img.png';?>" alt="Posters"></div>
                    <div class="circle"><span><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.3291 7.00391H1.8291M1.8291 7.00391L7.0791 1.75391M1.8291 7.00391L7.0791 12.2539"
                                    stroke="#001420" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span></div>
                    <div class="content right">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 1V11" stroke="#F5F305" stroke-linecap="round" />
                            <path d="M1 6H11" stroke="#F5F305" stroke-linecap="round" />
                        </svg>
                        <h3>Posters</h3>
                        <p>Add blinking light in any shape to your posters and catch your customers attention.
                            Lumifoil’s thin form factor allows for seamless integration into your poster.</p>

                    </div>
                </div>

                <div class="timeline-item" id="step3">
                    <div class="content left">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 1V11" stroke="#F5F305" stroke-linecap="round" />
                            <path d="M1 6H11" stroke="#F5F305" stroke-linecap="round" />
                        </svg>
                        <h3>Labels</h3>
                        <p>Make your product stand out with a light emitting label. Lumifoil’s flexible form factor and
                            highly customizable emission patterns makes it ideal for stickers and labels to add light
                            emission to any product.</p>

                    </div>
                    <div class="circle"><span><svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.82861 9.00391H14.3286M14.3286 9.00391L9.07861 3.75391M14.3286 9.00391L9.07861 14.2539"
                                    stroke="#001420" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span></div>
                    <div class="empty right"><img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/img/single-img.png';?>" alt="Labels"></div>
                </div>
                <div class="timeline-item" id="step4">
                    <div class="empty left"> <img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/img/single-img.png';?>" alt="Posters"></div>
                    <div class="circle"><span><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.3291 7.00391H1.8291M1.8291 7.00391L7.0791 1.75391M1.8291 7.00391L7.0791 12.2539"
                                    stroke="#001420" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span></div>
                    <div class="content right">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 1V11" stroke="#F5F305" stroke-linecap="round" />
                            <path d="M1 6H11" stroke="#F5F305" stroke-linecap="round" />
                        </svg>
                        <h3>Business cards</h3>
                        <p>Stand out from the crowd with a business card
                            that lights up your name or logo. Our highly
                            customizable manufacturing offers light
                            emission patterns in many shapes and forms.</p>

                    </div>
                </div>

                <div class="timeline-item" id="step5">
                    <div class="content left">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 1V11" stroke="#F5F305" stroke-linecap="round" />
                            <path d="M1 6H11" stroke="#F5F305" stroke-linecap="round" />
                        </svg>
                        <h3>Authenticity proofing</h3>
                        <p>Prove to your customers that your product is authentic. Our patented Authentic Light addon
                            adds hidden and dynamic patterns to Lumifoil products. The added security features can only
                            be produced with the Authentic Light technology, making it impossible to replicate without
                            the required know-how</p>

                    </div>
                    <div class="circle"><span><svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.82861 9.00391H14.3286M14.3286 9.00391L9.07861 3.75391M14.3286 9.00391L9.07861 14.2539"
                                    stroke="#001420" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span></div>
                    <div class="empty right"><img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/img/single-img.png'; ?>" alt="Labels"></div>
                </div>

            </div>
        </section>
        <?php
    }
}
?>