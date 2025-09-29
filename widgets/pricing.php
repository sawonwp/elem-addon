<?php

class  pricing extends Elementor\Widget_Base {

    public function get_name() :string {
        return 'Pricing Table';
    }
    public function get_title():string {
        return 'Pricing Table';
    }
    public function get_icon(): string {
        return 'eicon-price-table';
    }
    public function get_categories():array {
        return ['first-category'];
    }

    public function get_style_depends(): array{
        return ['pricing-css'];
    }

    protected function register_controls():void {
       
       $this->start_controls_section(
             'pricing_content', 
        [
            'label' => esc_html__('Table Content', 'elem_addon'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
       );
       
       $this->add_control(
            'pricing_type_style', 
            [
                'label' => esc_html('Pricing Style',  'elem_addon'),
                'type' => Elementor\Controls_manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html('Style 1', 'elem_addon'), 
                    'style2' =>  esc_html('Style 2', 'elem_addon'),
                    'style3' => esc_html('Style 3', 'elem_addon'),
                    'style4' => esc_html('Style 4', 'elem_addon'),
                    'style5' => esc_html('Style 5', 'elem_addon'),
                    'style6' => esc_html('Style 6', 'elem_addon'),                    
                ], 
                'prefix_class' => 'table-',
            ]
       );


       $this->add_control(
        'package_name', 
        [
            'label' => esc_html__('Packege Name', 'elem_addon'),
            'type' => \Elementor\Controls_manager:: TEXT,
            'label_block' => true,
            'default' => esc_html__('Basic', 'elem_addon'),
            'placeholder' => esc_html__('Basic', 'elem_addon'),
            ]
       );
       $this->add_control(
        'package_icon',
        [
            'label' => esc_html__('Package Icon', 'elem_addon'),
            'type' => \Elementor\Controls_manager::ICONS,
            'fa4compatibility' => 'icon', 
            'default' =>  [
                'value' => 'fas fa-star',
                'library' => 'fa-solid',
            ],
       ]
       );

       $this->add_control(
            'package_price', 
       [
            'label' => esc_html__('Package Price', 'elem_addon'),
            'type' => Elementor\Controls_manager::TEXT,  
            'default'  => esc_html__('99', 'elem_addon'),     
            'dynamic'   => [
                'active' => true,
            ]
       ]
       );
       $this->add_control(
            'str_price', 
            [
                'label' => esc_html__("Previous Price", 'elem_addon'),
                'type' => Elementor\Controls_manager::TEXT,
                'description' => 'Currency Symbol inherit from woocommerce',
                'placeholder' => esc_html__('100', 'elem_addon'),
            ]
       );
       $this->add_control(
            'package_type', 
            [
                'label' => esc_html__('Package Type', 'elem_addon'),
                'type' => \Elementor\Controls_manager::TEXT, 
                'default' => '/Year',                
            ]
       );

       $this->add_control(
            'package_pos', 
            [
                'label' => esc_html__('Package Position', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'row' => ['icon' => 'eicon-arrow-right'],
                    'column' => ['icon' => 'eicon-wrap'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pac_price_str'  => 'flex-direction: {{VALUE}}',
                ]
            ]
       );
       $this->add_control(
            'isfeatured', 
            [
                'label' => esc_html__('Enable Badge', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SWITCHER, 
                'label_yes' => esc_html__('YES', 'elem_addon'),
                'label_no' => esc_html__('NO', 'elem_addon'),
                'default' => 'No',
                'prefix_class' => 'featured-'
            ]
       );

        $this->add_control(
        'featured', 
        [
            'label' => esc_html('Badge Text', 'elem_addon'),
            'type' => \Elementor\Controls_manager::TEXT, 
            'condition' => [
                'isfeatured' => 'yes',
            ]
        ]
       );

       $this->add_control(
        'hide_list', 
        [
            'label' => esc_html('Hide List', 'elem_addon'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_yes' => esc_html__('Yes', 'elem_addon'),
            'label_no' => esc_html__('No', 'elem_addon'), 
            'default' => 'no',
            'return_value' => 'yes',
        ]
       );

          /////////////////////////////////////////////////
        //  repeater Code  ----------- 
        ///////////////////////////////////////////////////
        $this->add_control(
			'list',
			[
            'label' => esc_html__( 'Repeater List', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__('Title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html('Feature List' , 'elem_addon'),
						'label_block' => true,
					],
					[
						'name' => 'list_content',
						'label' => esc_html__( 'Icon', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
                            'value' => 'fas fa-check',
                            'library' => 'fa-solid',
                        ], 
                        'fa4compatibility' => 'icon',
					],
					[
						'name' => 'list_color',
						'label' => esc_html__( 'Icon Color', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '#07E60F',
						'selectors' => [
							'{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'fill: {{VALUE}}',
                            '{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
						],
					],
				],
				'default' => [
					[
						'list_title' => esc_html__( 'List Item 1', 'elem_addon' ),
						'list_content' => [
                            'value' => 'fas fa-check',
                            'library' => 'fa-solid',
                        ], 
                        'list_color' => '#07E60F',

					],
					
                    [
						'list_title' => esc_html__( 'List Item 2', 'elem_addon' ),
						'list_content' => [
                            'value' => 'fas fa-check',
                            'library' => 'fa-solid',
                            
                        ], 
                        'list_color' => '#07E60F',
					],
 
                    [
						'list_title' => esc_html__( 'List Item 3', 'elem_addon' ),
						'list_content' => [
                            'value' => 'fas fa-times',
							'library' => 'fa-solid',                           
                        ], 
                        'list_color' => '#ff0000',
					],
				],
				'title_field' => '{{{ list_title }}}',
              
                'condition' => [
                    'hide_list!' => 'yes',
                ],
			],

		);

    $this->add_control(
            'btn_txt', 
            [
                'type' => \Elementor\Controls_manager::TEXT,
                'label' => esc_html__('Button Text', 'elem_addon'),
                'placeholder'=> esc_html__('Buy Now', 'elem_addon'),
                'default' => esc_html__('Buy Now', 'elem_addon'),    
                'button_type' => 'success',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
                ], 

            ]
        );
        $this->add_control (
            'btn_url', 
            [
                'type' => \Elementor\Controls_manager::URL,
                'label' => esc_html__('Button Link', 'elem_addon'),
                'placeholder' => esc_html__('Button Link', 'elem_addon'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );   
        
        $this->add_control (
            'btm_txt', 
            [
                'type' => \Elementor\Controls_manager::TEXT,
                'label' => esc_html__('Description Text', 'elem_addon'),
                'placeholder' => esc_html__('Bottom Text', 'elem_addon'),                
            ]
        );  
        $this->add_control(
            'btm_txt_pos', 
            [
                'label' => esc_html__('Description Position'),
                'type' => \Elementor\Controls_manager::SELECT, 
                'options' => [
                    'before_title' => esc_html__('Before Title', 'elem_addon'),
                    'after_title' => esc_html__('After Title', 'elem_addon'),
                    'after_icon' => esc_html__('After Icon', 'elem_addon'),
                    'after_pricing' => esc_html__('After Pricing', 'elem_addon'),
                    'after_list' => esc_html__('After list', 'elem_addon'),
                    'after_button' => esc_html__('After button', 'elem_addon'),
                ], 
                'default' => 'after_button',
                'prefix_class' => 'txt_',
                'condition' => [
                    'pricing_type_style' => 'style5',
                ]
            ]
        );
       

       $this->end_controls_section();

    ////////////////////////////////
    //  start style section
    /////////////////////////////

       $this->start_controls_section(
            'pricing_style', 
            [
                'label' => esc_html__('General', 'elem_addon'),
                'tab' => \Elementor\Controls_manager:: TAB_STYLE,
            ]
        );

        $this->add_control(
            'text-align',
            [
                'label' =>  esc_html('Content Alignment', 'elem_addon'),
                'type' => \Elementor\Controls_manager::CHOOSE,
                'default' => 'center',
                'prefix_class' => 'alignment-',
                'options' => [
                    'left' => [
                        'icon' => 'eicon-h-align-left',                      
                        
                    ],
                    'center' => [
                        'icon' => 'eicon-h-align-center', 
                    ],
                    'right' => [
                        'icon' => 'eicon-h-align-right', 
                    ],
                    'center2' => [
                        'icon' => 'eicon-text-align-justify',
                    ], 

                ],
                'selectors' => 
                [
                    '{{WRAPPER}} .pricing_box_wrapper' => 'text-align: {{VALUE}}',
                ]
            ]

        );

        $this->add_control(
            'wrapper_padding', 
            [
                'label' => esc_html__('Padding', 'elem_addon'),
                'type' => \Elementor\Controls_manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' =>
                [
                    'top' => 0,
                    'right' => 0, 
                    'bottom' => 15,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => false,
                ],                
                'selectors' => [
                    '{{WRAPPER}} .pricing_box_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

    //Package starts

        $this->start_controls_section(
        'Package_wrapper', 
        [
            'label' => esc_html('Package Title', 'elem_addon'),
            'tab' => Elementor\Controls_manager::TAB_STYLE,
        ]        
       );


       $this->add_control(
        'pac_elem', 
        [
            'label' => esc_html__('Elements', 'elem_addon'),
            'type' => \Elementor\Controls_manager::SELECT, 
            'condition' => [
                'pricing_type_style' => 'style1',
            ],
            'prefix_class' => 'element-style-',
            'options' => [
                'none' => esc_html__("Default", 'elem_addon'),
                'triangle' => esc_html__('Triangle', 'elem_addon'),
                'bar' => esc_html__('Bar', 'elem_addon'),
                'circle' => esc_html__('Circle', 'elem_addon'),
                'ltriangle' => esc_html__('Hexagon', 'elem_addon'),
                'overlaped' => esc_html('Overlaped', 'elem_addon'),

            ],
            'condition' => [
                'pricing_type_style' => 'style1'
            ],
        ]
       );

       $this->add_control(
        'package_color',
        [
            'label' => esc_html__('Color', 'elem_addon'),
            'type' => Elementor\Controls_manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .package_name h3' => 'Color: {{VALUE}}',
            ]
        ]        
       );
       $this->add_control(
        'package_background',
        [
            'label' => esc_html__('Background', 'elem_addon'),
            'type' => Elementor\Controls_manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .package_name' => 'background-color: {{VALUE}}',
                '{{WRAPPER}}.table-style1 .package_name::after' => 'background-color: {{VALUE}}',
                '{{WRAPPER}}.table-style1 .pricing_box_wrapper::after' => 'background-color: {{VALUE}}'
            ], 
            'default' => '#61C1CE',
        ]        
       );
       
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pack_typography',
                'label' => esc_html__('Typography', 'elem_addon'),
                'selector' => '{{WRAPPER}} .package_name h3',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
                ], 
			]   
       );

       $this->add_responsive_control(
        'package_spacing', 
        [
            'label' => esc_html__('Bottom Spacing', 'elem_addon'),
            'type' => Elementor\Controls_manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw' ],
            'selectors' => [
                '{{WRAPPER}} .package_name' => 'margin-bottom: {{SIZE}}{{UNIT}}',     
                '{{WRAPPER}}.table-style4 .package_name' => 'gap: {{SIZE}}{{UNIT}};'
            ],
            'default' => [
                'unit' => 'px',
                'size' => 30,
            ],
            'condition' => [
                'pricing_type_style!' => 'style3',
            ],
            
        ]  
       );

            ///conditional items
       $this->add_responsive_control(
        'icon_package_spacing', 
        [
            'label' => esc_html__('Icon Spacing', 'elem_addon'),
            'type' => Elementor\Controls_manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw' ],
            'selectors' => [
                '{{WRAPPER}}.table-style4 .package_name' => 'gap: {{SIZE}}{{UNIT}};'
            ],
            'default' => [
                'unit' => 'px',
                'size' => 10,
            ],
            'condition' => [
                'pricing_type_style' => 'style4',
            ]

        ]  
       );

        $this->add_control(
            'pack_btn-radius', 
            [
                'label' => esc_html('Border radius', 'elem_addon'),
                'type' => \Elementor\Controls_manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                ],                               
                'selectors' => [
                    '{{WRAPPER}} .package_name' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ]
            ]
        );

        $this->add_responsive_control(
            'pack_padding', 
            [
                'label' => esc_html__('Padding', 'elem_addon'),
                'type' => \Elementor\Controls_manager::DIMENSIONS, 
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'vh'],
                'default' => [
                    'unit' => 'px',
                    'top' => 20,
                    'right' => 20,
                    'bottom' => 20,
                    'left' =>  20,
                ],
                'selectors' => 
                [
                    '{{WRAPPER}} .package_name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
         );

         
       $this->end_controls_section();

////start Icon section

        $this->start_controls_section(
        'Icon_tab',
        [
            'label' => esc_html('Icon', 'elem_addon'),
            'tab' => \Elementor\Controls_manager::TAB_STYLE,
        ]
       );

       $this->add_control(
        'icon_color', 
        [
            'label' => esc_html('Icon Color', 'elem_addon'),
            'type' => Elementor\Controls_manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pack_icon svg' => 'fill:{{VALUE}}'  ,
                '{{WRAPPER}} .pack_icon i' => 'color:{{VALUE}}'  ,
            ], 
            'default'=> '#61c1ce'
        ], 
        
       );

       $this->add_control(
        'icon_bg', 
        [
            'label' => esc_html('Icon Background Color', 'elem_addon'),
            'type' => Elementor\Controls_manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pack_icon' => 'Background:{{VALUE}}',
                
            ]
        ], 
        
       );


       $this->add_responsive_control(
        'icon_size', 
        [
            'label' => esc_html__('Icon Size', 'elem_addon'),
            'type' => Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'devices' => ['desktop', 'tablet', 'mobile'],
            'range' => [
                'px' => [
                    'min' => 30,
                    'max' => 400,
                    'step' => 5,                     
                    ],
                '%' => [
                    'min' => 2, 
                    'max' => 100,
                    'step' => 1,                     
                    ]                
                ],
                'default' => [
                    'size' => 100,
                    'unit' => 'px',
                    ], 
                'tablet_default' => [
                    'size' => 60,
                    'unit' => 'px',
                    ], 
                'mobile_default' => [
                    'size' =>  40,
                    'unit' => 'px',
                    ],

            'selectors' => [
                '{{WRAPPER}} .pack_icon svg' =>  'width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pack_icon i' =>  'font-size: {{SIZE}}{{UNIT}}',
                '{{WRAPPER}} .pack_icon::Before ' =>  'content: ""; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
            ]
        ]
 
       );
       $this->add_responsive_control(
        'pack_icon', 
        [
            'label' => esc_html__('Spacing', 'elem_addon'),
            'type' => Elementor\Controls_manager::DIMENSIONS, 
             'size_units' => ['px', '%', 'em', 'rem', 'vw', 'vh'],
                'default' => [
                    'unit' => 'px',
                    'top' => 30,
                    'right' => 0,
                    'bottom' => 30,
                    'left' =>  0,
                ],
                'selectors' => 
                [
                    '{{WRAPPER}} .pack_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

        ]
        

       );

       $this->add_control(
        'icon_border-radius', 
        [
            'label' => esc_html__('Icon Border radius', 'elem_addon'),
            'type' => \Elementor\Controls_manager::DIMENSIONS, 
            'size_units' => ['px', '%', 'rem', 'em'],
            'selectors' => [
                '{{WRAPPER}} .pack_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ], 
            
        ]
       );

       $this->add_control(
        'icon_padding', 
        [
            'label' => esc_html__('Padding', 'elem_addon'),
            'type' => \Elementor\Controls_manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors' => [
                '{{WRAPPER}} .pack_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ],
            'default' => [
                'unit' => 'px',
                'top' => 10,
                'right' => 10,
                'bottom' => 10,
                'left' => 10,
            ]

        ]
       );
         $this->end_controls_section();

             
    //start price
        $this->start_controls_section(
        'Package_price', 
        [
            'label' => esc_html('Price', 'elem_addon'),
            'tab' => Elementor\Controls_manager::TAB_STYLE,
        ]        
       );

       $this->add_control(
        'price_color', 
        [
            'label' => esc_html('Color', 'elem_addon'),
            'type' => \Elementor\Controls_manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pac_price_str' => 'color:{{VALUE}};',
            ]
        ]
       );       
       $this->add_control(
        'type_color',
        [
            'label' => esc_html('Package Type Color', 'elem_addon'),
            'type' => \Elementor\Controls_manager::COLOR,            
            'selectors' => [
                '{{WRAPPER}} .pac_price_str sub' => 'color: {{VALUE}}',  
            ]
        ]
       );

       $this->add_control(
        'price_bg_color', 
        [
            'label' => esc_html__('Background', 'elem_addon'),
            'type' => \Elementor\Controls_manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pac_price_str' => 'background: {{VALUE}}',                
            ],             
                        

        ]
       );

       $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
                'label' => esc_html__('Typography', 'elem_addon'),
                'selector' => '{{WRAPPER}} .pac_price_str .pack_price',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ], 
			]   
       );

