<?php

class elem_cascade_img extends \Elementor\Widget_Base {
    public function get_name(): string {
        return 'elem_cascade_img';
    }

    public function get_title(): string {
        return 'Cascading Image';
    }

    public function get_icon(): string {
        return 'eicon-parallax';
    }

    public function get_categories(): array {
        return ['first-category'];
    }

    public function get_style_depends(): array {
        return ['cascade-img-css'];
    }

    protected function register_controls(): void {

        $this->start_controls_section(
            'add_element',
            [
                'label' => esc_html__('Add Element', 'elem_addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'add_img',
            [
                'label' => esc_html__('Select Image', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'img_width',
            [
                'label' => esc_html__('Image Size', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'full',
                'options' => [
                    'full' => esc_html__('Full', 'elem_addon'),
                    'ratio_3_5' => esc_html__('3:5', 'elem_addon'),
                    'ratio_1_1' => esc_html__('1:1', 'elem_addon'),
                    'rect_4_3' => esc_html__('4:3', 'elem_addon'),
                    'rect_5_4' => esc_html__('5:4', 'elem_addon'),
                ],
                // Optional: Implement selector or use class in render
            ]
        );

        $this->end_controls_section();

        // Style section
        $this->start_controls_section(
            'Styling',
            [
                'label' => esc_html__('Style Image', 'elem_addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'img_border_rad',
            [
                'label' => esc_html__('Border Radius', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hr_pos1',
            [
                'label' => esc_html__('Horizontal Position', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'selectors' => [
                    '{{WRAPPER}} img' => 'left: {{SIZE}}{{UNIT}};',
                    
                ],
            ]
        );

        $this->add_control(
            'vl_pos1',
            [
                'label' => esc_html__('Vertical Position', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'selectors' => [
                    '{{WRAPPER}} img' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="cascade_wrapper">
            <?php if (!empty($settings['add_img']['url'])): ?>
                <img src="<?php echo esc_url($settings['add_img']['url']); ?>" alt="">
            <?php endif; ?>
        </div>
        <?php
    }

    protected function content_template(): void {
        ?>
        <div class="cascade_wrapper">
            <# if ( settings.add_img.url ) { #>
                <img src="{{ settings.add_img.url }}" alt="">
            <# } #>
        </div>
        <?php
    }
}
?>