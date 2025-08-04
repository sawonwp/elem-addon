<?php

class Elem_Custom_Heading extends \Elementor\Widget_Base {

    public function get_name(): string {
        return 'custom_heading';
    }

    public function get_title(): string {
        return 'Custom Heading';
    }

    public function get_icon(): string {
        return 'eicon-heading';
    }

    public function get_categories(): array {
        return ['first-category'];
    }

    public function get_style_depends(): array {
        return ['custom-heading-css'];
    }

    protected function register_controls(): void {

        $this->start_controls_section(
            'text_content',
            [
                'label' => esc_html__('Text Content', 'elem_addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('HELLO WORLD', 'elem_addon'),
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => ['icon' => 'eicon-text-align-left'],
                    'center' => ['icon' => 'eicon-text-align-center'],
                    'right' => ['icon' => 'eicon-text-align-right'],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'text_style',
            [
                'label' => esc_html__('Text Style', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'normal',
                'prefix_class' => 'style-type-',
                'options' => [
                    'normal' => esc_html__('Normal', 'elem_addon'),
                    'outline' => esc_html__('Outline', 'elem_addon'),
                    'image_mask' => esc_html__('Image Mask', 'elem_addon'),
                    'shade_text' => esc_html__('Shade Text', 'elem_addon'),
                ], 
            ]
        );

        $this-> add_control(
            'txt_bg', 
            [
                'label' => esc_html('Background image', 'elem_addon'),
                'type' => \Elementor\Controls_manager::MEDIA, 
                'selectors' => [
                    '{{WRAPPER}} .custom_txt_wrapper.style-type-image_mask h3' => 'background-image:url({{URL}});',
                ],
                'condition' => [
                    'text_style' => 'image_mask',
                ]
            ]

        );
        $this->add_control(
            'shade_txt', [
                'label' => esc_html('Shade Text', 'elem_addon'),
                'type' => \Elementor\Controls_manager::TEXT, 
                'default' => esc_html("SHADE", 'elem_addon'),
                'condition' => [
                    'text_style' => 'shade_text',
                ]
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'style_content',
            [
                'label' => esc_html__('Text Style', 'elem_addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => esc_html__('Typography', 'elem_addon'),
                'selector' => '{{WRAPPER}} H3',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );
        $this->add_control(
            'txt_color', 
            [
                'label' => esc_html('color', 'elem_addon'),
                'type' =>  \Elementor\Controls_manager::COLOR,
                'default' =>  '#000', 
                'selectors' => [
                    '{{WRAPPER}} .style-type-normal h3' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .style-type-image_mask h3' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .style-type-outline h3:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .style-type-outline h3' => '-webkit-text-stroke-color: {{VALUE}};',
                    
                ]
            ]

        );
        // $this->add_control(
        //     'outline_on_hover', 
        //     [
        //         'label' => esc_html('Fill on Hover', 'elem_addon'),
        //         'type' => Elementor\Controls_manager::SWITCHER, 
        //         'label_yes'  => esc_html__('Yes', 'elem_addon'),
        //         'label_no' => esc_html__('No', 'elem_addon'),
        //         'default' => 'No', 
        //         'condition' => [
        //             'text_style' => 'outline',
        //         ]

        //     ]
        // );
        $this->add_control(
            'stroke_width', 
            [
                'label' => esc_html__('Stroke Width', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SLIDER, 
                'size_units' => ['px'],
                'range' => [
                    'px'=> [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ], 
                ],
                'default' =>  [
                    'size' => 1,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .style-type-outline h3' => '-webkit-text-stroke-width: {{Size}}{{UNIT}};',

                ], 
                'condition' => [
                    'text_style' => 'outline',
                ]
            ]
        );

        //mask img
        $this->add_control(
            'mask_img_pos', 
            [
                'label' => esc_html('Image Position', 'elem_addon'),
                'type' => \Elementor\Controls_manager::CHOOSE, 
                'default' =>"center",
                'options'=> [
                    'top left' => [
                        'title' => 'Top Left',
                        'icon' => 'eicon-h-align-left',
                    ],                   
                    'center center' => [
                        'title' => 'Center',
                        'icon' => 'eicon-h-align-center',
                    ],
                    'bottom center' => [
                        'title' => 'Bottom Center',
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .custom_txt_wrapper.style-type-image_mask h3' => 'background-position: {{VALUE}};',
                ],
                'condition' => [
                    'text_style' => 'image_mask',
                ]
            ]
        );


        // shade
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'shade_text_typography',
                'label' => esc_html__('Shade Text Typography', 'elem_addon'),
                'selector' => '{{WRAPPER}} .custom_txt_wrapper.style-type-shade_text h2',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'condition' => [
                    'text_style' => 'shade_text',
                ]
            ]
        );
        
        $this->add_control(
        'shade_color', 
        [
            'label' => esc_html('Shade Text Color', 'elem_addon'),
            'type' =>  \Elementor\Controls_manager::COLOR,
            'default' =>  '#000', 
            'selectors' => [
                '{{WRAPPER}} .custom_txt_wrapper.style-type-shade_text h2' => 'color: {{VALUE}}',                    
            ],
            'condition' => [
                'text_style' => 'shade_text',
            ],
        ]

    );


        $this->end_controls_section();
    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();
        $style_class = '';
        if(!empty($settings['text_style'])){
                    $style_class = 'style-type-' . sanitize_html_class($settings['text_style']);
        }

        $bg_style = '';
        if($settings['text_style'] === 'image_mask' && !empty($settings['txt_bg']['url'])){
            $bg_style ='style="background-image: url(' .esc_url($settings['txt_bg']['url']). ');"';
        } 

       
        ?>
        <div class="custom_txt_wrapper <?php echo esc_attr($style_class); ?>">
            <?php  if($settings['text_style'] === 'shade_text' && !empty($settings['shade_txt'])) : ?>
               <h2> <?php echo esc_html($settings['shade_txt']); ?> </h2> 
            <?php endif; ?>            
            <h3> <?php echo esc_html($settings['text']); ?> </h3>
        </div>
        <?php
    }

    protected function content_template(): void {
        ?>
        <div class="custom_txt_wrapper style-type-{{ settings.text_style }}">
            <h3> {{{ settings.text }}} </h3>
        </div>
        <?php
    }
}
