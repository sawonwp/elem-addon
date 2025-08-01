<?php

class widget5 extends \Elementor\Widget_Base {
    public function get_name(): string {
        return 'widget5'; //the unique id
    }
    public function get_title(): string {
        return esc_html__('Widget 5', 'elem_addon');
    }
    public function get_icon(): string {
        return 'eicon-code';        
    }
    public function get_categories(): array{
        return ['first-category'];
    }
    public function get_keywords(): array {
        return ['widget', 'widget5', 'new'];
    }
//dependency
    public function get_script_depends(): array {
        return ['widget5-js'];
    }
    public function get_style_depends(): array {
        return ['widget5-css'];
    }

    //controls
    protected function register_controls(): void {

        $this-> start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content1', 'elem_addon'),
                'tab' => \Elementor\Controls_manager::TAB_CONTENT,
               
            ]
        );
        $this->add_control(
            'pre_heading', 
            [
                'type' => \Elementor\Controls_manager:: TEXT,
                'label' => esc_html__('Preheading Text', 'elem_addon'),
                'label_block' => true,
                'placeholder' => esc_html__('Preheading Text', 'elem_addon'),
                'default' => esc_html__('Preheading text', 'elem_addon'),
            ]
        );        
        $this->add_control(
            'spacing', 
            [
                'type' => \Elementor\Controls_manager::SLIDER,
                'label' => esc_html__('Bottom Spacing', 'elem_addon'),
                'label_block' => true,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'unit' => 'px',
                    'size' => '20',
                ],
                'range' => [
                    'px' =>[
                        'min' => 0,
                        'max' =>200, 
                        'step' => 1,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} p.pre_txt' => 'margin-bottom: {{SIZE}}{{UNIT}}',                
                ],

            ]
        );

        $this->add_control(
            'text_box_styling',
            [
                'label' => esc_html__('Text Box Styling', 'elem_addon'),
                'type' => \Elementor\Controls_manager:: SELECT,
                'placeholder' => esc_html('Style1', 'elem_addon'),
                'default' => 'style1',
                'prefix_class' => 'box-',
                'options' =>[
                    'style1' => esc_html__('Style1', 'elem_addon'),
                    'style2' => esc_html__('Style2', 'elem_addon'),
                    'style3' => esc_html__('Style3', 'elem_addon'),
                ]
            ]
        );

        $this->add_control(
            'btn-pos', [
                'label' => esc_html__('Button Alignment', 'elem_addon'),
                'type' => Elementor\Controls_manager::CHOOSE,
                'default' => 'center',
                'options' => [
                    'flex-start' => [   'icon' => 'eicon-v-align-top', ],
                    'center' => [   'icon' => 'eicon-v-align-middle', ],
                    'flex-end' => [   'icon' => 'eicon-v-align-bottom', ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn_wrapper' => 'align-self: {{VALUE}}',
                ],
                'condition' => [
                    'text_box_styling!' => 'style1',
                ]

            ]
        );

        $this->add_control(
            'title', 
            [
                'type' => \Elementor\Controls_manager::TEXT,
                'label' =>esc_html__('Title', 'elem_addon'),
                'placeholder' => esc_html__('Enter your title', 'elem_addon'),
                'default'=> esc_html__('Primary Heading', 'elem_addon'), 
            ]
        );

        $this->add_control(
            'description', 
            [
                'type' => \Elementor\Controls_manager::WYSIWYG,
                'label' => esc_html__('Description', 'elem_addon'),
                'label_block' => true,
                'placeholder' => esc_html__('Enter your description', 'elem_addon'),
                'default'=> esc_html__('Description', 'elem_addon'),              
            ]
                
        );

        $this->add_control(
            'btn_txt', 
            [
                'type' => \Elementor\Controls_manager::TEXT,
                'label' => esc_html__('Button Text', 'elem_addon'),
                'placeholder'=> esc_html__('Click Here', 'elem_addon'),
                'default' => esc_html__('Click Here', 'elem_addon'),    
                'button_type' => 'success'
            ]
        );
        $this->add_control (
            'btn_url', 
            [
                'type' => \Elementor\Controls_manager::URL,
                'label' => esc_html__('Button Link', 'elem_addon'),
                'placeholder' => esc_html__('Button Link', 'elem_addon'),
            ]
        );

        $this->end_controls_section();

        /////////////////////////        
        //wrapper link section
        /////////////////////////

        $this-> start_controls_section(
            'Wrapprer_link_tab',
            [
                'label' =>esc_html__('Wrapper Link', 'elem_addon'),
                'tab' => \Elementor\Controls_manager::TAB_CONTENT,
            ]
        );
            $this-> add_control(
                'wrapper_link',
                [
                    'type' => \Elementor\Controls_manager::URL,
                    'label' => esc_html__('Wrapper Link', 'elem_addon'), 
                ]
            );
        $this-> end_controls_section();

        /////////////////////////        
        //Style  Content section
        /////////////////////////

        $this->start_controls_section(
            'style_content', 
            [   'label' => esc_html__('Content Style', 'elem_addon'),
                'tab' => \Elementor\Controls_manager::TAB_STYLE,
            ]
        );

         $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pre_typography',
                'label' => esc_html__('Pre Heading Text', 'elem_addon'),
                'selector' => '{{WRAPPER}} p.pre_txt',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
                ], 
			]      

        );

        $this->add_group_control (
           \Elementor\Group_Control_Typography::get_type(), 
           [
            'name' => 'title_typography',
            'label' => esc_html__('Title Text', 'elem_addon'),
            'selector' => '{{WRAPPER}} .title',
            'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ], 
           ]

        );


        $this->add_group_control (
    \Elementor\Group_Control_Typography::get_type(), 
    [
        'name' => 'des_typography',
        'label' => esc_html__('Description Text', 'elem_addon'),
        'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
                ], 
        'selectors' => 
        [
            '{{WRAPPER}} .description' => '',
        ]
    ]
);

        $this->add_control(
            'pre_head_color', 
            [
                'label' => esc_html('Select Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
                ], 
                'selectors' => [
                    '{{WRAPPER}} p.pre_txt' => 'color: {{VALUE}}',
                ],
                
            ]
        );

        $this->add_control (
            'title_color', 
            [
                'label' => esc_html('Title Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
                ], 
            ]
        );
        

        $this->add_control (
            'des_color', 
            [
                'label' => esc_html('Description Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}}',
                ],
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
                ], 
            ]
        );

        $this->end_controls_section();

        /////////////////////////        
        //Style  button section
        /////////////////////////

        $this->start_controls_section(
            'Btn_styling', 
            [
                'label' => esc_html__('Button', 'elem_addon'),
                'tab' => \Elementor\Controls_manager:: TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html('Typography', 'elem_addon'),
                'selector' =>  '{{WRAPPER}} button.btn_txt',   
                 'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
                ],              
            ],
               

        );


        $this->start_controls_tabs(
            'btn_style_tabs'
        );

        $this->start_controls_tab(
            'btn_normal_tab',

            [
                'label' =>  esc_html__('Normal', 'elem_addon'),
            ]
        );


        $this->add_control(
            'btn_bg',
            [
                'label' => esc_html__('Background Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
                ],
                'selectors' => [
                    '{{WRAPPER}} button' => 'background-color: {{Value}}', 
                ]
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} button' => 'Color: {{Value}}', 
                ],
            ]
        );

        $this->end_controls_tab();
        $this-> start_controls_tab(
            'style_hover_tab', 
            [
                'label' => esc_html__('Hover', 'elem_addon'),
            ]
        );

         $this->add_control(
            'btn_bg_hov',
            [
                'label' => esc_html__('Background Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button:hover' => 'background-color: {{Value}}', 
                ]
            ]
        );
        $this->add_control(
            'btn_color_hov',
            [
                'label' => esc_html__('Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button:hover' => 'Color: {{Value}}', 
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'button_style', 
            [
                'label' => esc_html__('Alignment', 'elem_addon'),                
                'type' => \Elementor\Controls_manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('lnline', 'elem_addon'),  
                        'icon' => 'eicon-text-align-left'
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'elem_addon'),  
                        'icon' => 'eicon-text-align-right'
                    ],

                    'center' => [
                        'title' => esc_html__('Right', 'elem_addon'),  
                        'icon' => 'eicon-text-align-center'
                    ],
                    'justify' => [
                        'title' => esc_html__('justified', 'elem_addon'),  
                        'icon' => 'eicon-text-align-justify'
                    ],
                ], 
                'defalt' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} button' => 'text-align: {{value}}'
                ]
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

        $this->add_control(
            'btn-radius', 
            [
                'label' => esc_html('Border radius', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SELECT,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'size' => '5',
                    'unit' => 'px',
                ],

                'options' => [
                    'None' => esc_html__('None', 'elem_addon'),
                    '5px'  => esc_html__('Extra Small', 'elem_addon'),
                    '10px'  => esc_html__('Small', 'elem_addon') ,
                    '15px'  => esc_html__('Normal', 'elem_addon'),
                    '25px' => esc_html__('Large', 'elem_addon'),
                    '50px' => esc_html__('Extra large', 'elem_addon'),                     

                ],
                'selectors' => [
                    '{{WRAPPER}} button' => 'border-radius: {{SIZE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} button'
            ]
        );

        $this->add_control(
            'hover_btn', 
            [
                'label' => esc_html__('Hover Animation', 'elem_addon'),
                'type' => \Elementor\Controls_manager:: HOVER_ANIMATION,
            ]

        );
        

        $this->end_controls_section();        

    }


