<?php
if( !defined('ABSPATH') ) exit;

class PPA_Team_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'ppa_team_member';
    }
    public function get_title() {
        return esc_html__( 'PPA Team Member', 'ppa-addons' );
    }
    public function get_icon() {
        return 'eicon-user-circle-o';
    }
    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content-section',
            [
                'label' => esc_html__('Team Members', 'ppa-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'member_image',
            [
                'label' => esc_html__('Profile', 'ppa-addons'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label' => esc_html__('Name', 'ppa-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Md. Nayemur Rahman', 'ppa-addons'),
            ]
        );

        $repeater->add_control(
            'member_role',
            [
                'label' => esc_html__('Designation', 'ppa-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Laravel & Wordpress Developer', 'ppa-addons'),
            ]
        );

        $repeater->add_control(
            'fb_link',
            [
                'label' => esc_html__('Facebook URL', 'ppa-addons'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'ppa-addons' ),
            ]
        );

        $repeater->add_control(
            'twitter_link',
            [
                'label' => esc_html__('Twitter URL', 'ppa-addons'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'ppa-addons' ),
            ]
        );

        $this->add_control(
            'team_list',
            [
                'label' => esc_html__('Member List', 'ppa-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => esc_html__('Md. Nayemur Rahman', 'ppa-addons'),
                        'member_role' => esc_html__('Instructor', 'ppa-addons'),
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if( !empty($settings['team_list']) ) :
        ?>
        <div class="ppa-container">
            <h2 class="ppa-section-title">Our Expert Instructors</h2>
            <div class="ppa-team-grid-4">
                <?php foreach ( $settings['team_list'] as $item) : ?>
                    <div class="ppa-modern-card elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
                        <div class="ppa-img-wrapper">
                            <?php if ( !empty($item['member_image']['url']) ) : ?>
                                <img src="<?php echo esc_url($item['member_image']['url']); ?>" alt="<?php echo esc_attr( $item['member_name']); ?>">
                            <?php endif; ?>

                            <div class="ppa-social-overlay">
                                <?php if(!empty( $item['fb_link']['url'] )) : ?>
                                    <a href="<?php echo esc_url($item['fb_link']['url']); ?>" class="ppa-social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <?php endif; ?>

                                <?php if(!empty( $item['twitter_link']['url'] )) : ?>
                                    <a href="<?php echo esc_url($item['twitter_link']['url']); ?>" class="ppa-social-icon" target="_blank"><i class="fab fa-twitter"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="ppa-card-content">
                            <h3 class="ppa-name"><?php echo esc_html($item['member_name']); ?></h3>
                            <span class="ppa-designation"><?php echo esc_html($item['member_role']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php 
        endif;
    }
}