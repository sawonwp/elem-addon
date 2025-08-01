<?php 
class elem_read_more extends \Elementor\Widget_Base{

    public function get_name(): string{
        return 'read-more-widget';
    }
    public function get_title(): string {
        return 'Read More ';
    }
    public function get_icons(): string {
        return 'eicon-ellipsis-h';
    }
    public function get_categories(): array {
        return ['basic'];
    }
    public function get_keywords(): array {
        return ['read more'];

    }
    public function has_widget_inner_wrapper(): bool {
        return 'false';
    }
    public function is_dynamic_content() : bool {
        return 'true';
    }
    public function get_style_depends() : array{
        return ['read-more-css'];
    }
    public function get_script_depends(): array {
        return ['read-more-js'];
    }

    protected function register_controls() :void {
        $this->start_controls_section(
            'content-section', 
            [
                'label' => esc_html__('Read More Content', 'elem_addon'),
                'tab' => \Elementor\Controls_manager::TAB_CONTENT
            ] 

        ); 

        $this->add_control(
            'vis_txt', 
            [
                'label' => esc_html__('Visible text', 'elem_addon'),
                'type' => \Elementor\Controls_manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'hid_txt',
            [
                'label'=> esc_html('Hidden Text', 'elem_addon'),
                'type' => \Elementor\Controls_manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'btn_txt', 
            [
                'label' => esc_html__('Button Text', 'elem_addon'),
                'type' => \Elementor\Controls_manager::TEXT,
                'Default' => esc_html__('Read More', 'elem_addon'),
            ]
        );
        

        $this->add_control(
            'icon_pos',
            [
                'label' => esc_html__("Icon Alignment"),
                'type' => \Elementor\Controls_manager::CHOOSE,
                'options' => [
                    'left' => ['icon' => 'eicon-h-align-left'],
                     'right' => ['icon' => 'eicon-h-align-right'],
                ],
                'default' => 'right',
                'selectors'=> [
                    '{{WRAPPER}}' => 'float: {{VALUE}};',
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'read-more-styling', 
            [
                'label' => esc_html__('Text', 'elem_addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}}.title',
			]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors'  => [
                    '{{WRAPPER}}' =>  'Color: {{VALUE}}'
                 ]
            ]
        );
        $this->add_control(
            'text-alignment',
            [
                'label'=> esc_html__('Alignment', 'elem_addon'),
                'type' => \Elementor\Controls_manager::CHOOSE,
                'options' => [
                    'left' => ['icon' => 'eicon-text-align-left'],
                    'center' => ['icon' => 'eicon-text-align-center'],
                    'right' => ['icon' => 'eicon-text-align-right'],
                    'justify' => ['icon' => 'eicon-text-align-justify'],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}}',
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'btn-styling', 
            [
                'label' => esc_html__('Button', 'elem_addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // button styling 
        $this->add_control(
            'btn-position', 
            [
                'label' => esc_html__('Button  Position', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SELECT,               
                'options' => [
                    'Inline' => esc_html__('Inline', 'elem_addon'),
                    'Block' => esc_html__('Block', 'elem_addon'),
                ],
                'default' => 'Inline',

                'selectors' => [
                    '{{WRAPPER}} button' => 'display: {{VALUE}}',
                ]

            ]
        );

        $this->add_control(
            'btn-top-spacing', 
            [
                'label' => esc_html__('Spacing', 'elem_addon'),
                'description' => esc_html__('Use it only on block position'),
                'type' => \Elementor\Controls_manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'vw'],
                'range'=>[
                    'px' =>[
                        'min' => 0,
                        'max' => 500, 
                        'step' => 1,
                    ]  ,          
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '5px',
                ], 
                'selector' => [
                    '{{WRAPPER}} button' => 'margin-top: {{SIZE}} {{UNIT}}',
                ]
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}}.title',
			]      

        );
//not working
        $this->add_responsive_control(
            'btn-padding', [
                'label' => esc_html__('Padding', 'elem_addon'),
                'type' => \Elementor\Controls_manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw'],

                'selectors' => [
                    '{{WRAPPER}} #hideShow_btn' => 'margin: {{TOP}} {{UNIT}},  {{RIGHT}} {{UNIT}}, {{BOTTOM}} {{UNIT}}, {{LEFT}} {{UNIT}}'
                ]

            ],
        );

        $this->end_controls_section();
    }

    protected function render(): void {
        $settingsrm = $this->get_settings_for_display();

        ?>
            <div>
            <p> 
            <span class ="vis_text"> <?php echo $settingsrm['vis_txt']; ?> </span>            
            <span class = "hid_text"><?php echo $settingsrm['hid_txt'] ?> </span>  
            <button onclick="hideShow();" id="hideShow_btn"> <?php echo $settingsrm['btn_txt'] ?> </button>          
            </p>
            </div>
        <?php
    }

}