       $this->add_control(
        'price_position', 
        [
            'label' => esc_html("Before Button", 'elem_addon'),
            'type' => \Elementor\Controls_manager::SWITCHER,
            'label_yes' => esc_html__('Enable', 'elem_addon'),
            'label_no' => esc_html__('Disable', 'elem_addon'),
            'default' => 'no',
            'return_value' => 'yes',
            'prefix_class' => 'price_btm_',  
            
            'condition'    => [
            'btn_to_top!' => 'yes', // hide price option if button option is yes
        ]
            
        ]
       );

       $this->add_control(
        'currency_scale',
    [
        'label' => esc_html__('Currency Scale', 'elem_addon'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['%'],
        'range' => [
            'min' => 10,
            'max' => 100,
            'step' => 1,
        ],
        'default' => [
            'size' => 80,
            'unit' => '%',
        ],
        'selectors' => [
            '{{WRAPPER}} .currency_sign' => '
                display: inline-block;
                transform: scale(calc({{SIZE}}/100));
                transform-origin: center;
                line-height: 1;
            ',
        ],
    ]);

    $this->add_responsive_control(
        'price_width', 
        [
            'label' => esc_html__('Width', 'elem_addon'),
            'type' => \Elementor\Controls_manager::SLIDER,
            'size_units' => ['px', '%', 'rem', 'em'],
            'range' => 
            [
                'px' =>  [
                    'min' => 50, 
                    'max' => 1000,
                    'step' => 10,
                ], 
                '%' => [
                    'min' => 10,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => 
            [
                'unit' => 'px',
                'size' => '200',
            ],

            'condition' => [
                 'pricing_type_style' => 'style3',                 
             ],

            'selectors' => [
                '{{WRAPPER}} .pac_price_str' => 'width:{{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ]
            
        ]
       );

       $this->add_control(
        'price_border-radius', 
        [
            'label' => esc_html__('Border-radius', 'elem_addon'),
            'type' => \Elementor\Controls_manager::DIMENSIONS, 
            'size_units' => ['px', '%', 'rem', 'em'],
            'selectors' => [
                '{{WRAPPER}} .pac_price_str' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ], 
            'condition' => [
                 'pricing_type_style' => 'style3',                 
             ],
            
        ]
       );

       $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'pricing_border',
                'selector' => '{{WRAPPER}} .pac_price_str'
            ]
        );


       $this->add_control(
        'price_padding', 
        [
            'label' => esc_html__('Padding', 'elem_addon'),
            'type' => \Elementor\Controls_manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors' => [
                '{{WRAPPER}} .pac_price_str' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ],
            'default' => [
                'unit' => 'px',
                'top' => 10,
                'right' => 10,
                'bottom' => 10,
                'left' => 10,
            ]

        ]
       );
       
        $this->add_responsive_control(
            'pricing_spacing', 
            [
                'label' => esc_html('Spacing', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SLIDER,
                'label_block' => true,
                'size_units' => ['px', '%', 'em', 'rem' ],
                'default' => [
                    'unit'=> 'px', 
                    'size' => 30,                    
                ], 
                'selectors' => [
                    '{{WRAPPER}} .pac_price_str' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'pricing-top', 
            [
                'label' => esc_html__('Enable Pricing Position', 'elem_addon'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'top' => [ 'icon' => 'eicon-arrow-up'],
                    'top_nolap' => ['icon' => 'eicon-arrow-down'],
                    'normal' => ['icon' => 'eicon-parallax'],
                    'overlap' => ['icon' => 'eicon-v-align-top'],
                ],
                'default' => 'normal',
                'prefix_class' => 'price-position-',
                'condition' => [
                    'pricing_type_style' => 'style3',
                ],                 
            ]
        );

        
        
         $this->end_controls_section();

       //badge starts//
         $this->start_controls_section(
        'badge_tab',
        [
            'label' => esc_html('Badge', 'elem_addon'),
            'tab' => \Elementor\Controls_manager::TAB_STYLE,
            'condition' => [
                'isfeatured' => 'yes',
            ],
            
        ]
       );

       $this->add_control(
        'badge_bg', 
            [
                'label' => esc_html__('Badge Background', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,    
                 'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
                ],
                'selectors'  => 
                [
                    '{{WRAPPER}} .badge_wrapper .badge_inner' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}}.align-block .badge_inner' => 'background-color: {{VALUE}}',

                ]
            ]
       );
       $this->add_control(
        'badge_color', 
        [
            'label' => esc_html__('Badge Color', 'elem_addon'),
            'type' => \Elementor\Controls_manager::COLOR,
            'selectors' => 
                [
                    '{{WRAPPER}} .badge_wrapper' => 'color: {{VALUE}};',
                    '{{WRAPPER}}.align-block .badge_inner' => 'color: {{VALUE}}'
                ]
        ]
       );

       
       $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'padge_typography',
                'label' => esc_html__('Typography', 'elem_addon'),
                'selector' => '{{WRAPPER}} .badge_inner',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
                ], 
			]   
       );

       $this->add_control(
        'badge_position', 
        [
            'label' => esc_html__('Badge postion', 'elem_addon'),
            'label_block' => true,
            'type' => \Elementor\Controls_manager::CHOOSE, 
            'prefix_class' => 'align-',
            'default' => 'right',
            'options' => 
            [
                'left' =>  
                [
                    'icon' => 'eicon-h-align-left',
                ],
                'right' =>  
                [
                    'icon' => 'eicon-h-align-right',
                    
                ], 
                'inline' => [
                    'icon' => 'eicon-h-align-stretch',
                ], 
                'block' => [
                    'icon' => 'eicon-meta-data',
                ],
                'diagonal-stripe' => [
                    'icon' => 'eicon-editor-external-link',
                ],
                
                'horizontal' => [
                    'icon' => 'eicon-arrow-down',
                ],
                'top-right' => [
                    'icon' => 'eicon-angle-right',
                ],                
            ],
            'selectors' => [
                '{{WRAPPER}}.align-left .badge_inner' => 'float : {{VALUE}};',
                '{{WRAPPER}}.align-horizontal .badge_inner' => 'float: left;',
                '{{WRAPPER}}.align-right .badge_inner' => 'float : {{VALUE}};',
                '{{WRAPPER}}.align-block .badge_inner' => 'display: inline-block;',
            ],

        ]
       );

       $this->add_responsive_control(
        'badge_padding', 
        [
            'label'=> esc_html__("Badge Padding", 'elem_addon'), 
            'type' => \Elementor\Controls_manager::SLIDER,
            'size_units'=> ['px', '%', 'em', 'rem'],
            'default' => [
                'unit' => 'px',
                'top' => 10,
                'right' => 10,
                'bottom' => 10, 
                'left' => 10,
            ],
            'selectors' => [
                '{{WRAPPER}} span.badge_inner' => 'padding: {{SIZE}}{{UNIT}};'
            ],
            
        ]
       );

       $this->add_responsive_control(
            'badge_radius', 
            [
                'label' => esc_html__('Border Radius', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SLIDER, 
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'vh'],
                'default' => [
                    'unit' => 'px',
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' =>  0,
                ],
                'selectors' => 
                [
                    '{{WRAPPER}} span.badge_inner' => 'Border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
         );  

         $this->add_control(
            'badge_cus_pos', 
            [
                'label' => esc_html__('Custom Badge Position', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SWITCHER,
                'label_yes' => esc_html__('Yes', 'elem_addon'),
                'label_no' => esc_html__('No', 'elem_addon'),
                'default' => 'no',
                'return_value' => 'yes',                
            ]
         );

         $this->add_responsive_control(
            'badge_radius', 
            [
                'label' => esc_html__('Border Radius', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SLIDER, 
                'size_units' => [ 'px','%'],
                'default' => [
                    'unit' => 'px',
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' =>  0,
                ],
                'selectors' => 
                [
                    '{{WRAPPER}} span.badge_inner' => 'Border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
         );  




        $this->end_controls_section();
        
////////////////////////////
/////list//////////////////
//////////////////////////
        $this->start_controls_section(
                'list_tab',
                [
                    'label' => esc_html('List', 'elem_addon'),
                    'tab' => \Elementor\Controls_manager::TAB_STYLE,
                    'condition' => [
                        'hide_list!' => 'yes',
                    ]
                ]
            );

        $this->add_responsive_control(
            'list_spacing', 
            [
                'label' => esc_html__('Spacing', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SLIDER,
                'label_block' => true,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' => 
                [
                    'unit' => 'px',
                    'size' => 10,
                ], 
                'selectors' => [
                    '{{WRAPPER}} li.list' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ]
                
            ]
        );
        $this->add_responsive_control(
            'spacing-icon', 
            [
                'label' => esc_html__('Icon Spacing', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SLIDER,
                'label_block' => true,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' => 
                [
                    'unit' => 'px',
                    'size' => 10,
                ], 
                'selectors' => [
                    '{{WRAPPER}} li.list svg' => 'margin-right: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} li.list i' => 'margin-right: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'feature_align',
            [
                'label' =>  esc_html('Content Alignment', 'elem_addon'),
                'type' => \Elementor\Controls_manager::CHOOSE,
                'default' => 'left',               
                'options' => [
                    'left' => [
                        'icon' => 'eicon-h-align-left',                      
                        
                    ],
                    'center' => [
                        'icon' => 'eicon-h-align-center', 
                    ],
                    'right' => [
                        'icon' => 'eicon-h-align-right', 
                    ],  
                    'justify' => [
                        'icon' => 'eicon-text-align-justify', 
                    ],                 

                ],
                'selectors' => 
                [
                    '{{WRAPPER}} li' => 'text-align: {{VALUE}}',
                ]
            ]

        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'list_typography',
                'label' => esc_html__('Typography', 'elem_addon'),
                'selectors' => '{{WRAPPER}} .list_wrapper li',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
                ], 
			]   
       );

       $this->add_control(
         'list_color', [
            'type' => Elementor\Controls_manager::COLOR,
            'label' => esc_html('Color', 'elem_addon'),
            'selectors' => [
                '{{WRAPPER}} .list_wrapper li' => 'color: {{VALUE}}',
            ]
         ]
       );

       $this->add_control(
        'list_bg', [
            'label' => esc_html('Background', 'elem_addon'),
             'type' => \Elementor\Controls_Manager::COLOR,
        ]
       );

       $this->add_control(
        'list_item_bg', 
        [
            'label' => esc_html__('List Item Bagckground'),
            'type' => \Elementor\Controls_manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .list_wrapper li' => 'background-color: {{VALUE}}',
            ]
        ]
       );

       $this->add_control(
        'list_item_bg_roundness', 
        [
            'label' => esc_html__('List Item Radius'),
            'type' => \Elementor\Controls_manager::DIMENSIONS,
            'size' => ['px', '%'],
            'default' => [
                'top' => 0,
                'right' => 0,
                'bottom' => 0,
                'left' => 0,
                'unit' => 'px'
            ],

            'selectors' => [
                '{{WRAPPER}} .list_wrapper li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            ]
        ]
       );

       $this->add_control(
        'list_item_Padding', 
        [
            'label' => esc_html__('List Item Padding'),
            'type' => \Elementor\Controls_manager::DIMENSIONS,
            'size' => ['px', '%'],
            'default' => [
                'top' => 5,
                'right' => 5,
                'bottom' => 5,
                'left' => 5,
                'unit' => 'px'
            ],

            'selectors' => [
                '{{WRAPPER}} .list_wrapper li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            ]
        ]
       );

        $this->add_responsive_control(
            'list_padding', 
            [
                'label' => esc_html__('Padding', 'elem_addon'),
                'type' => \Elementor\Controls_manager::DIMENSIONS, 
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'vh'],
                'default' => [
                    'unit' => 'px',
                    'top' => 20,
                    'right' => 20,
                    'bottom' => 20,
                    'left' =>  20,
                ],
                'selectors' => 
                [
                    '{{WRAPPER}} .list_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                
            ]
         );        


        $this->end_controls_section();


              //  Button Start
   
        $this->start_controls_section(
            'Btn_styling', 
            [
                'label' => esc_html__('Button', 'elem_addon'),
                'tab' => \Elementor\Controls_manager:: TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn_to_top' , 
            [
                'label' => esc_html__("Button Before List" ,'elem_addon'),
                'type' => \Elementor\Controls_manager::SWITCHER,
                'label_yes' => esc_html__('Enable', 'elem_addon'),
                'label_no' => esc_html__('Disable', 'elem_addon'),
                'default' => 'no',
                'return_value' => 'yes',
                'prefix_class' => 'btn_top_',
                'condition'    => [
                    'price_position!' => 'yes', // hide button option if price_position is yes
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__('Typography', 'elem_addon'),
                'selector' =>  '{{WRAPPER}} .pack_btn a',   
                 'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
                ],              
            ],              

        );
        $this->add_control(
            'btn_box_shadow', 
            [
                'type' =>Elementor\Controls_manager::BOX_SHADOW, 
                'label' => esc_html__('Box Shadow', 'elem_addon'),
                'selectors' => [
                    '{{WRAPPER}} .pack_btn a' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
                ]
            ]
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
                    '{{WRAPPER}} .pack_btn a' => 'background: {{VALUE}}', 
                ], 
                
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .pack_btn a' => 'Color: {{VALUE}}', 
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
                    '{{WRAPPER}} a:hover' => 'background-color: {{VALUE}}', 
                ]
            ]
        );
        $this->add_control(
            'btn_color_hov',
            [
                'label' => esc_html__('Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button:hover' => 'Color: {{VALUE}}', 
                ]
            ]
        );

        
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'line_hover', 
            [
                'type' => \Elementor\Controls_manager::DIVIDER,
            ]
        );

        $this->add_responsive_control(
            'btn_padd', 
            [
                'label' => esc_html__('Padding', 'elem_addon'),
                'type' => \Elementor\Controls_manager::DIMENSIONS, 
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'vh'],
                'default' => [
                    'unit' => 'px',
                    'top' => 20,
                    'right' => 20,
                    'bottom' => 20,
                    'left' =>  20,
                ],
                'selectors' => 
                [
                    '{{WRAPPER}} pack_btn.' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
         );

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
                    '{{WRAPPER}} .pack_btn button' => 'text-align: {{VALUE}}'
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
                    'size' => '5px',
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
                    '{{WRAPPER}} a' => 'border-radius: {{SIZE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'pricing_btn_border',
                'selector' => '{{WRAPPER}} .pack_btn'
            ]
        );
        
        $this->add_responsive_control(
            'btn_spacing', 
            [
                'label' => esc_html__('Spacing', 'elem_addon'),
                'type' => \Elementor\Controls_manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .pack_btn' => 'margin-top: {{SIZE}}px;',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
            ], 

        );

       $this->end_controls_section();

       $this->start_controls_section(
            'des_txt', 
            [
                'label' => esc_html('Description Text', 'elem_addon'),
                'tab' =>  \Elementor\Controls_Manager::TAB_STYLE,
            ]
       );

       $this->add_control(
            'des_bg', 
            [
                'label' => esc_html__('Background', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btm_txt' => 'background: {{VALUE}};'
                ],
            ]
       );

       $this->add_control(
            'des_color', 
            [
                'label' => esc_html__('Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btm_txt' => 'Color: {{VALUE}};'
                ],
            ]
       );
       $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
                'label' => esc_html__('Typography', 'elem_addon'),
                'selector' => '{{WRAPPER}} .btm_txt',                
			]   
       );

       $this->add_control(
            'des_padding', 
            [
                'label' => esc_html__('Padding', 'elem_addon'),
                'type' => \Elementor\Controls_manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' =>
                [
                    'top' => 0,
                    'right' => 0, 
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                ],                
                'selectors' => [
                    '{{WRAPPER}} .btm_txt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
       $this->end_controls_section(); 

    }


protected function render(): void {
    $settings = $this->get_settings_for_display();
    $btn_url = !empty($settings['btn_url']['url']) ? $settings['btn_url']['url'] : '#';
    ?>
    <div class="pricing_box_wrapper elementor-widget-container">
        <?php if ($settings['isfeatured'] === 'yes' && $settings['badge_position'] !== 'block'): ?>
            <div class="badge_wrapper">
                <div class="badge_inner">
                    <p><?php echo esc_html($settings['featured']); ?></p>
                </div>
            </div>
        <?php endif; ?>        

        <div class="pricing_content_wrap">
        <?php if($settings['pricing_type_style'] != 'style4') : ?>

            <div class="package_name">
                <h3><?php echo esc_html($settings['package_name']); ?>
                    <?php if($settings['badge_position'] === 'block' && ($settings['pricing_type_style'] === 'style2')) : ?> 
                    <span class="badge_inner"> <?php echo esc_html($settings['featured']) ?> </span>
                    <?php endif; ?>                   
                </h3>                 
            </div>
         <?php endif; ?> 

            <?php if($settings['pricing_type_style'] === 'style4') : ?>
            <div class="package_name">
               <div class="pack_icon">
                    <?php \Elementor\Icons_Manager::render_icon($settings['package_icon'], ['aria-hidden' => 'true']); ?> 
               </div> 
                <h3><?php echo esc_html($settings['package_name']) ?> </h3>
            </div>
            <?php endif; ?> 

            
        
            <?php if($settings['pricing_type_style'] != 'style4') : ?>
            <div class="pack_icon">
                <?php \Elementor\Icons_Manager::render_icon($settings['package_icon'], ['aria-hidden' => 'true']); ?>
                
            </div>
            <?php endif; ?>

        
            <div class="pac_price_str">
                <?php if (!empty($settings['str_price'])) : ?>
                    <span class="strikethrough"><del><?php echo esc_html($settings['str_price']); ?></del></span>                    
                <?php endif; ?>
                <span class="pack_price"> <sup class="currency_sign">$</sup> <?php echo esc_html($settings['package_price']); ?></span>
                
                <sub class="type_txt" ><?php echo esc_html($settings['package_type']); ?></sub>
            </div>


        
            <?php if (!empty($settings['list']) && is_array($settings['list'])) : ?>
                <ul class="list_wrapper">
                    <?php foreach ($settings['list'] as $item) : ?>
                        <li class="list elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
                            <?php 
                            if (!empty($item['list_content']['value'])) {
                                \Elementor\Icons_Manager::render_icon($item['list_content'], [
                                    'aria-hidden' => 'true',
                                    'class' => 'list-icon'
                                ]);
                            }
                            echo esc_html($item['list_title']); 
                            ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        
            <div class="pack_btn">
                <a href="<?php echo esc_url($btn_url); ?>" class="elementor-button">
                    <?php echo esc_html($settings['btn_txt']); ?>
                </a>
            </div>

            <?php if (!empty($settings['btm_txt'])) : ?>
                <div class="btm_txt">
                    <p><?php echo esc_html($settings['btm_txt']); ?></p> 
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
}
  protected function content_template(): void {
      ?>
      <div class="pricing_box_wrapper">
        <# if (settings.isfeatured === 'yes') { #>         
              <div class="badge_wrapper">
                  <div class="badge_inner">
                      <p>{{{ settings.featured }}}</p>
                  </div>
              </div>
          <# } #>
        
          <div class="package_name">
              <h3>{{{ settings.package_name }}}</h3>
          </div>
        
          <div class="pack_icon">
              <# 
              var iconHTML = elementor.helpers.renderIcon(view, settings.package_icon, { 'aria-hidden': 'true' }, 'i', 'object' );
              if (iconHTML.rendered) { #>
                  {{{ iconHTML.value }}}
              <# } #>
          </div>
        
          <div class="pac_price_str">
              <# if (!empty settings.str_price) { 
                <span class="strikethrough"><del><?php echo esc_html($settings['str_price']); ?></del></span> 
              <# }  #>
            <span> <sup class="currency_sign">$</sup>  
              {{{ settings.package_price }}}</span>
              <sub class="type_txt">{{{ settings.package_type }}}</sub>
          </div>
        
          <# if (settings.list && settings.list.length) { #>
                  <ul class="list_wrapper">
                      <# _.each(settings.list, function(item) { #>
                          <li class="repeater elementor-repeater-item-{{ item._id }}">
                              {{ item.list_title }}
                              <# if (item.list_content && item.list_content.value) { #>
                                  <# 
                                  var iconHTML = elementor.helpers.renderIcon(view, item.list_content, { 'aria-hidden': 'true', 'class': 'list-icon' }, 'i', 'object' );
                                  if (iconHTML.rendered) { #>
                                      {{{ iconHTML.value }}}
                                  <# } #>
                              <# } #>
                          </li>
                      <# }); #>
                  </ul>
              <# } #>
        
          <div class="pack_btn">
              <a href="{{{settings.'btn_url'}}}"> 
                  {{{ settings.btn_txt }}} </a>
          </div>
      </div>
      <?php 
  }
}

?>