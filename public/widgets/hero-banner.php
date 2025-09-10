<?php
class TRIPO_Hero_Banner extends \Elementor\Widget_Base {

    public function get_name() {
        return 'tripo-hero-banner';
    }

    public function get_title() {
        return __( 'Tripo Hero Banner', 'trip-organizer' );
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    protected function _register_controls() {}

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="hero-banner" style="background: url('<?php echo esc_url(get_template_directory_uri() . '/assets/img/hero-pattern.png') ?>') no-repeat center center; background-size: cover;">
            <div class="container container-for-custom-width">
                <div class="hero-heading">
                    <div class="title-wrapper heading">
                        <div class="svg">
                            <svg width="171" height="49" viewBox="0 0 171 49" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_1_1809)">
                                    <path d="M151 20.3032L161.607 9.69662" stroke="#F5F305" stroke-width="2"
                                        stroke-linecap="round" />
                                </g>
                                <g filter="url(#filter1_d_1_1809)">
                                    <path d="M151 28.6968L161.607 39.3034" stroke="#F5F305" stroke-width="2"
                                        stroke-linecap="round" />
                                </g>
                                <path opacity="0.2" d="M145 24.6967L1 24.6967" stroke="#F5F305"
                                    stroke-linecap="round" />
                                <defs>
                                    <filter id="filter0_d_1_1809" x="142" y="0.696655" width="28.6066"
                                        height="28.6066" filterUnits="userSpaceOnUse"
                                        color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="4" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.733333 0 0 0 0 0.992157 0 0 0 0 0.0117647 0 0 0 1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_1_1809" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_1809"
                                            result="shape" />
                                    </filter>
                                    <filter id="filter1_d_1_1809" x="142" y="19.6968" width="28.6066"
                                        height="28.6066" filterUnits="userSpaceOnUse"
                                        color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="4" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.733333 0 0 0 0 0.992157 0 0 0 0 0.0117647 0 0 0 1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_1_1809" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_1809"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>

                        </div>
                        <div class="heading-area">
                            <h1 class="section-heading">Shaping the future of </h1>
                            <h2 class="section-heading"><span>printed</span> light</h2>
                        </div>
                        <div class="svg">
                            <svg width="171" height="49" viewBox="0 0 171 49" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_1_1811)">
                                    <path d="M20.2131 20.3032L9.60653 9.69662" stroke="#F5F305" stroke-width="2"
                                        stroke-linecap="round" />
                                </g>
                                <g filter="url(#filter1_d_1_1811)">
                                    <path d="M20.2131 28.6968L9.60653 39.3034" stroke="#F5F305" stroke-width="2"
                                        stroke-linecap="round" />
                                </g>
                                <path opacity="0.2" d="M26.2131 24.6967L170.213 24.6967" stroke="#F5F305"
                                    stroke-linecap="round" />
                                <defs>
                                    <filter id="filter0_d_1_1811" x="0.606537" y="0.696655" width="28.6066"
                                        height="28.6066" filterUnits="userSpaceOnUse"
                                        color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="4" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.733333 0 0 0 0 0.992157 0 0 0 0 0.0117647 0 0 0 1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_1_1811" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_1811"
                                            result="shape" />
                                    </filter>
                                    <filter id="filter1_d_1_1811" x="0.606537" y="19.6968" width="28.6066"
                                        height="28.6066" filterUnits="userSpaceOnUse"
                                        color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="4" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.733333 0 0 0 0 0.992157 0 0 0 0 0.0117647 0 0 0 1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_1_1811" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_1811"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="text-area-wrapper">
                    <p>We are a manufacturer and developer of fully printed light-emitting products. Built on cutting-edge light-emitting electrochemical cell technology, our printed light solutions redefine what is possible with light. Our patented solution-based manufacturing ensures affordability, sustainability and quality. </p>
                    <p>We now introduce our new Lumifoil product series. Experience unparalleled versatility with its thin, flexible and highly customizable structure, designed to fit any form</p>
                    <div class="row">
                        <div class="col-lg-4">
                            <ul>
                                <li>Introducing the Lumifoil</li>
                                <li>Thin, flexible and light-weight</li>
                                <li>Highly customizable</li>
                                <li>Low-cost and sustainable</li>
                            </ul>
                        </div>
                        <div class="col-lg-8 button-container">
                            <div class="hero-cta-btn">
                                <a href="#" class="primary-btn" style="background: url('<?php echo esc_url(get_template_directory_uri() . '/assets/img/button-bg.png') ?>') no-repeat center center; background-size: contain;">Request prototype kit</a>
                                <a href="#" class="primary-btn explore-btn" style="background: url('<?php echo esc_url(get_template_directory_uri() . '/assets/img/button-bg.png') ?>') no-repeat center center; background-size: contain;">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <?php
    }
}