<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * PPA Team Members Widget
 */
class PPA_Team_Members_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ppa-team-members';
    }

    public function get_title() {
        return esc_html__( 'PPA Team Members', 'ppa' );
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    public function get_keywords() {
        return [ 'team', 'members', 'ppa', 'projuktiplus' ];
    }

    protected function register_controls() {
        // --- Content Section ---
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'ppa' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_image',
            [
                'label'   => esc_html__( 'Image', 'ppa' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label' => esc_html__( 'Name', 'ppa' ),
                'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => 'Md. Nayemur Rahman',
            ]
        );
        
        $repeater->add_control(
            'member_title',
            [
                'label' => esc_html__( 'Title', 'ppa' ),
                'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => 'Lead Developer',
            ]
        );

        $repeater->add_control(
            'member_email',
            [
                'label' => esc_html__( 'Email', 'ppa' ),
                'type'  => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'email_icon',
            [
                'label' => esc_html__( 'Email icon', 'ppa' ),
                'type'  => \Elementor\Controls_Manager::ICONS,
                'default' => [ 'value' => 'fas fa-envelope', 'library' => 'solid' ],
            ]
        );

        $repeater->add_control(
            'member_experience',
            [
                'label' => esc_html__( 'Experience', 'ppa' ),
                'type'  => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'calender_icon',
            [
                'label' => esc_html__( 'Calendar icon', 'ppa' ),
                'type'  => \Elementor\Controls_Manager::ICONS,
                'default' => [ 'value' => 'fas fa-calendar-alt', 'library' => 'solid' ],
            ]
        );

        $repeater->add_control(
            'member_description',
            [
                'label' => esc_html__( 'Description', 'ppa' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'team_members',
            [
                'label'  => esc_html__( 'Team Members', 'ppa' ),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ member_name }}}',
            ]
        );

        $this->end_controls_section();

        // --- Style Section ---
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'ppa' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'member_name_color',
            [
                'label'     => esc_html__( 'Name Color', 'ppa' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .single-team-member h2' => 'color: {{VALUE}};' ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
    
        if ( ! empty( $settings['team_members'] ) ) : ?>
            <div class="team-member-wrapper">
                <?php foreach ( $settings['team_members'] as $member ) : ?>
                    <div class="single-team-member">
                        <div class="front">
                            <?php if ( ! empty( $member['member_image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $member['member_image']['url'] ); ?>" alt="<?php echo esc_attr( $member['member_name'] ); ?>">
                            <?php endif; ?>
                            
                            <div class="meta bg">
                                <?php if ( ! empty( $member['member_name'] ) ) : ?>
                                    <h2><?php echo esc_html( $member['member_name'] ); ?></h2>
                                <?php endif; ?>
                                <?php if ( ! empty( $member['member_title'] ) ) : ?>
                                    <p><?php echo esc_html( $member['member_title'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="hover">
                            <div class="meta">
                                <?php if ( ! empty( $member['member_name'] ) ) : ?>
                                    <h2><?php echo esc_html( $member['member_name'] ); ?></h2>
                                <?php endif; ?>
                                
                                <div class="envelope">
                                    <div class="envelpe-bg">
                                        <?php \Elementor\Icons_Manager::render_icon( $member['email_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>
                                    <?php if ( ! empty( $member['member_email'] ) ) : ?>
                                        <div><?php echo esc_html( $member['member_email'] ); ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="calender">
                                    <div class="calender-bg">
                                        <?php \Elementor\Icons_Manager::render_icon( $member['calender_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>
                                    <?php if ( ! empty( $member['member_experience'] ) ) : ?>
                                        <div><?php echo esc_html( $member['member_experience'] ); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif;
    }
}