<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class PPA_Pricing_Table_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ppa_pricing_table';
    }

    public function get_title() {
        return esc_html__( 'PPA Pricing Table', 'ppa-addons' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {

        /* ── HEADER ── */
        $this->start_controls_section( 'section_header', [
            'label' => esc_html__( 'Header', 'ppa-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'plan_name', [
            'label'   => esc_html__( 'Plan Name', 'ppa-addons' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Professional', 'ppa-addons' ),
        ] );

        $this->add_control( 'plan_tagline', [
            'label'   => esc_html__( 'Tagline', 'ppa-addons' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Best for growing teams', 'ppa-addons' ),
        ] );

        $this->add_control( 'highlighted', [
            'label'        => esc_html__( 'Highlighted (Popular)', 'ppa-addons' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Yes', 'ppa-addons' ),
            'label_off'    => esc_html__( 'No', 'ppa-addons' ),
            'return_value' => 'yes',
            'default'      => 'no',
        ] );

        $this->add_control( 'badge_text', [
            'label'     => esc_html__( 'Badge Text', 'ppa-addons' ),
            'type'      => \Elementor\Controls_Manager::TEXT,
            'default'   => esc_html__( 'Most Popular', 'ppa-addons' ),
            'condition' => [ 'highlighted' => 'yes' ],
        ] );

        $this->end_controls_section();

        /* ── PRICE ── */
        $this->start_controls_section( 'section_price', [
            'label' => esc_html__( 'Price', 'ppa-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'currency_symbol', [
            'label'   => esc_html__( 'Currency Symbol', 'ppa-addons' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '$',
        ] );

        $this->add_control( 'price', [
            'label'   => esc_html__( 'Price', 'ppa-addons' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '49',
        ] );

        $this->add_control( 'period', [
            'label'   => esc_html__( 'Period', 'ppa-addons' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( '/ month', 'ppa-addons' ),
        ] );

        $this->end_controls_section();

        /* ── FEATURES ── */
        $this->start_controls_section( 'section_features', [
            'label' => esc_html__( 'Features', 'ppa-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'feature_text', [
            'label'   => esc_html__( 'Feature Text', 'ppa-addons' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Unlimited Projects', 'ppa-addons' ),
        ] );

        $repeater->add_control( 'feature_included', [
            'label'        => esc_html__( 'Included', 'ppa-addons' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Yes', 'ppa-addons' ),
            'label_off'    => esc_html__( 'No', 'ppa-addons' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        ] );

        $this->add_control( 'features_list', [
            'label'       => esc_html__( 'Feature List', 'ppa-addons' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'default'     => [
                [ 'feature_text' => 'Unlimited Projects',    'feature_included' => 'yes' ],
                [ 'feature_text' => 'Priority Support',      'feature_included' => 'yes' ],
                [ 'feature_text' => 'Advanced Analytics',    'feature_included' => 'yes' ],
                [ 'feature_text' => 'Custom Integrations',   'feature_included' => 'yes' ],
                [ 'feature_text' => 'White Label Reports',   'feature_included' => 'no'  ],
            ],
            'title_field' => '{{{ feature_text }}}',
        ] );

        $this->end_controls_section();

        /* ── BUTTON ── */
        $this->start_controls_section( 'section_button', [
            'label' => esc_html__( 'Button', 'ppa-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'btn_text', [
            'label'   => esc_html__( 'Button Text', 'ppa-addons' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Get Started', 'ppa-addons' ),
        ] );

        $this->add_control( 'btn_link', [
            'label'       => esc_html__( 'Button Link', 'ppa-addons' ),
            'type'        => \Elementor\Controls_Manager::URL,
            'placeholder' => 'https://your-site.com',
            'default'     => [ 'url' => '#' ],
        ] );

        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'section_style', [
            'label' => esc_html__( 'Style', 'ppa-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'accent_color', [
            'label'   => esc_html__( 'Accent Color', 'ppa-addons' ),
            'type'    => \Elementor\Controls_Manager::COLOR,
            'default' => '#4f46e5',
            'selectors' => [
                '{{WRAPPER}} .ppa-pt-card.highlighted'   => 'border-color: {{VALUE}}; --ppa-accent: {{VALUE}};',
                '{{WRAPPER}} .ppa-pt-badge'              => 'background: {{VALUE}};',
                '{{WRAPPER}} .ppa-pt-price-amount'       => 'color: {{VALUE}};',
                '{{WRAPPER}} .ppa-pt-btn'                => 'background: {{VALUE}}; border-color: {{VALUE}};',
                '{{WRAPPER}} .ppa-pt-check'              => 'color: {{VALUE}};',
                '{{WRAPPER}} .ppa-pt-plan-name'          => 'color: {{VALUE}};',
            ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s          = $this->get_settings_for_display();
        $highlighted = ( 'yes' === $s['highlighted'] );
        $card_class  = 'ppa-pt-card' . ( $highlighted ? ' highlighted' : '' );
        $target      = ! empty( $s['btn_link']['is_external'] ) ? ' target="_blank"' : '';
        $nofollow    = ! empty( $s['btn_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
        ?>
        <div class="<?php echo esc_attr( $card_class ); ?>">

            <?php if ( $highlighted && ! empty( $s['badge_text'] ) ) : ?>
                <div class="ppa-pt-badge"><?php echo esc_html( $s['badge_text'] ); ?></div>
            <?php endif; ?>

            <div class="ppa-pt-header">
                <h3 class="ppa-pt-plan-name"><?php echo esc_html( $s['plan_name'] ); ?></h3>
                <?php if ( ! empty( $s['plan_tagline'] ) ) : ?>
                    <p class="ppa-pt-tagline"><?php echo esc_html( $s['plan_tagline'] ); ?></p>
                <?php endif; ?>
            </div>

            <div class="ppa-pt-price-wrap">
                <span class="ppa-pt-currency"><?php echo esc_html( $s['currency_symbol'] ); ?></span>
                <span class="ppa-pt-price-amount"><?php echo esc_html( $s['price'] ); ?></span>
                <span class="ppa-pt-period"><?php echo esc_html( $s['period'] ); ?></span>
            </div>

            <ul class="ppa-pt-features">
                <?php foreach ( $s['features_list'] as $item ) :
                    $included = ( 'yes' === $item['feature_included'] );
                    ?>
                    <li class="ppa-pt-feature-item <?php echo $included ? 'included' : 'excluded'; ?>">
                        <span class="ppa-pt-icon">
                            <?php if ( $included ) : ?>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="ppa-pt-check" aria-hidden="true"><path d="M3 8.5L6.5 12L13 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <?php else : ?>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="ppa-pt-cross" aria-hidden="true"><path d="M5 5L11 11M11 5L5 11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            <?php endif; ?>
                        </span>
                        <span class="ppa-pt-feature-text"><?php echo esc_html( $item['feature_text'] ); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <?php if ( ! empty( $s['btn_text'] ) ) : ?>
                <div class="ppa-pt-btn-wrap">
                    <a href="<?php echo esc_url( $s['btn_link']['url'] ); ?>"
                       class="ppa-pt-btn <?php echo $highlighted ? 'ppa-pt-btn--solid' : 'ppa-pt-btn--outline'; ?>"
                       <?php echo $target . $nofollow; ?>>
                        <?php echo esc_html( $s['btn_text'] ); ?>
                    </a>
                </div>
            <?php endif; ?>

        </div>
        <?php
    }
}
