<?php
/**
 * PPA Testimonial Slider Widget
 *
 * @package PPA_Elementor_Addons
 * @since   1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Direct access না হয়
}

/**
 * Class PPA_Testimonial_Slider_Widget
 */
class PPA_Testimonial_Slider_Widget extends \Elementor\Widget_Base {

    /**
     * Widget slug — সম্পূর্ণ unique
     */
    public function get_name() {
        return 'ppa_testimonial_slider';
    }

    public function get_title() {
        return esc_html__( 'PPA Testimonial Slider', 'ppa-addons' );
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    /**
     * Enqueue widget-specific assets
     */
    public function get_style_depends() {
        return [ 'ppa-testimonial-style', 'ppa-slick-style' ];
    }

    public function get_script_depends() {
        return [ 'ppa-slick-js', 'ppa-testimonial-script' ];
    }

    /* ─────────────────────────────────────────────
       CONTROLS
    ───────────────────────────────────────────── */
    protected function register_controls() {

        /* ── Section: Testimonials ── */
        $this->start_controls_section(
            'section_testimonials',
            [
                'label' => esc_html__( 'Testimonials', 'ppa-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'reviewer_image',
            [
                'label'   => esc_html__( 'Photo', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'reviewer_name',
            [
                'label'   => esc_html__( 'Name', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Md. Rahim Uddin', 'ppa-addons' ),
            ]
        );

        $repeater->add_control(
            'reviewer_role',
            [
                'label'   => esc_html__( 'Designation', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Web Developer', 'ppa-addons' ),
            ]
        );

        $repeater->add_control(
            'reviewer_company',
            [
                'label'   => esc_html__( 'Company / Location', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Dhaka, Bangladesh', 'ppa-addons' ),
            ]
        );

        $repeater->add_control(
            'review_text',
            [
                'label'   => esc_html__( 'Review', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 5,
                'default' => esc_html__( 'ProjuktiPlus Academy-র কোর্সগুলো সত্যিই অসাধারণ। এখানে শেখার পর আমার ক্যারিয়ারে বড় পরিবর্তন এসেছে। প্র্যাকটিক্যাল প্রজেক্ট এবং লাইভ সাপোর্ট এই প্ল্যাটফর্মকে আলাদা করে তোলে।', 'ppa-addons' ),
            ]
        );

        $repeater->add_control(
            'star_rating',
            [
                'label'   => esc_html__( 'Star Rating (1–5)', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 5,
                'step'    => 1,
                'default' => 5,
            ]
        );

        $this->add_control(
            'testimonial_list',
            [
                'label'       => esc_html__( 'Testimonial List', 'ppa-addons' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'reviewer_name'    => esc_html__( 'Md. Rahim Uddin', 'ppa-addons' ),
                        'reviewer_role'    => esc_html__( 'Web Developer', 'ppa-addons' ),
                        'reviewer_company' => esc_html__( 'Dhaka, Bangladesh', 'ppa-addons' ),
                        'star_rating'      => 5,
                        'review_text'      => esc_html__( 'ProjuktiPlus Academy-র কোর্সগুলো সত্যিই অসাধারণ। এখানে শেখার পর আমার ক্যারিয়ারে বড় পরিবর্তন এসেছে।', 'ppa-addons' ),
                    ],
                    [
                        'reviewer_name'    => esc_html__( 'Fatema Begum', 'ppa-addons' ),
                        'reviewer_role'    => esc_html__( 'Freelancer', 'ppa-addons' ),
                        'reviewer_company' => esc_html__( 'Chittagong, Bangladesh', 'ppa-addons' ),
                        'star_rating'      => 5,
                        'review_text'      => esc_html__( 'Laravel এবং WordPress দুটোই এখানে খুব সুন্দরভাবে শেখানো হয়। ইন্সট্রাক্টর অনেক ধৈর্যশীল এবং সহায়তাকারী।', 'ppa-addons' ),
                    ],
                    [
                        'reviewer_name'    => esc_html__( 'Karim Hossain', 'ppa-addons' ),
                        'reviewer_role'    => esc_html__( 'Software Engineer', 'ppa-addons' ),
                        'reviewer_company' => esc_html__( 'Sylhet, Bangladesh', 'ppa-addons' ),
                        'star_rating'      => 4,
                        'review_text'      => esc_html__( 'প্র্যাকটিক্যাল প্রজেক্ট এবং রিয়েল-ওয়ার্ল্ড এক্সাম্পল দিয়ে শেখানোর ধরনটা আমার কাছে খুব পছন্দ হয়েছে।', 'ppa-addons' ),
                    ],
                ],
                'title_field' => '{{{ reviewer_name }}}',
            ]
        );

        $this->end_controls_section();

        /* ── Section: Slider Settings ── */
        $this->start_controls_section(
            'section_slider_settings',
            [
                'label' => esc_html__( 'Slider Settings', 'ppa-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'slides_to_show',
            [
                'label'   => esc_html__( 'Slides to Show', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ],
                'default' => '2',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'        => esc_html__( 'Autoplay', 'ppa-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'ppa-addons' ),
                'label_off'    => esc_html__( 'No', 'ppa-addons' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label'     => esc_html__( 'Autoplay Speed (ms)', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 1000,
                'max'       => 10000,
                'step'      => 500,
                'default'   => 3000,
                'condition' => [ 'autoplay' => 'yes' ],
            ]
        );

        $this->add_control(
            'show_dots',
            [
                'label'        => esc_html__( 'Show Dots', 'ppa-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'ppa-addons' ),
                'label_off'    => esc_html__( 'No', 'ppa-addons' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'show_arrows',
            [
                'label'        => esc_html__( 'Show Arrows', 'ppa-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'ppa-addons' ),
                'label_off'    => esc_html__( 'No', 'ppa-addons' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $this->end_controls_section();

        /* ── Section: Section Title ── */
        $this->start_controls_section(
            'section_title_settings',
            [
                'label' => esc_html__( 'Section Title', 'ppa-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Title', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'What Our Students Say', 'ppa-addons' ),
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label'   => esc_html__( 'Subtitle', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'হাজার শিক্ষার্থীর বিশ্বাস আমাদের গর্ব', 'ppa-addons' ),
            ]
        );

        $this->end_controls_section();

        /* ── Style: Card ── */
        $this->start_controls_section(
            'style_card',
            [
                'label' => esc_html__( 'Card Style', 'ppa-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_bg_color',
            [
                'label'     => esc_html__( 'Card Background', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .ppa-ts-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'star_color',
            [
                'label'     => esc_html__( 'Star Color', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#f59e0b',
                'selectors' => [
                    '{{WRAPPER}} .ppa-ts-star.filled' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'quote_color',
            [
                'label'     => esc_html__( 'Quote Icon Color', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#007bff',
                'selectors' => [
                    '{{WRAPPER}} .ppa-ts-quote-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label'     => esc_html__( 'Name Color', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#1a1a1a',
                'selectors' => [
                    '{{WRAPPER}} .ppa-ts-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'role_color',
            [
                'label'     => esc_html__( 'Role Color', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#007bff',
                'selectors' => [
                    '{{WRAPPER}} .ppa-ts-role' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /* ─────────────────────────────────────────────
       RENDER
    ───────────────────────────────────────────── */
    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( empty( $settings['testimonial_list'] ) ) {
            return;
        }

        // Slider config — JSON encode safely
        $slider_config = wp_json_encode( [
            'slidesToShow'   => (int) $settings['slides_to_show'],
            'autoplay'       => ( 'yes' === $settings['autoplay'] ),
            'autoplaySpeed'  => (int) $settings['autoplay_speed'],
            'dots'           => ( 'yes' === $settings['show_dots'] ),
            'arrows'         => ( 'yes' === $settings['show_arrows'] ),
            'infinite'       => true,
            'speed'          => 600,
            'pauseOnHover'   => true,
            'responsive'     => [
                [
                    'breakpoint' => 992,
                    'settings'   => [ 'slidesToShow' => 2 ],
                ],
                [
                    'breakpoint' => 577,
                    'settings'   => [ 'slidesToShow' => 1 ],
                ],
            ],
        ] );

        $widget_id = 'ppa-ts-' . $this->get_id();
        ?>

        <div class="ppa-testimonial-wrapper">

            <?php if ( ! empty( $settings['section_title'] ) ) : ?>
                <div class="ppa-ts-header">
                    <h2 class="ppa-section-title"><?php echo esc_html( $settings['section_title'] ); ?></h2>
                    <?php if ( ! empty( $settings['section_subtitle'] ) ) : ?>
                        <p class="ppa-ts-subtitle"><?php echo esc_html( $settings['section_subtitle'] ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="ppa-ts-slider" id="<?php echo esc_attr( $widget_id ); ?>" data-config="<?php echo esc_attr( $slider_config ); ?>">

                <?php foreach ( $settings['testimonial_list'] as $item ) :
                    $rating   = absint( $item['star_rating'] );
                    $rating   = min( max( $rating, 1 ), 5 ); // 1–5 range নিশ্চিত
                    $img_url  = ! empty( $item['reviewer_image']['url'] ) ? $item['reviewer_image']['url'] : '';
                    $img_alt  = ! empty( $item['reviewer_name'] ) ? $item['reviewer_name'] : '';
                    ?>

                    <div class="ppa-ts-slide">
                        <div class="ppa-ts-card elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">

                            <!-- Quote Icon -->
                            <div class="ppa-ts-quote-icon" aria-hidden="true">
                                <svg width="36" height="28" viewBox="0 0 36 28" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 28V17.2C0 12.933 1.067 9.333 3.2 6.4C5.333 3.467 8.667 1.333 13.2 0L15.6 3.6C13.2 4.533 11.267 5.933 9.8 7.8C8.333 9.667 7.6 11.733 7.6 14H14.8V28H0ZM21.2 28V17.2C21.2 12.933 22.267 9.333 24.4 6.4C26.533 3.467 29.867 1.333 34.4 0L36.8 3.6C34.4 4.533 32.467 5.933 31 7.8C29.533 9.667 28.8 11.733 28.8 14H36V28H21.2Z"/>
                                </svg>
                            </div>

                            <!-- Stars -->
                            <div class="ppa-ts-stars" role="img" aria-label="<?php printf( esc_attr__( '%d out of 5 stars', 'ppa-addons' ), $rating ); ?>">
                                <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                                    <span class="ppa-ts-star <?php echo $i <= $rating ? 'filled' : 'empty'; ?>" aria-hidden="true">&#9733;</span>
                                <?php endfor; ?>
                            </div>

                            <!-- Review Text -->
                            <p class="ppa-ts-review-text"><?php echo esc_html( $item['review_text'] ); ?></p>

                            <!-- Reviewer Info -->
                            <div class="ppa-ts-reviewer">
                                <?php if ( ! empty( $img_url ) ) : ?>
                                    <div class="ppa-ts-avatar">
                                        <img src="<?php echo esc_url( $img_url ); ?>"
                                             alt="<?php echo esc_attr( $img_alt ); ?>"
                                             loading="lazy">
                                    </div>
                                <?php else : ?>
                                    <div class="ppa-ts-avatar ppa-ts-avatar--placeholder" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"/></svg>
                                    </div>
                                <?php endif; ?>

                                <div class="ppa-ts-meta">
                                    <span class="ppa-ts-name"><?php echo esc_html( $item['reviewer_name'] ); ?></span>
                                    <span class="ppa-ts-role"><?php echo esc_html( $item['reviewer_role'] ); ?></span>
                                    <?php if ( ! empty( $item['reviewer_company'] ) ) : ?>
                                        <span class="ppa-ts-company"><?php echo esc_html( $item['reviewer_company'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>

            </div><!-- /.ppa-ts-slider -->

        </div><!-- /.ppa-testimonial-wrapper -->

        <?php
    }
}
