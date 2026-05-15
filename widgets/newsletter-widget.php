<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class PPA_Newsletter_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ppa-newsletter';
    }

    public function get_title() {
        return esc_html__( 'PPA Newsletter Subscriber', 'ppa-addons' );
    }

    public function get_icon() {
        return 'eicon-email';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    public function get_style_depends() {
        return [ 'ppa-newsletter-style' ];
    }

    protected function register_controls() {

        // ===== Content Section =====
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'ppa-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'badge_text',
            [
                'label'   => esc_html__( 'Badge Text', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '📬 নিউজলেটার',
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => esc_html__( 'Title', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'আপডেট থাকুন, এগিয়ে থাকুন!',
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => esc_html__( 'Description', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'প্রতি সপ্তাহে পান সেরা টেক টিউটোরিয়াল, কোর্স অফার এবং ক্যারিয়ার টিপস — সরাসরি আপনার ইনবক্সে।',
            ]
        );

        $this->add_control(
            'email_placeholder',
            [
                'label'   => esc_html__( 'Email Placeholder', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'আপনার ইমেইল লিখুন...',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'   => esc_html__( 'Button Text', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'সাবস্ক্রাইব করুন',
            ]
        );

        $this->add_control(
            'privacy_text',
            [
                'label'   => esc_html__( 'Privacy Note', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '🔒 আমরা কখনো স্প্যাম করি না। যেকোনো সময় আনসাবস্ক্রাইব করুন।',
            ]
        );

        $this->end_controls_section();

        // ===== Stats Section =====
        $this->start_controls_section(
            'stats_section',
            [
                'label' => esc_html__( 'Stats', 'ppa-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_stats',
            [
                'label'        => esc_html__( 'Show Stats', 'ppa-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'ppa-addons' ),
                'label_off'    => esc_html__( 'No', 'ppa-addons' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'stat_1_number',
            [
                'label'     => esc_html__( 'Stat 1 Number', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => '১২,০০০+',
                'condition' => [ 'show_stats' => 'yes' ],
            ]
        );

        $this->add_control(
            'stat_1_label',
            [
                'label'     => esc_html__( 'Stat 1 Label', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'সাবস্ক্রাইবার',
                'condition' => [ 'show_stats' => 'yes' ],
            ]
        );

        $this->add_control(
            'stat_2_number',
            [
                'label'     => esc_html__( 'Stat 2 Number', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'সাপ্তাহিক',
                'condition' => [ 'show_stats' => 'yes' ],
            ]
        );

        $this->add_control(
            'stat_2_label',
            [
                'label'     => esc_html__( 'Stat 2 Label', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'ইমেইল আপডেট',
                'condition' => [ 'show_stats' => 'yes' ],
            ]
        );

        $this->add_control(
            'stat_3_number',
            [
                'label'     => esc_html__( 'Stat 3 Number', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => '৯৮%',
                'condition' => [ 'show_stats' => 'yes' ],
            ]
        );

        $this->add_control(
            'stat_3_label',
            [
                'label'     => esc_html__( 'Stat 3 Label', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'সন্তুষ্টি রেট',
                'condition' => [ 'show_stats' => 'yes' ],
            ]
        );

        $this->end_controls_section();

        // ===== Style: Layout =====
        $this->start_controls_section(
            'style_layout',
            [
                'label' => esc_html__( 'Layout & Background', 'ppa-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'layout_style',
            [
                'label'   => esc_html__( 'Layout Style', 'ppa-addons' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient (Dark)', 'ppa-addons' ),
                    'light'    => esc_html__( 'Light Card', 'ppa-addons' ),
                    'minimal'  => esc_html__( 'Minimal', 'ppa-addons' ),
                ],
            ]
        );

        $this->add_control(
            'bg_color_1',
            [
                'label'     => esc_html__( 'Background Color 1', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#0f1729',
                'condition' => [ 'layout_style' => 'gradient' ],
                'selectors' => [
                    '{{WRAPPER}} .ppa-newsletter-wrap' => '--nl-bg1: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color_2',
            [
                'label'     => esc_html__( 'Background Color 2', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#1a2f5e',
                'condition' => [ 'layout_style' => 'gradient' ],
                'selectors' => [
                    '{{WRAPPER}} .ppa-newsletter-wrap' => '--nl-bg2: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'accent_color',
            [
                'label'     => esc_html__( 'Accent Color', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#4f8ef7',
                'selectors' => [
                    '{{WRAPPER}} .ppa-newsletter-wrap' => '--nl-accent: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ===== Style: Typography =====
        $this->start_controls_section(
            'style_typography',
            [
                'label' => esc_html__( 'Typography', 'ppa-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__( 'Title Color', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .ppa-nl-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_size',
            [
                'label'      => esc_html__( 'Title Font Size', 'ppa-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 20, 'max' => 60 ] ],
                'default'    => [ 'unit' => 'px', 'size' => 36 ],
                'selectors'  => [
                    '{{WRAPPER}} .ppa-nl-title' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label'     => esc_html__( 'Description Color', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#a0aec0',
                'selectors' => [
                    '{{WRAPPER}} .ppa-nl-desc' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ===== Style: Button =====
        $this->start_controls_section(
            'style_button',
            [
                'label' => esc_html__( 'Button', 'ppa-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label'     => esc_html__( 'Button Background', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#4f8ef7',
                'selectors' => [
                    '{{WRAPPER}} .ppa-nl-btn' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_text_color',
            [
                'label'     => esc_html__( 'Button Text Color', 'ppa-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .ppa-nl-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_border_radius',
            [
                'label'      => esc_html__( 'Button Border Radius', 'ppa-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 50 ] ],
                'default'    => [ 'unit' => 'px', 'size' => 10 ],
                'selectors'  => [
                    '{{WRAPPER}} .ppa-nl-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $layout   = ! empty( $settings['layout_style'] ) ? $settings['layout_style'] : 'gradient';
        ?>

        <div class="ppa-newsletter-wrap ppa-nl-<?php echo esc_attr( $layout ); ?>">

            <!-- Decorative blobs -->
            <span class="ppa-nl-blob ppa-nl-blob-1"></span>
            <span class="ppa-nl-blob ppa-nl-blob-2"></span>

            <div class="ppa-nl-inner">

                <!-- Badge -->
                <?php if ( ! empty( $settings['badge_text'] ) ) : ?>
                    <span class="ppa-nl-badge"><?php echo esc_html( $settings['badge_text'] ); ?></span>
                <?php endif; ?>

                <!-- Title -->
                <?php if ( ! empty( $settings['title'] ) ) : ?>
                    <h2 class="ppa-nl-title"><?php echo esc_html( $settings['title'] ); ?></h2>
                <?php endif; ?>

                <!-- Description -->
                <?php if ( ! empty( $settings['description'] ) ) : ?>
                    <p class="ppa-nl-desc"><?php echo esc_html( $settings['description'] ); ?></p>
                <?php endif; ?>

                <!-- Form -->
                <form class="ppa-nl-form" onsubmit="ppaNLSubmit(event, this)">
                    <div class="ppa-nl-input-group">
                        <span class="ppa-nl-input-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </span>
                        <input
                            type="email"
                            class="ppa-nl-input"
                            placeholder="<?php echo esc_attr( $settings['email_placeholder'] ); ?>"
                            required
                        />
                        <button type="submit" class="ppa-nl-btn">
                            <span class="ppa-nl-btn-text"><?php echo esc_html( $settings['button_text'] ); ?></span>
                            <span class="ppa-nl-btn-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                    <polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </span>
                        </button>
                    </div>

                    <!-- Success message (hidden by default) -->
                    <div class="ppa-nl-success" style="display:none;">
                        ✅ ধন্যবাদ! সফলভাবে সাবস্ক্রাইব হয়েছেন।
                    </div>
                </form>

                <!-- Privacy -->
                <?php if ( ! empty( $settings['privacy_text'] ) ) : ?>
                    <p class="ppa-nl-privacy"><?php echo esc_html( $settings['privacy_text'] ); ?></p>
                <?php endif; ?>

                <!-- Stats -->
                <?php if ( 'yes' === $settings['show_stats'] ) : ?>
                    <div class="ppa-nl-stats">
                        <div class="ppa-nl-stat">
                            <strong><?php echo esc_html( $settings['stat_1_number'] ); ?></strong>
                            <span><?php echo esc_html( $settings['stat_1_label'] ); ?></span>
                        </div>
                        <div class="ppa-nl-stat-divider"></div>
                        <div class="ppa-nl-stat">
                            <strong><?php echo esc_html( $settings['stat_2_number'] ); ?></strong>
                            <span><?php echo esc_html( $settings['stat_2_label'] ); ?></span>
                        </div>
                        <div class="ppa-nl-stat-divider"></div>
                        <div class="ppa-nl-stat">
                            <strong><?php echo esc_html( $settings['stat_3_number'] ); ?></strong>
                            <span><?php echo esc_html( $settings['stat_3_label'] ); ?></span>
                        </div>
                    </div>
                <?php endif; ?>

            </div><!-- .ppa-nl-inner -->
        </div><!-- .ppa-newsletter-wrap -->

        <script>
        function ppaNLSubmit(e, form) {
            e.preventDefault();
            var input   = form.querySelector('.ppa-nl-input');
            var success = form.querySelector('.ppa-nl-success');
            var btn     = form.querySelector('.ppa-nl-btn');
            if (!input.value) return;
            btn.disabled = true;
            btn.style.opacity = '0.7';
            // Simulate async submit (replace with real AJAX/API call)
            setTimeout(function () {
                form.querySelector('.ppa-nl-input-group').style.display = 'none';
                success.style.display = 'block';
            }, 800);
        }
        </script>

        <?php
    }
}
