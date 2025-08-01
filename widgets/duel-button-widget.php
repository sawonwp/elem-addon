<?php
class elem_duel_btn_widget extends \Elementor\Widget_Base {

    public function get_name(): string {
        return "Duel_btn_widget";
    }
    public function get_title(): string {
        return esc_html__('Duel Button', 'elem_addon');
    }
    public function get_icon(): string {
        return 'eicon-dual-button';
    }
    public function get_categories(): array {
        return ['basic'];
    }    
    public function get_keywords(): array{
        return ['button', 'duel'];
    }
    public function has_widget_inner_wrapper(): bool {
        return false;
    }
    public function get_script_depends(): array {
		return [ 'script-handle' ];
	}

	public function get_style_depends(): array {
		return [ 'duel-btn-css' ];
	}

    public function is_dynamic_content(): bool {
        return false;
    }
    protected function register_controls(): void {
        $this->start_controls_section(
            'content_section', 
            [
                'label' => esc_html__('Duel Button', 'elem_addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]            
        );  

        $this->add_control(
            'btn_txt1', 
            [
                'label' => esc_html__('Primary Button', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'text' => esc_html__('Learn More', 'elem_addon'),
                'placeholder' => esc_html__('Enter your text', 'elem_addon'),
                'default' => esc_html__('Learn More', 'elem_addon'),
            ]
            
        );  

              
        $this->add_control(
            'btn_txt2', 
            [
                'label' => esc_html__('Secondary Button', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'text' => esc_html__('Learn More', 'elem_addon'),
                'placeholder' => esc_html__('Enter your text', 'elem_addon'),
                'default' => esc_html('Learn More', 'elem_addon')
            ]
        );
        $this->add_control(
            'btn-alignment',
            [
                'label' => esc_html__('Button Alignment', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::CHOOSE, 
                'options' => [
                    'flex-start' => ['icon' => 'eicon-text-align-left'],
                    'center' => ['icon' => 'eicon-text-align-center'],
                    'flex-end' => ['icon' => 'eicon-text-align-right'],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'display: flex; justify-content: {{VALUE}};',
                     
                ]
            ]
        );
        

        $this->add_control(
            'use_icon', 
            [
                'label' => esc_html__('Icon Position', 'elem_addon'),
                'type' => \Elementor\Controls_manager::CHOOSE,
                'options' => [
                    'left' => ['icon' => 'eicon-h-align-left'],
                    'right' => ['icon' => 'eicon-h-align-right']
                ]
            ]
        );

        $this->add_control(
            'icon_upload', 
            [
                'label' => esc_html__('Icon Position', 'elem_addon'),
                'type' => \Elementor\Controls_manager::CHOOSE,
                'options' => [
                    'none' => ['icon' => 'eicon-ban'],
                    'svg' => ['icon' => 'eicon-upload'],
                    'library' => ['icon' => 'eicon-circle'],
                ]
            ]
        );

        $this->add_control(
            'btn-spacing', 
            [
                'label' => esc_html__('Button Spacing', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'range' => [
                    'px' =>[
                        'min' => 0,
                        'max' =>200, 
                        'step' => 5,
                    ],
                ],
                
                'default' => [
                    'unit' => 'px',
                    'size' => '20',
                ],

                'selectors' =>[
                    '{{WRAPPER}} .duel_button' => 'gap: {{SIZE}}{{UNIT}}!important'
                ]
                

            ]
        );     
        
        $this->add_control(
            'button_style', 
            [
                'label' => esc_html__('Choose Button style', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'solid' => esc_html__('Solid', 'elem_addon'),
                    'outlined'=> esc_html__('Outlined', 'elem_addon'),
                    'solid_outlined' => esc_html__('Solid + Outlined'),
                    'outlined_solid' => esc_html__('Outlined+Solid')
                ],
                'default' =>'solid'                
            ]
        );


        

        $this->end_controls_section(); 
            //***********/
            // style section starts
            //***********/
        $this->start_controls_section(
            'style_section', 
            [
                'label' => esc_html__('Styles', 'elem_addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ] 
        );     
            
               
            $this->add_control(
                'button-bg-primary', 
                [
                    'label' => esc_html__('Primary background color', 'elem_addon'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#6EC1E4',
                    'selectors' => [
                        '{{WRAPPER}} .duel_primary' => 'background-color: {{value}}'
                        
                    ]
                ]
    
            );

            $this->add_control(
                'button-bg-secondary',
                [
                    'label' => esc_html__('Secondary background color', 'elem_addon'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#61CE70',
                    'selectors' => [
                        '{{WRAPPER}} .duel_secondary' => 'background-color: {{value}}'
                        
                    ]
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => esc_html__('Typography', 'elem_addon'),
                    'selector' =>   '{{WRAPPER}} .duel_primary'
                ]
            );   

            $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Primay btn Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button.duel_primary' => 'Color: {{Value}}', 
                ]
            ]
        );

         $this->add_control(
            'btn_color2',
            [
                'label' => esc_html__('Primay btn Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button.duel_secondary' => 'Color: {{Value}}', 
                ]
            ]
        );

            $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'Primary border',
                'selector' => '{{WRAPPER}} button.duel_primary'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'Secondary border',
                'selector' => '{{WRAPPER}} button.duel_secondary'
            ]
        );

        $this->add_control(
            'btn_padding',
            [
                'label' => esc_html__('Padding', 'elem_addon'),
                'label_block' => true,
                'type' => \Elementor\Controls_manager::DIMENSIONS,    
                'size_units' => ['px', 'em', '%'],         
                'default' =>
                [
                    'top' => '15',
                    'right' => '20', 
                    'bottom' => '15',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],                
                'selectors' => [
                    '{{WRAPPER}} button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
                ]

            ]
        );

        
        $this->end_controls_section();
    }


    protected function render(): void {
        $settings = $this->get_settings_for_display();
        $btn_style = $settings['button_style'];
        $btn_wrapper_class = 'duel_button '. esc_attr($btn_style);

        if(empty($settings['btn_txt1'])){
            return ;
        }

        ?>
            <div class="<?php echo $btn_wrapper_class ?>">            
                <div>
                    <button class="duel_primary"><?php echo $settings['btn_txt1'];?></button>
                </div>   
                <div>
                    <button class="duel_secondary"><?php echo $settings['btn_txt2'];?></button>
                </div>                      
            </div>
        <?php
    }

}
?>