protected function render(): void {
    $settings = $this->get_settings_for_display();


        $elementClass = 'container';
    if($settings['hover_btn']){
        $elementClass .= 'elementor-animation-' .$settings['hover_btn'];
    }

    // Connect your wrapper to \Elementor's dynamic selector engine
    $this->add_render_attribute( 'wrapper', 'class', 'text_box_wrapper' );



    ?>
    <div class="text_box_wrapper " <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
        <div class="text_box">
            <div>                    
                <p class="pre_txt"><?php echo $settings['pre_heading'] ?></p>                   
            </div>

            <div>
                <h3 class="title"><?php echo $settings['title']?></h3>
            </div>

            <div class="new-txt">
                <p class="description"> <?php echo $settings['description']?></p>
            </div>            
        </div> <!--end text-box-->                     
        
        <div class = "btn_wrapper">
            <button class="btn_txt"> <?php echo $settings['btn_txt']?></button>
        </div> 
    </div> <!--end wrapper-->    
    <?php 
}


    protected function content_template(): void {
        ?>
        <div class="text_box_wrapper">
            <div class="text_box">            
                <p> {{{settings.pre_heading}}}</p>
                <h3>{{{settings.title}}}</div>
                <p> {{{settings.description}}}</p>
            </div>

            <div>
                <button>{{{settings.btn_txt}}}</button>  
            </div>
        </div>
        <?php
    }
}