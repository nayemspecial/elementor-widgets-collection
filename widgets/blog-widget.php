<?php

use ElementorDeps\Twig\Profiler\Node\EnterProfileNode;

use function Avifinfo\read;

if( ! defined( 'ABSPATH' )){
    exit;
}

class PPA_Blog_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ppa_blog_grid';
    }

    public function get_title()
    {
        return esc_html__('PPA Blog Card', 'ppa-addones');
    }

    public function get_icon(){
        return 'eicon-posts-grid';
    }

    public function get_categories()
    {
        return [ 'general' ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section', 
            [
                'label' => esc_html__( 'Content', 'ppa-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_count',
            [
                'label' => esc_html__( 'Number of Posts', 'ppa-addons'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
        {
            $settings = $this->get_settings_for_display();

            $args = array(
                'post_type' => 'post',
                'post_per_page' => $settings['post_count'],
                'post_status' => 'publish',
            );

            $query = new \WP_Query( $args );

            if ( $query->have_posts() ) {
                echo '<div class="ppa-blog-wrapper"><div class="ppa-blog-grid">';

                while ( $query->have_posts() ) {
                    $query->the_post();

                    $image_url = get_the_post_thumbnail_url( get_the_ID(), 'medium');

                    if( empty($image_url) ){
                        $image_url = 'https://placehold.co/500x300';
                    }

                    $categories = get_the_category();
                    $cat_name = ! empty($categories) ? $categories[0]->name : 'Uncategorized';

                    ?>
                    <div class="ppa-blog-card">
                        <div class="ppa-card-thumb">
                            <span class="ppa-card-badge">
                                <?php echo esc_html($cat_name); ?>
                            </span>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="ppa-card-content">
                            <div class="ppa-card-date">Oct 20, 2025</div>
                            <div class="ppa-card-date"><?php echo get_the_date(); ?></div>
                            <h3 class="ppa-card-title"><?php the_title(); ?></h3>
                            <p class="ppa-card-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                            <div class="ppa-card-footer">
                                <a href="<?php the_permalink(); ?>" class="ppa-read-more">Read More &rarr;</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } // End While loop
            echo '</div></div>';

            wp_reset_postdata();
            
            } else {
                echo 'No Posts Found.';
            }

        }
}