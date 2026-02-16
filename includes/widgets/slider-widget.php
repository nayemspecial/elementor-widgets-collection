<?php
if( ! defined( 'ABSPATH' )){
    exit;
}

class PPA_Slider_Widget extends \Elementor\Widget_Base {
    public function get_name()
    {
        return 'slider_widget';
    }

    public function get_title() {
        return 'Slider Widget';
    }

    public function get_icon()
    {
        return 'eicon-sliders';
    }

    public function get_categories()
    {
        return [ 'general' ];
    }

    public function get_style_depends()
    {
        return ['ppa-slick-css', 'ppa-blog-style'];
    }

    public function get_script_depends()
    {
        return ['ppa-slick-js', 'ppa-slider-script'];
    }

    protected function register_controls() {
        $this->start_controls_section('section_content', ['label' => 'Slides']);
            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'title',
                [
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label'=> esc_html__( 'Title', 'ppa-addons'),
                ]
            );
            $repeater->add_control(
                'text',
                [
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label'=> esc_html__( 'Description', 'ppa-addons'),
                ]
            );
            $repeater->add_control(
                'image',
                [
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label'=> esc_html__( 'Background Image', 'ppa-addons'),
                ]
            );
            $repeater->add_control(
                'btn_link',
                [
                    'type' => \Elementor\Controls_Manager::URL,
                    'label'=> esc_html__( 'Button Text', 'ppa-addons'),
                ]
            );

            $this->add_control(
                'slides',
                [
                    'label' => 'Slider List',
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="hero-slider">
            <?php if( $settings['slides']) : ?>
                <?php foreach ( $settings['slides'] as $slide ) : ?>
                    <div class="slide-item" style="background-image: url('<?php echo esc_url($slide['image']['url']); ?>');">
                        <div class="slide-content">
                            <h2><?php echo esc_html($slide['title']); ?></h2>
                            <p><?php echo esc_html($slide['text']); ?></p>
                            <a href="<?php echo esc_url($slide['btn_link']['url']); ?>" class="btn-cta">শুরু করুন</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
        <?php
    }
}