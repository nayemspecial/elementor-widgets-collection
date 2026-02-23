<?php
if ( ! defined('ABSPATH') ) exit;

class PPA_CTA_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ppa-cta';
    }

    public function get_title() {
        return 'PPA Call to Action';
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'ppa-addons'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => esc_html__('Title', 'ppa-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'আপনার প্রজেক্ট শুরু করুন আজই!',
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => esc_html__('Description', 'ppa-addons'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'আমরা আপনাকে দিচ্ছি সেরা কোয়ালিটি এবং আধুনিক ডিজাইনের নিশ্চয়তা। আমাদের বিশেষজ্ঞ টিমের সাথে কথা বলতে নিচের বাটনে ক্লিক করুন।',
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label'   => esc_html__('Button Text', 'ppa-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'এখনই শুরু করুন',
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label'   => esc_html__('Button Link', 'ppa-addons'),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url'         => 'https://academy.projuktiplus.com',
                    'is_external' => false,
                    'nofollow'    => false,
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $target   = ! empty($settings['btn_link']['is_external']) ? ' target="_blank"' : '';
        $nofollow = ! empty($settings['btn_link']['nofollow']) ? ' rel="nofollow"' : '';
        ?>

        <div class="cta-card">
            <?php if ( ! empty($settings['title']) ) : ?>
                <h2><?php echo esc_html($settings['title']); ?></h2>
            <?php endif; ?>

            <?php if ( ! empty($settings['description']) ) : ?>
                <p><?php echo esc_html($settings['description']); ?></p>
            <?php endif; ?>

            <?php if ( ! empty($settings['btn_text']) && ! empty($settings['btn_link']['url']) ) : ?>
                <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" 
                   class="cta-button"<?php echo $target . $nofollow; ?>>
                    <?php echo esc_html($settings['btn_text']); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php
    }
}